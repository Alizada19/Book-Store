@extends('layouts.app')

@section('title', 'Add Role')

@section('content')
<div class="container">
    <h3>Add Role</h3>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Role Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Permissions</label>
            @foreach($permissions as $permission)
                <div class="form-check">
                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-check-input" id="perm{{ $permission->id }}">
                    <label for="perm{{ $permission->id }}" class="form-check-label">{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Add Role</button>
    </form>
</div>
@endsection
