<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

class App extends Component
{
    public $courses;
    public function render()
    {
        $this->courses = Course::where('populer',1)->get();
        return view('pages.home')
        ->layout('layouts.home');
    }
}
