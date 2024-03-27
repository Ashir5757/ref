@extends('dashbord\navsidebar')

@section('title', 'Add Category')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Add Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('viewwithdrawal') }}">Back</a></li>
                <li class="breadcrumb-item active">Add Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container mt-3">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card border-primary shadow-sm">
            <h1 class="card-header bg-primary text-white text-center">
              <i class="bi bi-plus-circle h3"></i> Add New Category
            </h1>
            <div class="card-body p-4">
              <form action="{{ route('add.category') }}" method="POST">
                @csrf

                <div class="mb-3">
                  <label for="name" class="form-label">Category Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
                  @error('slug')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                  @error('description')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="image" class="form-label">Image</label>
                  <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                  @error('image')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                  </select>
                  @error('status')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-check-circle-fill"></i> Submit
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>

@endsection