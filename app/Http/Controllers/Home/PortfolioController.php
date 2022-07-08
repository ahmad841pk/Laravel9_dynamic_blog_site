<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

use function Ramsey\Uuid\v1;

class PortfolioController extends Controller

{
    public function AllPortfolio(){
        $portfolio= Portfolio::latest()->get();
        return view ('admin.portfolio.portfolio_all',compact('portfolio'));



    }//end Method

    public function AddPortfolio(){
      return view('admin.portfolio.portfolio_add');

    }//End Method


    public function StorePortfolio(Request $req){
        $req->validate([
            'portfolio_name'=> 'required',
            'portfolio_title'=> 'required',
            'portfolio_description'=> 'required',

        ],[
            'portfolio_name.required' => 'portfolio name is Required',
             'portfolio _title.required' => 'portfolio title is Required',
        ]);

        $image= $req->file('portfolio_image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//35634t34763.jpg

        $img = Image::make($image);
    //    $img = Image::make($image);
       $img->resize(1020,519)->save('upload/portfolio/'.$name_gen);

        $save_url='upload/portfolio/'.$name_gen;
        Portfolio::insert([
            'portfolio_name' => $req->portfolio_name,
            'portfolio_title' => $req->portfolio_title,
            'portfolio_description'=>$req->portfolio_description,
            'portfolio_image'=>$save_url,
            'created_at'=> Carbon::now()
        ]);
        $notification = array(
            'message' => 'Portfolio Data Inserted successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.protfolio')->with($notification);


      }//End Method

      public function EditPortfolio($id){
        $portfolio= Portfolio::findOrFail($id);
        return view ('admin.portfolio.portfolio_edit',compact('portfolio'));


      }//End Method

      public function UpdatePortfolio(Request $req){
            $portfolio_id= $req->id;
            if($req->file('portfolio_image'))
            {
                $image= $req->file('portfolio_image');
                $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//35634t34763.jpg

                $img = Image::make($image);
            //    $img = Image::make($image);
            $img->resize(1020,519)->save('upload/portfolio/'.$name_gen);

                $save_url='upload/portfolio/'.$name_gen;
                Portfolio::findOrFail($portfolio_id)->update([
            'portfolio_name' => $req->portfolio_name,
            'portfolio_title' => $req->portfolio_title,
            'portfolio_description'=>$req->portfolio_description,
            'portfolio_image'=>$save_url,
                ]);
                $notification = array(
                    'message' => 'Portfolio Updated with image successfully',
                    'alert-type' => 'success'

                );
                return redirect()->route('all.protfolio')->with($notification);

            }
            else{
                Portfolio::findOrFail($portfolio_id)->update([
                    'portfolio_name' => $req->portfolio_name,
                    'portfolio_title' => $req->portfolio_title,
                    'portfolio_description'=>$req->portfolio_description,

                ]);
                $notification = array(
                    'message' => 'Portfolio Updated without image successfully',
                    'alert-type' => 'success'

                );
                return redirect()->route('all.protfolio')->with($notification);

            }

        }// End Method

        public function DeletePortfolio($id){

            $multi = Portfolio::findOrFail($id);
            $img = $multi->portfolio_image;
            unlink($img);
            Portfolio::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Portfolio Image Deleted successfully',
                'alert-type' => 'success'

            );
            return redirect()->back()->with($notification);


        }// End Method

        public function PortfolioDetails($id){
            $portfolio= Portfolio::findOrFail($id);
            return view ('frontend.portfolio_details',compact('portfolio'));


        }// End Method


        public function HomePortfolio()
        {
            $portfolio= Portfolio::latest()->get();
            return view('frontend.portfolio', compact('portfolio'));


        }// End Method




}
