<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="courseTitle" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="courseTitle" wire:model="title">
                            @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="coursePrice" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="coursePrice" wire:model="price">
                            @error('price') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="courseDescription" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="courseDescription" wire:model="description">
                            @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="buildwith" class="block text-gray-700 text-sm font-bold mb-2">Mentor:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="buildwith" wire:model="build_with">
                            @error('build_with') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="operatingSystem" class="block text-gray-700 text-sm font-bold mb-2">OS:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="operatingSystem" wire:model="operating_system">
                            @error('operating_system') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="ram" class="block text-gray-700 text-sm font-bold mb-2">RAM:</label>
                            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ram" wire:model="ram">
                            @error('ram') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="empty_storage" class="block text-gray-700 text-sm font-bold mb-2">Empty storage:</label>
                            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="empty_storage" wire:model="empty_storage">
                            @error('empty_storage') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="will_study" class="block text-gray-700 text-sm font-bold mb-2">Will study:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="will_study" wire:model="will_study">
                            @error('will_study') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="technology" class="block text-gray-700 text-sm font-bold mb-2">Technology used:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="technology" wire:model="technology">
                            @error('technology') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <hr class="my-5">
                        <h5 class="text-center block text-gray-700 text-sm font-bold">payment information <sup>required</sup></h5>
                        <div class="mb-4">
                            <label for="payment_account" class="block text-gray-700 text-sm font-bold mb-2">Payment account:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="payment_account" wire:model="payment_account">
                            @error('payment_account') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="payment_account_name" class="block text-gray-700 text-sm font-bold mb-2">Payment account name:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="payment_account_name" wire:model="payment_account_name">
                            @error('payment_account_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="bankName" class="block text-gray-700 text-sm font-bold mb-2">bankName</label>
                            <select class="form-control" wire:model="bankName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="BCA">BCA</option>
                                <option value="BRI">BRI</option>
                                <option value="BNI">BNI</option>
                                <option value="MANDIRI">MANDIRI</option>
                                <option value="BJB">BJB</option>
                            </select>
                            @error('bankName') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <hr class="my-5"> 
                        <h5 class="text-center block text-gray-500 text-sm font-bold">payment information <sup>Optional</sup></h5>
                        <div class="mb-4">
                            <label for="payment_account1" class="block text-gray-700 text-sm font-bold mb-2">Payment account:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="payment_account1" wire:model="payment_account1">
                            @error('payment_account1') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="payment_account_name1" class="block text-gray-700 text-sm font-bold mb-2">Payment account name:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="payment_account_name1" wire:model="payment_account_name1">
                            @error('payment_account_name1') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="bankName1" class="block text-gray-700 text-sm font-bold mb-2">bankName1</label>
                            <select class="form-control" wire:model="bankName1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="BCA">BCA</option>
                                <option value="BRI">BRI</option>
                                <option value="BNI">BNI</option>
                                <option value="MANDIRI">MANDIRI</option>
                                <option value="BJB">BJB</option>
                            </select>
                            @error('bankName1') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Phone number:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone_number" wire:model="phone_number">
                            @error('phone_number') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <hr class="my-5">
                        <div class="mb-4">
                            <label for="consultation" class="block text-gray-700 text-sm font-bold mb-2">Consultation</label>
                            <select class="form-control" wire:model="consultation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="1">Active</option>
                                <option value="0">N/A</option>
                            </select>
                            @error('consultation') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="populer" class="block text-gray-700 text-sm font-bold mb-2">Populer</label>
                            <select class="form-control" wire:model="populer" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="1">Active</option>
                                <option value="0">N/A</option>
                            </select>
                            @error('populer') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="certificate" class="block text-gray-700 text-sm font-bold mb-2">Certificate</label>
                            <select class="form-control" wire:model="certificate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="1">Active</option>
                                <option value="0">N/A</option>
                            </select>
                            @error('certificate') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                            <select class="form-control" wire:model="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="premium">Premium</option>
                                <option value="free">Free</option>
                            </select>
                            @error('type') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                            <select class="form-control" wire:model="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="coding app">coding app</option>
                                <option value="crash course">crash course</option>
                                <option value="with technology">with technology</option>
                            </select>
                            @error('category') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="thumbs" class="block text-gray-700 text-sm font-bold mb-2">Thumbs:</label>
                            <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="thumbs" wire:model="thumbnail_file_name">
                            @error('thumbnail_file_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        @php
                            $array = explode(".",$thumbnail_file_name);
                        @endphp
                        @if ($array[count($array)-1] == "png" || $array[count($array)-1] == "jpg" || $array[count($array)-1] == "jpeg")
                            <div class="mb-4">
                                <img src="{{asset('storage/'.$thumbnail_file_name)}}" width="400" class="mx-auto shadow-xl">
                            </div>
                        @endif
                    </div>
                </div>
    
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Save
                        </button> 
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        
                        <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Cancel
                        </button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</div>