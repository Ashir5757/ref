
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



        <div class="container mt-4 p-4 bg-white shadow rounded">
            <h1>Add Product</h1>



            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

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
            <form action="{{ route('add.product') }}" method="POST" enctype="multipart/form-data" class="dropzone-form">
                @csrf


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
                        <option value=" " ></option>
                        @if(isset($userCategories))
                            @foreach ($userCategories as $category)
                                <option value="{{ $category->id }}" @if(old('category') == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" step="0.01" placeholder="Enter product price" value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="Enter product quantity" value="{{ old('quantity') }}">
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="images">Upload image:</label>
                    <input type="file" id="imageInput" name="image" class="form-control @error('price') is-invalid @enderror">
                    <div id="imagePreview" class="mt-2"  ></div>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-3">Add Product</button>
            </form>


        </div>





    </main><!-- End #main -->

    <script>
        // Function to preview image
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('imagePreview');
                output.innerHTML = '<img src="' + reader.result + '" class="img-fluid rounded" width="200px" />';
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        // Adding event listener to the file input
        var imageInput = document.getElementById('imageInput');
        imageInput.addEventListener('change', previewImage);
    </script>



@endsection
