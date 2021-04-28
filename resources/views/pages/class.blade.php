<div>
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
                <h1 class="text-center">Oops, cant load courses!</h1>
                <a href="#" class="text-center">Report now!</a>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>
</div>