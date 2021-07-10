<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Validator;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Item = Item::get();
        return view('Items.index',compact('Item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Items.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
            
        $rules = array(
           'ItemName' => 'required' ,
        );

        $validate=Validator::make($data,$rules);
        
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        else{
           
            $form_data = array(
               'name' => $data['ItemName'],
            );
        //    dd($form_data);
           $Item = Item::create($form_data);
           
           return redirect('/Admin/AssignItem')->with('success');
        }   
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
    public function edit($id,Request $request)
    {
        $Item = Item::find($request->id);
        return view('Items.edit',compact('Item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request)
    {
        $data = $request->all();
        
        $Item = Item::find($data['Item_id']);
        $rules = array(
            'ItemName' => 'required' ,
        );

        $validate=Validator::make($data,$rules);
         
        if ($validate->fails()) {
             return redirect()->back()->withInput()->withErrors($validate);
        }
        else{
            $form_data = array(
             'name' => @$data['ItemName'] ? $data['ItemName'] : $Item->name, 
            );

             $Item->update($form_data);
            //  $Message = "update successfully";
             return redirect()->route('Admin.AssignItem')->with('success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Item = Item::findOrFail($id);
        $Item->delete();
        return redirect()->back()->with('success','deleted successfully');
    }
}
