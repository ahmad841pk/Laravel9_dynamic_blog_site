<?php

namespace App\Http\Controllers\Home;
use App\Models\BlogCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory(){
        $blogcategory= BlogCategory::latest()->get();
        return view ('admin.blog_category.blog_category_all',compact('blogcategory'));




    }// End Function

    public function AddBlogCategory(){
        $blogcategory= BlogCategory::latest()->get();
        return view ('admin.blog_category.blog_category_add',compact('blogcategory'));




    }// End Function


    public function StoreBlogCategory(Request $req){
        $req->validate([
            'blog_category'=> 'required',

        ],[
            'blog_category.required' => 'Blog Category name is Required',
        ]);

        BlogCategory::insert([
            'blog_category' => $req->blog_category,
        ]);
        $notification = array(
            'message' => 'Blog Category Inserted successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.blog.category')->with($notification);


      }//End Method

      public function EditBlogCategory($id){
        $blogcategory= BlogCategory::findOrFail($id);
        return view ('admin.blog_category.blog_category_edit',compact('blogcategory'));

      }//End Method

      public function UpdateBlogCategory(Request $req,$id){
        BlogCategory::findOrFail($id)->update([
            'blog_category' => $req->blog_category,
        ]);
        $notification = array(
            'message' => 'Blog Category updated successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.blog.category')->with($notification);



      }// End Method

      public function DeleteBlogCategory($id){
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);


      }

}
