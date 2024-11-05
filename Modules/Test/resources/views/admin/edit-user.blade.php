@extends('layouts.app')

<style>
    .contain {
        display: flex;
        flex-direction: column;
        margin-bottom: 1rem;
    }

    label {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    input {
        width: 100%;
        max-width: 300px;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 1rem;
    }

    button {
        padding: 0.5rem 1.5rem;
        border: none;
        background-color: rgb(159, 159, 159);
        border-radius: 1rem;
        cursor: pointer;
    }

    button:hover {
        background-color: rgb(194, 194, 194);
    }

    .error-list {
        background-color: lightgray;
        color: red;
        padding: 1rem;
        margin-bottom: 2rem;
    }

    .error-list ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    .frm {
        background-color: rgb(230, 230, 230);
        padding: 2rem;
        border-radius: 8px;
    }

    .d-flex {
        justify-content: center;
        margin-bottom: 1rem;
    }
</style>

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-center">
        <h1>Edit User</h1>
    </div>

    @if ($errors->any())
    <div class="d-flex justify-content-center">
        <div class="error-list">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <div class="d-flex justify-content-center">
        <form method="POST" action="{{ route('admin.update-user', $user->id) }}" class="frm">
            @csrf

            <div class="contain">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" required>
            </div>

            <div class="contain">
                <label for="password">New Password (Leave blank to keep current password):</label>
                <input type="password" name="password" id="password">
            </div>

            <div class="contain">
                <label for="password_confirmation">Confirm New Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Update User</button>
            </div>
        </form>
    </div>
</div>
@endsection
