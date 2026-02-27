@extends('layouts.app')

@section('title', 'Assign Role to User')

@section('content')
<div class="container mt-5">
    <h3>Assign Role to User</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.users.roles.store') }}">
        @csrf

        <!-- User Selection -->
        <div class="mb-3">
            <label class="form-label"><strong>Select User</strong></label>
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
            @error('user_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Roles Selection -->
        <div class="mb-3">
            <label class="form-label"><strong>Roles</strong></label>
            @foreach($roles as $role)
                <div class="form-check">
                    <input type="checkbox" name="roles[]" value="{{ $role->name }}" class="form-check-input" id="role{{ $role->id }}">
                    <label class="form-check-label" for="role{{ $role->id }}">{{ $role->name }}</label>
                </div>
            @endforeach
            @error('roles')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Assign Role</button>
    </form>
</div>
@endsection
