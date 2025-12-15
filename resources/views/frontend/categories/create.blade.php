@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
<div class="container-fluid">
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Add New Category</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('categories.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Enter category"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category Description</label>
                    <textarea name="description"
                              class="form-control"
                              rows="4"></textarea>
                </div>


                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Save
                    </button>
                    <a href="{{ route('categories.index') }}"
                       class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </div>
</div>

@endsection
