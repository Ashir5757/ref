@extends("frontend.index")
@section("title","Shop Homepage")
@section('content')

<style>
    /* Carousel container */
#carouselExampleIndicators {
    width: 100%; /* Full width */
    max-width: 800px; /* Set a maximum width */
    margin: 0 auto; /* Center horizontally */
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
    border-radius: 10px; /* Rounded corners */
    overflow: hidden; /* Hide overflow content */
}

/* Carousel items */
.carousel-item img {
    height: 300px; /* Set image height */
    object-fit: cover; /* Maintain aspect ratio */
}

/* Carousel indicators */
.carousel-indicators {
    bottom: 10px; /* Position at the bottom */
}

/* Carousel control icons */
.carousel-control-prev-icon, .carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black color */
    border-radius: 50%; /* Rounded shape */
    padding: 10px; /* Add padding */
}

/* Control icon position */
.carousel-control-prev, .carousel-control-next {
    width: auto; /* Allow icon to size based on content */
    top: 50%; /* Position vertically centered */
    transform: translateY(-50%); /* Adjust vertical position */
}

/* Control icon hover effect */
.carousel-control-prev:hover, .carousel-control-next:hover {
    background-color: rgba(0, 0, 0, 0.7); /* Darken on hover */
}

#search-results {
            width: 91%;
            max-height: 300px;
            overflow-y: auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            /* Position relative to keep within flow */
            position: absolute;
            z-index: 2;
        }
        #searchResults li {
            cursor: pointer;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        #searchResults li:last-child {
            border-bottom: none;
        }
        #searchResults li:hover {
            background-color: #f8f9fa; /* Change background color on hover */
        }


        /* Add more custom styles as needed */

</style>
        <!-- Header-->
        <header class="bg-dark py-2">
             <div class="container my-2">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="row mb-3">
    <div class="col">
        <select name="country" id="country" class="form-select">
            <option value="">Select Country</option>
            @foreach($countries as $country)
            <option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
            @endforeach
        </select>
        @error('country')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col">
        <select name="state" id="state" class="form-select">
            <option value="">Select State</option>
            <!-- Populate options dynamically with states -->
        </select>
        @error('state')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col">
        <select name="city" id="city" class="form-select">
            <option value="">Select City</option>
            <!-- Populate options dynamically with cities -->
        </select>
        @error('city')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

    <div class="col ">
        <form action="{{ route('search.product') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search for a Product..." id="search" name="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </div>
            <div id="search-results">
                <ul id="searchResults" class="list-group"></ul>
            </div>
        </form>
    </div>
</div>

</div>
           <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('assets/img/img1.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('assets/img/img2.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('assets/img/img3.jpg') }}" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



    @if(isset($locations))
        <h3>Search Results for "{{ $query }}"</h3>
        <ul>
            @foreach($locations as $location)
                <li>{{ $location->city }}, {{ $location->state }}, {{ $location->country }}</li>
            @endforeach
        </ul>
    @endif

    @if(isset($locations))
        <h3>Search Results for "{{ $query }}"</h3>
        <ul>
            @foreach($locations as $location)
                <li>{{ $location->city }}, {{ $location->state }}, {{ $location->country }}</li>
            @endforeach
        </ul>
    @endif
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>

$('#searchResults').hidden();

        </script>
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var query = $(this).val().trim();

            if (query.length > 0) {
                // Perform AJAX request to fetch search results
                $.ajax({
                    url: "{{ route('search.liveproduct') }}",
                    type: "GET",
                    data: { query: query },
                    success: function(response) {

                        console.log(response);
                        displayResults(response);
                    },
                    error: function(xhr) {


                        console.log(xhr.responseText);
                    }
                });
            } else {
                $('#searchResults').empty(); // Clear search results if query is empty
            }
        });

        function displayResults(products) {
            $('#searchResults').empty(); // Clear previous results

            if (products.length > 0) {
                $.each(products, function(index, product) {
                    $('#searchResults').append('<li>' + product.name + ' - ' + product.description + '</li>');
                });
            } else {
                // Display message if no products found
                $('#searchResults').append('<li>No products found.</li>');
            }
        }
    });
</script>

<script>
$(document).ready(function(){
    $('#country').change(function(){
        var country = $(this).val();

        // Check if country value is empty or whitespace, then set it to null
        if(country.trim() === "") {
            country = null;
        }

        // Prepare data object for AJAX request
        var data = {
            token: $('#token').val(),
            country: country
        };
        // Send AJAX request to retrieve states based on selected country
        $.ajax({
                url: '{{ route('states') }}',
                type: 'GET',
                data: data, // Send data object with token and selected country
                success: function(response) {
                    console.log(response);
                    var states = JSON.parse(response); // Parse JSON response into JavaScript object
                    var html = "<option value=''>Select State</option>";

                    // Generate HTML options for states dropdown
                    if (states.length > 0) {
                        for (var i = 0; i < states.length; i++) {
                            html += "<option value='" + states[i]['state_name']+ "'>" + states[i]['state_name'] + "</option>";
                        }
                    } else {
                        html = "<option value=''>No states found</option>";
                    }

                    // Update the states dropdown with the generated HTML options
                    $('#state').html(html);
                },
            error: function(xhr, status, error) {
                console.error('Error fetching states:', error);
                // Optionally handle error scenario, e.g., display error message to user
                var html = "<option value=''>Error loading states</option>";
                $('#state').html(html);
            }
        });
    });

    $('#state').change(function(){
        var state = $(this).val();
        // Check if state value is empty or whitespace, then set it to null
        if(state.trim() === "") {
            state = null;
        }
        // Prepare data object for AJAX request
        var data = {
            token: $('#token').val(),
            state: state
        };
        // Send AJAX request to retrieve cities based on selected state
        $.ajax({
            url: '{{ route('cities') }}',
            type: 'GET',
            data: data, // Send data object with token and selected state
            success: function(response) {
                console.log(response);
                var cities = JSON.parse(response); // Parse JSON response into JavaScript object
                var html = "<option value=''>Select City</option>";
                // Generate HTML options for cities dropdown
                if (cities.length > 0) {
                    for (var i = 0; i < cities.length; i++) {
                        html += "<option value='" + cities[i]['city_name']+ "'>" + cities[i]['city_name'] + "</option>";
                    }
                } else {
                    html = "<option value=''>No cities found</option>";
                }
                // Update the cities dropdown with the generated HTML options
                $('#city').html(html);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching cities:', error);
                // Optionally handle error scenario, e.g., display error message to user
                var html = "<option value=''>Error loading cities</option>";
                $('#city').html(html);
            }
        });
    });


});
</script>



@endsection
