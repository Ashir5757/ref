@extends('dashbord.navsidebar')

@section('title', 'Contact')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Contact</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Contact</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section contact">


    <div class="col-xl-6">
        <div class="card p-4 ">
            <div class="col-sm-8 m-auto"><h1><b><u>Drop us a Mail</u></b></h1> </div>
            <div class="p-3">
                @if  (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>
                        <ul>
                             <li>{{ Session::get('success') }}</li>
                        </ul>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                    </button>
                </div>

                @endif
              </div>
              <form action="{{ route('user.receive.Mail') }}" method="post">
                @csrf
                @method('POST')

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

                <div class="row gy-4">

                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name" value="{{ old('name') }}">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email" value="{{ old('email') }}">

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject" value="{{ old('subject') }}">

                        @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control @error('textarea') is-invalid @enderror" name="textarea" rows="6" placeholder="Message">{{ old('textarea') }}</textarea>

                        @error('textarea')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Send Message</button>

                </div>

            </form>

    </div>

</div>

</div>

</section>

</main><!-- End #main -->

@endsection
