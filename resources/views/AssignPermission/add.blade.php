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
    <div class="container">
        <form method="POST" action="{{ route('Admin.AssignPermission.save') }}">
            <input type="hidden" name="role_id" value="{{$Role->id}}" />
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
        

        <table class="table" style="margin-top:20px;">
            <thead>
              <tr>
                <th scope="col">#</th>
                @foreach ($Permissions as $Permission)
                <th scope="col">{{ $Permission->name }}</th>
                @endforeach
             </tr>
            </thead>
            <tbody>
            @foreach ($Items as $item)
                <tr class="Post">
                    <th scope="row">
                        <label>{{$item->name}}</label>
                        <input type="hidden" name="Permissions[{{ $item->name }}][id]" value="{{$item->id}}">
                    </th>
                    @foreach ($Permissions as $Permission)
                        <td class="examplelink">
                            <input type="checkbox" name="Permissions[{{$item->name}}][data][]" value="{{$Permission->id}}"
                            {{is_array(old('Permissions',$role_data??[]))&&in_array($item->name.$Permission->id,old('Permissions',$role_data??[]))?'checked':null}}
                            >
                        </td>    
                    @endforeach 
            </tr>
            
            @endforeach
            </tbody>
          </table>
            <input  type="submit" class="btn btn-primary" value="Submit"  />
        </form>
    </div>
    

@endsection