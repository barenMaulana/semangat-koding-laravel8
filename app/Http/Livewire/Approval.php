<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Withdrawal;
use App\Models\User;

class Approval extends Component
{
    public $withdrawals,
            $user;

    public function render()
    {
        $user_id = [];
        $this->withdrawals = Withdrawal::where('status','pending')->latest()->get();
        for ($i=0; $i < count($this->withdrawals); $i++) { 
            array_push($user_id,$this->withdrawals[$i]->user_id);
        }
        $this->user = User::WhereIn('id',$user_id)->get();
        return view('livewire.approval');
    }

    public function approve($user_id,$status)
    {
        $pesan = "";
        $isError = 0;
        $withdraw = Withdrawal::where('id',$user_id)
                    ->update([
                        'status' => $status
                    ]);
        if($withdraw == 1){
            if($status == 'success'){
                $pesan = "withdraw approved!";
            }else{
                $pesan = "withdraw rejected!";
            }
        }else{
            $pesan = "can't approved or rejected the request, There is something wrong!";
            $isError = 1;
        }
        session()->flash($isError == 0 ? "message" : "errMessage", $pesan);
    }
}
