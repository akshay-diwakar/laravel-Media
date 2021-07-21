@extends('layouts.app')
@section('content')

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



<div class="container">
    <section style="margin-top:30px;">
        <h1>Edit form</h1>
        <form method="post" action="{{ route('Admin.Posts.edit-save') }}" enctype="multipart/form-data">
         <input type="hidden" name="Post_id" value="{{ $Posts->id}}" /> 
          @if ($errors->any())
              <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            @csrf
            <div class="form-group">
              <label>Post Title</label>
              <input type="text" class="form-control" placeholder="Post Name" value="{{ $Posts->title}}" name="postname">
            </div>
            <div class="form-group">
                <label>Post Description</label>
                <textarea class="form-control" placeholder="Description" name="description">{{$Posts->description}}</textarea>
            </div>
            <div class="container">
                <h1>Last Updated Image</h1>
                <img class="card-img-bottom" src="{{ Storage::url($Posts->Image)}}" width="200" height="450">
            </div>
            <div class="form-group" style="margin-top: 20px;">
                <label>Image</label>
                <input type="file" class="form-control"  name="Image">
            </div>

            <input type="submit" class="btn btn-primary mt-3" value="Submit" />
          </form>
    </section>
    
</div>
@endsection

