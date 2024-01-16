<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Post;
use App\Models\Comment;

class AdminController extends Controller
{
    //login view
    function login(){
        return view('backend.login');
    }
    function submit_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $userCheck=Admin::where(['username'=>$request->username,'password'=>$request->password])->count();
        if($userCheck>0){
            $adminData=Admin::where(['username'=>$request->username,'password'=>$request->password])->first();
            session(['adminData'=>$adminData]);
            return redirect('admin/dashboard');
            
        }else{
            return redirect('admin/login')->with('error','Invalid username/password!!');
            //return Redirect::back()->withErrors(['msg' => 'The Message']);
        }
    }
    
    //Dashboard
    function dashboard(){
        $posts=Post::orderBy('id','desc')->get();
        return view('backend.dashboard',['posts'=>$posts]);
    }
    function comments(){
        $data=Comment::orderBy('id','desc')->get();
        return view('backend.comment.index',['data'=>$data]);
    }
    public function delete_comment($id)
    {
        Comment::where('id',$id)->delete();
        return redirect('admin/comment');
    }
    //logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
}