<div>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-1">
                        <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                            <div class="flex flex-col">
                                <!-- Stats Row Starts Here -->
                                <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                                    <div class="rounded-lg bg-gradient-to-r from-green-400 to-blue-500 mb-2 p-2 md:w-1/4 mx-2">
                                        <div class="p-4 flex flex-col">
                                            <p class="no-underline text-white text-2xl">
                                                Students
                                            </p>
                                            <p class="no-underline text-white text-lg">
                                                {{$studentTotal}}
                                            </p>
                                        </div>
                                    </div>
            
                                    <div class="rounded-lg bg-gradient-to-r from-green-400 to-blue-500 mb-2 p-2 md:w-1/4 mx-2">
                                        <div class="p-4 flex flex-col">
                                            <a href="#" class="no-underline text-white text-2xl">
                                                Courses
                                            </a>
                                            <a href="#" class="no-underline text-white text-lg">
                                                {{$courseTotal}}
                                            </a>
                                        </div>
                                    </div>
            
                                    <div class="rounded-lg bg-gradient-to-r from-green-400 to-blue-500 mb-2 p-2 md:w-1/4 mx-2">
                                        <div class="p-4 flex flex-col">
                                            <a href="#" class="no-underline text-white text-2xl">
                                                Mentors
                                            </a>
                                            <a href="#" class="no-underline text-white text-lg">
                                                {{$mentorTotal}}
                                            </a>
                                        </div>
                                    </div>
            
                                    <div class="rounded-lg bg-gradient-to-r from-green-400 to-blue-500 mb-2 p-2 md:w-1/4 mx-2">
                                        <div class="p-4 flex flex-col">
                                            <a href="#" class="no-underline text-white text-2xl">
                                                Playlist
                                            </a>
                                            <a href="#" class="no-underline text-white text-lg">
                                                {{$playlistTotal}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                </div>
            </div>
        </div>
</div>