<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Kelas extends Component
{
    public function render()
    {
        return view('pages.class')
        ->layout('layouts.home');
    }
}
