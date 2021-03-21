<div>
    <div class="flex justify-end">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 w-4/6 rounded-xl shadow">
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
            <form>
                <div class="mb-4">
                    <label for="payment_account" class="block text-gray-700 text-sm font-bold mb-2">No Rekening:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="payment_account" wire:model="payment_account">
                    @error('payment_account') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="payment_profile" class="block text-gray-700 text-sm font-bold mb-2">Atas Nama:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="payment_profile" wire:model="payment_profile">
                    @error('payment_profile') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="bank_name" class="block text-gray-700 text-sm font-bold mb-2">Nama Bank</label>
                    <select class="form-control" wire:model="bank_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Pilih</option>
                        <option value="BCA">BCA</option>
                        <option value="BRI">BRI</option>
                        <option value="BNI">BNI</option>
                        <option value="MANDIRI">MANDIRI</option>
                        <option value="BJB">BJB</option>
                    </select>
                    @error('bank_name') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                
                <hr class="my-5">
                <p class="text-center text-gray-500 ">Optional</p>
                <div class="mb-4">
                    <label for="payment_account1" class="block text-gray-700 text-sm font-bold mb-2">No Rekening:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="payment_account1" wire:model="payment_account1">
                    @error('payment_account1') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="payment_profile1" class="block text-gray-700 text-sm font-bold mb-2">Atas Nama:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="payment_profile1" wire:model="payment_profile1">
                    @error('payment_profile1') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="bank_name1" class="block text-gray-700 text-sm font-bold mb-2">Nama Bank</label>
                    <select class="form-control" wire:model="bank_name1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Pilih</option>
                        <option value="BCA">BCA</option>
                        <option value="BRI">BRI</option>
                        <option value="BNI">BNI</option>
                        <option value="MANDIRI">MANDIRI</option>
                        <option value="BJB">BJB</option>
                    </select>
                    @error('bank_name1') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Save
                        </button> 
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>