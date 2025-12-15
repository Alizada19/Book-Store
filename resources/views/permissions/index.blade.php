@extends('layouts.app')

@section('title', 'Permissions')

@section('content')

<div class="acontainer-fluid">
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Permissions</h3>
            <a href="{{ route('permissions.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add Permission
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

       
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th style="width: 60px">ID</th>
                    <th>Name</th>
                    <th style="width: 150px">Actions</th>
                </tr>
                </thead style="background-color:rgb(52 58 64);">

                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>

                        <td>
                            <a href="{{ route('permissions.edit', $permission->id) }}" 
                                class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('permissions.destroy', $permission->id) }}"
                                    method="POST"
                                    class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this permission?');">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>

        <div class="card-footer">
            {{ $permissions->links() }}
        </div>
        

    </div>
</div>

@endsection
