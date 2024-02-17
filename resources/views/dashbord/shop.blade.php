
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
                <form method="POST" action="{{route("store.create")}}" enctype="multipart/form-data">
                    @csrf

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

                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
  @endsection
