
@extends('dashboard.layouts.master')
@section('title', 'give role permissions')
@section('content')

<div class="card w-75 "style="margin: 30px 100px 0px 300px" >
   
    <div class="card-header d-flex justify-content-between align-items-center" >
        <h3 class="card-title"> Role : {{ $role->name }}</h3>
        <a href="{{ route('roles.index') }}" class="btn btn-danger" style="margin-right: 10px;" > back</a>
    </div>
    <div class="card-body ">
        <div class="basic-form ">

            <form action="{{ route('roles.update_permission_to_role',$role->id) }}" method="POST">
                @csrf
            @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <br>
                       <h6 style="margin-left: 20px; color:rgb(98, 94, 94);">Permissions</h6>
                       <br>
                      
@foreach ($permissions as $permission)

<label  style="margin-right: 40px;" >

    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}  >

    {{ $permission->name }}

</label>

@endforeach

                    </div>
                    
                </div>
                 
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
