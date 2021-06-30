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

<div class="container col-md-5" style="margin-top:10px;">
    <form method="post" action="{{ route('Admin.User.edit-save') }}">
      <input type="hidden" name="User_id" value="{{ $User->id}}" /> 
        
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
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $User->name }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $User->email }}">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Password</label>
            <input type="password" class="form-control"  placeholder="password" name="password" value="{{ $User->password }}">
          </div>
          <div class="form-group col-md-6">
          <label>Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" value="{{ $User->password }}">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
</div>    
@endsection