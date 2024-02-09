@extends('backend.navsidebar')

@section('title', 'Admins')

@section('content')




<div class="container borderd p-3">

    <div class="shadow rounded p-4">
        <div class="m-3">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary float-end m-3">Go Back</a>
        </div>
        <h1 class="text-secondary row justify-content-center">Admin Page</h1>
<hr>

<h3 class="text-primary m-4">Totla Number of Admins</h3>
<table class="table table-hover mb-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Admin</th>
            <th scope="col">Edit Role</th>
            <th scope="col">Delete Admin</th>
        </tr>
    </thead>

    <tbody id="table-body">
        @php
                $count = 1 ;
            @endphp
        @foreach ($admins as $admin)
        <tr>

            <th scope="row">{{$count++}}</th>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->usertype == 1 ? "Admin" : "Not" }}</td>
            <td><button class="btn btn-outline-primary">Edit</button></td>
            <td><button class="btn btn-outline-danger">Delete</button></td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $admins->links() }} <!-- Pagination Links -->



<div class="card-body mt-5">
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
                {{-- <td>{{$user->id == $network->parent_user_id ? $networkcount : " "}}</td> --}}

                 {{-- Retrieve the referral count for the current user --}}
<?php
$networkcount = \App\Models\Network::where('parent_user_id', $user->id)->count();
?>

<td>{{ $networkcount }}</td>
<td>{{$user->created_at }}</td>
                <td>$320,800</td>
            </tr>

            @endforeach





        </tbody>
    </table>
</div>



<script>
    // Filtering functionality using JavaScript
    document.getElementById('filter').addEventListener('input', function () {
        var keyword = this.value.toLowerCase();
        var rows = document.querySelectorAll('#table-body tr');

        rows.forEach(function (row) {
            var name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            var email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            var admin = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

            if (name.includes(keyword) || email.includes(keyword) || admin.includes(keyword)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>


</div>
</div>


@endsection
