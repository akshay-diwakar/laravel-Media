<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Storage;
use Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\role;
use App\Models\Comment;

class PostsController extends Controller
{
    
    public function ShowAllPost(Request $request)
    {
       $Post = Post::paginate(1);
      return view('Posts.ShowAllPost',compact('Post'));
    }

    public function index(Request $request,$slug,$Post_id)
    {

       $Detail = Post::with('User')->find($Post_id);
       $Comment = Comment::get();
       return view('Posts.index',compact('Detail','Comment'));
    }

    public function add(Request $request)
    {
        return view('Posts.add');    
    }

    public function store(Request $request)
    {
        $data = $request->all();
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
        
           $Posts = Post::create($form_data);
        
           return redirect('/Admin/Posts')->with('success');
        }   
    }

    public function edit(Request $request,Post $post)
    {
       
      $Posts = Post::find($request->id);
      
      $User_id = $Posts->user_id;
      if ($User_id != Auth::id()){
         // abort('you are not authorized');
          $message = 'you are not authorized to do that';
          return $message;
      }
      else{
         return view('Posts.edit',compact('Posts'));
      }     
         
         

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
            return redirect('/Admin/Posts')->with('success');
            }
      }    

    public function destroy($id)
    {

      $post = Post::find($id);
      $User_id = $post->user_id;
      if ($User_id != Auth::id()){
         // abort('you are not authorized');
        $message = 'you are not authorized to do that';
          return $message;
      }
      else{
          $post->delete();    
          return redirect('/Admin/Posts')->with('success');
        
      }
      
    }

}
