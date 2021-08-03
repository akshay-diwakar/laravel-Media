<style>
    #myDIV {
   display: none;
}

  #mycoments{
      display: none;
  }
</style>
@extends('layouts.app')

@if(session()->has('error'))
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    &nbsp; {{ session()->get('error') }}
</div>
@endif

@if(session()->has('success'))
<div class="alert alert-success alert-dismissable">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    &nbsp;{{ session()->get('success') }}
</div>
@endif


@section('content')
<div class="container" style="margin-top: 20px;">
    
       <div class="container" style="margin-top: 40px;">
          <div class="card">
              <div style="margin-top: 20px" class="col-md-6">
                  <form action="{{ route('Admin.Comments.edit-save') }}" method="POST">
                      <input type="hidden" name="Comment_id" value="{{$Comment->id}}">
                      @csrf
                      <div class="form-group">
                          <label>Comment</label>
                          <input type="text" value="{{ $Comment->name }}" name="Comment" placeholder="Comment" class="form-control">
                      </div>
                          <input type="submit" class="form-control col-md-3 btn btn-info" name="add">
                  </form>
              </div>
          </div>
       </div>
    
</div>    
@endsection

