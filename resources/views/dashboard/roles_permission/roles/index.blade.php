@extends('dashboard.layouts.master')
@section('title', 'Roles')
@section('content')

<div class="col-lg-12">
    
    <div class="card" style="margin: 0px 100px 0px 300px">
        @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="card-header d-flex justify-content-between align-items-center" >
            <h3 class="card-title"> Roles </h3>
            <a href="{{ route('roles.create') }}" class="btn btn-primary" style="margin-right: 10px;" > Add Role</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center ">
                                    <a href="{{ route('roles.store') }}" class="btn btn-warning "style="margin-right: 10px;"  >Add | Edit Role Permissions</a>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary" style="margin-right: 10px;" > Edit</a>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display:inline;">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
