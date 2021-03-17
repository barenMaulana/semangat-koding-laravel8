<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Penawaran') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-10">
                    <div class="mx-5 min-h-screen grid place-content-center">
                        <div class="bg-gradient-to-r from-blue-400 to-indigo-500 rounded-2xl text-white p-8 text-center h-72 max-w-sm mx-auto">
                          <h1 class="text-3xl mb-3">Hi {{Auth::user()->name}}</h1>
                          <p class="text-lg">Anda ingin bergabung dengan Semangat Koding dan mendapat penghasilan tambahan?</p>
                        </div>
                        <div class="bg-white py-8 px-10 text-center rounded-md shadow-lg transform -translate-y-20 sm:-translate-y-24 max-w-xs mx-auto">
                          <h2 class="font-semibold text-2xl mb-6">Start Process</h2>
                          <img class="w-20 h-20 object-cover rounded-full mx-auto shadow-lg" src="{{ url('/frontend/public/assets/img/favicons/logo-semangat-koding.png')}}" alt="User avatar">
                          <p class="capitalize text-xl mt-1">Admin SK</p>
                            <a href="https://api.whatsapp.com/send?phone={{$adminPhone}}&text=Halo,%20Saya%20{{Auth::user()->name}},%20Email%20:%20{{Auth::user()->email}},%20ingin%20bergabung%20dengan%20Semangat%20Koding%20sebagai%20mentor,%20saya%20ingin%20melihat%20syarat%20dan%20ketentuannya%20terlebih%20dahulu"> 
                                <button class="rounded-md bg-gradient-to-r from-blue-400 to-indigo-500 text-xl text-white pt-3 pb-4 px-8 inline my-10">Upgrade Menjadi Mentor</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
