<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
Use Image;

class BlogController extends Controller
{
    public function AllBlog(){
        $all_blog = Blog::latest()->get();
        return view('admin.blog.all_blog', compact('all_blog'));
    } //End Method


    public function AddBlog(){
        $blog_category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog.add_blog', compact('blog_category'));
    } //End Method


    public function InsertBlog(Request $request){
        $request ->validate([
            'blog_title' => 'required',
            'blog_tags' => 'required',
            'blog_category_id' => 'required',
            'blog_description' => 'required',
            'blog_image' => 'required',
        ], [
            'blog_title.required' => 'Blog Title is Required',
            'blog_tags.required' => 'Blog Tags is Required',
            'blog_category_id.required' => 'Blog Category is Required',
            'blog_description.required' => 'Blog Description is Required',
            'blog_image.required' => 'Blog Image is Required',
        ]);

        $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
            
            Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'. $name_gen;

            Blog::insert([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
                'created_at' => Carbon::now(),
                
            ]);

            $notification = array(
                'message' => 'Blog Added Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.blog')->with($notification);
    } //End Method


    public function EditBlog($id){

        $editblog = Blog::findOrFail($id);
        $blog_category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog.edit_blog', compact('editblog', 'blog_category'));
    } //End Method


    public function UpdateBlog(Request $request){
        $blog_id = $request->id;

        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
            
            Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'. $name_gen;

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Blog Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.blog')->with($notification);
        }else {
            Blog::findorFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
            ]);

            $notification = array(
                'message' => 'Blog Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.blog')->with($notification);
        }
    } //End Method


    public function DeleteBlog($id){
        $blogid = Blog::findOrFail($id);
        $img = $blogid->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    } //End Method


    public function BlogDetails($id){
        $allblog = Blog::latest()->limit(5)->get();
        $blogs = Blog::findOrFail($id);
        $blog_category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog_details', compact('blogs', 'allblog', 'blog_category' ));
    }// End Method



    public function CategoryBlog($id){
        $blog_category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $allblog = Blog::latest()->limit(5)->get();
        $categoryBlog = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $categoryname = BlogCategory::findOrFail($id);
        return view('frontend.category_blog_post', compact('categoryBlog', 'blog_category', 'allblog', 'categoryname'));
    }// End Method


    public function HomeBlog(){
        $blog_category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $allBlogs = Blog::latest()->paginate(3);
        return view('frontend.blog', compact('allBlogs', "blog_category"));
    } // End Method



}
