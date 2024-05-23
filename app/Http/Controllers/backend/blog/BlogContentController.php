<?php

namespace App\Http\Controllers\backend\blog;

use App\Models\BlogContent;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class BlogContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_blog_content = BlogContent::with('blog_category')->get();

        return view('backend.pages.blog.content.index', compact('data_blog_content'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data_blog_category = BlogCategory::get();
        return view('backend.pages.blog.content.create', compact('data_blog_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //request validation ........
        // dd($request->all());
        $data_blog_content = BlogContent::create([
            'title' => $request['title'],
            'resume' => $request['resume'],
            'description' => $request['description'],
            'status' => $request['status'],
            'blog_categories_id' => $request['category'],

        ]);

        if (request()->hasFile('image')) {
            $data_blog_content->addMediaFromRequest('image')->toMediaCollection('blogImage');
        }

        Alert::Success('Opération', 'SuccessMessage');
        return back();
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data_blog_category = BlogCategory::get();
        $data_blog_content = BlogContent::with('media')->whereId($id)->first();

        return view('backend.pages.blog.content.edit', compact('data_blog_content', 'data_blog_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //request validation ......

        $data_blog_content = tap(BlogContent::find($id))->update([
            'title' => $request['title'],
            'resume' => $request['resume'],
            'description' => $request['description'],
            'status' => $request['status'],
            'blog_categories_id' => $request['category'],
        ]);

        //image à la une
        if (request()->hasFile('image')) {
            $data_blog_content->clearMediaCollection('blogImage');
            $data_blog_content->addMediaFromRequest('image')->toMediaCollection('blogImage');
        }


        //other images
        // if ($request->has('images')) {
        //     foreach ($request->file('images') as $value) {
        //         $data_blog_content->addMedia($value)
        //             ->toMediaCollection('images');
        //     }
        // }

        Alert::success('Opération réussi', 'Success Message');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        BlogContent::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
