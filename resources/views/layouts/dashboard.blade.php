@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!--begin::App Main-->
    
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
            <h3 class="mb-0">Dashboard</h3>
            </div>
        </div>
        <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <!--begin::Col-->
            <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 1-->
            <div class="small-box text-bg-primary">
                <div class="inner">
                <h3>9</h3>

                <p>Role Management</p>
                </div>
                <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
                >
                <path 
                d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0z
                    M3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63
                    13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873
                    a.75.75 0 01-.364-.63l-.001-.122z
                    M18.5 6.75a1.75 1.75 0 100 3.5 1.75 1.75 0 000-3.5z
                    M17.75 11.75h1.5v4.5h-1.5z"
                    /></path>
                </svg>
                <a
                href="{{ route('roles.index') }}"
                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                >
                More info <i class="bi bi-link-45deg"></i>
                </a>
            </div>
            <!--end::Small Box Widget 1-->
            </div>
            <!--end::Col-->
            <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 2-->
            <div class="small-box text-bg-success">
                <div class="inner">
                <h3>12</h3>

                <p>Permission Management</p>
                </div>
                <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
                >
                <path
                    d="M12 3.75l6.5 2.875v5.45c0 4.243-2.87 8.14-6.5 9.425
                    -3.63-1.285-6.5-5.182-6.5-9.425v-5.45L12 3.75z
                    M10.75 12.25a.75.75 0 00-1.06 1.06l1.75 1.75
                    a.75.75 0 001.06 0l3.75-3.75
                    a.75.75 0 10-1.06-1.06l-3.22 3.22-1.22-1.22z"
                /></path>
                </svg>
                <a
                href="{{ route('permissions.index') }}"
                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                >
                More info <i class="bi bi-link-45deg"></i>
                </a>
            </div>
            <!--end::Small Box Widget 2-->
            </div>
            <!--end::Col-->
            <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 3-->
            <div class="small-box text-bg-warning">
                <div class="inner">
                <h3>4</h3>

                <p>User Management</p>
                </div>
                <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
                >
                <path
                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"
                ></path>
                </svg>
                <a
                href="{{ route('users.index') }}"
                class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover"
                >
                More info <i class="bi bi-link-45deg"></i>
                </a>
            </div>
            <!--end::Small Box Widget 3-->
            </div>
            <!--end::Col-->
            <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 4-->
            <div class="small-box text-bg-primary">
                <div class="inner">
                <h3>20</h3>

                <p>Book Management</p>
                </div>
                <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
                >
                <path
                d="M6.75 3.75A2.25 2.25 0 004.5 6v12a2.25 2.25 0 002.25 2.25h9
                a.75.75 0 000-1.5h-9a.75.75 0 01-.75-.75V6
                c0-.414.336-.75.75-.75h9a2.25 2.25 0 012.25 2.25v9
                a.75.75 0 001.5 0V7.5A3.75 3.75 0 0015.75 3.75h-9z
                M8.25 8.25a.75.75 0 000 1.5h6
                a.75.75 0 000-1.5h-6z
                M8.25 11.25a.75.75 0 000 1.5h6
                a.75.75 0 000-1.5h-6z
            "
            /></path>
                </svg>
                <a
                href="{{ route('books.index') }}"
                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                >
                More info <i class="bi bi-link-45deg"></i>
                </a>
            </div>
            <!--end::Small Box Widget 4-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        
        <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
   
@endsection
