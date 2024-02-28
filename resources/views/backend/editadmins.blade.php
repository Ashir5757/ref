@extends('backend.navsidebar')

@section('title', 'EditAdmins')

@section('content')




<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Permission</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route("backend")}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Permission</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                 <div class="container m-2">

                    <div class="m-3">
                        <a href="{{ route("backend.admins") }}" class="btn btn-outline-secondary float-end m-3">Go Back</a>
                    </div>
                    <h1 class="text-secondary row justify-content-center">Admin Roles</h1>
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

<h3 class="text-primary m-4"> Admin Edit Panel</h3>
<table class="table table-hover mb-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Admin</th>
        </tr>
    </thead>

    <tbody id="table-body">

        @php
                $count = 1 ;
            @endphp
            {{-- @DD($admins); --}}
        @foreach ($admins as $admin)
        <tr>

            <th scope="row">{{$count++}}</th>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->usertype == 1 ? "Admin" : "Not" }}</td>
        </tr>
    </tbody>
</table>
<span style="font-size: 30px"> <b>Change Roles :</b></span>
<form method="POST" action="{{ route('update.usertype', ['id' => $admin->id]) }}">
    @csrf
    @method('PUT')
    <select class="form-select" name="usertype" aria-label="Default select example">
        <option value="1" {{ $admin->usertype == 1 ? 'selected' : '' }}>Admin</option>
        <option value="0" {{ $admin->usertype == 0 ? 'selected' : '' }}>User</option>
    </select>
    <button type="submit" class="btn btn-outline-primary mt-4">Save</button>
</form>


{{ $admins->links() }} <!-- Pagination Links -->



@endforeach

<script>

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

</main>

@endsection
