@extends('AssignPermission.index')
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

@section('add_roles')

<div class="container" style="margin-top:100px; border:3px solid blue; border-radius:10px;">
    <form method="POST" action="{{ route('Admin.AddPermission.save) }}">
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
          <label>Permissions</label>
          <input type="text" class="form-control" name="PermissionName"  placeholder="PermissionName">
        </div>
        <button type="submit" class="btn btn-primary" >Submit</button>
      </form>
</div>   

@endsection
