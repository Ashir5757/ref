@extends('backend.navsidebar')

@section('title', 'Payment')

@section('content')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Payment</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route("backend")}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Payment</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                 <div class="container m-2">
        <h1>Received Payments</h1>

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

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
    @endif

    @if (!empty($payments) )
    <table class="table table-hover mb-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Status</th>
                <th>Plan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            @if ($payment->status != 1)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->name }}</td>
                <td>{{ $payment->email }}</td>
                <td>
                    @if ($payment->image)
                        <img src="{{ asset('storage/payment/'.$payment->image) }}" alt="{{ $payment->name }} Image" width="50" height="50">
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    <span class="badge bg-warning">Pending</span>
                </td>
                <td>{{ $payment->plan }}</td>
                <td>
                    <a href="{{ route('backend.editpayment', ['id' => $payment->id]) }}" class="btn btn-outline-success">Edit</a>
                </td>
            </tr>
        @endif

            @endforeach
        </tbody>
    </table>
<hr>
<h1>Approved Payments</h1>
    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Status</th>
                <th>Plan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            @if ($payment->status == 1)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->name }}</td>
                <td>{{ $payment->email }}</td>
                <td>
                    @if ($payment->image)
                        <img src="{{ asset('storage/payment/'.$payment->image) }}" alt="{{ $payment->name }} Image" width="50" height="50">
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    <span class="badge bg-success">Approved</span>
                </td>
                <td>{{ $payment->plan }}</td>
                <td>
                    <a href="{{ route('backend.editpayment', ['id' => $payment->id]) }}" class="btn btn-outline-success">Edit</a>
                </td>
            </tr>
        @endif
            @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-info">No payments found.</div>
@endif

    </div>
            </div>
        </div>
    </div>





</main>



@endsection
