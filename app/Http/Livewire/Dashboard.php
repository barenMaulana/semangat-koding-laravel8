<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseUser;
use App\Models\Course;
use App\Models\User;
use App\Models\CourseVideo;


class Dashboard extends Component
{

    public $courses;
    public $studentTotal;
    public $courseTotal;
    public $mentorTotal;
    public $playlistTotal;

    public function render()
    {
        // call data needed
        $this->studentTotal = User::where('role','user')->count();
        $this->courseTotal = Course::all()->count();
        $this->mentorTotal = User::where('role','mentor')->count();
        $this->playlistTotal = CourseVideo::all()->count();

        if(Auth::user()->role == 'admin'){
            return view('livewire.dashboard');
        }else{
            $courseAccess = CourseUser::where('user_email',Auth::user()->email)->get();
            $idCourse = [];
            for ($i=0; $i < count($courseAccess); $i++) { 
                array_push($idCourse,$courseAccess[$i]->course_id);
            }
            $this->courses = Course::whereIn('id',$idCourse)->get();
            return view('livewire.user-dashboard');
        }
    }
}