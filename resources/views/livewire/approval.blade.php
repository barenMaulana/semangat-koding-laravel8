<div>
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
    
    @forelse ($withdrawals as $key => $row)
        <div class="flex flex-col bg-white shadow-lg rounded-lg mx-4 md:mx-auto my-10 max-w-md md:max-w-2xl ">
            <div class="flex items-start px-4 py-6">
                <img class="w-12 h-12 rounded-full object-cover mr-4 shadow" src="{{asset('storage/'.$user[$key]->profile_photo_path)}}" alt="avatar">
            <div class="w-full">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{$user[$key]->name}} </h2>
                <small class="text-sm text-gray-700">{{$row->created_at->diffForHumans()}}</small>
            </div>
            <p class="text-gray-700">Transaction code : <span class="px-2 py-1 text-xs text-gray-500 font-bold leading-none bg-blue-200 rounded">{{$row->unique_code}}</span> </p>
            <p class="text-gray-700">Jumlah penarikan: <div class="px-2 py-10 text-4xl text-center text-white font-bold leading-none bg-blue-500 rounded">Rp.{{number_format($row->amount)}}</div> </p>
            <p class="text-gray-700">Jumlah saldo mentor: <div class="px-2 py-10 text-4xl text-center text-white font-bold leading-none bg-blue-500 rounded">Rp.{{number_format($user[$key]->saldo)}}</div> </p>
            <div class="mt-4 flex items-center justify-around">
                <button wire:click="approve({{$row->id}},'success',{{$user[$key]->id}})" class="bg-green-400 hover:bg-green-300 text-white font-bold py-2 px-4 rounded my-3">Approve</button>
                <button wire:click="approve({{$row->id}},'reject',{{$user[$key]->id}})" class="bg-red-400 hover:bg-green-300 text-white font-bold py-2 px-4 rounded my-3">Reject</button>
            </div>
        </div>
    @empty
        <div class="text-2xl font-bold text-gray-500 py-10 text-center">
            <h4>Belum ada yang perlu disetujui</h4>
        </div>
    @endforelse
</div>
