@extends('layouts.app')

@section('title', 'Edit Role')

@section('content')
<div class="container">
    <h3>Edit Role</h3>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Role Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Permissions</label>
            @foreach($permissions as $permission)
                <div class="form-check">
                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-check-input"
                        id="perm{{ $permission->id }}"
                        {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                    <label for="perm{{ $permission->id }}" class="form-check-label">{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-warning">Update Role</button>
    </form>
</div>
@endsection
