@extends('backend.navsidebar')

@section('title', 'Edit_Home_Page')

@section('content')


<div class="container borderd p-3">

<div class="shadow rounded p-4">


    <div class="container p-5">
        <div class="m-3">
            <a href="{{ route("backend.homepage") }}" class="btn btn-outline-secondary float-end m-3">Go Back</a>
        </div>
        <h1 class="m-3">Edit Home Page</h1>
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
        <div class="container mt-5">
            <form method="post" action="{{ route('update.homepage', ['id' => $homepage->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
<hr class="m-5">

                     {{-- Hero Section --}}

                <div class="m-3"><h2><u> <i>Hero Section</i></u>: </h2></div>

                <div class="form-group">
                    <label for="h1">Field H1</label>
                    <input type="text" class="form-control mb-3" id="h1" name="h1" value="{{ old('h1', $homepage['h1']) }}">
                </div>

                <div class="form-group">
                    <label for="h2">Field H2</label>
                    <input type="text" class="form-control mb-3" id="h2" name="h2" value="{{ old('h2', $homepage['h2']) }}">
                </div>

                <img src="{{asset("assets/img/profile-img.jpg")}}" alt="Profile" class="mb-2 rounded" width="150px" id="file-preview">
                <div class="form-group">
                    <label for="image1">Image 1</label>
                    <input type="file" class="form-control mb-3" accept="image/*" onchange="showFile(event)" id="image1" name="image1" value="{{ old('image1', $homepage['image1']) }}">
                </div>




 <hr class="m-5">

                   {{-- Second Component --}}

                <div class="m-3"><h2><u> <i>Second Component</i></u>: </h2></div>


                <div class="form-group">
                    <label for="h3">Field H3</label>
                    <input type="text" class="form-control mb-3" id="h3" name="h3" value="{{ old('h3', $homepage['h3']) }}">
                </div>

                <div class="form-group">
                    <label for="h4">Field H4</label>
                    <input type="text" class="form-control mb-3" id="h4" name="h4" value="{{ old('h4', $homepage['h4']) }}">
                </div>

                <div class="form-group">
                    <label for="h5">Field H5</label>
                    <input type="text" class="form-control mb-3" id="h5" name="h5" value="{{ old('h5', $homepage['h5']) }}">
                </div>

                <div class="form-group">
                    <label for="h6">Field H6</label>
                    <input type="text" class="form-control mb-3" id="h6" name="h6" value="{{ old('h6', $homepage['h6']) }}">
                </div>

                <div class="form-group">
                    <label for="h7">Field H7</label>
                    <input type="text" class="form-control mb-3" id="h7" name="h7" value="{{ old('h7', $homepage['h7']) }}">
                </div>

                <div class="form-group">
                    <label for="h8">Field H8</label>
                    <input type="text" class="form-control mb-3" id="h8" name="h8" value="{{ old('h8', $homepage['h8']) }}">
                </div>

<hr class="m-5">

                  {{-- Third Component --}}

<div class="m-3"><h2><u> <i>Third Component</i></u>: </h2></div>

                <div class="form-group">
                    <label for="h9">Field H9</label>
                    <input type="text" class="form-control mb-3" id="h9" name="h9" value="{{ old('h9', $homepage['h9']) }}">
                </div>

                <div class="form-group">
                    <label for="h10">Field H10</label>
                    <input type="text" class="form-control mb-3" id="h10" name="h10" value="{{ old('h10', $homepage['h10']) }}">
                </div>

<div class="form-group">
    <label for="h11">Field H11</label>
    <input type="text" class="form-control mb-3" id="h11" name="h11" value="{{ old('h11', $homepage['h11']) }}">
</div>


<div class="form-group">
    <label for="h12">Field H12</label>
    <input type="text" class="form-control mb-3" id="h12" name="h12" value="{{ old('h12', $homepage['h12']) }}">
</div>

<img src="{{asset("assets/img/profile-img.jpg")}}" alt="Profile" class="mb-2 rounded" width="150px" id="file-preview2">
<div class="form-group">

    <label for="image2">Image 2</label>
    <input type="file" class="form-control mb-3" accept="image/*" onchange="showFile2(event)" id="image2" name="image2" value="{{ old('image2', $homepage['image2']) }}">
</div>


<hr class="m-5">

             {{-- Fourth Component --}}

      <div class="m-3"><h2><u> <i>Fourth Component</i></u>: </h2></div>

<div class="form-group">
    <label for="h13">Field H13</label>
    <input type="text" class="form-control mb-3" id="h13" name="h13" value="{{ old('h13', $homepage['h13']) }}">
</div>

<div class="form-group">
    <label for="h14">Field H14</label>
    <input type="text" class="form-control mb-3" id="h14" name="h14" value="{{ old('h14', $homepage['h14']) }}">
</div>

<div class="form-group">
    <label for="h15">Field H15</label>
    <input type="text" class="form-control mb-3" id="h15" name="h15" value="{{ old('h15', $homepage['h15']) }}">
</div>


<div class="form-group">
    <label for="h16">Field H16</label>
    <input type="text" class="form-control mb-3" id="h16" name="h16" value="{{ old('h16', $homepage['h16']) }}">
</div>


<div class="form-group">
    <label for="h17">Field H17</label>
    <input type="text" class="form-control mb-3" id="h17" name="h17" value="{{ old('h17', $homepage['h17']) }}">
</div>



<div class="form-group">
    <label for="h18">Field H18</label>
    <input type="text" class="form-control mb-3" id="h18" name="h18" value="{{ old('h18', $homepage['h18']) }}">
</div>


<div class="form-group">
    <label for="h19">Field H19</label>
    <input type="text" class="form-control mb-3" id="h19" name="h19" value="{{ old('h19', $homepage['h19']) }}">
</div>


<div class="form-group">
    <label for="h20">Field H20</label>
    <input type="text" class="form-control mb-3" id="h20" name="h20" value="{{ old('h20', $homepage['h20']) }}">
</div>


<div class="form-group">
    <label for="h21">Field H21</label>
    <input type="text" class="form-control mb-3" id="h21" name="h21" value="{{ old('h21', $homepage['h21']) }}">
</div>


<div class="form-group">
    <label for="h22">Field H22</label>
    <input type="text" class="form-control mb-3" id="h22" name="h22" value="{{ old('h22', $homepage['h22']) }}">
</div>

<img src="{{asset("assets/img/profile-img.jpg")}}" alt="Profile" class="mb-2 rounded" width="150px" id="file-preview3">
<div class="form-group">

    <label for="image3">Image 3</label>
    <input type="file" class="form-control mb-3" accept="image/*" onchange="showFile3(event)" id="image3" name="image3" value="{{ old('image3', $homepage['image3']) }}">
</div>


<hr class="m-5">

{{-- Fifth video Component --}}

<div class="m-3"><h2><u> <i>Fifth video Component</i></u>: </h2></div>

<div class="form-group">
    <label for="h23">Field H23</label>
    <input type="text" class="form-control mb-3" id="h23" name="h23" value="{{ old('h23', $homepage['h23']) }}">
</div>

<div class="form-group">
    <label for="video"> <b>yt_video_Link</b></label>
    <input type="text" class="form-control mb-3" id="video" name="video" value="{{ old('video', $homepage['video']) }}">
</div>

<hr class="m-5">

{{-- Sixth Component --}}

<div class="m-3"><h2><u> <i>Sixth Component</i></u>: </h2></div>

<div class="form-group">
    <label for="h24">Field H24</label>
    <input type="text" class="form-control mb-3" id="h24" name="h24" value="{{ old('h24', $homepage['h24']) }}">
</div>


<div class="form-group">
    <label for="h25">Field H25</label>
    <input type="text" class="form-control mb-3" id="h25" name="h25" value="{{ old('h25', $homepage['h25']) }}">
</div>


<div class="form-group">
    <label for="h26">Field H26</label>
    <input type="text" class="form-control mb-3" id="h26" name="h26" value="{{ old('h26', $homepage['h26']) }}">
</div>


<div class="form-group">
    <label for="h27">Field H27</label>
    <input type="text" class="form-control mb-3" id="h27" name="h27" value="{{ old('h27', $homepage['h27']) }}">
</div>


<div class="form-group">
    <label for="h28">Field H28</label>
    <input type="text" class="form-control mb-3" id="h28" name="h28" value="{{ old('h28', $homepage['h28']) }}">
</div>


<div class="form-group">
    <label for="h29">Field H29</label>
    <input type="text" class="form-control mb-3" id="h29" name="h29" value="{{ old('h29', $homepage['h29']) }}">
</div>

<hr class="m-5">

           {{-- Seventh Component --}}

<div class="m-3"><h2><u> <i>Seventh Component</i></u>: </h2></div>

<div class="form-group">
    <label for="h30">Field H30</label>
    <input type="text" class="form-control mb-3" id="h30" name="h30" value="{{ old('h30', $homepage['h30']) }}">
</div>

<div class="form-group">
    <label for="h31">Field H31</label>
    <input type="text" class="form-control mb-3" id="h31" name="h31" value="{{ old('h31', $homepage['h31']) }}">
</div>

                <div class="form-group">
                    <label for="h32">Field H32</label>
                    <input type="text" class="form-control mb-3" id="h32" name="h32" value="{{ old('h32', $homepage['h32']) }}">
                </div>

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
<script>
    function showFile2(event){
         var input = event.target;
         var reader = new FileReader();
         reader.onload = function(){
             var dataURL = reader.result;
             var output = document.getElementById("file-preview2");
             output.src = dataURL;
         }
         reader.readAsDataURL(input.files[0]);
     }
 </script>
<script>
    function showFile3(event){
         var input = event.target;
         var reader = new FileReader();
         reader.onload = function(){
             var dataURL = reader.result;
             var output = document.getElementById("file-preview3");
             output.src = dataURL;
         }
         reader.readAsDataURL(input.files[0]);
     }
 </script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection
