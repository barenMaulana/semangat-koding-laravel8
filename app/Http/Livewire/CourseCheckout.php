<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseUser;

class CourseCheckout extends Component
{
    public  $slug,
            $course,
            $enroll;

    public function mount($post)
    {
        $this->slug = $post;
    }

    public function render()
    {
        $this->course = Course::where('slug',$this->slug)->first();
        $this->enroll = $this->isEnroll(Auth::user()->email,$this->course->id);
        return view('livewire.course-checkout')
        ->layout('layouts.home');
    }

    public function registerClass()
    {
        $course_user = CourseUser::create([
            'course_id' => $this->course->id,
            'course_title' => $this->course->title,
            'user_email' => Auth::user()->email
        ]);

        return redirect('/dashboard');
    }

    public function isEnroll($email,$course_id){
        $data = CourseUser::where('user_email', $email)
                            ->where('course_id', $course_id)->get();
        $result;
        // true ada, false ngga ada
        if(count($data) == 0)
        {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}
