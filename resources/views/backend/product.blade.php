@extends('backend.navsidebar')

@section('title', 'Products&Category')

@section('content')
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Products&Category</h1>
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

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    Categories
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        @if(!empty($categorie))
                                        @foreach ($categories as $category)
                                            <li class="list-group-item @if ($selectedCategory === $category->id) active @endif">
                                                <a href="{{ route('products.category', $category->id) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-md-4">
                                        <div class="card product-card">
                                            @if (isset($product->image) && $product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                            @else
                                                <img src="{{ asset('images/placeholder.png') }}" class="card-img-top" alt="{{ $product->name }}">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    @if (isset($product->name))
                                                        {{ $product->name }}
                                                    @else
                                                        <span class="text-danger">Product name unavailable</span>
                                                    @endif
                                                </h5>
                                                <p class="card-text">
                                                    @if (isset($product->description))
                                                        {{ $product->description }}
                                                    @else
                                                        <span class="text-danger">Product description unavailable</span>
                                                    @endif
                                                </p>
                                                <span class="badge bg-danger">
                                                    @if (isset($product->price))
                                                        &#8377; {{ $product->price }}
                                                    @else
                                                        <span class="text-danger">Price unavailable</span>
                                                    @endif
                                                </span>
                                                <a href="{{ isset($product->id) ? route('products.show', $product->id) : '#' }}" class="btn btn-primary">
                                                    @if (isset($product->id))
                                                        View Details
                                                    @else
                                                        Link unavailable
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @else
                                <div class="alert alert-danger">
                                  <p>An error occurred: Products an categories are not available.</p>
                                </div>
                              @endif
                            </div>
                        </div>
                    </div>
                        </main>


                    </div>

                    <script src="{{ asset('js/jquery.min.js') }}"></script>
                    <script src="{{ asset('js/popper.min.js') }}"></script>
                    <script src="{{ asset('js/bootstrap.min.js') }}"></script>







@endsection
