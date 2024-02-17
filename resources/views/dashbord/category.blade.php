
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
        <div class="container mt-5 mb-5">
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

        <div class="container mt-5">
            <h3>Category Management</h3>

            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add Category</button>

            <table class="table table-hover mb-3">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th colspan="2">Actions</th>
                </tr>
              </thead>
              @php
                  $count = 1;
              @endphp

              @if(isset($categories)){
 @foreach ($categories as $category)

              <tbody>
                  <td>{{$count++}}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->description}}</td>
                  <td><a class="btn btn-outline-primary" href="{{route('view.category',['id' => $category->id])}}">View</a></td>
                  <td><a class="btn btn-outline-danger" href="{{route('delete.category',['id' => $category->id])}}">Delete</a></td>
                </tbody>
                @endforeach
              }
              @endif

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
                        <form id="addCategoryForm" action="{{ route('add.category') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name:</label>
                                <input type="text" class="form-control" id="categoryName" name="name" >
                                <div class="invalid-feedback"></div> </div>
                            <div class="mb-3">
                                <label for="categoryDescription" class="form-label">Description:</label>
                                <textarea class="form-control" id="categoryDescription" name="description" ></textarea>
                                <div class="invalid-feedback"></div> </div>
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </form>
                        <div class="alert alert-danger my-4 d-none" role="alert" id="errorAlert"></div> </div>
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
    $('#addCategoryForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        $('.invalid-feedback').text(''); // Clear any existing error messages
        $('#errorAlert').text(''); // Clear global error message
        $('.form-control').removeClass('is-invalid'); // Remove error styling

        var serializedData = $(this).serialize();

        $.ajax({
            url: "{{ route('add.category') }}",
            type: 'POST',
            data: serializedData,
            success: function(response) {
                // Handle successful submission
                // ... (add category to UI, close modal, show success message)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle errors
                var response = jqXHR.responseJSON; // Parse JSON response if available

                if (response.errors) {
                    // Display individual field errors
                    for (var field in response.errors) {
                        $('#' + field).addClass('is-invalid');
                        $('#' + field + ' + .invalid-feedback').text(response.errors[field][0]);
                    }
                } else if (response.message) {
                    // Display a global error message
                    $('#errorAlert').text(response.message);
                    $('#errorAlert').removeClass('d-none');
                } else {
                    // Handle unexpected error
                    $('#errorAlert').text('An unexpected error occurred. Please try again later.');
                    $('#errorAlert').removeClass('d-none');
                }
            }
        });
    });
});

</script>
  @endsection
