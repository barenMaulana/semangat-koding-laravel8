<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="flex flex-col-reverse md:flex-row md:flex-1">
                    <aside id="sidebar" class="bg-side-nav w-full my-10 md:my-0 lg:my-0 md:w-1/6 lg:w-1/6 border-r border-side-nav md:block lg:block overflow-y-scroll" style="height: 90vh">
                        <ul class="list-reset flex flex-col">
                            @forelse ($courseVideos['items'] as $key => $youtube)
                                <li class=" w-full h-full py-3 px-2 border-b border-light-border text-white bg-gradient-to-r from-blue-400 to-indigo-500">
                                    <a href="{{url('playing-videos/'.$param.'/'.$key)}}"
                                    class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                            {{$youtube["snippet"]["title"]}}
                                        <span><i class="fas fa-angle-right float-right"></i></span>
                                    </a>
                                </li>
                            @empty
                                <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
                                    <a href="#"
                                    class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                            Tidak ditemukan
                                        <span><i class="fas fa-angle-right float-right"></i></span>
                                    </a>
                                </li>
                            @endforelse
                        </ul>
                    </aside>
                    <main class="bg-white-300 flex-1 p-3 h-3/6 ">
                            <div class="text-2xl font-bold text-gray-500 text-center py-10">
                                <h1>{{$courseTitle}}</h1>
                            </div>
                        <div class="flex justify-center items-center h-full rounded">
                                <iframe 
                                id="ytplayer"
                                type="text/html" 
                                width="720" 
                                height="405"
                                class="rounded border-8 border-blue-900"
                                src="https://www.youtube.com/embed/{{$videoId}}/?cc_load_policy=1&color=white&autoplay=1"
                                frameborder="0" 
                                allowfullscreen>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
