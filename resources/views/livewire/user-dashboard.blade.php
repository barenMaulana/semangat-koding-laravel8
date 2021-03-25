<div>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-center items-center">
                <img src="{{asset('storage/'.Auth::user()->profile_photo_path)}}" style="border-radius: 50%;height:70px;width:70px">&nbsp;
                {{ __(Auth::user()->name) }}
            </h2>
    </x-slot>
    @if ($isReview)
        <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" statisfaction="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <form>
                        <div class="text-2xl font-bold text-center mt-5 text-gray-500">
                            <h1>Ulasan anda untuk kami</h1>
                        </div>

                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="">
                                <div class="mb-4">
                                    <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Ulasan :</label>
                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" wire:model="message">
                                    @error('message') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-4 bg-gray-100 pt-2 pb-4 px-2 rounded">

                                    <label for="satisfaction" class="block text-gray-700 text-sm font-bold mb-2">Kepuasan :</label>
                                    
                                    <div class="flex justify-around">
                                        <div class="flex items-center">
                                            <input class="form-check-input" type="radio" name="satisfaction" wire:model="satisfaction" id="puas" value="puas">
                                            <label class="form-check-label" for="puas">
                                                <img src="{{asset('frontend/public/assets/img/smile.svg')}}" alt="" width="50">
                                            </label>
                                        </div>
                                        <div class="flex items-center">
                                            <input class="form-check-input" type="radio" name="satisfaction" wire:model="satisfaction" id="cukup" value="cukup">
                                            <label class="form-check-label" for="cukup">
                                                <img src="{{asset('frontend/public/assets/img/meh.svg')}}" alt="" width="50">
                                            </label>
                                        </div>
                                        <div class="flex items-center">
                                            <input class="form-check-input" type="radio" name="satisfaction" wire:model="satisfaction" id="kurang" value="kurang">
                                            <label class="form-check-label" for="kurang">
                                                <img src="{{asset('frontend/public/assets/img/frown.svg')}}" alt="" width="50">
                                            </label>
                                        </div>
                                    </div>
                                    @error('satisfaction') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
            
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="storeTestimonial()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Kirim
                                </button>
                            </span>
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                <button wire:click="closeReviewModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Nanti saja
                                </button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 md:p-10 lg:p-10">
                <div class="text-2xl font-bold text-gray-500">
                    <h1>Kelas</h1>
                </div>
                @forelse ($courses as $row)
                    <a href="{{url('playing-videos/'.$row->slug)}}" class="w-full lg:w-full p-3">
                        <div class="flex flex-col lg:flex-row rounded overflow-hidden h-auto lg:h-32 border shadow shadow-lg">
                            <img class="block h-auto w-full lg:w-48 flex-none bg-cover h-24 p-2 md:p-3 rounded" src="{{asset('storage/'.$row->thumbnail_file_name)}}">
                            <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                <div class="text-black font-bold text-xl mb-2 leading-tight">{{$row->title}}</div>
                                <div>
                                    @php
                                        $tech = explode(',',$row->technology);
                                    @endphp
                                    @foreach ($tech as $item)
                                        <span class="bg-gradient-to-r from-green-400 to-blue-500 text-white p-2 rounded">{{$item}}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <h5 class="text-gray-500">Oops, masuk kelas yuk</h5>
                @endforelse

            </div>
        </div>
    </div>
</div>