<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comments;
use Auth;
use Validator;


class CommentsController extends Controller
{ 
   public function index()
   {
       $Comment = Comments::get();
       $Post = Post::get();
    //    $Created_by = Post::join('users','users.id', '=' ,'posts.created_by')->value('name');
    //    $Commented_By = Comments::join('users','users.id', '=' ,'comments.created_by')->value('name');
    //    $User_name =  $Comments->user()->get('name');
       
       return view('Posts.index',compact('Post','Comment'));
   }  

   public function store(Request $request)
    {
       
        $data = $request->all();
        // dd($data);  
        $User =  Auth::user()->id;

        $rules = array(
            'comment' => 'required',    
        );
         
        // dd($rules);

        $validate = Validator::make($data,$rules);  
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        else{
       
            $form_data = array(
                'comment' => $data['comment'], 
                'user_id' => $User,
              
             );

            $Comment = Comments::create($form_data);
            $Message = "successfully added";
            return redirect('/Posts')->with('success',$Message);
         }
    }

    public function edit(Request $request)
    {
       $Comment = Comments::find($request->id);
       $Post = Post::get();
       $Created_by = Post::join('users','users.id', '=' ,'posts.created_by')->value('name');
       $Commented_By = Comments::join('users','users.id', '=' ,'comments.created_by')->value('name');
       return view('Comments.edit',compact('Comment','Post','Created_by','Commented_By'));
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
             $Message = "update successfully";
             return redirect('/Posts')->with('success',$Message);
        }
    }

    public function destroy($id)
    {
        $Comment = Comments::findOrFail($id);
        $Comment->delete();
        return redirect()->back()->with('success');
    }    
}
