<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Testimonial;

class Testimonials extends Component
{
    public $users,
            $testimonials;

    public function render()
    {
        $this->testimonials = Testimonial::where('star_review',1)->
        where('status','active')->
        latest()->with('user')->get();

        return view('pages.testimonials')
            ->layout('layouts.home');
    }
}
