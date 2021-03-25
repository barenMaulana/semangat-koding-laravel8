<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Testimonial;
use Livewire\WithPagination;

class TestimonialManagements extends Component
{
    use WithPagination;

    public function render()
    {
        $testimonials = Testimonial::latest()->simplePaginate(10);
        return view('livewire.testimonial-managements',[
            'testimonials' => $testimonials
        ]);
    }

    public function approve($id, $result)
    {
        $hasil = Testimonial::where('id',$id)
                    ->update([
                        'status' => $result
                    ]);
    }

    public function star($id, $result)
    {
        Testimonial::where('id',$id)
                    ->update([
                        'star_review' => $result
                    ]);
    }
}
