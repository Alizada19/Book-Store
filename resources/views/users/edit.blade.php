@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container">
    <h3>Edit User</h3>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password (leave blank if not changing)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Roles</label>
            @foreach($roles as $role)
                <div class="form-check">
                    <input type="checkbox" name="roles[]" value="{{ $role->name }}" class="form-check-input"
                        id="role{{ $role->id }}"
                        {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                    <label for="role{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                </div>
            @endforeach
        </div>
        <div class="mb-3">
             <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="">-- Select Status --</option>
                <option value="Pending" {{ old('status', $user->status) == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>
                <option value="Active" {{ old('status', $user->status) == 'Approved' ? 'selected' : '' }}>
                    Approved
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Update User</button>
    </form>
</div>
@endsection
