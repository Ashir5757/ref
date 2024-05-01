@extends("frontend.index")
@section("title","Shop Homepage")
@section('content')


        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder" style="color: white">Market Place</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>



        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    

                    @foreach($products as $product)
<div class="col mb-5 ">
    <div class="card h-100">
        <!-- Sale badge-->
        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
        <!-- Product image-->
        <img class="card-img-top" src="{{asset(isset($product->image) ?  'product/'.$product->image : 'assets/img/profile-img.jpg' ) }}" alt="..." />
        <!-- Product details-->
        <div class="card-body">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">{{ $product->name }}</h5>
                <!-- Product reviews-->
                <div class="d-flex justify-content-center small text-warning mb-1">
                    <div class="bi bi-star-fill"></div>
                    <div class="bi bi-star-fill"></div>
                    <div class="bi bi-star-fill"></div>
                    <div class="bi bi-star-fill"></div>
                    
                </div>
                <!-- Product description with overflow hidden -->
                <p class="fs-6" style="height: 5em; overflow: hidden;">{{$product->description}}</p>
                <!-- Product price-->
                <p class="text-warning">{{ $product->price }}</p>
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer  pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('frontend.review', ['id'=> $product->id , 'user_id' => $product->user_id])}}">Add to cart</a></div>
        </div>
    </div>
</div>
@endforeach

                  
              
                   
                     </div>
                </div>
            </div>
        </section>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

@endsection
