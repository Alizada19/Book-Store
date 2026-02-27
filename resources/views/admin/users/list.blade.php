@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Users</h3>
            <a href="{{ route('admin.users.roles.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Assign Role
            </a>
        </div>
        
        @if (session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif
        
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead style="background-color: rgb(52, 58, 64); color: white;">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->roles->count() > 0)
                                    @foreach($user->roles as $role)
                                        <span class="badge bg-info">{{ $role->name }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">No Role</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.users.roles.create') }}" class="btn btn-sm btn-warning">Assign Role</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{-- optional pagination --}}
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
</div>
@endsection
