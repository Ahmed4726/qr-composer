@extends('layouts.menu')
<br>
@section('content')

{{-- <div class="container"> --}}
    <!-- Content -->

    <div class="container">
      <div class="row">
        <div class="col-lg-12 mb-4 order-0">
          <div class="card">
            <div class="d-flex align-items-end row">
              <div class="col-sm-7">
                <div class="card-body">
                  <h5 class="card-title text-primary">Welcome {{ $name }} </h5>
                  <p class="mb-4">
                    You have done <span class="fw-medium">72%</span> more sales today. Check your new badge in
                    your profile.
                  </p>

                  <a href="javascript:;" class="btn btn-sm btn-label-primary">View Badges</a>
                </div>
              </div>
              <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                  <img
                    src="../../assets/img/illustrations/man-with-laptop-light.png"
                    height="140"
                    alt="View Badge User"
                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
      @if($isAdmin)
        <div class="col-lg-6 col-md-4 order-1">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
              <div class="card">
                <div class="card-body pb-2">
                <div class="avatar">
                      <span class="avatar-initial rounded bg-label-primary">
                        <i class="bx bx-user bx-sm"></i>
                      </span>
                    </div>
                  <span class="d-block fw-medium mb-1">Total Users: {{ $count_total_users }}</span>
                  {{-- <h3 class="card-title mb-1"></h3> --}}
                    <span class="d-block fw-medium mb-1">Active Users: {{ $count_active_users }}</span>
                    <span class="d-block fw-medium mb-1">In-Active Users: {{ $count_in_active_users }}</span>

                </div>
                {{-- <div id="orderChart" class="mb-3"></div> --}}
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img
                        src="../../assets/img/icons/unicons/wallet-info.png"
                        alt="Credit Card"
                        class="rounded" />
                    </div>
                    <div class="dropdown">
                      <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt6"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        {{-- <i class="bx bx-dots-vertical-rounded"></i> --}}
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                      </div>
                    </div>
                  </div>
                  <span>Free</span>
                  <h5 class="card-title text-nowrap mb-1">{{ $count_subscription_tier_free }}</h5>
                  <span>Tier 1</span>
                  <h5 class="card-title text-nowrap mb-1">{{ $count_subscription_tier_tier1 }}</h5>
                  <span>Tier 2</span>
                  <h5 class="card-title text-nowrap mb-1">{{ $count_subscription_tier_tier2 }}</h5>
                  <span>Tier 3</span>
                  <h5 class="card-title text-nowrap mb-1">{{ $count_subscription_tier_tier3 }}</h5>
                  {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- Total Revenue -->
        {{-- <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
          <div class="card">
            <div class="row row-bordered g-0">
              <div class="col-md-8">
                <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                <div id="totalRevenueChart" class="px-2"></div>
              </div>
              <div class="col-md-4">
                <div class="card-body">
                  <div class="text-center">
                    <div class="dropdown">
                      <button
                        class="btn btn-sm btn-label-primary dropdown-toggle"
                        type="button"
                        id="growthReportId"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        2022
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                        <a class="dropdown-item" href="javascript:void(0);">2021</a>
                        <a class="dropdown-item" href="javascript:void(0);">2020</a>
                        <a class="dropdown-item" href="javascript:void(0);">2019</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="growthChart"></div>
                <div class="text-center fw-medium pt-3 mb-2">62% Company Growth</div>

                <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                  <div class="d-flex">
                    <div class="me-2">
                      <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                    </div>
                    <div class="d-flex flex-column">
                      <small>2022</small>
                      <h6 class="mb-0">$32.5k</h6>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="me-2">
                      <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                    </div>
                    <div class="d-flex flex-column">
                      <small>2021</small>
                      <h6 class="mb-0">$41.2k</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        <!--/ Total Revenue -->
        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
          {{-- <div class="row">
            <div class="col-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="../../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                    </div>
                    <div class="dropdown">
                      <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt4"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                      </div>
                    </div>
                  </div>
                  <span class="d-block mb-1">Payments</span>
                  <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                  <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                </div>
              </div>
            </div>
            <div class="col-6 mb-4">
              <div class="card">
                <div class="card-body pb-2">
                  <span class="d-block fw-medium mb-1">Revenue</span>
                  <h3 class="card-title mb-1">425k</h3>
                  <div id="revenueChart"></div>
                </div>
              </div>
            </div>
            </div> --}}
<div class="row">

                    {{-- <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2">Profile Report</h5>
                                <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                              </div>
                              <div class="mt-sm-auto">
                                <small class="text-success text-nowrap fw-medium"
                                  ><i class="bx bx-chevron-up"></i> 68.2%</small
                                >
                                <h3 class="mb-0">$84,686k</h3>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
                    </div> --}}
                  </div>
                </div>
              </div>
              <div class="row">

                <!-- pill table -->
                <div class="col-md-6 order-3 order-lg-4 mb-4 mb-lg-0">
                  <div class="card text-center">
                    <div class="card-header py-3">
                      <ul class="nav nav-pills" role="tablist">
                        {{-- <li class="nav-item">
                          <button
                            type="button"
                            class="nav-link active"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-pills-browser"
                            aria-controls="navs-pills-browser"
                            aria-selected="true">
                            Browser
                          </button>
                        </li>
                        <li class="nav-item">
                          <button
                            type="button"
                            class="nav-link"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-pills-os"
                            aria-controls="navs-pills-os"
                            aria-selected="false">
                            Operating System
                          </button>
                        </li> --}}
                        <li class="nav-item">
                          <button
                            type="button"
                            class="nav-link active"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-pills-country"
                            aria-controls="navs-pills-country"
                            aria-selected="false">
                            Country
                          </button>
                        </li>
                      </ul>
                    </div>
                    <div class="tab-content pt-0">
                      {{-- <div class="tab-pane fade show active" id="navs-pills-browser" role="tabpanel">
                        <div class="table-responsive text-start">
                          <table class="table table-borderless text-nowrap">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Browser</th>
                                <th>Visits</th>
                                <th class="w-50">Data In Percentage</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>
                                  <div class="d-flex align-items-center">
                                    <img
                                      src="../../assets/img/icons/brands/chrome.png"
                                      alt="Chrome"
                                      height="24"
                                      class="me-2" />
                                    <span>Chrome</span>
                                  </div>
                                </td>
                                <td>8.92k</td>
                                </td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>
                                  <div class="d-flex align-items-center">
                                    <img
                                      src="../../assets/img/icons/brands/safari.png"
                                      alt="Safari"
                                      height="24"
                                      class="me-2" />
                                    <span>Safari</span>
                                  </div>
                                </td>
                                <td>7.29k</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>
                                  <div class="d-flex align-items-center">
                                    <img
                                      src="../../assets/img/icons/brands/firefox.png"
                                      alt="Firefox"
                                      height="24"
                                      class="me-2" />
                                    <span>Firefox</span>
                                  </div>
                                </td>
                                <td>6.11k</td>
                              </tr>

                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="navs-pills-os" role="tabpanel">
                        <div class="table-responsive text-start">
                          <table class="table table-borderless">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>System</th>
                                <th>Visits</th>
                                <th class="w-50">Data In Percentage</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>
                                  <div class="d-flex align-items-center">
                                    <img
                                      src="../../assets/img/icons/brands/windows.png"
                                      alt="Windows"
                                      height="24"
                                      class="me-2" />
                                    <span>Windows</span>
                                  </div>
                                </td>
                                <td>875.24k</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>
                                  <div class="d-flex align-items-center">
                                    <img
                                      src="../../assets/img/icons/brands/mac.png"
                                      alt="Mac"
                                      height="24"
                                      class="me-2" />
                                    <span>Mac</span>
                                  </div>
                                </td>
                                <td>89.68k</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>
                                  <div class="d-flex align-items-center">
                                    <img
                                      src="../../assets/img/icons/brands/ubuntu.png"
                                      alt="Ubuntu"
                                      height="24"
                                      class="me-2" />
                                    <span>Ubuntu</span>
                                  </div>
                                </td>
                                <td>37.68k</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div> --}}
                      <div class="tab-pane fade show active" id="navs-pills-country" role="tabpanel">
                        <div class="table-responsive text-start">
                          <table class="table table-borderless">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Country</th>
                                <th>Visits</th>
                                {{-- <th class="w-50">Data In Percentage</th> --}}
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($campaignHitsCountry as $index => $campaignHit)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{-- <img src="{{ $campaignHit->country_flag }}" alt="{{ $campaignHit->country }}" height="24" class="me-2" /> --}}
                                                <span>{{ $campaignHit->country }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $campaignHit->hit_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ pill table -->
              </div>
            </div>
            <!-- / Content -->
            @endif
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0 justify-content-center">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>

                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-medium">Kling</a>
                </div>
                <div class="d-none d-lg-inline-block">
                  <!-- <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a> -->

                  <!-- <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link"
                    >Documentation</a
                  > -->

                  <!-- <a
                    href="https://themeselection.com/support/"
                    target="_blank"
                    class="footer-link d-none d-sm-inline-block"
                    >Support</a
                  > -->
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/dashboards-analytics.js"></script>
</body>
</html>
@endsection
