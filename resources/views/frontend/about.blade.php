@extends('frontend.index')

@section('title','About')

@section('content')


<!--================================
=            Page Title            =
=================================-->

<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>{{  isset($about->h1) ? $about->h1 :  "About Share&Care" }}  </h1>
				<!-- Page Description -->
				<p>{{  isset($about->h2) ? $about->h2 :  "
                    The mission of 'share and care' typically involves fostering a culture of empathy, generosity, and community support. It aims to encourage individuals to actively engage in acts of kindness, share resources with those in need, and provide support to vulnerable members of society. Ultimately, the mission is to create a more compassionate and equitable world where everyone feels valued and supported." }}</p>
			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->


<!--===============================
=            Our Story            =
================================-->
<section class="section about p-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 align-self-center">
				<div class="content text-center text-lg-left">
					<!-- Headline -->
					<h2>{{  isset($about->h3) ? $about->h3 :  "This Is Our Story." }}</h2>
					<!-- Story -->
@if (isset($about->h4) )

<p>{{  isset($about->h4) ?? $about->h4 }}</p>
@else
<div style="text-align: justify;">
    <p>
        Our story at Share and Care began with a vision to create a digital network and marketplace that truly empowers individuals. Fueled by a passion for innovation and collaboration, our journey started with a simple idea: to build a platform where people can come together to buy, sell, and share knowledge in a supportive and transparent environment.
    </p>
    <p>
        From humble beginnings, we have grown into a thriving community, driven by the collective efforts of our team and the support of our valued members. Along the way, we have faced challenges and obstacles, but each hurdle has only strengthened our resolve to create something truly special.
    </p>
    <p>
        As we continue to evolve and expand, our commitment to empowerment, collaboration, and transparency remains unwavering. We are proud of how far we have come, but we are even more excited about the journey ahead. Together, we are shaping the future of digital commerce and building a community where everyone has the opportunity to thrive and succeed.
    </p>
    <p>
        Our story is still being written, and we invite you to be a part of it. Join us as we continue to grow, innovate, and make a positive impact in the world. Together, we can achieve great things.
    </p>
</div>

@endif

				</div>
			</div>
			<div class="col-lg-6 mt-4 mt-lg-0">
				<!-- Story Image Slider -->
				<div class="about-slider">
					<!-- Story Image -->
					<div class="item">
						<img class="w-100" src="{{asset("assets/images/about/story-slider-01.jpg")}}" alt="slider-image">
					</div>
					<!-- Story Image -->
					<div class="item">
						<img class="w-100" src="{{asset("assets/images/about/story-slider-01.jpg")}}" alt="slider-image">
					</div>
					<!-- Story Image -->
					<div class="item">
						<img class="w-100" src="{{asset("assets/images/about/story-slider-01.jpg")}}" alt="slider-image">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Our Story  ====-->

<!--================================
=            Behind Story          =
=================================-->
<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title mb-0">
					<h2>{{  isset($about->h5) ? $about->h5 :  "This Is Our Story." }}</a></h2>
					<p>{{  isset($about->h6) ? $about->h6 :  "This Is Our Story." }}</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Behind Story  ====-->

<!--==================================
=            Create Story            =
===================================-->
<section class="section create-stories pt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="block">
					<!-- Image -->
					<img class="img-fluid" src="{{asset("assets/images/blog/post-01.jpg")}}" alt="Story-Image">
					<!-- Heading -->
					<h3>{{  isset($about->h7) ? $about->h7 :  "This Is Our Story." }}</h3>
					<!-- Story -->
					<p>{{  isset($about->h8) ? $about->h8 :  "This Is Our Story." }}</p>
				</div>
			</div>
			<div class="col-lg-6 mt-5 mt-lg-0">
				<div class="block">
					<!-- Image -->
					<img class="img-fluid" src="{{asset("assets/images/blog/post-03.jpg")}}" alt="Story-Image">
					<!-- Heading -->
					<h3>{{  isset($about->h9) ? $about->h9 :  "This Is Our Story." }}</h3>
					<!-- Story -->
					<p>{{  isset($about->h10) ? $about->h10 :  "This Is Our Story." }}</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Create Story  ====-->


<!--=====================================
=            Quotes Slider              =
======================================-->
<section class="section quotes pt-0">
	<div class="container">
		<div class="row">
			<div class="col-10 m-auto text-center">
				<div class="quote-slider">
					<div class="item mb-4">
						<!-- Quote -->
						<h2>{{  isset($about->h11) ? $about->h11 :  "This Is Our Story." }}</h2>

					</div>
					<div class="item mb-4">
						<!-- Quote -->
						<h2>{{  isset($about->h12) ? $about->h12 :  "This Is Our Story." }}</h2>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Quotes Slider  ====-->

<!--=====================================
=            Client Slider              =
======================================-->
<section class="section clients bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-10 m-auto text-center">
				<h3>{{  isset($about->h13) ? $about->h13 :  "This Is Our Story." }}</h3>
				<div class="client-slider">
					<div class="item mb-4">
						<img class="m-auto" src="{{asset("assets/images/clients/business-finder.png")}}" alt="business-finder">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="{{asset("assets/images/clients/forbes.png")}}" alt="forbes">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="{{asset("assets/images/clients/venture-beat.png")}}" alt="venture-beat">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="{{asset("assets/images/clients/tech-crunch-new.png")}}" alt="TechCrunch">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="{{asset("assets/images/clients/forbes.png")}}" alt="forbes">
					</div>
					<div class="item mb-4">
						<img class="m-auto" src="{{asset("assets/images/clients/venture-beat.png")}}" alt="venture-beat">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Client Slider  ====-->

<!--==============================
=            Investors           =
===============================-->
<section class="section investors">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>{{  isset($about->h14) ? $about->h14 :  "This Is Our Story." }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="{{asset("assets/images/team/marketing-team-01.jpg")}}" alt="investor">
					</div>
					<!-- Company -->
					<h3>{{  isset($about->h15) ? $about->h15 :  "This Is Our Story." }}</h3>
					<!--  -->
					<p>{{  isset($about->h16) ? $about->h16 :  "This Is Our Story." }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="{{asset("assets/images/team/marketing-team-02.jpg")}}" alt="investor">
					</div>
					<!-- Company -->
					<h3>{{  isset($about->h17) ? $about->h17 :  "This Is Our Story." }}</h3>
					<!--  -->
					<p>{{  isset($about->h18) ? $about->h18 :  "This Is Our Story." }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="{{asset("assets/images/team/marketing-team-03.jpg")}}" alt="investor">
					</div>
					<!-- Company -->
					<h3>{{  isset($about->h19) ? $about->h19 :  "This Is Our Story." }}</h3>
					<!--  -->
					<p>{{  isset($about->h20) ? $about->h20 :  "This Is Our Story." }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="{{asset("assets/images/team/design-team-01.jpg")}}" alt="investor">
					</div>
					<!-- Company -->
					<h3>{{  isset($about->h21) ? $about->h21 :  "This Is Our Story." }}</h3>
					<!--  -->
					<p>{{  isset($about->h22) ? $about->h22 :  "This Is Our Story." }}</p>
				</div>
			</div>

		</div>
	</div>
</section>



<!--=====================================
=            Section comment            =
======================================-->

<section class="section cta-hire bg-gary">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<!-- Hire Title -->
				<h2>{{  isset($about->h23) ? $about->h23 :  "This Is Our Story." }}</h2>
				<!-- Job Description -->
				<p>{{  isset($about->h24) ? $about->h24 :  "This Is Our Story." }}</p>
				<!-- Action Button -->
				<a href="contact.html" class="mt-3 btn btn-main-md">{{  isset($about->h25) ? $about->h25 :  "This Is Our Story." }}</a>
			</div>
		</div>
	</div>
</section>

<!--====  End of Section comment  ====-->
@endsection
