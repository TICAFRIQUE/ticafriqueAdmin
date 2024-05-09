<?php

namespace App\Http\Controllers\backend\media;

use App\Models\MediaContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MediaCategory;
use RealRashid\SweetAlert\Facades\Alert;

class MediaContentController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data_media_category = MediaCategory::get();
        $data_media_content = MediaContent::with(['media', 'media_category'])->get();
        // dd($data_media_content->toArray());
        $data_media_content->sortBy('name');
        return view('backend.pages.media.content.index', compact('data_media_content', 'data_media_category'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //request validation .......

        $data_media_content = MediaContent::firstOrCreate([
            'title' => $request['title'],
            'media_categories_id' => $request['categorie'],
            'status' => $request['status'],
        ]);

        if (request()->hasFile('image')) {
            $data_media_content->addMediaFromRequest('image')->toMediaCollection('mediaImage');
        }

        Alert::success('Operation réussi', 'Success Message');

        return back();
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        //request validation ......

        $data_media_content = tap(MediaContent::find($id))->update([
            'title' => $request['title'],
            'media_categories_id' => $request['categorie'],
            'status' => $request['status'],
        ]);

        if (request()->hasFile('image')) {
            $data_media_content->clearMediaCollection('mediaImage');
            $data_media_content->addMediaFromRequest('image')->toMediaCollection('mediaImage');
        }

        Alert::success('Opération réussi', 'Success Message');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        MediaContent::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
