@extends('dashbord\navsidebar')

@section('title', 'Add Category')

@section('content')

<main id="main" class="main ">
    <div class="pagetitle">
        <h1>Add Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category') }}">Go Back</a></li>
                <li class="breadcrumb-item active">Add Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <a href="javascript:history.back()" class="btn btn-outline-dark float-right">
      Go Back
    </a>
    <div class="container mt-3">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card border-primary shadow-sm">
            <h1 class="card-header bg-primary text-white text-center">
              <i class="bi bi-plus-circle h3"></i> Add New Category
            </h1>
            <div class="card-body p-4">
              @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif

              @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form action="{{route('add.category')}}" method="POST"  >
                @csrf

                <div class="mb-3">
                  <label for="name" class="form-label">Category Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                 <p></p>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
                  <p></p>
                  @error('slug')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                    <option value=" "></option>
                    <option value="1">Active</option>
                    <option value="0">Block</option>
                  </select>
                  <p></p>
                  @error('status')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary m-2">Create</button>
                <button type="reset" class="btn btn-outline-dark">
                  Cancel
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>


@endsection
