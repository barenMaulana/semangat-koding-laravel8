<div>
  <section class="bg-holder d-none d-sm-block"
      style="background-image:url({{url("/frontend/public/assets/img/illustrations/hero-bg.png")}});background-position:right top;background-size:contain;">
    </section>
    <!--/.bg-holder-->

    <div class="bg-holder d-sm-none"
      style="background-image:url({{url("/frontend/public/assets/img/illustrations/hero-bg.png")}});background-position:right top;background-size:contain;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
      <div class="row align-items-center min-vh-75 min-vh-md-100">
        <div class="col-md-7 col-lg-6 py-6 text-sm-start text-center">
          <h1 class="mt-6 mb-sm-4 display-2 fw-semi-bold lh-sm fs-4 fs-lg-6 fs-xxl-8">Kembangkan Skill<br
              class="d-block d-lg-none d-xl-block" />Di Dunia Digital</h1>
          <p class="mb-4 fs-1">Dengan belajar di semangatkoding anda dapat meningkatkan skill anda ke level
            selanjutnya, bahkan sampai tingkat expert! ayo segera belajar, semangatkoding!</p>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5">
    <div class="bg-holder"
      style="background-image:url({{url("/frontend/public/assets/img/illustrations/bg.png")}});background-position:left top;background-size:initial;margin-top:-180px;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
      <div class="row flex-center">
        <div class="col-md-5 order-md-0 text-center text-md-start"><img class="img-fluid mb-4"
            src="{{ url("/frontend/public/assets/img/illustrations/passion.png") }}" width="450" alt="" /></div>
        <div class="col-md-5 text-center text-md-start">
          <h6 class="fw-bold fs-2 fs-lg-3 display-3 lh-sm">Temukan minat di dunia IT<br />Dan capai kesuksesan
          </h6>
          <p class="my-4 pe-xl-8">Temukan pekerjaan yang sesuai dengan minat dan bakat Anda. Dengan skill yang baik
            anda akan mendapat gaji yang tinggi. Yang terpenting, Anda bisa bekerja sesuai keinginan hati Anda.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- prromosi --}}
  <section class="py-0">
    <div class="container">
      <section class="py-8">
        <div class="container">
          <div class="row flex-center">
            <div class="col-md-5 order-md-1 text-center text-md-end"><img class="img-fluid mb-4"
                src="{{url("/frontend/public/assets/img/illustrations/jobs.png")}}" width="450" alt="" /></div>
            <div class="col-md-5 text-center text-md-start">
              <h6 class="fw-bold fs-2 fs-lg-3 display-3 lh-sm">Mencari pekerjaan lebih mudah <br> Dengan skill yang
                baik</h6>
              <p class="my-4 pe-xl-8">Segera belajar untuk meningkatkan skill anda dan tambah portofolio sesuai kelas
                yang dituju, hasil project dapat digunakan untuk portofolio.</p>
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>

  <section class="py-5">
    <div class="bg-holder d-none d-sm-block"
      style="background-image:url({{url("/frontend/public/assets/img/illustrations/category-bg.png")}});background-position:right top;background-size:200px 320px;">
    </div>
    <!--/.bg-holder-->

    <!-- kelas populer -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9 col-lg-6 text-center mb-3">
          <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Kelas Populer</h5>
          <p class="mb-5">Ada banyak pilihan kelas yang lain, cek di halaman kelas</p>
        </div>
      </div>
      <div class="row flex-center h-100">
        <div class="col-10 col-xl-11">
          <div class="row">
            @forelse ($courses as $row)
              <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-2 pb-4">
                <a href="{{url('class/'.$row->slug)}}" class="card py-4 shadow-sm h-100" style="text-decoration: none;outline: none;">
                  <div class="text-center px-4">
                    <img src="{{asset('storage/'.$row->thumbnail_file_name)}}" class="img-fluid rounded" alt="semangat koding" />
                    <div class="card-body px-2">
                      <h6 class="fw-bold fs-1 heading-color">{{$row->title}}</h6>
                      @if ($row->type == "free")
                      <p class="mb-0 badge bg-warning">{{$row->type}}</p>
                    @else
                      <p class="mb-0 badge bg-danger">{{$row->type}}</p>
                    @endif
                    </div>
                    <hr>

                    <div class="row">
                      <div class="col-12">
                        tech :
                      </div>
                      <div class="col-12">
                        @php
                            $tech = explode(',',$row->technology);
                        @endphp
                            @foreach ($tech as $item)
                            <div class="badge bg-primary-gradient">{{$item}}</div>
                            @endforeach
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            @empty
                
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- promosi --}}
  <section class="py-0"><img class="w-100" src="{{ url('/frontend/public/assets/img/illustrations/come-on-join.png') }}" alt="" />
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 text-center">
          <h6 class="fw-bold fs-3 fs-lg-5 lh-sm">Gabung untuk naik level!</h6>
          <p>pilih kelas anda dan mulai belajar</p>
        </div>
      </div>
    </div>
  </section>

  <!-- testimoni -->
  <section class="py-8">
    <div class="container-lg">
      <div class="row flex-center">
        <div class="col-md-11 col-lg-6 col-xl-4 col-xxl-5">
          <h6 class="fs-3 fs-lg-4 lh-sm text-center">Testimonial</h6>
        </div>
      </div>
      <div class="row flex-center">
        <div class="col-xl-10 px-0">
          <div class="carousel slide pt-6" id="carouselExampleDark" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <div class="row h-100 m-lg-7 mx-3 mt-6 mx-md-4 my-md-7">

                  @forelse ($testimonials as $item)
                    <div class="col-md-4 mb-8 mb-md-0">
                      <div class="card card-span h-100 shadow-lg">
                        <div class="card-span-img"><img src="{{ asset('storage/'.$item->user->profile_photo_path)}}" alt="" class="img-fluid rounded-circle" style="height: 100px;width:100px;"/></div>
                        <div class="card-body d-flex flex-column flex-center py-6">
                          <div class="my-4">
                            <ul class="list-unstyled list-inline">
                              <li class="list-inline-item me-0">
                                <svg class="bi bi-star-fill" xmlns="http://www.w3.org/2000/svg" width="28" height="26"
                                  fill="#FF974D" viewBox="0 0 16 16">
                                  <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                  </path>
                                </svg>
                              </li>
                              <li class="list-inline-item me-0">
                                <svg class="bi bi-star-fill" xmlns="http://www.w3.org/2000/svg" width="28" height="26"
                                  fill="#FF974D" viewBox="0 0 16 16">
                                  <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                  </path>
                                </svg>
                              </li>
                              <li class="list-inline-item me-0">
                                <svg class="bi bi-star-fill" xmlns="http://www.w3.org/2000/svg" width="28" height="26"
                                  fill="#FF974D" viewBox="0 0 16 16">
                                  <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                  </path>
                                </svg>
                              </li>
                              <li class="list-inline-item me-0">
                                <svg class="bi bi-star-fill" xmlns="http://www.w3.org/2000/svg" width="28" height="26"
                                  fill="#FF974D" viewBox="0 0 16 16">
                                  <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                  </path>
                                </svg>
                              </li>
                              <li class="list-inline-item me-0">
                                <svg class="bi bi-star-fill" xmlns="http://www.w3.org/2000/svg" width="28" height="26"
                                  fill="#FF974D" viewBox="0 0 16 16">
                                  <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                  </path>
                                </svg>
                              </li>
                            </ul>
                          </div>
                          <p class="card-text text-center text-1000 px-4">{{$item->message}}</p>
                        </div>
                      </div>
                    </div>
                  @empty
                      
                  @endforelse
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center">
      <a href="{{url('/testimonials')}}" class="btn btn-info rounded-pill bg-gradient">Lebih banyak</a>
    </div>
  </section>
</div>
