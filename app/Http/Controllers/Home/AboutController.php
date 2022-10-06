<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\HomeSlide;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function ABoutPage() {
        $about = About::find(1);

        return view('admin.about_page.about_page_all', compact('about'));

    }

    public function Store(Request $request)
    {
        $about_id = $request->id;

        if($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(523, 605)->save('upload/home_about/' . $name_gen);
            $save_url = 'upload/home_about/' . $name_gen;
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' =>  $save_url,
               ]);

            $notification = array(
                'message' => 'About page updated Image Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }else{
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = array(
                'message' => 'About Page Updated Without Image Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);

        } // End else
    } // End Method

    public function HomeAbout() {
        $aboutpage = About::find(1);
        return view('frontend.about_page', compact('aboutpage'));

    }// End Method

    public function AboutMultiImage() {
        return view('admin.about_page.multimage');
    } // End Method

    public function StoreMultiImage(Request $request) {
        $image = $request->file('multi_image');
        foreach($image as $multi_image) {
           $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
           Image::make($multi_image)->resize(220, 220)->save('upload/multi/' . $name_gen);
           $save_url = 'upload/multi/' . $name_gen;
           MultiImage::insert([
              'multi_image' =>  $save_url,
               'created_at' =>  Carbon::now()
           ]);

        } // End of the foreach

           $notification = array(
               'message' => 'Miltiable images inserted Successfully',
               'alert-type' => 'success'
           );
           return redirect()->back()->with($notification);

    } // End Method

    public function AllMultiImage() {
        $allMultiImage = MultiImage::all();
        return view('admin.about_page.all_multiimage', compact('allMultiImage'));
    } // End Method

    public function EditMultiImage($id) {
    $multiImage = MultiImage::findOrFail($id);
    return view('admin.about_page.edit_multi_image', compact('multiImage'));
    } // End Method

    public function UpdateMultiImage(Request $request){

        $multi_image_id = $request->id;

        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::findOrFail($multi_image_id)->update([

                'multi_image' => $save_url,

            ]);

            $notification = array(
                'message' => 'Multi Image Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.multi.image')->with($notification);

        }

    }// End Method
}
