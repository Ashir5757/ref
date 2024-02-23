@extends('backend.navsidebar')

@section('title', 'Permission')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Permission</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route("backend")}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Permission</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                 <div class="container m-2">

                    <div class="m-3">
                        <a href="{{ route("backend.admins") }}" class="btn btn-outline-secondary float-end m-3">Go Back</a>
                    </div>
                    <h1 class="text-secondary row justify-content-center">Admin Permission</h1>
            <hr>




    </main>

@endsection
