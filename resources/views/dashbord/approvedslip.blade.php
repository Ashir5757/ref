@extends('dashbord.navsidebar')

@section('title','Slip')

@section('content')

<main id="main" class="main">
        <div class="pagetitle">
            <h1>View Slip</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('viewwithdrawal') }}">Back</a></li>
                    <li class="breadcrumb-item active">Slip</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-primary shadow-sm">
                        <h1 class="card-header bg-primary text-white text-center">
                            Approved Withdrawal Details
                        </h1>
                        <div class="card-body p-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Withdrawal ID:</span>
                                    <span>{{ $payment->id }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Amount:</span>
                                    <span class="text-primary">{{ $payment->amount }} Points</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Created At:</span>
                                    <span class="text-primary">{{ $payment->created_at->format('F j, Y, g:i a') }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Remaining Amount:</span>
                                    <span class="text-primary">{{ $payment->remaining_amount }} Points</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Total Amount:</span>
                                    <span class="text-primary">{{ $payment->total_amount }} Points</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Status:</span>
                                    <span class="text-primary">Approved</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
