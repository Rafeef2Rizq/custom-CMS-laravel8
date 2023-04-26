<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallary;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::with(['gallary','category'])->get();
//  $post = Post::with(['gallary','category'])->latest()
//->orderBy('title', 'ASC')->paginate(4);
 return view('auth.posts.index',['post'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('auth.posts.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        DB::beginTransaction();
        $request->validate(Post::roleValidation());
      if($request->has('file')){
  $file=$request->file;
  $fileName=time(). $file->getClientOriginalName();
  $imagePath=public_path('images/posts');
  $file->move($imagePath,$fileName);
  $gallary=Gallary::create([
    'image'=>$fileName
]);
      }
     Post::create([
        'title'=>$request->input('title'),
        'description'=>$request->input('description'),
        'category_id'=>$request->input('category_id'),
        'is_publish'=>$request->input('is_publish'),
        'gallary_id'=>$gallary->id,

     ]);
     DB::commit();
      } catch (\Exception $ex) {
       DB::rollBack();
      }
      $request->session()->flash('alert-success','Post added successfully');
     return redirect()->route('posts.index');
    }

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
       $post=Post::findOrFail($id);



$dest='images/posts/'.$post->gallary->image;
if(File::exists($dest)){
    File::delete($dest);
}
$post->delete();
return redirect()->route('posts.index')->with('status','Post deleted successfully');
    }

}
