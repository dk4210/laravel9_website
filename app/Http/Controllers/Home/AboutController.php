<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Image;
use Illuminate\Http\RedirectResponse;

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
}