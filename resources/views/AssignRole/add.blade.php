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
        <form method="post" action="{{ URL('/Admin/'. $User_id  . '/AssignRole/save') }}" enctype="multipart/form-data">
           <input type="hidden" name="User_id" value="{{ $User_id }}"/>
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
                  <input type="text" class="form-control" placeholder="User Name" value="{{ user}}" name="rolename" readonly>
            </div>
              <div >
                 <label>Roles</label>
              </div>

              @foreach ($Role as $role)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" value="{{$role->id}}">
                    <label class="form-check-label">{{$role->name}}</label>
                </div>    
              @endforeach
              <div style="margin-top: 5px;">
                  <input type="submit" class="btn btn-primary" value="Submit">
              </div>
        </form>
    </section>
</div>
@endsection

