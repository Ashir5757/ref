
@extends('dashbord.navsidebar')

@section('title','Shop')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Shop</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
          <li class="breadcrumb-item active">Shop</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container mt-5 mb-5">
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <div class="card">
              <div class="card-body p-5">
                <h1>Let's Get Your Store Up and Running!</h1>
                <form method="POST" action="{{route('store.create')}}" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">Shop Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contact_email" class="form-label">Contact Email:</label>
                        <input type="email" name="contact_email" id="contact_email" class="form-control" value="{{ old('contact_email') }}">
                        @error('contact_email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contact_phone" class="form-label">Contact Phone:</label>
                        <input type="text" name="contact_phone" id="contact_phone" class="form-control" value="{{ old('contact_phone') }}">
                        @error('contact_phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="row mb-3">
    <div class="col-sm-4">
        <label for="country" class="form-label">Country:</label>
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

    <div class="col-sm-4">
        <label for="state" class="form-label">State:</label>
        <select name="state" id="state" class="form-select">
            <option value="">Select State</option>
            <!-- Populate options dynamically with states -->
        </select>
        @error('state')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-sm-4">
        <label for="city" class="form-label">City:</label>
        <select name="state" id="state" class="form-select">
            <option value="">Select State</option>
            <!-- Populate options dynamically with cities -->
        </select>
        @error('city')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>


                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo:</label>
                        <input type="file" name="logo" id="logoInput" class="form-control">
                        @if(old('logo'))
                            <img src="{{ old('logo') }}" alt="Logo Preview" id="logoPreview" style="max-width: 150px;">
                        @else
                            <img src="#" alt="Logo Preview" id="logoPreview" style="display: none; max-width: 150px;">
                        @endif
                        @error('logo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="banner_image" class="form-label">Banner Image:</label>
                        <input type="file" name="banner_image" id="bannerImageInput" class="form-control">
                        @if(old('banner_image'))
                            <img src="{{ old('banner_image') }}" alt="Banner Image Preview" id="bannerImagePreview" style="max-width: 150px;">
                        @else
                            <img src="#" alt="Banner Image Preview" id="bannerImagePreview" style="display: none; max-width: 150px;">
                        @endif
                        @error('banner_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

<input type="hidden" id="token" name="token" value=" {{ $auth_token }} ">
                    <button type="submit" class="btn btn-primary">Create Shop</button>
                </form>
              </div>
            </div>
          </div>

    </section>

    <script>
        const logoInput = document.getElementById('logoInput');
        const logoPreview = document.getElementById('logoPreview');
        const bannerImageInput = document.getElementById('bannerImageInput');
        const bannerImagePreview = document.getElementById('bannerImagePreview');

        logoInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                logoPreview.src = e.target.result;
                logoPreview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        });

        bannerImageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                bannerImagePreview.src = e.target.result;
                bannerImagePreview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        });
    </script>
  </main><!-- End #main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
