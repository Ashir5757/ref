@extends('backend.navsidebar')

@section('title', 'Products&Category')

@section('content')
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">'Products&Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{route("backend")}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">'Products&Category</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                               <p>All the User Categories and Products are Hear </p>
                            </div>
                        </div>
                    </div>
                </main>

@endsection
