<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PlayingVideos extends Component
{

    public $param;
    
    public function mount($post)
    {
        $this->param = $post;
    }

    public function render()
    {
        return view('livewire.playing-videos');
    }
}
