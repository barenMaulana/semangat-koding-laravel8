<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseUser;
use App\Models\Course;


class Dashboard extends Component
{

    public $courses;

    public function render()
    {
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
