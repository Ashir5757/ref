@extends('frontend.index')

@section('title','Main')

@section('content')


<!--====================================
=            Hero Section            =
=====================================-->
<section class="section gradient-banner">
	<div class="shapes-container">
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"></div>
		<div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="zoom-out" data-aos-duration="2000" data-aos-delay="500"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0"></div>
		<div class="shape" data-aos="fade-down" data-aos-duration="500" data-aos-delay="0"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="0"></div>
	</div>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 order-2 order-md-1 text-center text-md-left">
				<h1 class="text-white font-weight-bold mb-4">{{  isset($home->h1) ? $home->h1 :  "Synergy Sparks Growth- Together We Work, Together We Grow" }}</h1>
				<p class="text-white mb-5">{{ isset($home->h2) ? $home->h2 : "Default text for h2 if not set" }}</p>
				<a href="{{route("register")}}" class="btn btn-primary p-3 m-2">Sign up</a>
				<a href="{{route("login")}}" class="btn btn-info p-3 m-2">Sign in</a>
			</div>
			<div class="col-md-6 text-center order-1 order-md-2">
				{{-- <img class="img-fluid" src="{{asset("assets/images/mobile.png")}}" alt="screenshot"> --}}
			<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container container" >
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
    {
    "colorTheme": "light",
    "dateRange": "12M",
    "showChart": true,
    "locale": "en",
    "largeChartUrl": "",
    "isTransparent": false,
    "showSymbolLogo": true,
    "showFloatingTooltip": false,
    "width": "400",
    "height": "660",
    "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
    "plotLineColorFalling": "rgba(41, 98, 255, 1)",
    "gridLineColor": "rgba(240, 243, 250, 0)",
    "scaleFontColor": "rgba(106, 109, 120, 1)",
    "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
    "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
    "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
    "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
    "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
    "tabs": [
      {
        "title": "Indices",
        "symbols": [
          {
            "s": "FOREXCOM:SPXUSD",
            "d": "S&P 500"
          },
          {
            "s": "FOREXCOM:NSXUSD",
            "d": "US 100"
          },
          {
            "s": "FOREXCOM:DJI",
            "d": "Dow 30"
          },
          {
            "s": "INDEX:NKY",
            "d": "Nikkei 225"
          },
          {
            "s": "INDEX:DEU40",
            "d": "DAX Index"
          },
          {
            "s": "FOREXCOM:UKXGBP",
            "d": "UK 100"
          }
        ],
        "originalTitle": "Indices"
      },
      {
        "title": "Futures",
        "symbols": [
          {
            "s": "CME_MINI:ES1!",
            "d": "S&P 500"
          },
          {
            "s": "CME:6E1!",
            "d": "Euro"
          },
          {
            "s": "COMEX:GC1!",
            "d": "Gold"
          },
          {
            "s": "NYMEX:CL1!",
            "d": "WTI Crude Oil"
          },
          {
            "s": "NYMEX:NG1!",
            "d": "Gas"
          },
          {
            "s": "CBOT:ZC1!",
            "d": "Corn"
          }
        ],
        "originalTitle": "Futures"
      },
      {
        "title": "Bonds",
        "symbols": [
          {
            "s": "CBOT:ZB1!",
            "d": "T-Bond"
          },
          {
            "s": "CBOT:UB1!",
            "d": "Ultra T-Bond"
          },
          {
            "s": "EUREX:FGBL1!",
            "d": "Euro Bund"
          },
          {
            "s": "EUREX:FBTP1!",
            "d": "Euro BTP"
          },
          {
            "s": "EUREX:FGBM1!",
            "d": "Euro BOBL"
          }
        ],
        "originalTitle": "Bonds"
      },
      {
        "title": "Forex",
        "symbols": [
          {
            "s": "FX:EURUSD",
            "d": "EUR to USD"
          },
          {
            "s": "FX:GBPUSD",
            "d": "GBP to USD"
          },
          {
            "s": "FX:USDJPY",
            "d": "USD to JPY"
          },
          {
            "s": "FX:USDCHF",
            "d": "USD to CHF"
          },
          {
            "s": "FX:AUDUSD",
            "d": "AUD to USD"
          },
          {
            "s": "FX:USDCAD",
            "d": "USD to CAD"
          }
        ],
        "originalTitle": "Forex"
      }
    ]
  }
    </script>
  </div>
  <!-- TradingView Widget END -->
            </div>
		</div>
	</div>
</section>
<!--====  End of Hero Section  ====-->

<section class="section pt-0 position-relative pull-top">
    <div class="container">
        <div class="rounded shadow p-5 bg-white">
            <div class="row">
                <div class="col-lg-4 col-md-6 mt-5 mt-md-0 text-center">
                    <i class="ti-paint-bucket text-primary h1"></i>
                    <h3 class="mt-4 text-capitalize h5 ">{{ isset($home->h3) ? $home->h3 : "Default text for h3 if not set" }}</h3>
                    <p class="regular text-muted">{{ isset($home->h4) ? $home->h4 : "Default text for h4 if not set" }}</p>
                </div>
                <div class="col-lg-4 col-md-6 mt-5 mt-md-0 text-center">
                    <i class="ti-shine text-primary h1"></i>
                    <h3 class="mt-4 text-capitalize h5 ">{{ isset($home->h5) ? $home->h5 : "Default text for h5 if not set" }}</h3>
                    <p class="regular text-muted">{{ isset($home->h6) ? $home->h6 : "Default text for h6 if not set" }}</p>
                </div>
                <div class="col-lg-4 col-md-12 mt-5 mt-lg-0 text-center">
                    <i class="ti-thought text-primary h1"></i>
                    <h3 class="mt-4 text-capitalize h5 ">{{ isset($home->h7) ? $home->h7 : "Default text for h7 if not set" }}</h3>
                    <p class="regular text-muted">{{ isset($home->h8) ? $home->h8 : "Default text for h8 if not set" }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==================================
=            Feature Grid            =
===================================-->
<section class="feature section pt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 ml-auto justify-content-center">
				<!-- Feature Mockup -->
				<div class="image-content" data-aos="fade-right">
					{{-- <img class="img-fluid" src="{{asset("assets/images/feature/feature-new-01.jpg")}}" alt="iphone"> --}}
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container container" >
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
    {
    "width": 520,
    "height": 450,
    "symbolsGroups": [
      {
        "name": "Indices",
        "originalName": "Indices",
        "symbols": [
          {
            "name": "FOREXCOM:SPXUSD",
            "displayName": "S&P 500"
          },
          {
            "name": "FOREXCOM:NSXUSD",
            "displayName": "US 100"
          },
          {
            "name": "FOREXCOM:DJI",
            "displayName": "Dow 30"
          },
          {
            "name": "INDEX:NKY",
            "displayName": "Nikkei 225"
          },
          {
            "name": "INDEX:DEU40",
            "displayName": "DAX Index"
          },
          {
            "name": "FOREXCOM:UKXGBP",
            "displayName": "UK 100"
          }
        ]
      },
      {
        "name": "Futures",
        "originalName": "Futures",
        "symbols": [
          {
            "name": "CME_MINI:ES1!",
            "displayName": "S&P 500"
          },
          {
            "name": "CME:6E1!",
            "displayName": "Euro"
          },
          {
            "name": "COMEX:GC1!",
            "displayName": "Gold"
          },
          {
            "name": "NYMEX:CL1!",
            "displayName": "WTI Crude Oil"
          },
          {
            "name": "NYMEX:NG1!",
            "displayName": "Gas"
          },
          {
            "name": "CBOT:ZC1!",
            "displayName": "Corn"
          }
        ]
      },
      {
        "name": "Bonds",
        "originalName": "Bonds",
        "symbols": [
          {
            "name": "CBOT:ZB1!",
            "displayName": "T-Bond"
          },
          {
            "name": "CBOT:UB1!",
            "displayName": "Ultra T-Bond"
          },
          {
            "name": "EUREX:FGBL1!",
            "displayName": "Euro Bund"
          },
          {
            "name": "EUREX:FBTP1!",
            "displayName": "Euro BTP"
          },
          {
            "name": "EUREX:FGBM1!",
            "displayName": "Euro BOBL"
          }
        ]
      },
      {
        "name": "Forex",
        "originalName": "Forex",
        "symbols": [
          {
            "name": "FX:EURUSD",
            "displayName": "EUR to USD"
          },
          {
            "name": "FX:GBPUSD",
            "displayName": "GBP to USD"
          },
          {
            "name": "FX:USDJPY",
            "displayName": "USD to JPY"
          },
          {
            "name": "FX:USDCHF",
            "displayName": "USD to CHF"
          },
          {
            "name": "FX:AUDUSD",
            "displayName": "AUD to USD"
          },
          {
            "name": "FX:USDCAD",
            "displayName": "USD to CAD"
          }
        ]
      }
    ],
    "showSymbolLogo": true,
    "isTransparent": false,
    "colorTheme": "light",
    "locale": "en"
  }
    </script>
  </div>
  <!-- TradingView Widget END -->
				</div>
			</div>
			<div class="col-lg-6 mr-auto align-self-center">
                <div class="feature-content">
                    <!-- Feature Title -->
                    <h2>{{ isset($home->h9) ? $home->h9 : "Default Title if h9 is not set" }}</h2>
                    <!-- Feature Description -->
                    <p class="desc">{{ isset($home->h10) ? $home->h10 : "Default Description if h10 is not set" }}</p>
                </div>
                <!-- Testimonial Quote -->
                <div class="testimonial">
                    <p>
                        {{ isset($home->h11) ? $home->h11 : "Default Testimonial Quote if h11 is not set" }}
                    </p>
                    <ul class="list-inline meta">
                        <li class="list-inline-item">
                            <img src="{{ asset("assets/images/testimonial/feature-testimonial-thumb.jpg") }}" alt="">
                        </li>
                        <li class="list-inline-item">{{ isset($home->h12) ? $home->h12 : "Default Meta if h12 is not set" }}</li>
                    </ul>
                </div>
            </div>

		</div>
	</div>
</section>


<!--====  End of Feature Grid  ====-->

<!--==============================
=            Services            =
===============================-->
<section class="service section bg-gray">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-lg-12">
                <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
    {
    "symbols": [
      {
        "proName": "FOREXCOM:SPXUSD",
        "title": "S&P 500"
      },
      {
        "proName": "FOREXCOM:NSXUSD",
        "title": "US 100"
      },
      {
        "proName": "FX_IDC:EURUSD",
        "title": "EUR to USD"
      },
      {
        "proName": "BITSTAMP:BTCUSD",
        "title": "Bitcoin"
      },
      {
        "proName": "BITSTAMP:ETHUSD",
        "title": "Ethereum"
      }
    ],
    "showSymbolLogo": true,
    "isTransparent": false,
    "displayMode": "adaptive",
    "colorTheme": "light",
    "locale": "en"
  }
    </script>
  </div>
  <!-- TradingView Widget END -->
  <div class="section-title">
    <h2>{{ isset($home->h13) ? $home->h13 : "Default Title if h13 is not set" }}</h2>
    <p>{{ isset($home->h14) ? $home->h14 : "Default Description if h14 is not set" }}</p>
</div>

			</div>
		</div>
		<div class="row no-gutters">
			<div class="col-lg-6 align-self-center">
				<!-- Feature Image -->
				<div class="service-thumb left" data-aos="fade-right">
					<img class="img-fluid rounded shadow" src="{{asset("assets/images/feature/Teamwork.png")}}" alt="iphone-ipad">
				</div>
			</div>
			<div class="col-lg-5 mr-auto align-self-center">
				<div class="service-box">
					<div class="row align-items-center">
						<div class="col-md-6 col-xs-12">
							<!-- Service 01 -->
							<div class="service-item">
								<!-- Icon -->
								<i class="ti-bookmark"></i>
								<!-- Heading -->
								<h3>{{ isset($home->h15) ? $home->h15 : "Default Title if h15 is not set" }}</h3>
<!-- Description -->
<p>{{ isset($home->h16) ? $home->h16 : "Default Description if h16 is not set" }}</p>

							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<!-- Service 01 -->
							<div class="service-item">
								<!-- Icon -->
								<i class="ti-pulse"></i>
								<!-- Heading -->
								<h3>{{ isset($home->h17) ? $home->h17 : "Default Title if h17 is not set" }}</h3>
<!-- Description -->
<p>{{ isset($home->h18) ? $home->h18 : "Default Description if h18 is not set" }}</p>

							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<!-- Service 01 -->
							<div class="service-item">
								<!-- Icon -->
								<i class="ti-bar-chart"></i>
								<!-- Heading -->
								<h3>{{ isset($home->h19) ? $home->h19 : "Default Title if h19 is not set" }}</h3>
<!-- Description -->
<p>{{ isset($home->h20) ? $home->h20 : "Default Description if h20 is not set" }}</p>

							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<!-- Service 01 -->
							<div class="service-item">
								<!-- Icon -->
								<i class="ti-panel"></i>
								<!-- Heading -->
								<h3>{{ isset($home->h21) ? $home->h21 : "Default Title if h21 is not set" }}</h3>
<!-- Description -->
<p>{{ isset($home->h22) ? $home->h22 : "Default Description if h22 is not set" }}</p>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Services  ====-->


<!--=================================
=            Video Promo            =
==================================-->
<section class="video-promo section bg-1">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="content-block">
					<!-- Heading -->
					<h2>Watch Our Promo Video</h2>
					<!-- Promotional Speech -->
					<p>{{ isset($home->h23) ? $home->h23 : "Default testimonial text if h23 is not set" }}</p>
					<!-- Popup Video -->
					<a data-fancybox href="{{$home->video}}">
						<i class="ti-control-play video"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Video Promo  ====-->

<!--=================================
=            Testimonial            =
==================================-->
<section class="section testimonial" id="testimonial">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- Testimonial Slider -->
				<div class="testimonial-slider owl-carousel owl-theme">
					<!-- Testimonial 01 -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<p>
								{{ isset($home->h24) ? $home->h24 : "Default testimonial text if h24 is not set" }}
							</p>
							<!-- Person Thumb -->
							<div class="image">
								<img src="{{asset("assets/images/testimonial/feature-testimonial-thumb.jpg")}}" alt="image">
							</div>
							<!-- Name and Company -->
							<cite>{{ isset($home->h25) ? $home->h25 : "Default name and company if h25 is not set" }}</cite>
						</div>
					</div>
					<!-- Testimonial 01 -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<p>
                                {{ isset($home->h26) ? $home->h26 : "Default testimonial text if h26 is not set" }}
							</p>
							<!-- Person Thumb -->
							<div class="image">
								<img src="{{asset("assets/images/testimonial/feature-testimonial-thumb.jpg")}}" alt="image">
							</div>
							<!-- Name and Company -->
							<cite>{{ isset($home->h27) ? $home->h27 : "Default name and company if h27 is not set" }}</cite>
						</div>
					</div>
					<!-- Testimonial 01 -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<p>
								{{ isset($home->h28) ? $home->h28 : "Default testimonial text if h28 is not set" }}
							</p>
							<!-- Person Thumb -->
							<div class="image">
								<img src="{{asset("assets/images/testimonial/feature-testimonial-thumb.jpg")}}" alt="image">
							</div>
							<!-- Name and Company -->
							<cite>{{ isset($home->h29) ? $home->h29 : "Default name and company if h29 is not set" }}</cite>
						</div>
					</div>
					{{-- <!-- Testimonial 01 -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<p>
								Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada.
								Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor
								sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi,
								pretium ut lacinia in, elementum id enim.
							</p>
							<!-- Person Thumb -->
							<div class="image">
								<img src="{{asset("assets/images/testimonial/feature-testimonial-thumb.jpg")}}" alt="image">
							</div>
							<!-- Name and Company -->
							<cite>Abraham Linkon , Themefisher.com</cite>
						</div>
					</div> --}}
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Testimonial  ====-->

<section class="call-to-action-app section bg-blue">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>{{isset($home->h30) ? $home->h30 : "It's time to change your mind"}}</h2>
				<p>{{isset($home->h31) ? $home->h31 : 'Default value for h31'}}
					<br>{{isset($home->h32) ? $home->h32 : 'Default value for h32'}}</p>
				{{-- <ul class="list-inline">
					<li class="list-inline-item">
						<a href="" class="btn btn-rounded-icon">
							<i class="ti-apple"></i>
							Iphone
						</a>
					</li>
					<li class="list-inline-item">
						<a href="" class="btn btn-rounded-icon">
							<i class="ti-android"></i>
							Android
						</a>
					</li>
					<li class="list-inline-item">
						<a href="" class="btn btn-rounded-icon">
							<i class="ti-microsoft-alt"></i>
							Windows
						</a>
					</li>
				</ul> --}}
			</div>
		</div>
	</div>
</section>
@endsection
