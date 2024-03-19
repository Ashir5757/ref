@extends('backend.navsidebar')

@section('title', 'Edit Withdrawal')

@section('content')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Withdrawal Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route("backend")}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Withdrawal Management</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                 <div class="container m-2">

                    <div class="m-3">
                        <a href="{{ route("withdrawalrequest") }}" class="btn btn-outline-secondary float-end m-3">Go Back</a>
                    </div>
                    <h1 class="text-secondary row justify-content-center">Withdrawal Details</h1>
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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user"></i> User Details</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th scope="row"><i class="fas fa-signature"></i> Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row"><i class="fas fa-envelope"></i> Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-header py-3 bg-primary text-white">
        <h4 class="m-0 font-weight-bold"><i class="fas fa-info-circle"></i> Withdrawal Details</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless align-middle">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><i class="fas fa-dollar-sign"></i> Amount</th>
                        <th scope="col"><i class="fas fa-sync-alt"></i> Status</th>
                        <th scope="col"><i class="fas fa-dollar-sign"></i> Total Amount</th>
                        <th scope="col"><i class="fas fa-dollar-sign"></i> Remaining Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $withdrawals->amount }} Points</td>
                        <td>
                            <span class="{{ $withdrawals->status == 1 ? 'text-success' : 'text-warning' }}">
                                <i class="fas fa-circle"></i> {{ $withdrawals->status == 1 ? "Approved" : "Pending" }}
                            </span>
                        </td>
                        <td>{{ $withdrawals->total_amount }} Points</td>
                        <td>{{ $withdrawals->remaining_amount	}} Points</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="update-status-section mt-5">
    <h5 class="text-secondary"><i class="fas fa-edit"></i> Update Status:</h5>
    <form method="POST" action="{{ route('update.withdrawalstatus', ['id' => $withdrawals->id,'user_id' => $user->id]) }}" class="form-inline">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <select class="form-select" name="status" aria-label="Default select example">
                <option value="1" {{ $withdrawals->status == 1 ? 'selected' : '' }}>Approve</option>
                <option value="0" {{ $withdrawals->status == 0 ? 'selected' : '' }}>Pending</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary ml-2 mb-2"><i class="fas fa-save"></i> Save Changes</button>
    </form>
</div>



</div>
</div>

</main>

@endsection
