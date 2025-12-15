@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container">
    <h3>My Profile</h3>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Roles:</strong> {{ implode(', ', $user->getRoleNames()->toArray()) }}</p>

    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
</div>
@endsection
