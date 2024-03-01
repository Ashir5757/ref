@extends('backend.navsidebar')

@section('title', 'Edit_Home_Page')

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

        <div class="container borderd p-3">

            <div class="shadow rounded p-4">
                <div class="m-3">
                    <a href="{{route("backend.payment")}}" class="btn btn-outline-secondary float-end m-3">Go Back</a>
                </div>
                <h1 class="text-secondary row justify-content-center">Payment Page</h1>
        <hr>
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

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">image</th>
                    {{-- @dd($payments) --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <th scope="row">{{ $payment->id }}</th>
                        <td>{{ $payment->name }}</td>
                        <td>{{ $payment->email }}</td>
                        <td>
                            <span class="badge {{ $payment->status == 1 ? 'bg-success' : 'bg-warning' }}">
                                {{ $payment->status == 1 ? "Approved" : "Pending" }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ asset('storage/payment/' . $payment->image) }}" target="_blank" class="btn btn-outline-primary">View Image</a>
                        </td>


                    </tr>

                </tbody>
        </table>
        <span style="font-size: 30px "> <b>Change Status :</b></span>
        <form method="POST" action="{{ route('update.paymentstatus', ['id' => $payment->id]) }}" >
            @csrf
            @method('PUT')
            <input type="hidden" name="_method" value="PUT">

            <select class="form-select" name="paymentstatus" aria-label="Default select example">
                <option value="1" {{ $payment->status == 1 ? 'selected' : '' }}>Approved</option>
                <option value="0" {{ $payment->status == 0 ? 'selected' : '' }}>Pending</option>
            </select>
            <button type="submit" class="btn btn-outline-primary mt-4">Save</button>
        </form>

        @endforeach
</div>
    </main>
@endsection
