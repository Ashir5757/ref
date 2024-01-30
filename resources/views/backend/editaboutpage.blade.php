
@extends('backend.navsidebar')

@section('title', 'Edit_About_Page')

@section('content')



<div class="container borderd p-3">

    <div class="shadow rounded p-4">


        <div class="container p-5">
            <div class="m-3">
                <a href="{{ route("backend.aboutpage") }}" class="btn btn-outline-secondary float-end m-3">Go Back</a>
            </div>
            <h1 class="m-3">Edit About Page</h1>
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
                <form method="post" action="{{ route('update.aboutpage', ['id' => $aboutpage->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
    <hr class="m-5">

                         {{-- About Share&Care --}}

                    <div class="m-3"><h2><u> <i>About Share&Care </i></u>: </h2></div>

                    <div class="form-group">
                        <label for="h1">Field H1</label>
                        <input type="text" class="form-control mb-3" id="h1" name="h1" value="{{ old('h1', $aboutpage['h1']) }}">
                    </div>

                    <div class="form-group">
                        <label for="h2">Field H2</label>
                        <input type="text" class="form-control mb-3" id="h2" name="h2" value="{{ old('h2', $aboutpage['h2']) }}">
                    </div>

                    <img src="{{asset("assets/img/profile-img.jpg")}}" alt="Profile" class="mb-2 rounded" width="150px" id="file-preview">
                    <div class="form-group">
                        <label for="image1">Image 1</label>
                        <input type="file" class="form-control mb-3" accept="image/*" onchange="showFile(event)" id="image1" name="image1" value="{{ old('image1', $aboutpage['image1']) }}">
                    </div>


                    <hr class="m-5">



                    {{-- Our Story --}}

                    <div class="m-3"><h2><u> <i>Our Story</i></u>: </h2></div>


                    <div class="form-group">
                        <label for="h3">Field H3</label>
                        <input type="text" class="form-control mb-3" id="h3" name="h3" value="{{ old('h3', $aboutpage['h3']) }}">
                    </div>

                    <div class="form-group">
                        <label for="h4">Field H4</label>
                        <input type="text" class="form-control mb-3" id="h4" name="h4" value="{{ old('h4', $aboutpage['h4']) }}">
                    </div>

                    <hr class="m-5">
                    {{-- Why we created Small Apps --}}

                    <div class="m-3"><h2><u> <i>Why we created Small Apps</i></u>: </h2></div>



                    <div class="form-group">
                        <label for="h5">Field H5</label>
                        <input type="text" class="form-control mb-3" id="h5" name="h5" value="{{ old('h5', $aboutpage['h5']) }}">
                    </div>

                    <div class="form-group">
                        <label for="h6">Field H6</label>
                        <input type="text" class="form-control mb-3" id="h6" name="h6" value="{{ old('h6', $aboutpage['h6']) }}">
                    </div>

                    <div class="form-group">
                        <label for="h7">Field H7</label>
                        <input type="text" class="form-control mb-3" id="h7" name="h7" value="{{ old('h7', $aboutpage['h7']) }}">
                    </div>

                    <div class="form-group">
                        <label for="h8">Field H8</label>
                        <input type="text" class="form-control mb-3" id="h8" name="h8" value="{{ old('h8', $aboutpage['h8']) }}">
                    </div>



                    <div class="form-group">
                        <label for="h9">Field H9</label>
                        <input type="text" class="form-control mb-3" id="h9" name="h9" value="{{ old('h9', $aboutpage['h9']) }}">
                    </div>

                    <div class="form-group">
                        <label for="h10">Field H10</label>
                        <input type="text" class="form-control mb-3" id="h10" name="h10" value="{{ old('h10', $aboutpage['h10']) }}">
                    </div>

                    <hr class="m-5">

                                     {{-- Quotes --}}

                              <div class="m-3"><h2><u> <i>Quotes</i></u>: </h2></div>

                              <div class="form-group">
        <label for="h11">Field H11</label>
        <input type="text" class="form-control mb-3" id="h11" name="h11" value="{{ old('h11', $aboutpage['h11']) }}">
    </div>


    <div class="form-group">
        <label for="h12">Field H12</label>
        <input type="text" class="form-control mb-3" id="h12" name="h12" value="{{ old('h12', $aboutpage['h12']) }}">
    </div>

    <img src="{{asset("assets/img/profile-img.jpg")}}" alt="Profile" class="mb-2 rounded" width="150px" id="file-preview2">
    <div class="form-group">

        <label for="image2">Image 2</label>
        <input type="file" class="form-control mb-3" accept="image/*" onchange="showFile2(event)" id="image2" name="image2" value="{{ old('image2', $aboutpage['image2']) }}">
    </div>


    <hr class="m-5">

    {{-- Featured In  --}}

    <div class="m-3"><h2><u> <i>Featured In </i></u>: </h2></div>

    <div class="form-group">
        <label for="h13">Field H13</label>
        <input type="text" class="form-control mb-3" id="h13" name="h13" value="{{ old('h13', $aboutpage['h13']) }}">
    </div>

    <div class="form-group">
        <label for="h14">Field H14</label>
        <input type="text" class="form-control mb-3" id="h14" name="h14" value="{{ old('h14', $aboutpage['h14']) }}">
    </div>

    <div class="form-group">
        <label for="h15">Field H15</label>
        <input type="text" class="form-control mb-3" id="h15" name="h15" value="{{ old('h15', $aboutpage['h15']) }}">
    </div>


    <div class="form-group">
        <label for="h16">Field H16</label>
        <input type="text" class="form-control mb-3" id="h16" name="h16" value="{{ old('h16', $aboutpage['h16']) }}">
    </div>


    <div class="form-group">
        <label for="h17">Field H17</label>
        <input type="text" class="form-control mb-3" id="h17" name="h17" value="{{ old('h17', $aboutpage['h17']) }}">
    </div>



    <div class="form-group">
        <label for="h18">Field H18</label>
        <input type="text" class="form-control mb-3" id="h18" name="h18" value="{{ old('h18', $aboutpage['h18']) }}">
    </div>

    <hr class="m-5">

    {{-- Our Angel Investors  --}}

    <div class="m-3"><h2><u> <i>Our Angel Investors </i></u>: </h2></div>


    <div class="form-group">
        <label for="h19">Field H19</label>
        <input type="text" class="form-control mb-3" id="h19" name="h19" value="{{ old('h19', $aboutpage['h19']) }}">
    </div>


    <div class="form-group">
        <label for="h20">Field H20</label>
        <input type="text" class="form-control mb-3" id="h20" name="h20" value="{{ old('h20', $aboutpage['h20']) }}">
    </div>


    <div class="form-group">
        <label for="h21">Field H21</label>
        <input type="text" class="form-control mb-3" id="h21" name="h21" value="{{ old('h21', $aboutpage['h21']) }}">
    </div>


    <div class="form-group">
        <label for="h22">Field H22</label>
        <input type="text" class="form-control mb-3" id="h22" name="h22" value="{{ old('h22', $aboutpage['h22']) }}">
    </div>

    <img src="{{asset("assets/img/profile-img.jpg")}}" alt="Profile" class="mb-2 rounded" width="150px" id="file-preview3">
    <div class="form-group">

        <label for="image3">Image 3</label>
        <input type="file" class="form-control mb-3" accept="image/*" onchange="showFile3(event)" id="image3" name="image3" value="{{ old('image3', $aboutpage['image3']) }}">
    </div>







    <div class="form-group">
        <label for="h23">Field H23</label>
        <input type="text" class="form-control mb-3" id="h23" name="h23" value="{{ old('h23', $aboutpage['h23']) }}">
    </div>

    <div class="form-group">
        <label for="video"> <b>yt_video_Link</b></label>
        <input type="text" class="form-control mb-3" id="video" name="video" value="{{ old('video', $aboutpage['video']) }}">
    </div>



    <div class="form-group">
        <label for="h24">Field H24</label>
        <input type="text" class="form-control mb-3" id="h24" name="h24" value="{{ old('h24', $aboutpage['h24']) }}">
    </div>


    <div class="form-group">
        <label for="h25">Field H25</label>
        <input type="text" class="form-control mb-3" id="h25" name="h25" value="{{ old('h25', $aboutpage['h25']) }}">
    </div>


    <div class="form-group">
        <label for="h26">Field H26</label>
        <input type="text" class="form-control mb-3" id="h26" name="h26" value="{{ old('h26', $aboutpage['h26']) }}">
    </div>


    <div class="form-group">
        <label for="h27">Field H27</label>
        <input type="text" class="form-control mb-3" id="h27" name="h27" value="{{ old('h27', $aboutpage['h27']) }}">
    </div>

    <hr class="m-5">
    {{-- We are hunting Genius Developers  --}}

    <div class="m-3"><h2><u> <i>We are hunting Genius Developers</i></u>: </h2></div>

    <div class="form-group">
        <label for="h28">Field H28</label>
        <input type="text" class="form-control mb-3" id="h28" name="h28" value="{{ old('h28', $aboutpage['h28']) }}">
    </div>






    <div class="form-group">
        <label for="h29">Field H29</label>
        <input type="text" class="form-control mb-3" id="h29" name="h29" value="{{ old('h29', $aboutpage['h29']) }}">
    </div>


    <div class="form-group">
        <label for="h30">Field H30</label>
        <input type="text" class="form-control mb-3" id="h30" name="h30" value="{{ old('h30', $aboutpage['h30']) }}">
    </div>

    <div class="form-group">
        <label for="h31">Field H31</label>
        <input type="text" class="form-control mb-3" id="h31" name="h31" value="{{ old('h31', $aboutpage['h31']) }}">
    </div>

    <hr class="m-5">

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

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
