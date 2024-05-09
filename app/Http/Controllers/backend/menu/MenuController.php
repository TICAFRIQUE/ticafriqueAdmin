<?php

namespace App\Http\Controllers\backend\menu;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    //
    public function index()
    {
        return view('backend.pages.menu.create');
    }

    public function create()
    {
      

        //create menu principal
        $data_menu = Menu::whereNull('parent_id')->with('children')->withCount('children')->get();
        $data_menu = $data_menu->sortBy('position');
        // dd($data_menu->toArray());
        return view('backend.pages.menu.create', compact('data_menu'));
    }



    public function store(Request $request)
    {

        //request validation ......
        $data_menu_count = Menu::max('position');

        $position =  $data_menu_count + 1;


        $data_menu = Menu::firstOrCreate([
            'name' => $request['name'],
            'status' => $request['status'],
            'url' => $request['url'],
            'position' => $position,
        ]);

        Alert::success('Operation réussi', 'Success Message');

        return back();
    }


    public function addMenuItem(Request $request, $id)
    {


        $data_menu = Menu::whereNull('parent_id')->with('children')->get();
        $data_menu = $data_menu->sortBy('position');

        $data_menu_parent = Menu::find($id);

        return view('backend.pages.menu.menu-item',  compact('data_menu', 'data_menu_parent'));
    }


    public function addMenuItemStore(Request $request)
    {
        //request validation ......
        $data_menu_count = Menu::max('position');

        $position =  $data_menu_count + 1;

        $menu_parent = Menu::whereName($request['menu_parent'])->first();

        $data_menu = Menu::firstOrCreate([
            'parent_id' => $menu_parent['id'],
            'name' => $request['name'],
            'status' => $request['status'],
            'url' => $request['url'],
            'position' => $position,
        ]);

        Alert::success('Operation réussi', 'Success Message');

        return redirect()->route('menu.create');
    }


    public function edit(Request $request, $id)
    {
        $data_menu = Menu::whereNull('parent_id')->with('children')->get();
        $data_menu = $data_menu->sortBy('position');

        $data_menu_edit = Menu::find($id);

        return view('backend.pages.menu.menu-edit',  compact('data_menu', 'data_menu_edit'));
    }


    public function update(Request $request, $id)
    {

        //request validation ......

        $data_menu = Menu::find($id)->update([
            'name' => $request['name'],
            'status' => $request['status'],
            'url' => $request['url'],

            // 'position' => $position,
        ]);

        Alert::success('Opération réussi', 'Success Message');
        return redirect()->route('menu.create');
    }


    public function delete($id)
    {
        // Menu::where('parent_id', $id)->delete();
        Menu::find($id)->delete();

        Alert::success('Opération réussi', 'Success Message');
        return redirect()->route('menu.create');

        // return response()->json([
        //     'status' => 200,
        // ]);
    }
}
