<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Courses
        </h2>
    </x-slot>

    @if ($deleteId)
        <div class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">
            <div class="bg-white rounded shadow-lg w-1/3">
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg">Delete this course?</h3>
            </div>
            <div class="flex justify-end items-center w-100 border-t p-3">
                <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal">Cancel</button>
                <button wire:click="delete({{$deleteId}})" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white">Oke</button>
            </div>
            </div>
        </div>
        
        <script>
            const modal = document.querySelector('.modal');
            const closeModal = document.querySelectorAll('.close-modal');
            closeModal.forEach(close => {
            close.addEventListener('click', function (){
                modal.classList.add('hidden')
            });
            });
        </script>
    @endif

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg px-4 py-4">

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

                @if (Auth::user()->role == "mentor")
                    <div class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                        <div class="text-2xl font-bold text-gray-500">
                            <h1>Request Discount</h1>
                        </div>
                        <div class="flex justify-around pt-5">
                            <div>
                                <input wire:model="course_title" type="text" list="course_title" name="course_title" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" placeholder="Search by course name">
                                <div class="flex justify-center">
                                    <div class="bg-white shadow-xl rounded-lg w-full">
                                        <datalist id="course_title" class="divide-y divide-gray-300">
                                            @forelse ($courses as $row)
                                                <option class="p-4 hover:bg-gray-50 cursor-pointer" value="{{$row->title}},{{$row->id}}">{{$row->title}}</option>
                                            @empty
                                                <option value="">Tidak menemukan apapun</option>                   
                                            @endforelse
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input wire:model="discount_percentage" type="text" list="discount_percentage" name="discount_percentage" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"  placeholder="Discount precentage">
                                    <p> @error('discount_percentage') <span class="text-red-500">{{ $message }}</span>@enderror</p>
                            </div>
                            <div>
                                <input wire:model="time_period" type="date" list="time_period" name="time_period" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"  placeholder="Batas waktu">
                                <sup class="text-gray-500">Batas Waktu</sup>
                                    <p> @error('time_period') <span class="text-red-500">{{ $message }}</span>@enderror</p>
                            </div>
                        </div>
                        @if ($openButton)
                            <div class="flex justify-center py-6">
                                <button wire:click.prevent="store()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Request</button>
                            </div>
                        @endif

                        @if ($showConfirmation)
                            <a href="https://api.whatsapp.com/send?phone={{env('ADMIN_PHONE')}}&text=Halo,%20saya%20ingin%20meminta%20kode%20diskon%20yang%20telah%20saya%20ajukan,%20dengan%20Request%20Code%20:%20{{$request_code}}" class="inline-flex justify-center w-1/2 rounded-md border border-transparent px-4 py-2 bg-gradient-to-r bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 my-5 mx-auto" target="_blank">
                                Konfirmasi Sekarang 
                            </a>
                        @endif
                    </div>
                @endif
                
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" id="navigationForMultipleDelete">
                    <input wire:model="search" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="search" placeholder="Search by title">
                </div>

                <div>
                    @forelse ($discounts as $item)
                        <div class="flex flex-col bg-white shadow-lg rounded-lg mx-4 md:mx-auto my-5 max-w-md md:max-w-2xl p-4">
                            <div class="flex items-center justify-center">
                                <h2 class="text-lg font-semibold text-gray-900 -mt-1 my-2">{{Str::upper($item->course->title)}}</h2>
                            </div>
                            <div class="flex items-center justify-end">
                                <small class="text-sm text-gray-700">{{$item->created_at->diffForHumans()}}</small>
                            </div>
                            @php
                                $bgColor = "bg-green-200";
                                if($item->status == "reject"){
                                    $bgColor = "bg-red-200";
                                }else if($item->status == "pending"){
                                    $bgColor = "bg-yellow-200";
                                }
                            @endphp
                            <p class="text-gray-700 my-1">Request Code : <span class="px-2 py-1 text-xs text-gray-500 font-bold leading-none bg-blue-200 rounded">{{$item->request_code}}</span> </p>
                            <p class="text-gray-700 my-1">Status : <span class="px-2 py-1 text-xs text-gray-500 font-bold leading-none {{ $bgColor }} rounded">{{$item->status}}</span> </p>
                            <p class="text-gray-700 my-1">Discount Percentage : <span class="px-2 py-1 text-xs text-gray-500 font-bold leading-none bg-blue-200 rounded">{{$item->discount_percentage}} %</span> </p>
                            <p class="text-gray-700 my-1">Until : <span class="px-2 py-1 text-xs text-gray-500 font-bold leading-none bg-blue-200 rounded">{{$item->time_period}}</span> </p>
                            <p class="text-gray-700 my-1">Mentor : <span class="px-2 py-1 text-xs text-gray-500 font-bold leading-none bg-blue-200 rounded">{{$item->user->name}}</span> </p>
                            <p class="text-gray-700 my-1">Discount Code : <div class="px-2 py-10 text-4xl text-center {{ $item->status == 'reject' ? "text-gray-200" : "text-white" }} font-bold leading-none {{ $item->status == 'reject' ? "bg-red-500" : "bg-blue-500" }} rounded">{{$item->unique_code}}</div> </p>
                            <div class="mt-4 flex items-center justify-around">
                                @if (Auth::user()->role == "admin")                                            
                                    @if ($item->status != "active" && $item->status != "reject")
                                        <button wire:click="approve({{$item->id}},'active')" class="bg-green-400 hover:bg-green-300 text-white font-bold py-2 px-4 rounded my-3">Approve</button>
                                        <button wire:click="approve({{$item->id}},'reject')" class="bg-red-400 hover:bg-green-300 text-white font-bold py-2 px-4 rounded my-3">Reject</button>
                                    @else
                                        <button wire:click="confirmDelete({{$item->id}})" class="bg-red-400 hover:bg-green-300 text-white font-bold py-2 px-4 rounded my-3">Delete</button>
                                    @endif
                                @endif
                                @if (Auth::user()->role == "mentor" && $item->status == "reject")
                                    <button wire:click="confirmDelete({{$item->id}})" class="bg-red-400 hover:bg-green-300 text-white font-bold py-2 px-4 rounded my-3">Delete</button>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-2xl font-bold text-gray-500 py-10 text-center">
                            <h4>Tidak menemukan diskon</h4>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div> 
</div>
