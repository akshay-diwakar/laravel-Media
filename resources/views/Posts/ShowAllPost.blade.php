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
	<div class=" margin-left:200px;">
        <a href="{{ route('Admin.Posts.add') }}">
           <button type="button" class="btn btn-info">
                      Add Posts
           </button>
       </a>
    </div>
   	<div class="card col-md-3" style="margin-top: 20px;">
   	  	@foreach($Post as $Posts)
   	  		<h3>
   	  			<b>{{ $Posts->user->name }}</b>
   	  		</h3>
           	<a href="{{ url('/Admin/Posts/'.Str::slug($Posts->title).'/' .$Posts->id) }}">
           		<img class="card-img-bottom" src="{{ Storage::url($Posts->Image)}}">
           </a>		
           <div class="card-body">
           		<a href="{{ url('/Admin/Posts/'.Str::slug($Posts->title).'/'.$Posts->id) }}"><b>{{ $Posts->title }}</b></a>
           </div>
   	  	@endforeach

   	  	<div class="d-flex justify-content-left">
             {{ $Post->links()  }}
        </div> 
   	</div>
   
</div>
	


@endsection