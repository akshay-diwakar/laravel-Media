<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Storage;
use Auth;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    

    public function index(Request $request)
    {
        $Post = Post::get();
        // dd($Post);
        // $User_name =  $Post->User()->get('name');
        // dd($User_name);
        // $Posted_by = Post::with('users')->get();
        // $Created_by = Db::table('posts')->join('users','users.id', '=' ,'posts.created_by')->value('name');
        // $abc =  User::Find($id)->name;
        // dd($Posts); 
        // $Posts = DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();
        //Find log
        // $Post = Post::where('id', 1)->first(); 
        // $Name = $Post->User->name;
        // dd($Name);
        // //dd($Post);
        // $Name = user::get('name');
        return view('Posts.index',compact('Post'));
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
        // dd($User);
        // echo $data[];
        // die();
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
           
           // Generate a file name with extension
        //    $ImageName = $request->postname . '.'.$request->Image->getClientOriginalExtension();
            // dd($ImageName);
        //    $request->Image->storeAs('Images', $ImageName);
           $path =   Storage::disk('local')->put('public',$request->file('Image'));
          
           $form_data = array(
               'title' => $data['postname'],
               'description' => $data['description'],
               'Image'  => $path,
               'user_id' => $User,
           );
        //    dd($form_data);
           $Posts = Post::create($form_data);
           $Message = "successfully added";
           return redirect('/Posts')->with('success',$Message);
        }   
    }

      public function edit(Request $request)
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
            
            // Generate a file name with extension
         //    $ImageName = $request->postname . '.'.$request->Image->getClientOriginalExtension();
             // dd($ImageName);
         //    $request->Image->storeAs('Images', $ImageName);
            $path =   Storage::disk('local')->put('public',$request->file('Image'));
           
            
             $form_data = array(
             'title' => @$data['postname'] ? $data['postname'] : $Post->title, 
             'description' => @$data['description'] ? $data['description'] : $Post->description,
              'Image' =>$path,  
              );

             $Post->update($form_data);
             $Message = "update successfully";
             return redirect('/Posts')->with('success',$Message);
        }
    }    

    public function destroy($id)
    {
        $Post = Post::findOrFail($id);
        $Post->delete();
  
        return redirect()->back()->with('success','Post deleted successfully');
    }

}
