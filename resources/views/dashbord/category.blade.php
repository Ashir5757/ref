
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
            <div class="m-3">
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

            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add Category</button>

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
          <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addCategoryForm" action="{{ route("add.category") }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name:</label>
                            <input type="text" class="form-control" id="categoryName" name="name">
                            <div class="invalid-feedback" id="nameError"></div>
                        </div>

                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Description:</label>
                            <textarea class="form-control" id="categoryDescription" name="description"></textarea>
                            <div class="invalid-feedback" id="descriptionError"></div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                        <div class="alert alert-danger d-none my-0" role="alert" id="errorAlert"></div>
                    </form>
                </div>
              </div>
            </div>
          </div>



          <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="editCategoryForm">
                    <input type="hidden" id="editCategoryId" name="id">
                    <div class="mb-3">
                      <label for="editCategoryName" class="form-label">Category Name:</label>
                      <input type="text" class="form-control" id="editCategoryName" name="name" required>
                    </div>
                    <div class="mb-3">
                      <label for="editCategoryDescription" class="form-label">Description:</label>
                      <textarea class="form-control" id="editCategoryDescription" name="description"></textarea>
                    </div>




    </section>

  </main><!-- End #main -->
  <script>
    $(document).ready(function() {
        $('#addCategoryForm').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: "{{ route('add.category') }}",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(data) {
                    // Clear previous errors
                    $('.invalid-feedback').empty();
                    $('.alert').addClass('d-none').empty();

                    // Display success message
                    $('.alert-success').removeClass('d-none').text(data.message);

                    // Append new row to the table with the received data
                    var newRow = "<tr>" +
                        "<td>" + data.category.id + "</td>" +
                        "<td>" + data.category.name + "</td>" +
                        "<td>" + data.category.description + "</td>" +
                        "<td><a class='btn btn-outline-primary' href='/view/category/" + data.category.id + "'>View</a></td>" +
                        "<td><a class='btn btn-outline-danger' href='/delete/category/" + data.category.id + "'>Delete</a></td>" +
                        "</tr>";

                    $('table.table tbody').append(newRow);

                    // Optionally, you can reset the form
                    $('#addCategoryForm')[0].reset();
                },

                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        // Clear previous errors
                        $('.invalid-feedback').empty();
                        $('#errorAlert').addClass('d-none').empty();

                        // Display each validation error in the form
                        $.each(errors, function(key, value) {
                            var inputField = $('[name="' + key + '"]');
                            inputField.addClass('is-invalid');
                            inputField.next('.invalid-feedback').text(value[0]);
                        });
                    } else {
                        // Show a generic error message in the alert if no specific validation errors are received
                        $('#errorAlert').removeClass('d-none').text('An error occurred. Please try again.');
                    }
                }

            });
        });
    });
  </script>
  @endsection
