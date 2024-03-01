@extends('frontend.index')
@section('title','payment')
@section("content")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
        body {
            background-color: #fff;
            color: #212529;
        }

        .blue-header {
            background-color: #0d6efd;
            color: #fff;
            padding: 1rem;
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .step-indicator .step {
            width: 33.33%;
            text-align: center;
        }

        .step-indicator .step.active {
            font-weight: bold;
        }

        .payment-details {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: .25rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: .5rem;
        }
        #drop-zone {
            border: 2px dashed #0077ff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }
    </style>


<div class="container-fluid ">
    <div class="row">
        <div class="col-md-6">
            <div class="p-5">
                <h2>Share&Care</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero in nulla aliquet, id vehicula libero consectetur.</p>
                <p>Integer consectetur eros a diam fermentum ultricies. Cras blandit sem non magna faucibus bibendum.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="m-6">
                <div class="container">
                    <div class="step-indicator  mb-3">
                        <div class="step active">Check Out</div>
                        <div class="step">Payment</div>
                        <div class="step">Confirmation</div>
                    </div>
                    <div class="payment-details mb-3">
                        <p> <strong> [WARNING] Submitting Fake Payment Screenshot won't get you access (payments are verified manually)!</strong></p>
                        <h2>Payment Details</h2>
                        <p> <b> Email: [shareandcare65@gmail.com]</b></p>
                        <p> <b> Bank Name: [Jazz Cash]</b></p>
                        <p><b>Account Name: [Share&Care]</b> </p>
                        <p> <b> IBAN Number: [PK54JCMA1110923123750765]</b></p>


                        @if ($errors->any())
                        <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

         <form method="POST" action="{{route("receive.payment")}}" enctype="multipart/form-data">
                                @csrf

<input type="hidden" value="{{$investment_plan}}" name="investment_plan">

                            <div class="form-group mb-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="container mb-3">
                                <h1>Secure File Upload</h1>
        <div class="form-group">
            <label for="image">Image (required):</label>
            <input type="file" id="image" name="image" class="form-control"  >
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


                            <button type="submit" class="btn btn-primary">Pay Now</button>
 </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2ePHKX3ScGbBi1pCiGHb5EHbinSXqzhgszEegYGROnwQjTjsM8n4gRx+8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/recmY5Czb6ZWsDwBFg1h1CStRGZn3lVRnN9AW7jMuonwXCuqU5vRUcsgbLLiz4" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4hNqVsJelAZqVZqlLft9T0LPhphbC+GZnQGzdMbgBK1N5ylYVgfBgGZqxHNA+WYU" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@endsection
