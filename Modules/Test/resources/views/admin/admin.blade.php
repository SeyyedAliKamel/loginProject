@extends('layouts.app')

@section('content')
<div class="container mt-4">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="text-center mb-4">
        <h1>Welcome</h1>
    </div>

    <div class="d-flex justify-content-center">
        <a href="{{ route('admin.add-user') }}" class="btn btn-primary me-3">Create User</a>
        <a href="{{ route('admin.users') }}" class="btn btn-secondary">List Users</a>
    </div>
    <div class="d-flex justify-content-center" style="margin: 1rem">
        <a href="/admin/add-admin" class="btn btn-secondary">Add Admins</a>
    </div>

</div>
@endsection
