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
        <form method="post" action="{{ route('Posts.save') }}" enctype="multipart/form-data">
          
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
                <input type="text" class="form-control" placeholder="Post Name" name="postname">
            </div>
            <div class="form-group">
                <label>Post Description</label>
                <textarea class="form-control" placeholder="Description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control"  name="Image">
            </div>
            <input type="submit" class="btn btn-primary " value="Submit" />
          </form>
    </section>
    
</div>
@endsection

