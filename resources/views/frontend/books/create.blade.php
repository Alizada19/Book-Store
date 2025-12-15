@extends('layouts.app')

@section('title', 'Add Book')

@section('content')
<div class="container-fluid">
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Add New Book</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('books.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Book Title</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           placeholder="Enter book title"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description"
                              class="form-control"
                              rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number"
                           name="price"
                           class="form-control"
                           placeholder="0.00"
                           step="0.01"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id"
                            class="form-select"
                            required>
                        <option value="">Select category</option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cover Image</label>
                    <input type="file"
                           name="cover"
                           class="form-control"
                           accept="image/*"
                           required>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Save
                    </button>
                    <a href="{{ route('books.index') }}"
                       class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </div>
</div>

@endsection
