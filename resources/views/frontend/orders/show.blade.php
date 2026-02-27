@extends('layouts.app')

@section('title', 'Book Details')

@section('content')
<div class="container-fluid">
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Book Details</h3>
            
        </div>

        <div class="card-body">

            <div class="row">

              

                {{-- Book Info --}}
                <div class="col-md-8">

                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 200px">Title</th>
                            <td>{{ $book->title }}</td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td>{{ $book->description }}</td>
                        </tr>

                        <tr>
                            <th>Category</th>
                            <td>{{ $book->category->name ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Price</th>
                            <td>RM {{ number_format($book->price, 2) }}</td>
                        </tr>

                        <tr>
                            <th>Added On</th>
                            <td>{{ $book->created_at->format('d M Y') }}</td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>
        @can('Edit Record')
        <div class="card-footer text-end">
            <a href="{{ route('books.edit', $book->id) }}"
               class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
        </div>
        @endcan
    </div>
</div>
@endsection
