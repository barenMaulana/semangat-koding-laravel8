<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Withdrawal;
use App\Models\User;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

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

    public function approve($withdraw_id,$status,$user_id)
    {
        $pesan = "";
        $isError = 0;

        DB::beginTransaction();
        try {
                $user = User::find($user_id);
                $withdrawData = Withdrawal::find($withdraw_id);
                if($withdrawData->status == 'success'){
                    $pesan = "penarikan sudah di proses";
                    $isError = 1;
                    session()->flash($isError == 0 ? "message" : "errMessage", $pesan);

                    return ;
                }
                $withdraw = Withdrawal::where('id',$withdraw_id)
                            ->update([
                                'status' => $status
                            ]);
                if($status == 'success'){
                    $user->saldo = $user->saldo - $withdrawData->amount;
                    $user->save();
                }
                DB::commit();
                $withdrawData = Withdrawal::find($withdraw_id);
            } catch (\Exception $e) {
                DB::rollback();
            }

        if($withdraw == 1){
            if($status == 'success'){
                $pesan = "withdraw approved!";

                Mail::to($user->email)->send(new SendMail($user->name, $withdrawData));
            }else{
                $pesan = "withdraw rejected!";
                Mail::to($user->email)->send(new SendMail($user->name, $withdrawData));
            }
        }else{
            $pesan = "can't approved or rejected the request, There is something wrong!";
            $isError = 1;
        }
        session()->flash($isError == 0 ? "message" : "errMessage", $pesan);
    }
}
