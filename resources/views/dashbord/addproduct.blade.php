
@extends('dashbord.navsidebar')

@section('title','Product')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
          <li class="breadcrumb-item active">Products</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



        <div class="container mt-4 p-4 ">
            <h1>Add Product</h1>



            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('add.product') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </strong>
                    </div>
                @endif

                <div class="form-group mb-3">
                    <label for="name">Product Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter product name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description">Product Description:</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Describe the product">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="category">Category:</label>
                    <select class="form-select" id="category" name="category">
                        <option value="" selected></option>
                        @if(isset($userCategories)){
                            @foreach ($userCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        }
                        @endif
                    </select>
                    <div class="invalid-feedback">
                        @error('category') {{ $message }} @enderror
                    </div>
                </div>


                <div class="form-group mb-3">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" step="0.01" placeholder="Enter product price" value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="image">Product Image:</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage(this)">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div id="imagePreview"></div>
                </div>



                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>

        </div>





    </main><!-- End #main -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#imagePreview').html('<img src="' + e.target.result + '" alt="Product Image Preview" style="max-width: 100%; max-height: 200px; object-fit: cover;">');
        };

        reader.readAsDataURL(input.files[0]);
    }
}

</script>

@endsection
