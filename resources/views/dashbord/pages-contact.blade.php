@extends('dashbord.navsidebar')

@section('title', 'Contact')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Contact</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Contact</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section contact">


    <div class="col-xl-6">
        <div class="card p-4 ">
            <div class="col-sm-8 m-auto"><h1><b><u>Drop us a Mail</u></b></h1> </div>
            <div class="p-3">
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
              </div>
            <form action="{{route("user.receive.Mail")}}" method="post">
                @csrf
                @method('POST')
                <div class="row gy-4">

                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" >
                    </div>

                    <div class="col-md-6 ">
                        <input type="email" class="form-control" name="email" placeholder="Your Email" >
                    </div>

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="subject" placeholder="Subject" >
                </div>

                <div class="col-md-12">
                    <textarea class="form-control" name="textarea" rows="6" placeholder="Message" ></textarea>
                </div>
                    <button type="submit" class=" btn btn-primary">Send Message</button>
                </div>

            </div>
        </form>
    </div>

</div>

</div>

</section>

</main><!-- End #main -->

@endsection
