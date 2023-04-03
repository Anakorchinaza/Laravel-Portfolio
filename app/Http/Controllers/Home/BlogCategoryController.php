<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Carbon\Carbon;


class BlogCategoryController extends Controller
{

    public function AllBlogCategory(){
        $blogCategory = BlogCategory::latest()->get();
        return view('admin.blogCategory.all_blog_category', compact('blogCategory'));
    }//End Method


    public function AddBlogCategory(){
        return view('admin.blogCategory.add_blog_category');
    }//End Method


    public function InsertBlogCategory(Request $request){
        // $request ->validate([
        //     'blog_category' => 'required',
        // ], [
        //     'blog_category.required' => 'Blog Category Name is Required',
        // ]);

        BlogCategory::insert([
            'blog_category' => $request->blog_category,
            'created_at' => Carbon::now(),   
        ]);

        $notification = array(
            'message' => 'Blog Category Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.blog.category')->with($notification);
    } // End Method


    public function EditBlogCategory($id){

        $editBlogCategory = BlogCategory::findOrFail($id);
        return view('admin.blogCategory.edit_blog_category', compact('editBlogCategory'));
    } //End Method


    public function UpdateBlogCategory(Request $request, $id){
        BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category,   
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.blog.category')->with($notification);
    } //End Method


    public function DeleteBlogCategory($id){

        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.blog.category')->with($notification);
    } //End Method

}
