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
   @foreach ($post as $Posts)

    <div class="container" style="margin-top: 40px;">
      <div class="card">
                <div class="card-body">
                    {{-- user name --}}
                    <h2><b>{{ $Posts->user->name}}</b></h2>
                    <div style="margin-left:880px;" >
                       
                  
                    <a href="{{URL('/Admin/Posts/edit/')}}/{{$Posts->id}}"> 
                      <button class="btn btn-secondary" style="margin-bottom: 2px;">
                        edit
                      </button> 
                    </a>
                  

                    
                      <form method="POST" action="{{ route('Admin.Posts.delete',$Posts->id) }}" style="margin-left:54px; margin-top:-38px;">
                                @method('Delete')
                                @csrf
                                <button class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                             
                       

                         
                       
                    </div>
                    <h5 class="card-title">{{ $Posts->title}}</h5>
                    <p class="card-text">{{ $Posts->description}}</p>
                    <!-- https://stackoverflow.com/a/65384757/16445004 here is the answer for linking back to public folder to storage folder -->
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
                   <form action="{{ route('Admin.Comments.save')}}" method="POST">
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
                        <div class="card-body" >
                            <label>{{$Comments->User->name}}</label> 
                            
                            <p>{{ $Comments->comment }}</p>
                            <div style="margin-left:70%;" class="row">
                                <div style="margin-right:10px;">
                                    <a href="{{ URL('/Admin/Comments/edit')}}/{{$Comments->id}}"> 
                                             <button class="btn btn-secondary">
                                                  edit
                                             </button> 
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