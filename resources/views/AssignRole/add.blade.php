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

<div class="container col-md-6">
    <section style="margin-top:30px;">
        <form method="post" action="" enctype="multipart/form-data">
          
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
                <label>User Name</label>
                
                <input type="text" class="form-control" placeholder="User Name" name="postname" readonly>
            </div>
              <div>
                 <label>Roles</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" >
                <label class="form-check-label">Admin</label>
              </div>
            
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" >
                <label class="form-check-label">User</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions"  >
                <label class="form-check-label">Editor</label>
              </div>
              
              <div style="margin-top: 5px;">
                  <input type="submit" class="btn btn-primary " value="Submit" />
              </div>
          </form>
    </section>
    
</div>
@endsection

