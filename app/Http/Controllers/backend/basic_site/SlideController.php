<?php

namespace App\Http\Controllers\backend\basic_site;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SlideController extends Controller
{
    //

    public function index()
    {

        $data_slide = Slide::with('media')->get();
        $data_slide->sortBy('name');

        return view('backend.pages.slide.index', compact('data_slide'));
    }


    public function store(Request $request)
    {
        //request validation .......

        $data_Slide = Slide::firstOrCreate([
            'title' => $request['tile'],
            'status' => $request['status'],
        ]);

        if (request()->hasFile('image')) {
            $data_Slide->addMediaFromRequest('image')->toMediaCollection('slideImage');
        }


        Alert::success('Operation réussi', 'Success Message');

        return back();
    }


    public function update(Request $request, $id)
    {

        //request validation ......

        $data_Slide = tap(Slide::find($id))->update([
           
            'title' => $request['title'],
            'status' => $request['status'],
        ]);

        if (request()->hasFile('image')) {
            $data_Slide->clearMediaCollection('slideImage');
            $data_Slide->addMediaFromRequest('image')->toMediaCollection('slideImage');
        }

        Alert::success('Opération réussi', 'Success Message');
        return back();
    }


    public function delete($id)
    {
        Slide::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
