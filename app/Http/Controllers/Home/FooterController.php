<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function FooterSetup()
    {
        $allfooter = Footer::find(1);
        return view('admin.footer.footer_all', compact('allfooter'));
    } // end Method

    public function update(Request $request, $id) {

        Footer::findOrFail($id)->update([
            'number' => $request->number,
            'short_description' => $request->short_description,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'copyright' => $request->copyright
        ]);

        $notification = array(
            'message' => 'Footer updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // end Method


}
