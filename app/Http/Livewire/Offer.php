<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Offer extends Component
{
    public $admin,
            $adminPhone;

    public function render()
    {
        $this->adminPhone = env('ADMIN_PHONE');
        $this->admin = User::where('role', 'admin')->first();
        return view('livewire.offer');
    }
}
