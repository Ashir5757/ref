@extends('dashbord.navsidebar')

@section('title', 'Profile')

@section('content')






    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            {{-- <img src="{{ $profile ? url("storage/app/public/profile_images/1705407639.png") : asset("profile-images") }}" alt="Profile" class="rounded-circle"> --}}
                            <img src="{{asset(isset($profile->image) ? "storage/profile_images/".$profile->image : "assets/img/profile-img.jpg")}}" alt="Profile" class="rounded-circle">

                            <h2>{{ Auth::user()->name }}</h2>
                            <h3>{{ Auth::user()->email }}</h3>
                            <div class="social-links mt-2">
                                <a href="{{ $profile ? $profile->twitter : '#' }}" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="{{ $profile ? $profile->facebook : '#' }}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="{{ $profile ? $profile->instagram : '#' }}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="{{ $profile ? $profile->linkedin : '#' }}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>



                        </div>


                        <a href="#" class="trash"><span class="bi bi-trash">Delete Account</span></a>



                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                             <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">{{isset($profile) ? "Edit Profile" : "Add Profile"}}</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-settings">Settings</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">




                                    {{-- @if (Auth::check() && Auth::user()->profile) --}}
                                    {{-- @if (Profile::) --}}
                                    <h5 class="card-title">About</h5>
<p class="small fst-italic">{{ $profile ? $profile->about : '' }}</p>


                                            <h5 class="card-title">Profile Details</h5>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                                <div class="col-lg-9 col-md-8">{{ Auth::user()->name }} </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">Email</div>
                                                <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">Cnic</div>
                                                <div class="col-lg-9 col-md-8">{{ $profile ? $profile->cnic : '' }} </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">Country</div>
                                                <div class="col-lg-9 col-md-8">  {{ $profile ? $profile->country : '' }} </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">Address</div>
                                                <div class="col-lg-9 col-md-8">  {{ $profile ? $profile->address : '' }}  </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">Phone</div>
                                                <div class="col-lg-9 col-md-8">  {{ $profile ? $profile->phone : '' }}  </div>
                                            </div>


                                    {{-- @endif --}}

                                </div>

                                {{-- <h5 class="card-title">Profile Details</h5>

                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name }} </div>
                                </div>

                                <div class="row md-3">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                </div> --}}



                                {{-- Profile Edit --}}
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    {{-- @if (isset($errors)) --}}

                                        <div id="erroralert" class="alert alert-warning alert-dismissible fade show" role="alert">
                                            {{-- <strong id="error" >{{ $error }}</strong> <br> --}}
                                            <strong id="error" > </strong> <br>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>

                                {{-- @endif --}}
                                {{-- @if (Session::has('success')) --}}

                                <div id="successalert" class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong id="success"> </strong>
                                    {{-- <strong id="success">{{ session('success') }}</strong> --}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                    {{-- @endif --}}
                                    <!-- Profile Edit Form -->
                                    {{-- <form  id="addprofileform"> --}}
                                    <form id="addprofileform" action="{{route('add_profile')}}" method="POST" enctype="multipart/form-data" data-url="{{ route('add_profile') }}">
                                        @csrf


<div class="row mb-3">
    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
    <div class="col-md-8 col-lg-9">
        <img src="{{asset("assets/img/profile-img.jpg")}}" alt="Profile" class="mb-2 rounded"  id="file-preview">
        <input type="file" name="image" accept="image/*" onchange="showFile(event)" id="image" class="form-control">
        <div class="pt-2">
            <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
        </div>
    </div>
</div>



                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="about" class="form-control" id="about" value="{{ old('about') }}"  style="height: 100px">  </textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="company" class="col-md-4 col-lg-3 col-form-label">CNIC</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="cnic" type="text" class="form-control" id="CNIC"
                                                    value="{{ old('cnic') }}">
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="country" type="text" class="form-control" id="Country"
                                                    value="{{ old('country') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="Address"
                                                    value="{{ old('address') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone"
                                                    value="{{ old('phone') }}">
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="twitter" type="text" class="form-control" id="Twitter"
                                                    value="{{ old('twitter') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="facebook" type="text" class="form-control"
                                                    id="Facebook" value="{{ old('facebook') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="instagram" type="text" class="form-control"
                                                    id="Instagram" value="{{ old('instagram') }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin" type="text" class="form-control"
                                                    id="Linkedin" value="{{ old('linkedin') }}">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" id="addprofile">Save Changes</button>
                                        </div>
                                    </form>

                                    <!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings">

                                    <!-- Settings Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                                Notifications</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="changesMade"
                                                        checked>
                                                    <label class="form-check-label" for="changesMade">
                                                        Changes made to your account
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="newProducts"
                                                        checked>
                                                    <label class="form-check-label" for="newProducts">
                                                        Information on new products and services
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="proOffers">
                                                    <label class="form-check-label" for="proOffers">
                                                        Marketing and promo offers
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="securityNotify"
                                                        checked disabled>
                                                    <label class="form-check-label" for="securityNotify">
                                                        Security alerts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End settings Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control"
                                                    id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                    </div>

                                    </div><!-- End Bordered Tabs -->

                                    </div>
                                    </div>

                                    </div>
                                    </div>
                                    </section>

                                    </main><!-- End #main -->
                                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script>


    $(document).ready(function () {
        $("#erroralert").hide();
        $("#successalert").hide();

        var formSubmitted = false;

        $('#addprofileform').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            if (formSubmitted) {
                return; // If the form has already been submitted, do nothing
            }

            var formData = new FormData($(this)[0]);

            $.ajax({
                url: $(this).data('url'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Handle success response

                    // Set the formSubmitted variable to true to prevent further submissions
                    formSubmitted = true;
                    $("#successalert").show().text("Profile Added Successfully");
                    $("#erroralert").hide(); // Hide error alert if it's visible

                    // Scroll to the top of the page
                    $('html, body').scrollTop(0);
 // Adjust the duration as needed

                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                    var errors = xhr.responseJSON.errors;

                    $("#successalert").hide(); // Hide success alert if it's visible
                    $("#erroralert").show();
                    $("#error").empty(); // Clear previous error messages

                    $('html, body').scrollTop(0);
                    // Display each error message
                    if (errors.cnic) {
                        $("#error").append(errors.cnic + "<br>");
                    }
                    if (errors.country) {
                        $("#error").append(errors.country + "<br>");
                    }
                    if (errors.address) {
                        $("#error").append(errors.address + "<br>");
                    }
                    if (errors.phone) {
                        $("#error").append(errors.phone + "<br>");
                    }
                }
            });
        });
    });

</script>



   {{-- <script>
$(document).ready(function() {

$("#addprofileform").submit(function(e) {
  e.preventDefault();

var form = $("#addprofileform")[0];
var data = new FormData(form);
console.log(data)
  $("#addprofile").prop("disabled",true);


 $.ajax({

     type:"POST",
     url:"{{route('add_profile')}}",
     data:data,
     processData:false,
     contentType:false,
     success: function(data){

        $("#about").text(data.about);
        $("#cnic").text(data.cnic);
        $("#country").text(data.country);
        $("#address").text(data.address);
        $("#phone").text(data.phone);
        $("#twitter").text(data.twitter);
        $("#facebook").text(data.facebook);
        $("#instagram").text(data.instagram);
        $("#linkedin").text(data.linkedin);

     },
error:function(e){

}


    })

})


});




   </script> --}}


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
