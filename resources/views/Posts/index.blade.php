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
    <div class=" margin-left:200px;">
            <a href="{{ route('Admin.Posts.add') }}">
        <button 
                type="button" 
                class="btn btn-info">
                Add Posts
        </button>
    </a>
       
    </div>
   @foreach ($Post as $Posts)

    <div class="container" style="margin-top: 40px;">
      <div class="card">
                <div class="card-body">
                    {{-- user name --}}
                    <h2><b>{{ $Posts->user->name}}</b></h2>
                    <div style="margin-left:880px;">
                       <a href="{{URL('/Posts/edit/')}}/{{$Posts->id}}"> 
                            <button class="btn btn-secondary">
                                 edit
                            </button> 
                       </a>
                       {{-- @if(auth()->users()->id == $Posts->user_id) --}}
                            <form method="POST" action="{{ route('Posts.delete',$Posts->id) }}" style="margin-left:54px; margin-top:-38px;">
                                @method('Delete')
                                @csrf
                                <button class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        {{-- @else --}}
                            {{-- <button class="btn btn-primary" onclick="alert('you are not authorized person to delete it??')">Delete</button> --}}
                     {{-- @endif --}}
                       
                    </div>
                    <h5 class="card-title">{{ $Posts->title}}</h5>
                    <p class="card-text">{{ $Posts->description}}</p>
                    <img class="card-img-bottom" src="{{ Storage::url($Posts->Image)}}" width="200" height="450">
                </div>  
                <p class="card-text" style="margin-left:12px;"><small class="text-muted">{{ $Posts->created_at}}</small></p>

                {{-- comments section --}}
                <div class="row">
                        <div style="margin-left:20px;">
                            <button class="btn btn-warning" onclick="myFunction()">Add Comments</button>
                        </div>
                        
                        <div style="margin-left: 20px;">
                            <button class="btn btn-success" onclick="showcomments()">View Comments</button>
                        </div>
                </div>
                <div id="myDIV" style="margin-top: 20px;" class="col-md-6">
                   <form action="{{ route('Comments.save')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Comment</label>
                        <input type="text" class="form-control" placeholder="Comment" name="comment">
                        
                    </div>
                        <input type="submit" class="form-control col-md-3 btn btn-info" value="add"> 
                   </form>
                </div>
                

                

                {{-- fetching comments --}}
                <div id="mycoments" style="margin-top: 12px; border: 4px solid pink;">
                    
                    <div class="card">

                        @foreach ($Comment as $Comments)
                        <div class="card-body">
                            <h1 class="">{{$Comments->user()->name}}</h1>  
                            
                            <p>{{$Comments->comment }}</p>
                            <div style="margin-left:70%;" class="row">
                                <div style="margin-right:10px;">
                                    <a href="{{ URL('/Comments/edit')}}/{{$Comments->id}}"> 
                                             <button class="btn btn-secondary">
                                                  edit
                                             </button> 
                                    </a>
                                </div> 
                                <form method="POST" action="{{ route('Comments.delete',$Comments->id)}}">
                                    @method('delete')
                                    @csrf   
                                    <div>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </form>     
                            </div>
                            <hr>
                        </div>
                        @endforeach
                    </div> 
                    
                </div>
                    
      </div>
    </div>      
@endforeach  

</div>    


@endsection

<script>
    function myFunction() {
      var x = document.getElementById("myDIV");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }

    function showcomments() {
      var x = document.getElementById("mycoments");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
</script>