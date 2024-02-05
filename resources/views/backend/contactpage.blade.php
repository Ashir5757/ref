
@extends('backend.navsidebar')

@section('title', 'Contact')

@section('content')


<div class="container borderd p-3">

    <div class="shadow rounded p-4">
        <div class="m-3">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary float-end m-3">Go Back</a>
        </div>
        <h1 class="text-info row justify-content-center">Contact page</h1>
<hr>

@if(isset($newContactpage))
<div class="m-3">
    <a href="{{ route('loade.edit.contactpage') }}" class="btn btn-outline-primary float-end m-3">Edit Contact Page</a>
</div>
@else


@endif

@if(isset($newContactpage))

@else
<div class="m-3">
    <a href="{{ route('loade.add.contactpage') }}" class="btn btn-outline-info float-end m-3">Add Contact Page Content</a>
</div>
@endif



<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Label</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>

        @if(isset($newContactpage))
            @for($i = 1; $i <= 4; $i++)
                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>Field H{{ $i }}</td>
                    <td>{{ $newContactpage["h$i"] ?? '' }}</td>
                </tr>
            @endfor
        @else
            <tr>
                <td colspan="3">No Contact page data available</td>
            </tr>
        @endif
    </tbody>
</table>


</div>
</div>


@endsection
