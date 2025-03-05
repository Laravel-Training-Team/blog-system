
@extends('dashboard.layouts.master')
@section('title', 'Create Roles')
@section('content')

<div class="card w-75 "style="margin: 30px 100px 0px 300px" >
    <div class="card-header">
        <h4 class="card-title">Create Role</h4>
    </div>
    <div class="card-body ">
        <div class="basic-form ">

            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
            
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="mt-3">Name Role</label>
                        <input type="text" class=" form-control  @error('name') is-invalid @else is-valid @enderror"
                         name="name" value="{{ old('name') }}">
                       
                         <br>
                         @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                    </div>
                    
                </div>
                 
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection