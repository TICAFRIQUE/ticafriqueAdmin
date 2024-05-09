<?php

namespace App\Http\Controllers\backend\media;

use Illuminate\Http\Request;
use App\Models\MediaCategory;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class MediaCategoryController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data_media_category = MediaCategory::get();
        $data_media_category->sortBy('name');
        return view('backend.pages.media.category.index', compact('data_media_category'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //request validation .......

        $data_media_category = MediaCategory::firstOrCreate([
            'name' => $request['name'],
            'status' => $request['status'],
        ]);

        Alert::success('Operation réussi', 'Success Message');

        return back();
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        //request validation ......

        $data_media_category = MediaCategory::find($id)->update([
            'name' => $request['name'],
            'status' => $request['status'],
        ]);

        Alert::success('Opération réussi', 'Success Message');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        MediaCategory::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
