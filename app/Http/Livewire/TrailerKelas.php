<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Http;


class TrailerKelas extends Component
{
    public  $slug,
            $course,
            $videos,
            $videoData;
    
    public function mount($post)
    {
        $this->slug = $post;
    }

    public function render()
    {

        $courseAndVideo = Course::where('slug',$this->slug)->first()->courseVideo;
        $this->videoData = $courseAndVideo;
        $response;
        if($courseAndVideo != null){
            $playlistId = $courseAndVideo->playlistId;
            $key = env('YOUTUBE_KEY');
            $response = Http::get('https://www.googleapis.com/youtube/v3/playlistItems?key='.$key.'&playlistId='.$playlistId.'&part=snippet&maxResults=50&pageToken=CAEQAA');
            if($response->status() == 200){
                $this->videos = $response->json()['items'];
            }else{
                dd($response->json());
            }
        }
        // dd($this->videos['items']);

        $this->course = Course::where('slug',$this->slug)->first();
        return view('pages.trailer-kelas')
        ->layout('layouts.home');
    }
}
