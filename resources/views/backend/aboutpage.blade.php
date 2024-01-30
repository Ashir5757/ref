@extends('backend.navsidebar')

@section('title', 'Aboutpage')

@section('content')


<div class="container borderd p-3">

    <div class="shadow rounded p-4">
        <div class="m-3">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary float-end m-3">Go Back</a>
        </div>
        <h1 class="text-info row justify-content-center">About page</h1>
<hr>

@if(isset($newAboutpage))
<div class="m-3">
    <a href="{{ route('loade.edit.aboutpage') }}" class="btn btn-outline-primary float-end m-3">Edit About Page</a>
</div>
@else


@endif

@if(isset($newAboutpage))

@else
<div class="m-3">
    <a href="{{ route('loade.add.aboutpage') }}" class="btn btn-outline-info float-end m-3">Add About Page Content</a>
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

        @if(isset($newAboutpage))
            @for($i = 1; $i <= 31; $i++)
                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>Field H{{ $i }}</td>
                    <td>{{ $newAboutpage["h$i"] ?? '' }}</td>
                </tr>
            @endfor
        @else
            <tr>
                <td colspan="3">No About page data available</td>
            </tr>
        @endif
    </tbody>
</table>


</div>
</div>

@endsection
