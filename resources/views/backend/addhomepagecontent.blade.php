@extends('backend.navsidebar')

@section('title', 'Add homepage')

@section('content')


<div class="container borderd p-3">

<div class="shadow rounded p-4">


    <div class="container p-5">
        <div class="m-3">
            <a href="{{ route("backend.homepage") }}" class="btn btn-outline-secondary float-end m-3">Go Back</a>
        </div>
        <h1 class="m-3">Add Home Page</h1>
        <div class="container mt-5">

            @if ($errors->any() )
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>
                    <ul> @foreach ($errors->all() as $error)
                            <li>{{ $error }} </li>
                        @endforeach</ul>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
                </button>
            </div>
        @elseif (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>
                    <ul>
                         <li>{{ Session::get('success') }}</li>
                    </ul>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
                </button>
            </div>
        @elseif (Session::has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>
                    <ul>
                        <li>
                        {{ Session::get('error') }}
                        </li>
                    </ul>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
                </button>
            </div>



        @endif

            <form method="post" action="{{ route('add.homepage') }}">
                @csrf
                @method('patch')

                @for ($i = 1; $i <= 32; $i++)
                    <div class="form-group">
                        <label for="h{{ $i }}">Field H{{ $i }}</label>
                        <input type="text" class="form-control mb-3" id="h{{ $i }}" name="h{{ $i }}">
                    </div>
                @endfor

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>



{{-- <div class="container p-5">
    <h1 class="m-3">Frontend page main Heading</h1>
    <div class="container mt-5">
        <form>
            <div class="form-group">
            <label for="h1">Field H1</label>
            <input type="text" class="form-control mb-3" id="h1" name="h1">
          </div>

          <div class="form-group">
            <label for="h2">Field H2</label>
            <input type="text" class="form-control mb-3" id="h2" name="h2">
          </div>

          <div class="form-group">
            <label for="h3">Field H3</label>
            <input type="text" class="form-control mb-3" id="h3" name="h3">
          </div>

          <div class="form-group">
            <label for="h4">Field H4</label>
            <input type="text" class="form-control mb-3" id="h4" name="h4">
          </div>

         <!-- Repeat the above block for h4 to h15 -->

<div class="form-group">
    <label for="h4">Field H4</label>
    <input type="text" class="form-control mb-3" id="h4" name="h4">
  </div>

  <div class="form-group">
    <label for="h5">Field H5</label>
    <input type="text" class="form-control mb-3" id="h5" name="h5">
  </div>

  <div class="form-group">
    <label for="h6">Field H6</label>
    <input type="text" class="form-control mb-3" id="h6" name="h6">
  </div>

  <div class="form-group">
    <label for="h7">Field H7</label>
    <input type="text" class="form-control mb-3" id="h7" name="h7">
  </div>

  <div class="form-group">
    <label for="h8">Field H8</label>
    <input type="text" class="form-control mb-3" id="h8" name="h8">
  </div>

  <div class="form-group">
    <label for="h9">Field H9</label>
    <input type="text" class="form-control mb-3" id="h9" name="h9">
  </div>

  <div class="form-group">
    <label for="h10">Field H10</label>
    <input type="text" class="form-control mb-3" id="h10" name="h10">
  </div>

  <div class="form-group">
    <label for="h11">Field H11</label>
    <input type="text" class="form-control mb-3" id="h11" name="h11">
  </div>

  <div class="form-group">
    <label for="h12">Field H12</label>
    <input type="text" class="form-control mb-3" id="h12" name="h12">
  </div>

  <div class="form-group">
    <label for="h13">Field H13</label>
    <input type="text" class="form-control mb-3" id="h13" name="h13">
  </div>

  <div class="form-group">
    <label for="h14">Field H14</label>
    <input type="text" class="form-control mb-3" id="h14" name="h14">
  </div>

  <div class="form-group">
    <label for="h15">Field H15</label>
    <input type="text" class="form-control mb-3" id="h15" name="h15">
  </div>


        </form>
      </div>
</div>--}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection
