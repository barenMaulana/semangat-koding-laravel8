<div>
    @php
        $joined =explode(' ', Auth::user()->created_at);
    @endphp
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mentor ').Auth::user()->name }}
        </h2>
    </x-slot>
    <div class="py-12 px-0 md:px-10 lg:px-10">
        <div class="flex flex-col md:flex-row lg:flex-row justify-center">   

            {{-- card --}}
            <div class="px-5">
                <div class="bg-white relative shadow-xl w-full md:w-2/6 lg:w-72 xl:w-72 mt-12" style="border-radius: 15px;">
                    <div class="flex justify-center">
                            <img src="{{asset('storage/'.Auth::user()->profile_photo_path)}}" alt="" class="rounded-full mx-auto absolute -top-14 w-24 h-24 shadow-2xl border-4 border-white">
                    </div>
                    
                    <div class="mt-16">
                        <h1 class="font-bold text-center text-3xl text-gray-900">{{Auth::user()->name}}</h1>
                        <p class="text-center text-sm text-gray-400 font-medium">{{Auth::user()->expertise}}</p>
                        <div class="w-full">
                            <br>    
                            <hr>
                            <h3 class="font-bold text-gray-600 text-left px-4 pt-4">Details</h3>
                            <div class="py-5 w-full px-4">
                                <div class="flex justify-between font-bold text-gray-600">
                                    <span>Saldo</span>
                                    <span>Rp.{{number_format(Auth::user()->saldo)}}</span>
                                </div>
                                <div x-data={show:false}>
                                    <div class="flex justify-center font-bold text-gray-600">
                                        <button @click="show=!show" class="border-2 border-blue-500 rounded-full font-bold text-blue-500 px-4 py-1 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6 mt-5">
                                            Tarik Saldo
                                        </button>
                                    </div>
                                    @if (session()->has('message'))
                                        <div class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-4 py-3 shadow-md my-3 rounded" role="alert">
                                            <div class="flex">
                                                <div>
                                                    <p class="text-sm">{{ session('message') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (session()->has('errMessage'))
                                        <div class="bg-gradient-to-r from-red-400 to-yellow-500 text-white px-4 py-3 shadow-md my-3 rounded" role="alert">
                                            <div class="flex">
                                                <div>
                                                    <p class="text-sm">{{ session('errMessage') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div x-show="show" class="px-4 py-3 my-2 text-gray-700">
                                        <form>
                                            <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Jumlah:</label>
                                            <input type="number" class="shadow appearance-none border-grey-600 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="amount" wire:model="amount">
                                            @error('amount') <span class="text-red-500">{{ $message }}</span>@enderror
                                        </form>
                                        <button wire:click.prevent="withdrawalRequest({{$amount ? $amount : 0}})" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-gradient-to-r from-green-400 to-blue-500 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 my-2">
                                            Kirim permintaan
                                        </button>
                                        @if ($uniqueCode != false)
                                            <a href="https://api.whatsapp.com/send?phone={{env('ADMIN_PHONE')}}&text=Halo,%20Saya%20mentor%20{{Auth::user()->name}},%20telah%20melakukan%20withdraw%20saldo%20dengan%20id%20transaksi%20:%20{{$uniqueCode}}" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-gradient-to-r bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 my-2" target="_blank">
                                                Konfirmasi Sekarang 
                                            </a>
                                        @endif

                                    </div>
                                </div>

                                <hr class="my-5">
                                <div class="flex justify-between font-bold text-gray-600">
                                    <span>Kelas</span>
                                    <span>{{count($courses)}}</span>
                                </div>
                                <div class="flex justify-between font-bold text-gray-600">
                                    <span>Joined</span>
                                    <span>{{Auth::user()->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- list --}}
            <div class="w-full md:w-4/5 lg:4/5 mx-auto py-6 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-5 py-5">
                    {{-- <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4 justify-around">

                        <div class="w-full lg:w-1/5 shadow">
                            <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-yellow-400">
                                <div class="flex items-center">
                                    <div class="icon w-14 p-3.5 bg-yellow-400 text-white rounded-full mr-3">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <div class="text-lg">3456</div>
                                        <div class="text-sm text-gray-400">Products</div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <div class="w-full lg:w-1/5 mb-5 shadow">
                            <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-red-400">
                                <div class="flex items-center">
                                    <div class="icon w-14 p-3.5 bg-red-400 text-white rounded-full mr-3">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <div class="text-lg">12658</div>
                                        <div class="text-sm text-gray-400">Orders</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full lg:w-1/5 mb-5 shadow">
                            <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-blue-400">
                                <div class="flex items-center">
                                    <div class="icon w-14 p-3.5 bg-blue-400 text-white rounded-full mr-3">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <div class="text-lg">12658</div>
                                        <div class="text-sm text-gray-400">Orders</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full lg:w-1/5 mb-5 shadow">
                            <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-indigo-400">
                                <div class="flex items-center">
                                    <div class="icon w-14 p-3.5 bg-indigo-400 text-white rounded-full mr-3">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <div class="text-lg">12658</div>
                                        <div class="text-sm text-gray-400">Orders</div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                    </div> --}}
                    <div class="text-2xl font-bold text-gray-500 pt-10 pb-5">
                        <h1>Your Course</h1>
                    </div>
                    <div class="flex flex-col lg:flex-row w-full">
                        @forelse ($courses as $row)
                        <div class='flex max-w-sm w-80 shadow rounded-lg overflow-hidden mx-2 my-2'>
                            <div class='flex items-center w-full px-2 py-3'>
                                <div class='mx-3 w-full'>
                                    <div class='text-gray-400 font-medium text-sm border-2 border-gray-300 rounded-md cursor-pointer mb-5'><img class="rounded" src="{{asset('storage/'.$row->thumbnail_file_name)}}"></div>
                                    <div class="flex justify-start text-center">
                                        <h4 class=" text-xl font-bold text-gray-500">{{$row->title}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-2xl font-bold text-gray-800 py-10">
                            <h4>Karyamu ditunggu banyak orang! semangat!</h4>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>