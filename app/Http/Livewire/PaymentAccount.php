<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PaymentAccount extends Component
{
    public $payment_account,
            $payment_profile,
            $bank_name,
            $payment_account1,
            $payment_profile1,
            $bank_name1,
            $user_id,
            $show = true;

    public function render()
    {
        $this->user_id = Auth::user()->id;
        if($this->show){
            $this->payment_account = Auth::user()->payment_account;
            $this->payment_profile = Auth::user()->payment_profile;
            $this->bank_name = Auth::user()->bank_name;
            $this->payment_account1 = Auth::user()->payment_account1;
            $this->payment_profile1 = Auth::user()->payment_profile1;
            $this->bank_name1 = Auth::user()->bank_name1;
        }
        $this->show = false;

        return view('livewire.payment-account');
    }

    public function store()
    {
        $this->validate([
            'payment_account' => 'required|string',
            'payment_profile' => 'required',
            'bank_name' => 'required',
        ]);
        $update = User::updateOrCreate(['id' => $this->user_id], [
            'payment_account' => $this->payment_account,
            'payment_profile' => $this->payment_profile,
            'bank_name' => $this->bank_name,
            'payment_account1' => $this->payment_account1,
            'payment_profile1' => $this->payment_profile1,
            'bank_name1' => $this->bank_name1,
        ]);
        if($update != '0'){
            session()->flash('message','payment account updated!');
        }else{
            session()->flash('errMessage','failed update payment account!');
        }
    }
}
