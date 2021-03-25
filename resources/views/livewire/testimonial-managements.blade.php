<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Testimonial
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                    <div class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-4 py-3 shadow-md my-3 rounded" role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-5" id="navigationForMultipleDelete">
                    <input wire:model="search" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="search" placeholder="Search by s">
                </div> --}}
                <div class="pb-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="flex flex-1">
                                    <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                                        <table class="min-w-max w-full table-auto">
                                            <thead>
                                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                                    <th class="py-3 px-6 text-left">Message</th>
                                                    <th class="py-3 px-6 text-left">Satisfaction</th>
                                                    <th class="py-3 px-6 text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 text-sm font-light">
                                                @forelse($testimonials as $row)
                                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                        <td class="py-3 px-6 text-left">
                                                            <div class="flex items-center">
                                                                <span>{{$row->message}}</span>
                                                            </div>
                                                        </td>
                                                        <td class="py-3 px-6 text-center">
                                                            <span class="bg-gradient-to-r from-green-400 to-blue-500 text-white py-1 px-3 rounded-full text-xs">{{$row->satisfaction}}</span>
                                                        </td>
                                                        
                                                        <td class="py-3 px-6 text-center">
                                                            <div class="flex item-center justify-center">
                                                                @php
                                                                $activeColor = "none";
                                                                $starColor = "none";
                                                                $star = 1;
                                                                $status = "active";
                                                                    if($row->status != "pending"){
                                                                        $activeColor  = "#2ecc71";
                                                                        $status = "pending";
                                                                    }
                                                                    if($row->star_review != 0){
                                                                        $starColor  = "#fff200";
                                                                        $star = 0;
                                                                    }

                                                                @endphp
                                                                <button wire:click="approve({{ $row->id }},'{{$status}}')" class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="{{$activeColor}}" viewBox="0 0 30 30" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                                                    </svg>
                                                                </button>
                                                                <button wire:click="star({{ $row->id }},{{$star}})" class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="{{$starColor}}" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div class="py-5">
                                            {{ $testimonials->links() }}
                                        </div>
                                    </main>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

