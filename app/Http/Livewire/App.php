<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Testimonial;

class App extends Component
{
    public $courses,
            $testimonials;

    public function render()
    {
        $this->testimonials = Testimonial::where('star_review', 1)
                        ->where('status','active')
                        ->with('user')->limit(3)->get();
        $this->courses = Course::where('populer',1)->get();
        return view('pages.home')
        ->layout('layouts.home');
    }
}
