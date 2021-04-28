<div>
    @php
        $consultationImage = "frontend/public/assets/img/consultation.png";
        $certificateImage = "frontend/public/assets/img/certificate.png";
        $sourceImage = "frontend/public/assets/img/source.png";
        $updateImage = "frontend/public/assets/img/update.png";
        $os = explode(',',$course->operating_system);

        $blur = "";
        if($course->type == "free") {
            $blur = "filter: blur(4px)";
        }
    @endphp
        <!-- kelas populer -->
        <div class="container">
            {{-- title --}}
            <div class="row justify-content-center mt-5 pt-5">
              <div class="col-md-9 col-lg-6 text-center mb-3">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">{{$course->title}}</h5>
                <p class="mb-2">Dibangun oleh : {{$course->build_with}}</p>
                <p class="mb-5">Pengguna kursus : <span class="bg-info text-white rounded px-4">{{$course->dummy_user_amount}}</span> </p>
              </div>
            </div>
            {{--video  --}}
            <div class="row d-flex justify-content-around" style="min-height:70vh;">
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="ratio" style="--bs-aspect-ratio: 60%;">
                        <iframe 
                         src="https://www.youtube.com/embed/{{$videoData->trailerId}}/?cc_load_policy=1&color=white&autoplay=1"
                         title="YouTube video"
                         allowfullscreen 
                         style="border-radius: 15px;border:20px solid #222f3e;"></iframe>
                      </div>
                </div>
                <div class="col-12 my-5 my-md-0 my-lg-0 col-md-3">
                    <div class="card card__compact card__border" style="height:65vh;">
                        <div class="card-body overflow-auto course-overview">
                        <h6 class="h6 mb-0 line-height-1">Materi Preview</h6>
                        <ul class="nav flex-column nav-pills nav-list pt-2">
                            @foreach ($videos as $row)         
                                <li class="nav-item">
                                    <div class="nav-link">{{$row['snippet']['title']}}</div>
                                </li>
                                <hr>
                            @endforeach
                        </ul>
                        </div>
                        <a href="{{url('checkout/'.$course->slug)}}" target="_blank" class="card-footer text-center bg-primary-gradient">
                            <span style="font-size: 16px !important;" class="btn text-white btn-block font-weight-medium">AMBIL KELAS</span>
                        </a>
                        </div>
                </div>
            </div>
            {{-- improvements --}}
            <div class="row d-flex justify-content-around mb-5">
                <div class="col-12 col-md-8 col-lg-8">
                    <h6 class="fs-3 fs-lg-2 lh-sm mb-3 text-secondary">Improvements :</h6>
                    <div class="card text-center" style="border: none">
                        <div class="card-body">
                            <div class="row row-cols-4 overflow-auto row-cols-md-4 g-2 d-flex justify-content-center">
                                <div class="col-5 col-md-3 col-lg-3">
                                    <img src="{{asset($certificateImage)}}" class="figure-img img-fluid" style="border-radius: 15px;{{$blur}};" width="150" alt="">
                                </div>
                                <div class="col-5 col-md-3 col-lg-3">
                                    <img src="{{asset($consultationImage)}}"class="figure-img img-fluid" style="border-radius: 15px;{{$blur}};" width="150" alt="">
                                </div>
                                <div class="col-5 col-md-3 col-lg-3">
                                    <img src="{{asset($updateImage)}}"class="figure-img img-fluid" style="border-radius: 15px;" width="150" alt="">
                                </div>
                                <div class="col-5 col-md-3 col-lg-3">
                                    <img src="{{asset($sourceImage)}}" class="figure-img img-fluid" style="border-radius: 15px;{{$blur}};" width="150" alt="">
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-5 my-md-0 my-lg-0 col-md-3">
                    <h6 class="fs-3 fs-lg-2 lh-sm mb-3 text-secondary">Minimum Spek :</h6>
                    <ul class="list-group">
                        <li class="list-group-item">Operating System : 
                            @foreach ($os as $item)
                                <div class="badge bg-info text-white">{{$item}}</div>
                            @endforeach
                        </li>
                        <li class="list-group-item">Ram : 
                            <div class="badge bg-info text-white">{{$course->ram}} GIGA</div>
                        </li>
                        <li class="list-group-item">Empty Storage : 
                            <div class="badge bg-info text-white">{{$course->empty_storage}} GIGA</div>
                        </li>
                      </ul>
                </div>
            </div>
            {{-- description --}}
            <div class="row d-flex justify-content-around mb-5">
                <div class="col-12 col-md-8 col-lg-8">
                    <h6 class="fs-3 fs-lg-2 lh-sm mb-3 text-secondary">Deskripsi :</h6>
                    <div class="mt-3 font-weight-light">
                        {{$course->description}}
                    </div>
                </div>
                <div class="col-12 my-5 my-md-0 my-lg-0 col-md-3">
                </div>
            </div>
            {{-- will study --}}
            <div class="row d-flex justify-content-around mb-5">
                <div class="col-12 col-md-8 col-lg-8">
                    <h6 class="fs-3 fs-lg-2 lh-sm mb-3 text-secondary">Yang akan di bahas</h6>
                    <div class="mt-3 font-weight-light">
                        {{$course->will_study}}
                    </div>
                </div>
                <div class="col-12 my-5 my-md-0 my-lg-0 col-md-3">
                </div>
            </div>
        </div>
</div>
