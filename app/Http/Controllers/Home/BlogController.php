<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog.blog_all', compact('blogs'));
    } // End Method

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog.blog_add', compact('categories'));
    } // End Method

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(430, 237)->save('upload/blog/' . $name_gen);
        $save_url = 'upload/blog/' . $name_gen;
        Blog::insert([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'tags' => $request->tags,
            'description' => $request->description,
            'image' => $save_url,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Blog added Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.blog')->with($notification);
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
        $blogs = Blog::findOrFail($id);
       // dd($blogs);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog.blog_edit', compact('blogs','categories'));
    } // End Method

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1020, 519)->save('upload/blog/' . $name_gen);
            $save_url = 'upload/blog/' . $name_gen;
            Blog::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'tags' => $request->tags,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Blog Updated With Image Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.blog')->with($notification);
        }else {
            Blog::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'tags' => $request->tags,
            ]);

            $notification = array(
                'message' => 'Blog Updated Without Image Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('all.blog')->with($notification);
    } // End Method

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $img = $blog->image;
        unlink($img); // remove it from the upload folder
        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }// End Method

    public function blogDetails($id) {
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $allBlogs = Blog::latest()->limit(5)->get();
        $blogs = Blog::findorFail($id);
        return view('frontend.blog_details', compact('blogs','allBlogs', 'categories'));
    } // End Method

    public function categoryBlog($id) {
        $blogpost = Blog::where('category_id', $id)->orderBy('id', 'DESC')->get();
        $allBlogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $categoryname =  BlogCategory::findOrFail($id);
        return view('frontend.cat_blog_details', compact('blogpost','allBlogs','categories', 'categoryname'));
    } // End Method

    public function homeBlog() {
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $allblogs = Blog::latest()->get();
        return view('frontend.blog', compact('allblogs','categories'));
    } // End Method
}
