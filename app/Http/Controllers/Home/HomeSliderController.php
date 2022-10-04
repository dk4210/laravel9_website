<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Image;
use Illuminate\Http\RedirectResponse;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all', compact('homeslide'));
    } // End Method

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $slide_id = $request->id;
       if($request->file('home_slide')) {
           $image = $request->file('home_slide');
           $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
           Image::make($image)->resize(636, 852)->save('upload/home_slide/' . $name_gen);
           $save_url = 'upload/home_slide/' . $name_gen;
           HomeSlide::findOrFail($slide_id)->update([
               'title' => $request->title,
               'short_title' => $request->short_title,
               'video_url' => $request->video_url,
               'home_slide' => $save_url,
           ]);

           $notification = array(
               'message' => 'Home Slide Updated With Image Successfully',
               'alert-type' => 'info'
           );
           return redirect()->back()->with($notification);
       }else{
           HomeSlide::findOrFail($slide_id)->update([
               'title' => $request->title,
               'short_title' => $request->short_title,
               'video_url' => $request->video_url,
               ]);

           $notification = array(
               'message' => 'Home Slide Updated Without Image Successfully',
               'alert-type' => 'info'
           );
           return redirect()->back()->with($notification);

       } // End else
    } // End Method

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
