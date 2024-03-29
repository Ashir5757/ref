@extends('backend.navsidebar')

@section('title', 'Admins')

@section('content')




<div class="container borderd p-3">
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

    <div class="shadow rounded p-4">
        <div class="m-3">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary float-end m-3">Go Back</a>
        </div>
        <h1 class="text-secondary row justify-content-center">Admin Page</h1>
<hr>

<h3 class="text-primary m-4">Total Number of Admins :</h3>
<table class="table table-hover mb-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Admin</th>
            <th scope="col">Edit Role</th>
            <th scope="col">Permission</th>
        </tr>
    </thead>

    <tbody id="table-body">
        @foreach ($admins as $admin)
        <tr>

            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->usertype == 1 ? "Admin" : "Not" }}</td>
            <td><a class="btn btn-outline-primary" href="{{ route('backend.editadmins', ['id' => $admin->id]) }}">Edit</a></td>
            <td><a class="btn btn-outline-success" href="{{route('backend.permission', ['id' => $admin->id])}}">Permission</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@if($admins->count() > 0)
<nav class="custom-pagination d-flex justify-content-center">
    <ul class="pagination">
        {{ $admins->links('vendor.pagination.custom') }}
    </ul>
</nav>
@endif


<div class="card-body mt-5">
    <h3 class="text-primary m-4">Total Number of Users :</h3>
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Varified</th>
                <th>Refferals</th>
                <th>Start date&time</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Varified</th>
                <th>Refferals</th>
                <th>Start date&time</th>
                <th>Salary</th>
            </tr>
        </tfoot>
        <tbody>

            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->is_verified}}</td>
                <?php
$networkcount = \App\Models\Network::where('parent_user_id', $user->id)->count();
?>

<td>{{ $networkcount }}</td>
<td>{{$user->created_at }}</td>
<td><a class="btn btn-outline-primary" href="{{ route('backend.editadmins', ['id' => $user->id]) }}">Edit</a></td>

</tr>

@endforeach





        </tbody>
    </table>
</div>



</div>
</div>


@endsection
