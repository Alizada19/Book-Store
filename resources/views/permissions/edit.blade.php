@extends('layouts.app')

@section('title', 'Edit Permission')

@section('content')

<div class="app-content">
    <div class="container-fluid">

        <h1 class="h3 mb-3">Edit Permission</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Fix the errors below:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="card card-outline card-primary">
            <div class="card-body">

                <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Permission Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ $permission->name }}"
                               required>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-lg"></i> Update
                    </button>

                    <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
