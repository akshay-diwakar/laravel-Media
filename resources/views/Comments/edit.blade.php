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
            <a href="{{ route('Posts.add') }}">
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
                    <h2><b>{{ $Created_by}}</b></h2>
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
                </div>
                <div id="myDIV" style="margin-top: 20px;" class="col-md-6">
                   <form action="{{ route('Admin.Comments.edit-save')}}" method="POST">
                    <input type="hidden" name="Comment_id" value="{{$Comment->id}}" />
                    @csrf
                    <div class="form-group">
                        <label>Comment</label>
                        <input type="text" value="{{$Comment->comment}}" class="form-control" placeholder="Comment" name="comment">
                        
                    </div>
                        <input type="submit" class="form-control col-md-3 btn btn-info" value="add"> 
                   </form>
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

    
</script>