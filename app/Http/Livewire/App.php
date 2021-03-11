<?php

namespace App\Http\Livewire;

use Livewire\Component;

class App extends Component
{
    public function render()
    {
        return view('pages.home')
        ->layout('layouts.home');
    }
}
