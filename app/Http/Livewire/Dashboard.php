<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseUser;
use App\Models\Course;
use App\Models\User;
use App\Models\CourseVideo;
use App\Models\Withdrawal;


class Dashboard extends Component
{

    public $courses,
            $studentTotal,
            $courseTotal,
            $mentorTotal,
            $playlistTotal,
            $amount,
            $uniqueCode = false;

    public function render()
    {
        // call data needed
        $this->studentTotal = User::where('role','user')->count();
        $this->courseTotal = Course::all()->count();
        $this->mentorTotal = User::where('role','mentor')->count();
        $this->playlistTotal = CourseVideo::all()->count();

        if(Auth::user()->role == 'admin'){
            return view('livewire.dashboard');
        }else if(Auth::user()->role == "mentor"){
            $courses = Course::where("user_id",Auth::user()->id)->get();
            $this->courses = $courses;
            return view('livewire.mentor-dashboard');
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

    public function withdrawalRequest($amount)
    {
        if($amount > Auth::user()->saldo){
            session()->flash('errMessage', 'Oops, saldo tidak mencukupi');
        }else{

        $this->validate([
            'amount' => 'required|numeric'
        ]);
        $this->uniqueCode = 'SEMANGAT-KODING|'.time();
        Withdrawal::create([
            'user_id' => Auth::user()->id,
            'amount' => $this->amount,
            'unique_code' => $this->uniqueCode
        ]);
        session()->flash('message', 'Berhasil mengirim permintaan penarikan saldo, saldo anda tidak akan berkurang secara langsung');
    }

    }
}
