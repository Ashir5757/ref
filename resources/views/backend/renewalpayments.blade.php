@extends('backend.navsidebar')

@section('title', 'Renewal Payment')

@section('content')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Renewal Payment</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('backend')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Renewal Payment</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <div class="container m-2">
                    <div class="row justify-content-center">
                        <div class="col-md-12">

                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session()->get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if(session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session()->get('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            @if (count($renewalPayments) > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
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
                                            @foreach ($renewalPayments as $payment)
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
                                                        @if ($payment->status == 1)
                                                            <span class="badge bg-success">Approved</span>
                                                        @else
                                                            <span class="badge bg-warning">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $payment->plan }}</td>
                                                    <td>
                                                        <a href="{{ route('backend.editpayment', ['id' => $payment->id]) }}" class="btn btn-outline-success btn-sm">Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        {{ $renewalPayments->links('vendor.pagination.custom') }}
                                    </div>
                                </div>
                            @else
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="alert alert-info text-center">No payments found.</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }
        .table-striped thead th {
            background-color: #343a40;
            color: #fff;
        }
        .table-striped thead th:nth-child(1),
        .table-striped thead th:nth-child(7) {
            width: 5%;
        }
        .table-striped thead th:nth-child(2),
        .table-striped thead th:nth-child(3),
        .table-striped thead th:nth-child(4),
        .table-striped thead th:nth-child(5),
        .table-striped thead th:nth-child(6) {
            width: 20%;
        }
        .table-striped tbody tr td:nth-child(1),
        .table-striped tbody tr td:nth-child(7) {
            text-align: center;
        }
        .table-striped tbody tr td:nth-child(4) {
            text-align: center;
        }
        .table-striped tbody tr td:nth-child(5) {
            text-align: center;
            font-weight: bold;
        }
    </style>


</main>



@endsection
