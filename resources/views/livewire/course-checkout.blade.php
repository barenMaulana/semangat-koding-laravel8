<div>
    <div class="container d-flex justify-content-center" style="min-height: 100vh;padding-top:10%;">
        <div class="row">
            <div class="col">
                <div class="card mb-3" style="max-width: 540px;border:none;">
                    <div class="row g-0">
                      <div class="col-md-4 d-flex align-items-center justify-content-center p-2">
                        <img src="{{asset('storage/'.$course->thumbnail_file_name)}}" class="img-fluid" style="border-radius: 10px;">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$course->title}}</h5>
                            <p class="card-text">Dibangun oleh : <span class="badge bg-warning">{{$course->build_with}}</span></p>
                            <p class="card-text">Masa berlaku : <span class="badge bg-danger">Selamanya</span></p>
                            <p class="card-text"><span class="badge" style="background-color:#40407a;">{{$course->type}}</span></p>
                            <p>
                                @if ($course->type == "premium")
                                    <button class="btn bg-primary-gradient text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBayar" aria-expanded="false" aria-controls="collapseBayar">
                                        Bayar
                                    </button>
                                    <button class="btn text-white" style="background-color: #FFC312;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConfirm" aria-expanded="false" aria-controls="collapseConfirm">
                                        Konfirmasi
                                    </button>
                                @else
                                    @if ($enroll == false)
                                        <button wire:click="registerClass()" class="btn text-white" style="background-color: #706fd3;" type="button">
                                            Masuk kelas
                                        </button>
                                    @else
                                        <a href="{{route('dashboard')}}" class="btn text-white" style="background-color: #706fd3;">
                                            Masuk kelas
                                        </a>
                                    @endif
                                @endif
                            </p>
                            <p>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        <div class="d-flex">
                                            <div>
                                                <p class="text-sm">{{ session('message') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (session()->has('errMessage'))
                                    <div class="alert alert-danger">
                                        <div class="d-flex">
                                            <div>
                                                <p class="text-sm">{{ session('errMessage') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </p>
                            <p>
                                <div class="form-group">
                                    <label for="discount">Kode Diskon</label>
                                    <div class="d-flex">
                                        <input wire:model="discount_code" type="text" id="discount" class="form-control form-control mx-sm-3">
                                        <button wire:click="checkDiscountCode()" class="btn btn-info">Gunakan</button>
                                    </div>
                                </div>
                            </p>
                        </div>
                        @if ($course->type == "premium")                            
                            <div class="collapse my-2" id="collapseConfirm">
                                <div class="card card-body" style="border:none;">
                                    <a href="https://api.whatsapp.com/send?phone={{$course->phone_number}}&text=Halo,%20Saya%20sudah%20melakukan%20pembayaran%20kelas%20{{$course->title}}.%20Dengan%20email%20=%20{{Auth::user()->email}}{{$discount_amount != 0 ? ",%20dan%20dengan%20kode%20diskon%20:%20".$use_discount_confirmation : ""}},%20Berikut%20saya%20lampirkan%20foto%20bukti%20pembayaran:" 
                                        class="btn text-white" type="button" style="background-color: #12ff61" target="_blank">
                                        Konfirmasi
                                    </a>
                                </div>
                            </div>
                            <div class="collapse my-2" id="collapseBayar">
                            <div class="card card-body">
                                <h5 class="card-title">Pembayaran</h5>
                                <ul class="list-group" style="border:none;">
                                    <li class="d-flex justify-content-between"><span>harga : </span><span class="text-dark">Rp.{{number_format($course->price)}}</span></li>
                                    <li class="d-flex justify-content-between"><span>diskon : </span><span class="text-dark">Rp.{{number_format($discount_amount)}}</span></li>
                                    <li class="d-flex justify-content-between"><span>Total : </span><span class="text-dark"><u>Rp.{{number_format($price_amount)}}</u></span></li>
                                    <hr>
                                    <h6 class="card-title">Transfer Pembayaran</h6>
                                    <div class="p-2" style="border-radius: 5px;background-color:#bcffd5b9;">
                                        <li class="d-flex justify-content-between"><span>Bank : </span><span class="text-dark">{{$course->bankName}}</span></li>
                                        <li class="d-flex justify-content-between"><span>No. Rekening : </span><span class="text-dark">{{$course->payment_account}}</span></li>
                                        <li class="d-flex justify-content-between"><span>Penerima : </span><span class="text-dark">{{$course->payment_account_name}}</span></li>
                                        <li class="d-flex justify-content-between"></li>
                                    </div>
                                    @if ($course->bankName1 != '' && $course->payment_account1 != '' && $course->payment_account_name1 != '')                                        
                                        <div class="p-2 mt-2" style="border-radius: 5px;background-color:#fcffbcb1;">
                                            <li class="d-flex justify-content-between"><span>Bank : </span><span class="text-dark">{{$course->bankName1}}</span></li>
                                            <li class="d-flex justify-content-between"><span>No. Rekening : </span><span class="text-dark">{{$course->payment_account1}}</span></li>
                                            <li class="d-flex justify-content-between"><span>Penerima : </span><span class="text-dark">{{$course->payment_account_name1}}</span></li>
                                            <li class="d-flex justify-content-between"></li>
                                        </div>
                                    @endif
                                </ul>
                            </div>
                            </div>
                        @endif
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
