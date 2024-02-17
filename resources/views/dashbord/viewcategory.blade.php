
@extends('dashbord.navsidebar')

@section('title','ViewCategory')

@section('content')
 <style>
            /* Add custom styles here */
            .product-card {
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                transition: transform 0.2s ease-in-out;
            }

            .product-card:hover {
                transform: scale(1.05);
            }

            .product-image {
                height: 200px;
                object-fit: cover;
                border-radius: 10px 10px 0 0;
            }

            .product-category {
                background-color: #f5f5f5;
                padding: 5px 10px;
                border-radius: 5px;
                margin-bottom: 10px;
            }

            .product-title {
                font-weight: bold;
                font-size: 18px;
                margin-bottom: 5px;
            }

            .product-price {
                color: #4CAF50;
                font-weight: bold;
            }
        </style>


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


    <div class="container py-5">
        <h1>Products and Categories</h1>

        <div class="row">
            <div class="col-md-4">
                <h2>Categories</h2>
                <ul class="list-group">
                    @foreach ($categories as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('products.byCategory', $category->id) }}">{{ $category->name }}</a>
                            <span class="badge bg-primary rounded-pill">{{ $category->products_count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-8">
                <h2>Products</h2>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card product-card h-100">
                                <div class="product-image">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="product-category badge bg-info">{{ $product->category->name }}</span>
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-primary">View</a>
                                    </div>
                                    <h5 class="card-title product-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ Str::limit(<span class="math-inline">product\-\>description, 50\) \}\}</p\>
    <span class\="product\-price"\></span>{{ $product->price }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Ajs+duQ6+Kz68/1DjhP4dSYy8



</main>
@endsection
