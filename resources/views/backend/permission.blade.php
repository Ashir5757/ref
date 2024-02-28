@extends('backend.navsidebar')

@section('title', 'Permission')

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
                    <h1 class="text-secondary row justify-content-center">Admin Permission</h1>
            <hr>

            <div class="container">
                <h1>User Role Management</h1>

                @if (isset($users) && isset($roles))
                  <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="user" class="col-sm-2 col-form-label">Select User:</label>
                        <div class="col-sm-10">
                          <select name="user" id="user" class="form-control">
                            @foreach ($users as $user)
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="roles" class="col-sm-2 col-form-label">Assign Roles:</label>
                        <div class="col-sm-10">
                          <div class="form-check form-check-inline">
                            @foreach ($roles as $role)
                              <input class="form-check-input" type="checkbox" id="role-{{ $role->id }}" name="roles[]" value="{{ $role->id }}">
                              <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>
                            @endforeach
                          </div>
                        </div>
                      </div>

                      <button type="submit" class="btn btn-primary">Update Roles</button>
                    </form>
                @else
                  <div class="alert alert-danger">
                    <p>An error occurred: User or role data is not available.</p>
                  </div>
                @endif
              </div>





    </main>

@endsection
