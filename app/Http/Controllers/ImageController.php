<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
class ImageController extends Controller
{
    function upload(){
        $imgs=Image::all();
        return view('upload',['imgs'=>$imgs]);
    }
    function save_image(Request $request){
        if($request->has('img_src')){
            $image=$request->file('img_src');
            $reImage=time().'.'.$image->getClientOriginaExtension();
            $dest=public_path('/imgs');
            $image->move($dest,$reImage);

            //save
            $image=new Image;
            $image->img_alt=$request->img_alt;
            $image->img_src=$reImage;
            $image->save();
            return redirect('image/upload')-with('success','Image has been uploaded and saved.');

        }else{
            return redirect('image/upload')->with('msg','Please choose file.');
        }
    }
}
