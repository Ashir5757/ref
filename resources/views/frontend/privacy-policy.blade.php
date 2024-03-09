@extends('frontend.index')
@section('title','Privacy')
@section("content")


<!--================================
=            Page Title            =
=================================-->

<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>Policy</h1>
				<!-- Page Description -->
				<p>Our policy at Share and Care revolves around three key principles: </p>

                <p>
                    Empowerment, Collaboration, Transparency.

                </p>


			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->


<!--====================================
=            Privacy Policy            =
=====================================-->
<section class="privacy section pt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<nav class="privacy-nav">
					<ul>
						<li><a class="nav-link scrollTo" href="#userLicense" class="scrollTo">Client Policy</a></li>
						<li><a class="nav-link scrollTo" href="#disclaimer" class="scrollTo">Disclaimer</a></li>
						<li><a class="nav-link scrollTo" href="#limitations" class="scrollTo">Limitations</a></li>
					</ul>
				</nav>
			</div>
			<div class="col-lg-9">
				<div class="block">
					<!-- User License -->
					<div id="userLicense" class="policy-item">
						<div class="title">
							<h3>Client Policy</h3>
						</div>
						<div class="policy-details">
							<p>Membership Benefits: By joining Share and Care, clients gain access to our growing network and marketplace where they can buy and sell products and services. Each point within our network holds a value of $3.58, providing tangible benefits for active participants.</p>
							<p>Golden Plans: Clients seeking to invest in our network and enhance their participation can opt for our exclusive Golden Plans, designed to maximize their shareholding and network growth.
                            </p>
                            <p>
                                Member Contributions: We value the contributions of our members, who are encouraged to share their expertise and insights through blogs and knowledge sharing, fostering a collaborative environment within our community.
                            </p>
						</div>
					</div>
					<!-- Disclaimer -->
					<div id="disclaimer" class="policy-item">
						<div class="title">
							<h3>Disclaimer</h3>
						</div>
						<div class="policy-details">
                            <p>
                                Risk Disclosure: While Share and Care strives to provide a reliable and secure platform for buying, selling, and networking, clients should be aware of the inherent risks associated with online transactions and investment activities. We advise clients to conduct thorough research and exercise caution when engaging in financial transactions or sharing personal information within our network.
                            </p>
                            <p>
                                Limitation of Liability: Share and Care shall not be held liable for any direct or indirect damages, losses, or disruptions arising from the use of our platform or services. Clients acknowledge and accept that participation in our network involves inherent risks, and they agree to indemnify Share and Care against any claims or liabilities arising from their actions or transactions.
                            </p>
                            <p>
                                Third-Party Content: Share and Care may feature third-party content, links, or advertisements within our platform. While we strive to ensure the quality and accuracy of such content, we cannot guarantee its reliability or endorse the views expressed therein. Clients are advised to exercise discretion and verify the credibility of third-party sources before relying on any information or engaging in related activities.
                            </p>
                            </div>
					</div>
					<!-- Limitations -->
					<div id="limitations" class="policy-item">
						<div class="title">
							<h3>Limitations</h3>
						</div>
						<div class="policy-details">
							<p>While Share and Care strives to provide a user-friendly and secure platform for conducting transactions and networking, it's important to acknowledge certain limitations. These include:</p>
                            <p>
                                Market Dynamics: The performance and availability of products and services on our platform may be influenced by market conditions, supplier relationships, and external factors beyond our control.
                            </p>
                            <p>
                                Technology Risks: Despite our best efforts to maintain a robust technological infrastructure, Share and Care may experience occasional downtime, technical glitches, or cybersecurity threats, which could disrupt services or compromise data integrity.
                            </p>
                            <p>
                                Legal Compliance: While we endeavor to comply with applicable laws and regulations governing online marketplaces and data privacy, Share and Care operates in a dynamic legal landscape that may necessitate adjustments to our policies and practices over time.
                            </p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Privacy Policy  ====-->
@endsection
