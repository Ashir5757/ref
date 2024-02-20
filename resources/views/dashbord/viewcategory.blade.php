
@extends('dashbord.navsidebar')

@section('title','ViewCategory')

@section('content')

<style>
    .shop-banner {
    background-image: url("banner-image.jpg");
    background-size: cover;
    background-position: center;
    min-height: 60vh; /* Adjust as needed */
    color: #0061b1;
}

.display-4 {
    font-size: 4rem;
}

.lead {
    font-size: 1.5rem;
}

.btn-primary {
    background-color: #28a745;
    border-color: #28a745;
}

.btn-outline-light {
    color: #0295f7;
    border-color: #fc0404;
}
.shop-banner-image {
    border-radius: 20px;
    box-shadow: 0 0 10px 3px rgb(0, 85, 196);
    display: block;
    transition: transform 0.3s ease; /* Adding transition effect */
}

.shop-logo-image {
    border-radius: 20px;
    box-shadow: 0 0 10px 3px rgb(163, 0, 0);
    display: block;
    transition: transform 0.3s ease; /* Adding transition effect */
}

/* Adding hover effects */
.shop-banner-image:hover,
.shop-logo-image:hover {
    transform: scale(1.1); /* Scale up the image on hover */
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

    <section>


        {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


                {{-- product --}}
                @foreach ($shops as $shop)
                <div class="container shop-container">
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
                                <a href="#" class="btn btn-outline-light">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

<hr>

            @endforeach

                    <div class="row">
                        @if ($products->isEmpty())
      <div class="alert alert-danger" role="alert">
          No products Found!
      </div>
    @else
      @foreach ($products as $product)
        <div class="col-12 col-md-4">
          <div class="card mb-3">
            <img src="{{asset(isset($product->image) ? "storage/product/".$product->image : "storage/product/default.png")}}" class="card-img-top" alt="Product Image">
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">{{ $product->description }}</p>
              <div class="row">
                <div class="col">
                  <p class="btn btn-danger btn-block">{{ $product->price }}</p>
                </div>
                <div class="col">
                    <a href="#" class="btn btn-primary">Button </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>
</div>






    </section>

</main>
@endsection
