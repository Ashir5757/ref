
@extends('frontend.index')

@section('title','contact')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!--================================
=            Page Title            =
=================================-->

<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>{{ isset($contact->h1) ? $contact->h1 : 'Contact Us'  }}</h1>

				<!-- Page Description -->
				<p>{{ isset($contact->h2) ? $contact->h2 : 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta.'  }}</p>
			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->


<!--=====================================
=            Address and Map            =
======================================-->
<section class="address">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 align-self-center">
          <div class="block">
            <div class="address-block text-center mb-5">
              <div class="details">
                <h3> {{ isset($contact->h3) ? $contact->h3 : '"Share&Care" is a brand, organization, project, or initiative, I recommend checking official websites, news articles, or any relevant sources for the most up-to-date and accurate information. Additionally, you might want to specify the context or industry in which Share&Care is mentioned for a more tailored response.'  }}</h3>  </div>
            </div>
            <div class="address-block text-center">
              <div class="details">
                <h3>{{ isset($contact->h4) ? $contact->h4 : 'project, or initiative, I recommend checking official websites, news articles, or any relevant sources for the most up-to-date and accurate information. Additionally, you might want to specify the context or industry in which Share&Car'  }}</h3>  </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7 mt-5 mt-lg-0">
          <div class="google-map">
            <div id="map_canvas" data-latitude="(Your Latitude)" data-longitude="(Your Longitude)"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
<div class="p-5">
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
<!--====  End of Address and Map  ====-->
<section class="contact-form section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="mb-5 text-center">Drop us a mail</h2>
			</div>
			<div class="col-12">
				<form action="{{route('receive.Mail')}}" method="POST">
                    @csrf
                    @method('POST')
					<div class="row">
						<!-- Name -->
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Name" name="name" id="name" required>
						</div>
						<!-- Email -->
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="email" placeholder="Your Email Address" name="email" id="email" required>
						</div>
						<!-- subject -->
						<div class="col-md-12 mb-2">
							<input class="form-control main" type="text" placeholder="Subject" name="subject" id="subject" required>
						</div>
						<!-- Message -->
						<div class="col-md-12 mb-2">
                            <textarea class="form-control main" placeholder="Your Message" name="textarea" id="textarea" rows="5" required></textarea>
                        </div>
						<!-- Submit Button -->
						<div class="col-12 text-right">
							<button class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


@endsection
