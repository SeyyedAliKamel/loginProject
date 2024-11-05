@extends('layouts.app')

<style>
    table {
        border-spacing: 0;
        width: 100%;
        margin: 1rem 0;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 10px;
        text-align: left;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th {
        background-color: #f8f9fa;
    }

    .success-message {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 1rem;
        width: 100%;
        text-align: center;
    }

    .actions a {
        margin-right: 5px;
    }

    .table-container {
        width: 80%;
        margin: 0 auto;
    }

    .btn-primary, .btn-secondary, .btn-danger {
        padding: 0.5rem 1rem;
        text-align: center;
    }
</style>

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <h1>All Users</h1>
    </div>

    @if (session('success'))
        <div class="d-flex justify-content-center">
            <div class="success-message">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-center table-container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td class="actions">
                            <a href="{{ url('/admin/edit-user/'.$user->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('/admin/delete-user/'.$user->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>

    <div style="margin-top: 1rem" class="d-flex justify-content-center">
        <div style="display: flex; gap: 1rem;">
            <a href="/admin/add-user" class="btn btn-primary">Add User</a>
            <a href="/admin/add-admin" class="btn btn-secondary">Add Admin</a>
        </div>
    </div>
</div>
@endsection
