@extends("frontend.index")
@section("title","Product review")
@section('content')
<style>
    .product-image {
      width: 200px;
      height: 200px;
      object-fit: cover;
    }
    .user-avatar {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 50%;
    }
    #image{
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      width: 100%;
      height: 22rem;
    }
  </style>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<nav aria-label="breadcrumb rounded">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('frontend.bazaar')}}">Market</a></li>
    <li class="breadcrumb-item active" aria-current="page">Product Review</li>
  </ol>
</nav>

<a href="javascript:history.back()" class="btn btn-primary float-right m-2">Go Back</a>

<main>
    
      @foreach($products as $product)
      @foreach($users as $user)
  <div class="container py-5 shadow my-5 rounded">
    <div class="row">
      <div class="col-md-6">
     <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active" >
      <img src="{{asset(isset($product->image) ?  'product/'.$product->image : 'assets/img/profile-img.jpg' ) }}" class="d-block" id="image" alt="..."  >
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
      </div>
      <div class="col-md-6 ">
        <h2>{{$product->name}}</h2>
        <p>{{$product->description}}</p>
        <div class="d-flex align-items-center">
          <span class="h5 me-2 m-2  text-warning">Rs. {{$product->price}} </span>
          <i class="ba ba-star text-warning"></i>
          <i class="fas fa-star text-warning"></i>
          <i class="fas fa-star text-warning"></i>
          <i class="fas fa-star-half-alt text-warning"></i>
          <i class="far fa-star text-warning"></i>
          <span class="text-muted">(3 Reviews)</span>
        </div>
        <button type="button" class="btn btn-primary">Add to Cart</button>
        <hr>
        <h5>Seller :</h5>
        <div class="d-flex align-items-center">
          <img src="{{ asset('storage/' . $user->logo) }}" class="user-avatar me-2" alt="Shop Avatar">
          <div>
        <a href="#">{{$user->name}}</a>
        <p class="text-muted mb-0">5 Star Seller</p>
          </div>
        </div>
        <div>
          <p class="text-muted mb-0">Phone:<b> {{$user->contact_phone}}</b></p>
          <p class="text-muted mb-0">Email:<b> {{$user->contact_email}}</b></p>
          <p class="text-muted mb-0">Address:<b> {{$user->address}}</b></p>
        </div>
      </div>
        </div>
    <hr>
    <h3>Reviews</h3>
    <div class="row">
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-body">
            <div class="d-flex align-items-center">
            <img src="user1-avatar.jpg" class="user-avatar me-2" alt="User Avatar">
            <div>
              <a href="#">Sarah Johnson</a>
              <p class="text-muted mb-0">Verified Buyer</p>
            </div>
          </div>
          <div class="rating-stars">
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="far fa-star text-warning"></i>
          </div>
          <p class="card-text">This product is amazing! It exceeded my expectations and is very well made. I would highly recommend it to anyone looking for a [product category].</p>
        </div>
      </div>
      </div>
      @endforeach
      @endforeach
    <h3>Related Products</h3>
    <div class="row">
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="related-product1.jpg" class="card-img-top" alt="Related Product 1">
          <div class="card-body">
            <h5 class="card-title">Related Product 1</h5>
            <p class="card-text">A short description of the related product.</p>
            <a href="#" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="related-product2.jpg" class="card-img-top" alt="Related Product 2">
          <div class="card-body">
            <h5 class="card-title">Related Product 2</h5>
            <p class="card-text">A short description of the related product.</p>
            <a href="#" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-OgwmRWzBw4mxVjIxHDkwGoU1y9ThtSx7ytESONQXVCwdFJO5jGJQsucCsarQvWez9" crossorigin="anonymous"></script>
</main>
  
  
@endsection