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
<div class="container" style="margin-top:20px;">
   
    <div class="container" style="margin-top: 40px;">
      <div class="card">
        <div class="card-body">
          {{-- user name --}}
            <h1>{{ $Detail->User->name }}</h1>
            
                  <div style="margin-left:880px;" >
                        <a href="{{URL('/Admin/Posts/edit/')}}/{{$Detail->id}}"> 
                            <button class="btn btn-secondary" style="margin-bottom:2px;">
                              edit
                            </button> 
                        </a>
                        <form method="POST" action="{{ route('Admin.Posts.delete',$Detail->id) }}" style="margin-left:54px; margin-top:-38px;">
                                    @method('Delete')
                                    @csrf
                                    <button class="btn btn-danger">
                                        Delete
                                    </button>
                        </form>
                    </div>
                    <h5 class="card-title">{{ $Detail->title}}</h5>
                    <p class="card-text">{{ $Detail->description}}</p>
                    <!-- https://stackoverflow.com/a/65384757/16445004 here is the answer for linking back to public folder to storage folder -->
                    <img class="card-img-bottom" src="{{ Storage::url($Detail->Image)}}" width="200" height="450">
                </div>    
                <label style="margin-left:12px;">
                     <small class="text-muted">
                      {{ $Detail->created_at}}
                     </small>
                </label>
          </div>
    </div>

    <!-- Add Comment -->
    <div class="container"> 
     <div class="card my-3">
       <h5 class="card-header">Add Comment</h5>
        <div class="card-body">
            <form method="POST" action="{{ url('/Admin/Comments/save/'.Str::slug($Detail->title).'/'.$Detail->id) }}">
            @csrf
                <input type="text" name="comment" class="form-control"> </textarea>
                <input type="submit" class="btn btn-dark mt-2" />
            </form>
          </div>
        </div>       
    </div>

    <!-- Fetch Comments -->
        <div class="card my-4">
          <h5 class="card-header">Comments <span class="badge badge-dark">{{count($Comment)}}</span></h5>
          <div class="card-body">
            @foreach($Comment as $Comments)
                <blockquote class="blockquote">
                  <p class="mb-0">{{ $Comments->name }}</p>
                  
                  <footer class="blockquote-footer">{{ $Comments->User->name }}</footer>
                  <div style="margin-left:70%;" class="row">
                      <div style="margin-right:10px;">
                          <a href="{{ URL('/Admin/Comments/edit')}}/{{$Comments->id}}"> 
                              <button class="btn btn-secondary">edit</button> 
                          </a>
                      </div> 
                      <form method="POST" action="{{ route('Admin.Comments.delete',$Comments->id)}}">
                      @method('delete')
                      @csrf   
                      <div>
                          <button class="btn btn-danger">Delete</button>
                        </div>
                      </form>     
                  </div>
                </blockquote>
                <hr/>
            @endforeach   
          </div>
        </div>
     
   
</div> 
@endsection
