<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;


class Kelas extends Component
{
    public $courses;
    public function render()
    {
        $this->courses = Course::latest()->get();
        return view('pages.class')
        ->layout('layouts.home');
    }
}
