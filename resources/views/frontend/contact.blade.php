
@extends('frontend.index')

@section('title','contact')

@section('content')


<!--================================
=            Page Title            =
=================================-->

<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>Contact Us</h1>
				<!-- Page Description -->
				<p>Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta.</p>
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
              <div class="icon">
                <i class="ti-mobile"></i>
              </div>
              <div class="details">
                <h3>(Your Phone Number)</h3>  </div>
            </div>
            <div class="address-block text-center">
              <div class="icon">
                <i class="ti-map-alt"></i>
              </div>
              <div class="details">
                <h3>(Your Full Address)</h3>  </div>
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

<!--====  End of Address and Map  ====-->
<section class="contact-form section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="mb-5 text-center">Drop us a mail</h2>
			</div>
			<div class="col-12">
				<form action="">
					<div class="row">
						<!-- Name -->
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Name" required>
						</div>
						<!-- Email -->
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="email" placeholder="Your Email Address" required>
						</div>
						<!-- subject -->
						<div class="col-md-12 mb-2">
							<input class="form-control main" type="text" placeholder="Subject" required>
						</div>
						<!-- Message -->
						<div class="col-md-12 mb-2">
							<textarea class="form-control main" name="message" rows="10" placeholder="Your Message"></textarea>
						</div>
						<!-- Submit Button -->
						<div class="col-12 text-right">
							<button class="btn btn-main-md">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


@endsection
