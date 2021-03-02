@extends('layouts/App')
@section('content')
<section class="py-5 mt-5">
    <div class="bg-holder d-none d-sm-block"
      style="background-image:url({{url("/frontend/public/assets/img/illustrations/category-bg.png")}});background-position:right top;background-size:200px 320px;">
    </div>
    <!--/.bg-holder-->

    <!-- kelas populer -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9 col-lg-6 text-center mb-3">
          <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Kelas Upgrade Skill</h5>
          <p class="mb-5">Ada banyak pilihan kelas yang lain, cek di halaman kelas</p>
        </div>
      </div>
      <div class="row flex-center h-100">
        <div class="col-10 col-xl-11">
          <div class="row">
            <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-2 pb-4">
              <a href="#" class="card py-4 shadow-sm h-100" style="text-decoration: none;outline: none;">
                <div class="text-center px-4">
                  <img src="{{url("/frontend/public/assets/img/gallery/thumbs1.png")}}" class="img-fluid rounded" alt="semangat koding" />
                  <div class="card-body px-2">
                    <h6 class="fw-bold fs-1 heading-color">Wordpress Crowdfunding</h6>
                    <p class="mb-0 badge bg-info">premium</p>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-12">
                      tech :
                    </div>
                    <div class="col-12">
                      <div class="badge bg-primary-gradient">php</div>
                      <div class="badge bg-primary-gradient">ipaymu</div>
                      <div class="badge bg-primary-gradient">wordpress</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-2 pb-4">
              <a href="#" class="card py-4 shadow-sm h-100" style="text-decoration: none;outline: none;">
                <div class="text-center px-4">
                  <img src="{{ url("/frontend/public/assets/img/gallery/thumbs2.png") }}" class="img-fluid rounded" alt="semangat koding" />
                  <div class="card-body px-2">
                    <h6 class="fw-bold fs-1 heading-color">Landing Page Bootstrap</h6>
                    <p class="mb-0 badge bg-warning">free</p>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-12">
                      tech :
                    </div>
                    <div class="col-12">
                      <div class="badge bg-primary-gradient">css3</div>
                      <div class="badge bg-primary-gradient">bootstrap 5</div>
                      <div class="badge bg-primary-gradient">html</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-2 pb-4">
              <a href="#" class="card py-4 shadow-sm h-100" style="text-decoration: none;outline: none;">
                <div class="text-center px-4">
                  <img src="{{ url("/frontend/public/assets/img/gallery/thumbs3.png") }}" class="img-fluid rounded" alt="semangat koding" />
                  <div class="card-body px-2">
                    <h6 class="fw-bold fs-1 heading-color">Figma UI Design</h6>
                    <p class="mb-0 badge bg-warning">free</p>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-12">
                      tech :
                    </div>
                    <div class="col-12">
                      <div class="badge bg-primary-gradient">figma</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection