<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;
use Validator;


class CommentsController extends Controller
{ 
   public function index()
   {
       $Comment = Comment::get();
       $Post = Post::get();
   
       return view('Posts.index',compact('Post','Comment'));
   }  

   public function store(Request $request,$slug,$Post_id)
   {
       
        $data = $request->all();
        // dd($data);  
        $User =  Auth::user()->id;
        $Post_id = $Post_id;
        $rules = array(
            'comment' => 'required',    
        );
        
        $validate = Validator::make($data,$rules);  
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        else{
       
            $form_data = array(
                'name' => $data['comment'], 
                'user_id' => $User,
                'post_id' => $Post_id,
             );

            $Comment = Comment::create($form_data);
            return redirect('/Admin/Posts/'. $slug . '/' . $Post_id)->with('success');
         }
    }

    public function edit(Request $request)
    {
       $Comment = Comments::find($request->id);
       return view('Comments.edit',compact('Comment'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        
        $Comment = Comments::find($data['Comment_id']);
        $rules = array(
            'comment' => 'required' ,
        );

        $validate=Validator::make($data,$rules);
         
        if ($validate->fails()) {
             return redirect()->back()->withInput()->withErrors($validate);
        }
        else{
            $form_data = array(
             'comment' => @$data['comment'] ? $data['comment'] : $Post->comment, 
            );

             $Comment->update($form_data);
             // $Message = "update successfully";
             return redirect('/Posts')->with('success');
        }
    }

    public function destroy($id)
    {
        $Comment = Comments::findOrFail($id);
        $Comment->delete();
        return redirect()->back()->with('success');
    }    
}
