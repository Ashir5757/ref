
@extends('dashbord.navsidebar')

@section('title','ViewCategory')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Shop</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
          <li class="breadcrumb-item "><a href="{{ route('shop') }}">Shop</a></li>
          <li class="breadcrumb-item active">category</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


@if(!empty($shops))
                {{-- product --}}
                @foreach ($shops as $shop)
                <div class="container shop-container p-4 bg-white rounded ">
                    <div class="row align-items-center">
                        <div class="col-md-6 shop-image">
                            @if (!empty($shop->banner_image))
                                <img src="{{ asset('storage/' . $shop->banner_image) }}" alt="{{ $shop->name }} banner" class="img-fluid w-100 shop-banner-image" style="max-height: 300px; object-fit: cover;">
                            @else
                                <img src="{{ asset('default-shop-banner.png') }}" alt="Default shop banner" class="img-fluid w-100 shop-banner-image" style="max-height: 300px; object-fit: cover;">
                            @endif
                        </div>
                        <div class="col-md-6 shop-details">
                            <div class="shop-logo d-flex align-items-center mb-3">
                                @if (!empty($shop->logo))
                                    <img src="{{ asset('storage/' . $shop->logo) }}" alt="{{ $shop->name }} logo" class="img-fluid shop-logo-image" style="max-width: 150px; height: auto;">
                                @else
                                    <img src="{{ asset('default-shop-logo.png') }}" alt="Default shop logo" class="img-fluid shop-logo-image" style="max-width: 150px; height: auto;">
                                @endif
                                <h2 class="display-5 fw-bold text-capitalize ms-3">{{ $shop->name }}</h2>
                            </div>
                            <p class="lead text-muted shop-description">{{ $shop->description }}</p>
                            <ul class="shop-info list-unstyled">
                                <li><i class="bi bi-envelope me-2"></i> <a href="mailto:{{ $shop->contact_email }}">{{ $shop->contact_email }}</a></li>
                                <li><i class="bi bi-phone me-2"></i> {{ $shop->contact_phone }}</li>
                                @if (!empty($shop->address))
                                    <li><i class="bi bi-geo-alt-fill me-2"></i> {{ $shop->address }}</li>
                                @endif
                            </ul>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="#" class="btn btn-primary me-3">Visit Shop</a>
                                <a href="#" class="btn btn-outline-success">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

<hr>

            @endforeach
            @endif

                    <div class="row">

                        @if (empty($products))
      <div class="alert alert-danger" role="alert">
          No products Found!
      </div>
    @else
      @foreach ($products as $product)
        <div class="col-12 col-md-4">
          <div class="card mb-3">
            <img src="{{asset(isset($product->image) ?  'product/'.$product->image : 'assets/img/profile-img.jpg' ) }}" class="card-img-top" alt="Product Image">
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">{{ $product->description }}</p>
              <div class="col">
                  <p class="fs-4 text-warning">{{ $product->price }}</p>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="#" class="btn btn-primary mr-1">Edit </a>
                        <button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                    </div>
                </div>

            </div>
          </div>
        </div>
  <!-- Modal -->
  <div class="modal fade"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger" role="alert">
                A simple danger alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
              </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-danger" href="{{ route('delete.product', ['id' => $product->id]) }}">Delete</button>
        </div>
      </div>
    </div>
  </div>


      @endforeach
    @endif
  </div>
</div>



</main>

@endsection
