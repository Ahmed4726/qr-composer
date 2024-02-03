@extends('user.frontend_layout')
@section('content')
    <!-- Sections:Start -->
    <div data-bs-spy="scroll" class="scrollspy-example">
      <!-- Hero: Start -->
      <section id="hero-animation">
        <div id="landingHero" class="section-py landing-hero position-relative">
          <div class="container">
            <div class="hero-text-box text-center">
              <h1 class="text-primary hero-title display-4 fw-bold">One dashboard to manage all your businesses</h1>
              <h2 class="hero-sub-title h6 mb-4 pb-1">
                Production-ready & easy to use Admin Template<br class="d-none d-lg-block" />
                for Reliability and Customizability.
              </h2>
              <div class="landing-hero-btn d-inline-block position-relative">
                <span class="hero-btn-item position-absolute d-none d-md-flex text-heading"
                  >Join community
                  <img
                    src="../../assets/img/front-pages/icons/Join-community-arrow.png"
                    alt="Join community arrow"
                    class="scaleX-n1-rtl"
                /></span>
                <a href="#landingPricing" class="btn btn-primary">Get early access</a>
              </div>
            </div>
            <div id="heroDashboardAnimation" class="hero-animation-img">
              <a href="../vertical-menu-template/app-ecommerce-dashboard.html" target="_blank">
                <div id="heroAnimationImg" class="position-relative hero-dashboard-img">
                  <img
                    src="../../assets/img/front-pages/landing-page/hero-dashboard-light.png"
                    alt="hero dashboard"
                    class="animation-img"
                    data-app-light-img="front-pages/landing-page/hero-dashboard-light.png"
                    data-app-dark-img="front-pages/landing-page/hero-dashboard-dark.png" />
                  <img
                    src="../../assets/img/front-pages/landing-page/hero-elements-light.png"
                    alt="hero elements"
                    class="position-absolute hero-elements-img animation-img top-0 start-0"
                    data-app-light-img="front-pages/landing-page/hero-elements-light.png"
                    data-app-dark-img="front-pages/landing-page/hero-elements-dark.png" />
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="landing-hero-blank"></div>
      </section>
      <!-- Hero: End -->
      <!-- Real customers reviews: Start -->
      <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">
        <!-- What people say slider: Start -->
        <div class="container">
          <div class="row align-items-center gx-0 gy-4 g-lg-5">
            <div class="col-md-6 col-lg-5 col-xl-3">
              <div class="mb-3 pb-1">
                <span class="badge bg-label-primary">Real Customers Reviews</span>
              </div>
              <h3 class="mb-1"><span class="section-title">What people say</span></h3>
              <p class="mb-3 mb-md-5">
                See what our customers have to<br class="d-none d-xl-block" />
                say about their experience.
              </p>
              <div class="landing-reviews-btns d-flex align-items-center gap-3">
                <button id="reviews-previous-btn" class="btn btn-label-primary reviews-btn" type="button">
                  <i class="bx bx-chevron-left bx-sm"></i>
                </button>
                <button id="reviews-next-btn" class="btn btn-label-primary reviews-btn" type="button">
                  <i class="bx bx-chevron-right bx-sm"></i>
                </button>
              </div>
            </div>
            <div class="col-md-6 col-lg-7 col-xl-9">
              <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
                <div class="swiper" id="swiper-reviews">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="card h-100">
                        <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                          <div class="mb-3">
                            <img
                              src="../../assets/img/front-pages/branding/logo-1.png"
                              alt="client logo"
                              class="client-logo img-fluid" />
                          </div>
                          <p>
                            “Vuexy is hands down the most useful front end Bootstrap theme I've ever used. I can't wait
                            to use it again for my next project.”
                          </p>
                          <div class="text-warning mb-3">
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="avatar me-2 avatar-sm">
                              <img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                            </div>
                            <div>
                              <h6 class="mb-0">Cecilia Payne</h6>
                              <p class="small text-muted mb-0">CEO of Airbnb</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="card h-100">
                        <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                          <div class="mb-3">
                            <img
                              src="../../assets/img/front-pages/branding/logo-2.png"
                              alt="client logo"
                              class="client-logo img-fluid" />
                          </div>
                          <p>
                            “I've never used a theme as versatile and flexible as Vuexy. It's my go to for building
                            dashboard sites on almost any project.”
                          </p>
                          <div class="text-warning mb-3">
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="avatar me-2 avatar-sm">
                              <img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle" />
                            </div>
                            <div>
                              <h6 class="mb-0">Eugenia Moore</h6>
                              <p class="small text-muted mb-0">Founder of Hubspot</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="card h-100">
                        <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                          <div class="mb-3">
                            <img
                              src="../../assets/img/front-pages/branding/logo-3.png"
                              alt="client logo"
                              class="client-logo img-fluid" />
                          </div>
                          <p>
                            This template is really clean & well documented. The docs are really easy to understand and
                            it's always easy to find a screenshot from their website.
                          </p>
                          <div class="text-warning mb-3">
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="avatar me-2 avatar-sm">
                              <img src="../../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                            </div>
                            <div>
                              <h6 class="mb-0">Curtis Fletcher</h6>
                              <p class="small text-muted mb-0">Design Lead at Dribbble</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="card h-100">
                        <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                          <div class="mb-3">
                            <img
                              src="../../assets/img/front-pages/branding/logo-4.png"
                              alt="client logo"
                              class="client-logo img-fluid" />
                          </div>
                          <p>
                            All the requirements for developers have been taken into consideration, so I’m able to build
                            any interface I want.
                          </p>
                          <div class="text-warning mb-3">
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bx-star bx-sm"></i>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="avatar me-2 avatar-sm">
                              <img src="../../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" />
                            </div>
                            <div>
                              <h6 class="mb-0">Sara Smith</h6>
                              <p class="small text-muted mb-0">Founder of Continental</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="card h-100">
                        <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                          <div class="mb-3">
                            <img
                              src="../../assets/img/front-pages/branding/logo-5.png"
                              alt="client logo"
                              class="client-logo img-fluid" />
                          </div>
                          <p>
                            “I've never used a theme as versatile and flexible as Vuexy. It's my go to for building
                            dashboard sites on almost any project.”
                          </p>
                          <div class="text-warning mb-3">
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="avatar me-2 avatar-sm">
                              <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                            </div>
                            <div>
                              <h6 class="mb-0">Eugenia Moore</h6>
                              <p class="small text-muted mb-0">Founder of Hubspot</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="card h-100">
                        <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                          <div class="mb-3">
                            <img
                              src="../../assets/img/front-pages/branding/logo-6.png"
                              alt="client logo"
                              class="client-logo img-fluid" />
                          </div>
                          <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam nemo mollitia, ad eum
                            officia numquam nostrum repellendus consequuntur!
                          </p>
                          <div class="text-warning mb-3">
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bxs-star bx-sm"></i>
                            <i class="bx bx-star bx-sm"></i>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="avatar me-2 avatar-sm">
                              <img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                            </div>
                            <div>
                              <h6 class="mb-0">Sara Smith</h6>
                              <p class="small text-muted mb-0">Founder of Continental</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- What people say slider: End -->
        <hr class="m-0" />
        <!-- Logo slider: Start -->
        <div class="container">
          <div class="swiper-logo-carousel py-4 my-lg-2">
            <div class="swiper" id="swiper-clients-logos">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img
                    src="../../assets/img/front-pages/branding/logo_1-light.png"
                    alt="client logo"
                    class="client-logo"
                    data-app-light-img="front-pages/branding/logo_1-light.png"
                    data-app-dark-img="front-pages/branding/logo_1-dark.png" />
                </div>
                <div class="swiper-slide">
                  <img
                    src="../../assets/img/front-pages/branding/logo_2-light.png"
                    alt="client logo"
                    class="client-logo"
                    data-app-light-img="front-pages/branding/logo_2-light.png"
                    data-app-dark-img="front-pages/branding/logo_2-dark.png" />
                </div>
                <div class="swiper-slide">
                  <img
                    src="../../assets/img/front-pages/branding/logo_3-light.png"
                    alt="client logo"
                    class="client-logo"
                    data-app-light-img="front-pages/branding/logo_3-light.png"
                    data-app-dark-img="front-pages/branding/logo_3-dark.png" />
                </div>
                <div class="swiper-slide">
                  <img
                    src="../../assets/img/front-pages/branding/logo_4-light.png"
                    alt="client logo"
                    class="client-logo"
                    data-app-light-img="front-pages/branding/logo_4-light.png"
                    data-app-dark-img="front-pages/branding/logo_4-dark.png" />
                </div>
                <div class="swiper-slide">
                  <img
                    src="../../assets/img/front-pages/branding/logo_5-light.png"
                    alt="client logo"
                    class="client-logo"
                    data-app-light-img="front-pages/branding/logo_5-light.png"
                    data-app-dark-img="front-pages/branding/logo_5-dark.png" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Logo slider: End -->
      </section>
      <!-- Real customers reviews: End -->

      <!-- Our great team: Start -->
      <section id="landingTeam" class="section-py landing-team">
        <div class="container">
          <div class="text-center mb-3 pb-1">
            <span class="badge bg-label-primary">Our Great Team</span>
          </div>
          <h3 class="text-center mb-1"><span class="section-title">Supported</span> by Real People</h3>
          <p class="text-center mb-md-5 pb-3">Who is behind these great-looking interfaces?</p>
          <div class="row gy-5 mt-2">
            <div class="col-lg-3 col-sm-6">
              <div class="card mt-3 mt-lg-0 shadow-none">
                <div class="bg-label-primary position-relative team-image-box">
                  <img
                    src="../../assets/img/front-pages/landing-page/team-member-1.png"
                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid"
                    alt="human image" />
                </div>
                <div class="card-body border border-label-primary border-top-0 text-center">
                  <h5 class="card-title mb-0">Sophie Gilbert</h5>
                  <p class="text-muted mb-0">Project Manager</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card mt-3 mt-lg-0 shadow-none">
                <div class="bg-label-info position-relative team-image-box">
                  <img
                    src="../../assets/img/front-pages/landing-page/team-member-2.png"
                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid"
                    alt="human image" />
                </div>
                <div class="card-body border border-label-info border-top-0 text-center">
                  <h5 class="card-title mb-0">Paul Miles</h5>
                  <p class="text-muted mb-0">UI Designer</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card mt-3 mt-lg-0 shadow-none">
                <div class="bg-label-danger position-relative team-image-box">
                  <img
                    src="../../assets/img/front-pages/landing-page/team-member-3.png"
                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid"
                    alt="human image" />
                </div>
                <div class="card-body border border-label-danger border-top-0 text-center">
                  <h5 class="card-title mb-0">Nannie Ford</h5>
                  <p class="text-muted mb-0">Development Lead</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card mt-3 mt-lg-0 shadow-none">
                <div class="bg-label-success position-relative team-image-box">
                  <img
                    src="../../assets/img/front-pages/landing-page/team-member-4.png"
                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid"
                    alt="human image" />
                </div>
                <div class="card-body border border-label-success border-top-0 text-center">
                  <h5 class="card-title mb-0">Chris Watkins</h5>
                  <p class="text-muted mb-0">Marketing Manager</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Our great team: End -->
      <!-- Fun facts: Start -->
      <section id="landingFunFacts" class="section-py landing-fun-facts">
        <div class="container">
          <div class="row gy-3">
            <div class="col-sm-6 col-lg-3">
              <div class="card border border-label-primary shadow-none">
                <div class="card-body text-center">
                  <img src="../../assets/img/front-pages/icons/laptop.png" alt="laptop" class="mb-2" />
                  <h5 class="h2 mb-1">7.1k+</h5>
                  <p class="fw-medium mb-0">
                    Support Tickets<br />
                    Resolved
                  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card border border-label-success shadow-none">
                <div class="card-body text-center">
                  <img src="../../assets/img/front-pages/icons/user-success.png" alt="laptop" class="mb-2" />
                  <h5 class="h2 mb-1">50k+</h5>
                  <p class="fw-medium mb-0">
                    Join creatives<br />
                    community
                  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card border border-label-info shadow-none">
                <div class="card-body text-center">
                  <img src="../../assets/img/front-pages/icons/diamond-info.png" alt="laptop" class="mb-2" />
                  <h5 class="h2 mb-1">4.8/5</h5>
                  <p class="fw-medium mb-0">
                    Highly Rated<br />
                    Products
                  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card border border-label-warning shadow-none">
                <div class="card-body text-center">
                  <img src="../../assets/img/front-pages/icons/check-warning.png" alt="laptop" class="mb-2" />
                  <h5 class="h2 mb-1">100%</h5>
                  <p class="fw-medium mb-0">
                    Money Back<br />
                    Guarantee
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Fun facts: End -->
      <!-- CTA: Start -->
      <section id="landingCTA" class="section-py landing-cta p-lg-0 pb-0">
        <div class="container">
          <div class="row align-items-center gy-5 gy-lg-0">
            <div class="col-lg-6 text-center text-lg-start">
              <h6 class="h2 text-primary fw-bold mb-1">Ready to Get Started?</h6>
              <p class="fw-medium mb-4">Start your project with a 14-day free trial</p>
              <a href="payment-page.html" class="btn btn-primary">Get Started</a>
            </div>
            <div class="col-lg-6 pt-lg-5 text-center text-lg-end">
              <img
                src="../../assets/img/front-pages/landing-page/cta-dashboard.png"
                alt="cta dashboard"
                class="img-fluid" />
            </div>
          </div>
        </div>
      </section>
      <!-- CTA: End -->
    </div>

    <!-- / Sections:End -->
@endsection
    

