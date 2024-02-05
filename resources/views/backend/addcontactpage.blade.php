@extends('backend.navsidebar')

@section('title', 'Add Contactpage')

@section('content')




<div class="container borderd p-3">

    <div class="shadow rounded p-4">


        <div class="container p-5">
            <div class="m-3">
                <a href="{{ route("backend.contactpage") }}" class="btn btn-outline-secondary float-end m-3">Go Back</a>
            </div>
            <h1 class="m-3">Add Contact Page</h1>
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

                <form method="post" action="{{ route('add.contactpage') }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <hr class="m-5">


                         {{-- About Share&Care --}}

                    <div class="m-3"><h2><u> <i>Contact US</i></u>: </h2></div>
                                    <div class="form-group">
                                        <label for="h1">Field H1</label>
                                        <input type="text" class="form-control mb-3" id="h1" name="h1" value="{{old('h1')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="h2">Field H2</label>
                                        <input type="text" class="form-control mb-3" id="h2" name="h2"  value="{{old('h2')}}">
                                    </div>


                                    <hr class="m-5">

                                    {{-- Our Story --}}

                                    <div class="m-3"><h2><u> <i>Addition</i></u>: </h2></div>

                                    <img src="{{asset("assets/img/profile-img.jpg")}}" alt="Profile" class="mb-2 rounded" width="150px" id="file-preview"  value="{{old('image1')}}">
                                    <div class="form-group">
                                        <label for="image1">Image 1</label>
                                        <input type="file" class="form-control mb-3" accept="image/*" onchange="showFile(event)" id="image1" name="image1"  value="{{old('image1')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="h3">Field H3</label>
                                        <input type="text" class="form-control mb-3" id="h3" name="h3" value="{{old('h3')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="h4">Field H4</label>
                                        <input type="text" class="form-control mb-3" id="h4" name="h4" value="{{old('h4')}}">
                                    </div>

                                    <hr class="m-5">

                    <hr class="m-5">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <script>
            function showFile(event){
                 var input = event.target;
                 var reader = new FileReader();
                 reader.onload = function(){
                     var dataURL = reader.result;
                     var output = document.getElementById("file-preview");
                     output.src = dataURL;
                 }
                 reader.readAsDataURL(input.files[0]);
             }
         </script>
@endsection
