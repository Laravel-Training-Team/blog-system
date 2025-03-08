
@extends('dashboard.layouts.master')
@section('title', 'Edit Roles')
@section('content')

<div class="card w-75 "style="margin: 30px 100px 0px 300px" >
    
    <div class="card-header d-flex justify-content-between align-items-center" >
        <h3 class="card-title"> Edit Role</h3>
        <a href="{{ route('roles.index') }}" class="btn btn-danger" style="margin-right: 10px;" > back</a>
    </div>
    <div class="card-body ">
        <div class="basic-form ">

            <form action="{{ route('roles.update' , $role->id) }}" method="POST">
                
                @csrf
                 @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="mt-3">Name Role</label>
                        <input type="text" class="form-control  @error('name') is-invalid @else is-valid @enderror"
                         name="name" value='{{  old('name', $role->name) }}'>
                          <br>
                        @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                    </div>
                </div>
                 
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection