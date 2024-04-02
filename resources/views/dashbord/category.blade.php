
@extends('dashbord.navsidebar')

@section('title','Category')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Shop</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
          <li class="breadcrumb-item active">category</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container mt-3 mb-3 bg-white rounded shadow">
            <div class="mt-3 mb-1">
                  @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            </div>




        {{-- Category Management --}}

        <div class="container mt-2   p-5">
            <h3>Category Management</h3>

            <a href="{{route('loadaddcategory')}}" type="button" class="btn btn-primary mb-3">Add Category</a>
            <a href="{{route('subcategory')}}" type="button" class="btn btn-outline-success mb-3 float-end">Add SubCategory</a>

            <table class="table table-hover mb-3 borderd p-5">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @if(isset($categories))
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description}}</td>
                                <td><a class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editCategoryModal" href="">Edit</a></td>
                                <td><a class="btn btn-outline-primary" href="{{route('view.category',['id' => $category->id])}}">View</a></td>
                                <td><a class="btn btn-outline-danger" href="{{route('delete.category',['id' => $category->id])}}">Delete</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

          </div>
         


        

    </section>

  </main><!-- End #main -->
  
  @endsection
