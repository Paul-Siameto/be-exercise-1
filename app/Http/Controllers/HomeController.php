<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;

class HomeController extends Controller
{
    function index(Request $request)
    {
        if($request->has('q')){
            $q=$request->q;
            $post=Post::where('title','like','%'.$q.'%')->orderBy('id','desc')->paginate(10);
        }else{
            $posts=Post::orderBy('id','desc')->paginate(10);
        }
        $posts=Post::orderBy('id', 'desc')->paginate(10);
        return view('home',['posts'=>$posts]);
    }
    //post
    function detail(Request $request,$slug,$postId){
        Post::find($postId)->increment('views');
    	$detail=Post::find($postId);
    	return view('detail',['detail'=>$detail]);
    }
    //All Categories
    function all_category(){
    	$categories=Category::orderBy('id','desc')->paginate(5);
    	return view('categories',['categories'=>$categories]);
    }

    //Post According 2 category
    function category(Request $request,$cat_slug,$cat_id){
    	$category=Category::find($cat_id);
        $posts=Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(5);
    	return view('category',['posts'=>$posts,'category'=>$category]);
    }
    //function category(Request $request,$cat_slug,$cat_id){
      //  $posts=Post::where('cat_id',cat_id,)->orderBy('id','desc')->paginate(1);
       // return view('category',['detail'=>$detail]);
    //}
    //save
    function save_comment(Request $request,$slug,$id){
        $request->validate([
            'comment'=>'required'
        ]);
        $data=new Comment;
        $data->user_id=$request->user()->id;
        $data->post_id=$id;
        $data->comment=$request->comment;
        $data->save();
        return redirect('detail/'.$slug.'/'.$id)->with('success','Comment has been submitted.');
    }
    // User submit post
    function save_post_form(){
        $cats=Category::all();
        return view('save-post-form',['cats'=>$cats]);
    }
    public function save_post_data(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required',
        ]);

        // Post Thumbnail
        if($request->hasFile('post_thumb')){
            $image1=$request->file('post_thumb');
            $reThumbImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/thumb');
            $image1->move($dest1,$reThumbImage);
        }else{
            $reThumbImage='na';
        }

        // Post Full Image
        if($request->hasFile('post_image')){
            $image2=$request->file('post_image');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/imgs/full');
            $image2->move($dest2,$reFullImage);
        }else{
            $reFullImage='na';
        }

        $post=new Post;
        $post->user_id=$request->user->id;
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->thumb=$reThumbImage;
        $post->full_img=$reFullImage;
        $post->detail=$request->detail;
        $post->tags=$request->tags;
        $post->status=1;
        $post->save();

        return redirect('save-post-form')->with('success','Post has been added');
        //return redirect()->back()->with('success','Data has been added');
    
    }

}


