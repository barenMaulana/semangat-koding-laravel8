<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Http;


class PlayingVideos extends Component
{

    public  $param,
            $courseVideos,
            $videoId,
            $videoIndex,
            $courseTitle;
    
    public function mount($post,$id = 0)
    {
        $this->param = $post;
        $this->videoIndex = $id;
    }

    public function render()
    {
        $courseAndVideo = Course::where('slug',$this->param)->first()->courseVideo;
        $response;
        if($courseAndVideo != null){
            $playlistId = $courseAndVideo->playlistId;
            $key = env('YOUTUBE_KEY');
            $response = Http::get('https://www.googleapis.com/youtube/v3/playlistItems?key='.$key.'&playlistId='.$playlistId.'&part=snippet&maxResults=50&pageToken=CAEQAA');
            if($response->status() == 200){
                $this->courseVideos = $response->json();
                $this->videoId = $this->courseVideos['items'][$this->videoIndex]['snippet']['resourceId']['videoId'];
                $this->courseTitle = $this->courseVideos['items'][$this->videoIndex]['snippet']['title'];
            }else{
                dd($response->json());
            }
        }
        return view('livewire.playing-videos');
    }
}
