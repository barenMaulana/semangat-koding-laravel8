<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseUser;
use App\Models\DiscountCode;

class CourseCheckout extends Component
{
    public  $slug,
            $course,
            $enroll,
            $discount_code,
            $discount_amount = 0,
            $price_amount,
            $use_discount_confirmation;

    public function mount($post)
    {
        $this->slug = $post;
    }

    public function render()
    {
        $date = date('Y-m-d');
        $deleteDiscount = DiscountCode::where('time_period',$date)->delete();
        $this->course = Course::where('slug',$this->slug)->with('discount')->first();
        $this->enroll = $this->isEnroll(Auth::user()->email,$this->course->id);

        if($this->discount_amount == 0){
            $this->price_amount = $this->course->price;
        }

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

    public function checkDiscountCode()
    {
        $discount = DiscountCode::where('unique_code',$this->discount_code)
                                ->where('course_id',$this->course->id)
                                ->where('status','active')
                                ->first();
        if($discount != null){
            $this->discount_amount = $this->course->price * $discount->discount_percentage / 100;
            $this->price_amount = $this->course->price - $this->discount_amount;  
            $discountUse = $this->discount_code;
            $this->use_discount_confirmation = $discountUse;
            session()->flash("message", "kode diskon berhasil digunakan");
        }else{
            session()->flash("errMessage", "kode diskon salah");
        }
    }
}
