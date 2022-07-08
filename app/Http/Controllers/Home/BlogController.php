<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function AllBlog(){
        $blogs= Blog::latest()->get();
        return view ('admin.blogs.blogs_all',compact('blogs'));



    }//end Method

    public function AddBlog(){

        $categories= BlogCategory::orderBy('blog_category','ASC')->get();
        return view ('admin.blogs.blogs_add',compact('categories'));



    }//end Method



    public function StoreBlog(Request $req){


        $image= $req->file('blog_image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//35634t34763.jpg

        $img = Image::make($image);
    //    $img = Image::make($image);
       $img->resize(430,327)->save('upload/blog/'.$name_gen);

        $save_url='upload/blog/'.$name_gen;
        Blog::insert([
            'blog_category_id' => $req->blog_category_id,
            'blog_title' => $req->blog_title,
            'blog_tags' => $req->blog_tags,
            'blog_description'=>$req->blog_description,
            'blog_image'=>$save_url,
            'created_at'=> Carbon::now()
        ]);
        $notification = array(
            'message' => 'Blog Data Inserted successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.blog')->with($notification);

    }//end Method

     public function EditBlog($id)
    {
        $blogs= Blog::findOrFail($id);
        $categories= BlogCategory::orderBy('blog_category','ASC')->get();
        return view ('admin.blogs.blogs_edit',compact('blogs','categories'));


    }//End Method

    public function UpdateBlog(Request $req)
    {
        $blog_id= $req->id;
            if($req->file('blog_image'))
            {
                $image= $req->file('blog_image');
                $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//35634t34763.jpg

                $img = Image::make($image);
            //    $img = Image::make($image);
            $img->resize(430,327)->save('upload/blog/'.$name_gen);

                $save_url='upload/blog/'.$name_gen;
                Blog::findOrFail($blog_id)->update([
                    'blog_category_id' => $req->blog_category_id,
                    'blog_title' => $req->blog_title,
                    'blog_tags' => $req->blog_tags,
                    'blog_description'=>$req->blog_description,
                    'blog_image'=>$save_url,

                ]);
                $notification = array(
                    'message' => 'Blog Updated with image successfully',
                    'alert-type' => 'success'

                );
                return redirect()->route('all.blog')->with($notification);

            }
            else{
                Blog::findOrFail($blog_id)->update([
                    'blog_category_id' => $req->blog_category_id,
                    'blog_title' => $req->blog_title,
                    'blog_tags' => $req->blog_tags,
                    'blog_description'=>$req->blog_description,

                ]);
                $notification = array(
                    'message' => 'Blog Updated without image successfully',
                    'alert-type' => 'success'

                );
                return redirect()->route('all.blog')->with($notification);

            }



    }//End Method

    public function DeleteBlog($id)
    {

        $blog = blog::findOrFail($id);
            $img = $blog->blog_image;
            unlink($img);
            Blog::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Blog Deleted successfully',
                'alert-type' => 'success'

            );
            return redirect()->back()->with($notification);


    }// End Method

    public function BlogDetails($id)
    {
          $allblogs = Blog::latest()->limit(5)->get();
          $blogs = Blog::findOrFail($id);
          $categories= BlogCategory::orderBy('blog_category','ASC')->get();
          return view('frontend.blog_details', compact('blogs','allblogs','categories'));

    }// End Method

    public function CategoryBlog($id)
    {
          $allblogs = Blog::latest()->limit(5)->get();
          $categories= BlogCategory::orderBy('blog_category','ASC')->get();
          $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
          $categoryname = BlogCategory::findOrFail($id);

            return view('frontend.cat_blog_details',compact('blogpost','allblogs','categories','categoryname'));
    }// End Method

    public function HomeBlog(){
        $categories= BlogCategory::orderBy('blog_category','ASC')->get();
        $allblogs= Blog::latest()->paginate(3);

        return view('frontend.blog',compact('allblogs','categories'));
    }



}
