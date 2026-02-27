@extends('layouts.app')

@section('title', 'Seller Dashboard')

@section('content')
<div class="acontainer-fluid">
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Book List</h3>
            @can('Add Record')
            <a href="{{ route('books.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add Book
            </a>
            @endcan
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

       
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th style="width: 60px">ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Seller</th>
                    <th>Category</th>
                    <th style="width: 150px">Actions</th>
                </tr>
                </thead style="background-color:rgb(52 58 64);">

                <tbody>
                @foreach ($result as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->description }}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ $row->seller->name }}</td>
                        <td>{{ $row->category->name }}</td>

                        <td>
                        @can('View Record')
                            <a href="{{ route('books.show', $row) }}" 
                                class="btn btn-sm btn-info">
                                <i class="bi bi-eye"></i>
                            </a>
                        @endcan
                        @can('Edit Record')
                            <a href="{{ route('books.edit', $row->id) }}" 
                                class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        @endcan
                        @can('Delete Record')
                            <form action="{{ route('books.destroy', $row->id) }}"
                                    method="POST"
                                    class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this permission?');">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </form>
                        @endcan    
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>

        <div class="card-footer">
            {{ $result->links() }}
        </div>
        

    </div>
</div>

@endsection
