<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Course Access
        </h2>
    </x-slot>
    
    @if ($deleteId)
    <div class="h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50" id="modalDelete">
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
        const modal = document.getElementById('modalDelete');
                const closeModal = document.querySelectorAll('.close-modal');
                closeModal.forEach(close => {
                close.addEventListener('click', function (){
                modal.classList.add('hidden')
            });
        });
      </script>
    @endif


    @if($isModal)
        @include('livewire.user_course.modal')
    @endif

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg-px-8">
            <div class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                @if (session()->has('message'))
                    <div class="bg-gradient-to-r from-blue-400 to-green-500 text-white px-4 py-3 shadow-md my-3 rounded" role="alert">
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
                <div class="text-2xl font-bold text-gray-500">
                    <h1>Enroll</h1>
                </div>
                <div class="flex justify-around pt-5">
                    <div>
                        <input wire:model="userEmail" type="text" list="userEmail" name="userEmail" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"  placeholder="Search by email">
                        <p> @error('userEmail') <span class="text-red-500">{{ $message }}</span>@enderror</p>
                        <div class="flex justify-center">
                            <div class="bg-white shadow-xl rounded-lg w-full">
                                <datalist id="userEmail" class="divide-y divide-gray-300">
                                    @forelse ($users as $row)
                                        <option class="p-4 hover:bg-gray-50 cursor-pointer" value="{{$row->email}}">{{$row->email}}</option>
                                    @empty
                                        <option value="">Tidak menemukan apapun</option>                           
                                    @endforelse
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input wire:model="courseTitle" type="text" list="courseTitle" name="courseTitle" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" placeholder="Search by course name">
                        <div class="flex justify-center">
                            <div class="bg-white shadow-xl rounded-lg w-full">
                                <datalist id="courseTitle" class="divide-y divide-gray-300">
                                    @forelse ($courses as $row)
                                        <option class="p-4 hover:bg-gray-50 cursor-pointer" value="{{$row->title}},{{$row->id}}">{{$row->title}}</option>
                                    @empty
                                        <option value="">Tidak menemukan apapun</option>                   
                                    @endforelse
                                </datalist>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-auto my-5">
                    <input wire:model="discount_code" type="text" list="discount_code" name="discount_code" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" placeholder="Discount Code">
                    <p> @error('discount_code') <span class="text-red-500">{{ $message }}</span>@enderror</p>
                </div>
                @if ($openButton)
                    <div class="flex justify-center py-6">
                        <button wire:click.prevent="store()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Enroll</button>
                    </div>
                @endif
            </div>
            <div class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                <div class="text-2xl font-bold text-gray-500">
                    <h1>Enrolled User</h1>
                </div>
                <div class="py-5">
                    <input wire:model="search" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="search" placeholder="Search by email">
                    <button class="bg-yellow-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 hidden" id="okButton">Ok</button>
                    <button wire:click="multipleDelete()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-3 hidden" id="multipleDeleteButton">Delete</button>
                    <div class="inline-block">
                        <button type="button" class="focus:outline-none text-white text-sm py-3 px-4 rounded-md bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 hover:bg-blue-600 hover:shadow-lg flex items-center hidden" id="buttonReload">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                              </svg>
                            Reload
                        </button>
                    </div>
                </div>
                <div class="flex flex-1">
                    <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Course</th>
                                    <th class="py-3 px-6 text-left">Email</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @forelse($courseUsers as $row)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="font-medium">{{$row->course_title}}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{$row->user_email}}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                                <button wire:click="edit({{ $row->id }})" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </button>
                                                <button wire:click="confirmDelete({{$row->id}})" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                                <input type="checkbox" name="check" class="rounded hover:text-yellow-500 hover:scale-110 checkbox" value="{{$row->id}}">
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
                            {{ $courseUsers->links() }}
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script>
        let allCheckBox = document.querySelectorAll('.checkbox')
        let id_course = []
        let deleteButtonFinal = document.getElementById("multipleDeleteButton")
        let accSelectionButton = document.getElementById("okButton")
        let reloadButton = document.getElementById("buttonReload")

        allCheckBox.forEach((checkbox) => { 
            checkbox.addEventListener('change', (event) => {
                if (event.target.checked) {
                    id_course.push(event.target.value)
                }else{
                    id_course = arrayRemove(id_course,event.target.value)
                }
                accSelectionButton.classList.remove("hidden")
            })
        })
        
        accSelectionButton.addEventListener('click', () => {
            deleteButtonFinal.classList.remove("hidden")
            deleteButtonFinal.setAttribute("wire:click",`multipleDelete([`+ id_course +`])`)
            id_course = []

            for (var i = 0; i < allCheckBox.length; i++) { 
                allCheckBox[i].checked = false; 
            }    
        })

        deleteButtonFinal.addEventListener("click",() => {
            setTimeout(function(){
                reloadButton.classList.remove("hidden")
            }, 3000);
        })
        reloadButton.addEventListener("click",() =>{
            location.reload()
        })
            
        function arrayRemove(arr, value) { 
            return arr.filter(function(ele){ 
                return ele != value; 
            });
        }


    </script>
</div>
