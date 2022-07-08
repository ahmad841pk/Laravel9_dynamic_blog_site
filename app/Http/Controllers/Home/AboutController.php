<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function aboutPage(){
    $aboutpage = About::find(1);
    return view('admin.about_page.about_page_all',compact('aboutpage'));
    }// End Method

    public function updateAbout(Request $req){
        $about_id= $req->id;
        if($req->file('about_image'))
        {
            $image= $req->file('about_image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//35634t34763.jpg

            $img = Image::make($image);
        //    $img = Image::make($image);
           $img->resize(523,605)->save('upload/home_about/'.$name_gen);

            $save_url='upload/home_about/'.$name_gen;
            About::findOrFail($about_id)->update([
                'title' => $req->title,
                'short_title' => $req->short_title,
                'short_description'=>$req->short_description,
                'long_description'=>$req->long_description,
                'about_image' => $save_url
            ]);
            $notification = array(
                'message' => 'About Image Updated with image successfully',
                'alert-type' => 'success'

            );
            return redirect()->back()->with($notification);

        }
        else{
            About::findOrFail($about_id)->update([
                'title' => $req->title,
                'short_title' => $req->short_title,
                'short_description'=>$req->short_description,
                'long_description'=>$req->long_description,
            ]);
            $notification = array(
                'message' => 'About Page Updated without image successfully',
                'alert-type' => 'success'

            );
            return redirect()->back()->with($notification);
        }

    }// End Method
    public function homeAbout(){
        $aboutpage = About::find(1);
        return view('frontend.about_page',compact('aboutpage'));
    }//End Method

    public function aboutMultiImage(){
                return view('admin.about_page.multimage');
    }//End Method


    public function storeMultiImage(Request $req){
        $image = $req->file('multi_image');

        foreach($image as $multi_image){
            $name_gen=hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();//35634t34763.jpg

            $img = Image::make($multi_image);
        //    $img = Image::make($image);
           $img->resize(220,220)->save('upload/multi/'.$name_gen);

            $save_url='upload/multi/'.$name_gen;
            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);

        }// End Foreach
            $notification = array(
                'message' => 'Multi images inserted successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('all.multi.image')->with($notification);



    }//End Method

    public function AllMultiImage(){
        $allMultiImage = MultiImage::all();
        return view('admin.about_page.all_multi_image', compact('allMultiImage'));
    } //End Method
    public function editMultiImage($id){
        $multiImage = MultiImage::findOrFail($id);
        return view('admin.about_page.edit_multi_image',compact('multiImage'));


    }// End Method

    public function UpdateMultiImage(Request $req){

        $multi_image_id= $req->id;
        if($req->file('multi_image'))
        {
            $image= $req->file('multi_image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//35634t34763.jpg

            $img = Image::make($image);
        //    $img = Image::make($image);
           $img->resize(220,220)->save('upload/multi/'.$name_gen);

            $save_url='upload/multi/'.$name_gen;
            MultiImage::findOrFail($multi_image_id)->update([
                'multi_image' => $save_url
            ]);
            $notification = array(
                'message' => 'Multi Image Updated successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('all.multi.image')->with($notification);

        }

    }// End Method
    public function DeleteMultiImage($id){

        $multi = MultiImage::findOrFail($id);
        $img = $multi->multi_image;
        unlink($img);
        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Multi Image Deleted successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);


    }// End Method
}

