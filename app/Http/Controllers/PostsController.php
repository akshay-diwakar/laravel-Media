<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Storage;
use Auth;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\User;
use App\Models\role;
use App\Models\Comments;


class PostsController extends Controller
{
    

    public function index(Request $request)
    {
        // dd(Auth::user()->id);
        $post = Post::get();
        $User = User::get();
        $Comment = Comments::get();
        return view('Posts.index',compact('post','Comment'));
    }

    public function add(Request $request)
    {
        return view('Posts.add');    
    }

    public function store(Request $request)
    {

        $data = $request->all();
        // dd($request->Image);

        $User =  Auth::user()->id;
        
        $rules = array(
           'postname' => 'required' ,
           'description' =>'required',
           'Image' =>  'required|image|mimes:jpeg,png,jpg|max:8192',
        );

        $validate=Validator::make($data,$rules);
        
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        else{
           
           $path =   Storage::disk('local')->put('public',$request->file('Image'));
          
           $form_data = array(
               'title' => $data['postname'],
               'description' => $data['description'],
               'Image'  => $path,
               'user_id' => $User,
           );
        //    dd($form_data);
           $Posts = Post::create($form_data);
           // $Message = "successfully added";
           return redirect('/Admin/Posts')->with('success');
        }   
    }

      public function edit(Request $request,Post $post)
      {
              
          $Posts = Post::find($request->id);
         
         return view('Posts.edit',compact('Posts'));
      }


      public function update(Request $request)
      {
        $data = $request->all();
        // dd($data);
        $Post = Post::find($data['Post_id']);
        $rules = array(
            'postname' => 'required' ,
            'description' =>'required',
            'Image' =>  'required|image|mimes:jpeg,png,jpg|max:8192',
         );
 
         $validate=Validator::make($data,$rules);
         
         if ($validate->fails()) {
             return redirect()->back()->withInput()->withErrors($validate);
         }
         else{
            
            $path =   Storage::disk('local')->put('public',$request->file('Image'));
            $form_data = array(
             'title' => @$data['postname'] ? $data['postname'] : $Post->title, 
             'description' => @$data['description'] ? $data['description'] : $Post->description,
              'Image' =>$path,  
            );

            $Post->update($form_data);
             // $Message = "update successfully";
             return redirect('/Admin/Posts')->with('success');
            }
      }    

    public function destroy($id)
    {
             
        $Post = Post::findOrFail($id);
        $Post->delete();
        return redirect()->back()->with('success');
    }

}
