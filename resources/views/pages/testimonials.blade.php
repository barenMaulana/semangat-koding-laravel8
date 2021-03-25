<div>
    <div class="container">
        <div class="text-2xl font-bold text-gray-500 mt-9 text-center">
            <h4>Testimonials</h4>
        </div>
        <div class="row mt-5 pt-2 d-flex justify-content-around">
            @forelse ($testimonials as $item)
                <div class="col-12 col-md-3 col-lg-3 my-2 mx-2 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{asset('storage/'.$item->user->profile_photo_path)}}" class="rounded-circle my-2" style="height:70px;width:70px;" alt="">
                            </div>
                            <hr>
                        <h5 class="card-title" style="color: #3498db;">{{$item->user->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$item->created_at->diffForHumans()}}</h6>
                        <p class="card-text p-2 rounded" style="background-color: #d0d0d070;font-size:.9em;">{{$item->message}}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-2xl font-bold text-gray-500 py-10 text-center">
                    <h4>Belum ada review</h4>
                </div>
            @endforelse
        </div>
    </div>
</div>
