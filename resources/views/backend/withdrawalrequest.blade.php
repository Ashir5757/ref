@extends('backend.navsidebar')

@section('title', 'Withdrawal Requests')

@section('content')

<main class="withdrawal-requests">
    <div class="container-fluid px-4">
        <h1 class="mt-4"><i class="fas fa-university"></i> Withdrawal Requests</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route("backend")}}">Dashboard</a></li>
            <li class="breadcrumb-item active"> Withdrawal Requests</li>
        </ol>
        <div class="card mb-4 shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-table"></i> Requests Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h2>Pending Withdrawal Requests</h2>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><i class="fas fa-user"></i> User ID</th>
                                <th scope="col"><i class="fas fa-dollar-sign"></i> Amount</th>
                                <th scope="col"><i class="fas fa-info-circle"></i> Details</th>
                                <th scope="col"><i class="fas fa-calendar-alt"></i> Date</th>
                                <th scope="col"><i class="fas fa-thumbs-up"></i> Status</th>
                                <th scope="col" colspan="2"><i class="fas fa-tools"></i> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdrawalRequests->where('status', 0) as $withdrawalRequest)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $withdrawalRequest->user_id }}</td>
                                    <td>{{ $withdrawalRequest->amount }}</td>
                                    <td>{{ $withdrawalRequest->details }}</td>
                                    <td>{{ $withdrawalRequest->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge bg-warning text-dark"><i class="fas fa-hourglass-half"></i> Pending</span>
                                    </td>
                                    <td><a class="btn btn-outline-primary" href="{{route('editwithdrawal', ['user_id' => $withdrawalRequest->user_id, 'id' => $withdrawalRequest->id])}}"><i class="fas fa-edit"></i> Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
<hr class="mt-4">
                    <h2>Approved Withdrawal Requests</h2>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><i class="fas fa-user"></i> User ID</th>
                                <th scope="col"><i class="fas fa-dollar-sign"></i> Amount</th>
                                <th scope="col"><i class="fas fa-info-circle"></i> Details</th>
                                <th scope="col"><i class="fas fa-calendar-alt"></i> Date</th>
                                <th scope="col"><i class="fas fa-thumbs-up"></i> Status</th>
                                <th scope="col" colspan="2"><i class="fas fa-tools"></i> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdrawalRequests->where('status', 1) as $withdrawalRequest)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $withdrawalRequest->user_id }}</td>
                                    <td>{{ $withdrawalRequest->amount }}</td>
                                    <td>{{ $withdrawalRequest->details }}</td>
                                    <td>{{ $withdrawalRequest->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge bg-success text-dark"><i class="fas fa-hourglass-half"></i> Approved</span>
                                    </td>
                                    <td><a class="btn btn-outline-primary" href="{{route('editwithdrawal', ['user_id' => $withdrawalRequest->user_id, 'id' => $withdrawalRequest->id])}}"><i class="fas fa-edit"></i> Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($withdrawalRequests->count() > 0)
                        <nav class="custom-pagination d-flex justify-content-center">
                            <ul class="pagination">
                                {{ $withdrawalRequests->links('vendor.pagination.custom') }}
                            </ul>
                        </nav>
                    @endif
            </div>
        </div>
    </div>
</main>
@endsection
