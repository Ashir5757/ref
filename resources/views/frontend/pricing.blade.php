@extends('frontend.index')
@section('title','Pricing')
@section("content")
<link rel="stylesheet" href="{{asset("assets/css/pricing.css")}}">
<section id="pricing" class="pricing-content section-padding vh-100">
	<div class="container">
		<div class="section-title text-center">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button></div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button></div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button></div>
        @endif

			<h2>Investment Plans</h2>
			<p>Expand your team boost your income!</p>
		</div>
		<div class="row text-center">
			<div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
				<div class="pricing_design">
					<div class="single-pricing">
						<div class="price-head">
							<h2>IP_I</h2>
							<h1>$20</h1>
							<span> <img src="{{asset("assets/images/istockphoto-496515029-612x612.jpg")}}" alt="" width="140px" style="border-radius: 10px"> </span>
						</div>
						<ul>
							<li><b>$5</b> Investment bonus</li>
							<li><b>$5</b> Referral bonus</li>
							<li><b>$5</b> Reward on 10 Points</li>
							<li><b>$10</b> Renewal in 6 month</li>
							<li><b>10</b> Subdomains</li>
							<li><b>Unlimited</b> Support</li>
						</ul>
						<div class="pricing-price">

						</div>
						<a href="{{route("payment")}}" class="price_btn">Order Now</a>
					</div>
				</div>
			</div><!--- END COL -->
			<div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInUp;">
				<div class="pricing_design">
					<div class="single-pricing">
						<div class="price-head">
							<h2>IP_II</h2>
							<h1 class="price">$40</h1>
							<span><img src="{{asset("assets/images/hardik-sharma-CrPAvN29Nhs-unsplash.jpg")}}" alt="" width="150px" style="border-radius: 10px"></span>
						</div>
						<ul>
                            <li><b>$10</b> Investment bonus</li>
							<li><b>$10</b> Referral bonus</li>
							<li><b>$10</b> Reward on 10 Points</li>
							<li><b>$10</b> Renewal in 6 month</li>
							<li><b>10</b> Subdomains</li>
							<li><b>Unlimited</b> Support</li>
						</ul>
						<div class="pricing-price">

                        </div>
						<a href="#" class="price_btn">Order Now</a>
					</div>
				</div>
			</div><!--- END COL -->
			<div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
				<div class="pricing_design">
                    <div class="single-pricing">
                        <div class="price-head">
                            <h2>IP_III</h2>
							<h1 class="price">$100</h1>
                            <span><img src="{{asset("assets/images/istockphoto-146955571-612x612.jpg")}}" alt="" width="150px" style="border-radius: 10px"></span>
						</div>
						<ul>
                            <li><b>$20</b> Investment bonus</li>
							<li><b>$20</b> Referral bonus</li>
							<li><b>$20</b> Reward on 10 Points</li>
							<li><b>$20</b> Renewal in 6 month</li>
							<li><b>10</b> Subdomains</li>
							<li><b>Unlimited</b> Support</li>
						</ul>
						<div class="pricing-price">

						</div>
						<a href="#" class="price_btn">Order Now</a>
					</div>
				</div>
			</div><!--- END COL -->
		</div><!--- END ROW -->
	</div><!--- END CONTAINER -->
</section>
@endsection
