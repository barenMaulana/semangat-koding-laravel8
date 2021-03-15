<div>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-center items-center">
                <img src="{{asset('storage/'.Auth::user()->profile_photo_path)}}" width="50" style="border-radius: 50%;">&nbsp;
                {{ __(Auth::user()->name) }}
            </h2>
    </x-slot>
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