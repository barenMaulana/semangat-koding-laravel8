<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DiscountCode;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Discount extends Component
{

    public  $courses = [],
            $course_title,
            $openButton,
            $discount_percentage,
            $time_period,
            $showConfirmation = false,
            $request_code;

    public $deleteId = false;    
    public $discount_id = 0;
    public $search;
    public $page = 1;

    protected $updatesQueryString = [
    ['page' => ['except' => 1]],
    ['search' => ['except' => '']],
    ];

    public function render()
    {
        $discounts;

        if(Auth::user()->role == "admin"){
            $discounts = DiscountCode::latest()->with('user')->get();
        }else{
            $discounts = DiscountCode::where('user_id',Auth::user()->id)
                                        ->with('user')
                                        ->where('status','active')
                                        ->orWhere('status','reject')
                                        ->latest()
                                        ->get();
        }


        if (Auth::user() == 'admin') {
            if ($this->search !== null) {
                $discounts = DiscountCode::where('request_code', 'like', '%' . $this->search . '%')
                                ->orWhere('status','pending')
                                ->with('user')
                                ->latest()
                                ->get();
            }
        }else{
            if ($this->search !== null) {
                $discounts = DiscountCode::where('request_code', 'like', '%' . $this->search . '%')
                                ->Where('status','=','active')
                                ->Where('user_id','=',Auth::user()->id)
                                ->with('user')
                                ->latest()
                                ->get();
                $this->showConfirmation = false;
            }
        }


        if ($this->course_title != null){
            $this->courses = Course::where('title', 'like', '%' . $this->course_title . '%')
                                    ->where('user_id','=',Auth::user()->id)
                                    ->where('type','=','premium')
                                    ->get();
        }

        if($this->course_title != null){
            if($this->discount_percentage != null){
                if($this->time_period != null){
                    $this->openButton = true;
                }
            }
        }

        return view('livewire.discount',[
            'discounts' => $discounts
        ]);
    }

    public function resetFields()
    {
        $this->discount_id = '';
        $this->course_title = '';
        $this->discount_percentage = '';
        $this->deleteId = false;
    }

    public function store()
    {
        $course_id = explode(',',$this->course_title)[1];
        $unique_code = Str::upper(Str::random(8));
        $request_code ='SK-'. Str::upper(Str::random(10));
        $this->request_code = $request_code;

        $this->validate([
            'course_title' => 'required',
            'discount_percentage' => 'required|numeric',
            'time_period' => 'required',
        ]);

        DiscountCode::updateOrCreate(['id' => $this->discount_id], [
            'course_id' => $course_id,
            'user_id' => Auth::user()->id,
            'discount_percentage' => $this->discount_percentage,
            'time_period' => $this->time_period,
            'unique_code' => $unique_code,
            'request_code' => $request_code
        ]);

        session()->flash('message','permintaan dikirim');
        $this->resetFields();
        $this->showConfirmation = true;
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete($id)
    {
        $users = DiscountCode::find($id);
        $users->delete(); 
        $this->resetFields();
        session()->flash('message', 'Discount code deleted');
    }

    public function approve($id,$status)
    {
        $result = DiscountCode::where('id',$id)
                    ->update([
                        'status' => $status
                    ]);
        if($result == "1"){
            session()->flash('message','Persetujuan kode diskon selesai di proses');
        }else{
            session()->flash('errMessage', 'Gagal memberi persetujuan');
        }
        $this->resetFields();
    }
}
