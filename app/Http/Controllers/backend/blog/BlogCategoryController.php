<?php

namespace App\Http\Controllers\backend\blog;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data_blog_category = BlogCategory::get();
        $data_blog_category->sortBy('name');
        return view('backend.pages.blog.category.index', compact('data_blog_category'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //request validation .......

        $data_blog_category = BlogCategory::firstOrCreate([
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

        $data_page = BlogCategory::find($id)->update([
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
        BlogCategory::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
