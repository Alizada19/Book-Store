<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <!-- Accessibility Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />

    <!-- Primary Meta Tags -->
    <meta name="title" content="Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
        name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
    />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/icomoon/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">

    @stack('head')
</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

    {{-- HEADER --}}
    @include('frontend.layouts.header')

   
     {{-- CONTENT --}}
    <main class="app-main">
        <div class="app-content px-3 pt-3">
            @yield('content')
        </div>
    </main>

    {{-- FOOTER --}}
    @include('frontend.layouts.footer')



@stack('scripts')

</body>
</html>
