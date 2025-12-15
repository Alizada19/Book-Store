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

                {{-- Cover Image --}}
                <div class="col-md-4">
                    @if($book->hasMedia('covers'))
                        <img src="{{ asset($book->getFirstMediaUrl('covers')) }}"
                             class="img-fluid img-thumbnail"
                             alt="Book Cover">
                    @else
                        <div class="text-muted">No Cover Image</div>
                    @endif
                </div>

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
                            <td>${{ number_format($book->price, 2) }}</td>
                        </tr>

                        <tr>
                            <th>Added On</th>
                            <td>{{ $book->created_at->format('d M Y') }}</td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

        <div class="card-footer text-end">
            <a href="{{ route('books.edit', $book->id) }}"
               class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
        </div>

    </div>
</div>
@endsection
