<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Invoice;
use App\Models\DiscountCode;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class UserCourses extends Component
{   
    use WithPagination;


    public  $userEmail,
            $courseTitle,
            $courseId,
            $search,
            $idCourseRow,
            $discount_code;

    public $openButton = false;
    public $isModal = false;
    public $deleteId = false;

    public function render()
    {
        $users = [];
        $courses = [];

        $courseUsers =  CourseUser::latest()->limit(10)->simplePaginate(5);

        if ($this->search !== null) {
            $courseUsers = CourseUser::where('user_email', 'like', '%' . $this->search . '%')
                            ->latest()
                            ->simplePaginate(10);
        }

        if ($this->userEmail != null) 
        {
            $users = User::where('email', 'like', '%' . $this->userEmail . '%')->get();
        }

        if ($this->courseTitle != null){
            $courses = Course::where('title', 'like', '%' . $this->courseTitle . '%')->get();
        }

        if($this->userEmail != null)
        {
            if($this->courseTitle != null)
            {
                $this->openButton = true;
            }
        }

        return view('livewire.user_course.user-courses',[
            'users' => $users,
            'courses' => $courses,
            'courseUsers' => $courseUsers
        ]);
    }

    public function resetFields()
    {
        $this->userEmail = '';
        $this->courseTitle = '';
        $this->courseId = '';
        $this->discount_code = '';
        $this->openButton = false;
        $this->deleteId = false;
    }

    public function store()
    {
        $array = explode(',',$this->courseTitle);
        $this->courseTitle = $array[0];
        if(isset($array[1])){
            $this->courseId = $array[1];
        }else{
            session()->flash('errMessage', "please input data correctly!");
        }

        $pesan = $this->isEnroll($this->userEmail,$this->courseId);
        if($pesan == ""){
            $pesan = "enroll success";
            $messageType = "message";
            
            $this->validate([
                'userEmail' => 'required|email',
                'courseTitle' => 'required',
                'courseId' => 'required',
            ]); 
    
            DB::beginTransaction();
            try {
            $course_user = CourseUser::create([
                'course_id' => $this->courseId,
                'course_title' => $this->courseTitle,
                'user_email' => $this->userEmail
            ]);
            
            // create invoice
            $this->createInvoice($this->userEmail,$this->courseId);

            // check discount
            $course = Course::find($this->courseId);
            $mentor = User::find($course->user_id);

            $discount;
            $discount_amount = 0;
            if($this->discount_code != null){
                $discount = DiscountCode::where('unique_code',$this->discount_code)
                                        ->where('course_id',$this->courseId)
                                        ->where('status','active')
                                        ->first();
                if($discount == null){
                    DB::rollBack(); 
                    $pesan = "Discount code cannot be used";
                    $messageType = "errMessage";
                }

                // discount
                $discount_amount = $course->price * $discount->discount_percentage / 100;
            }

            // saldo update for mentor
                $course_price_amount = $course->price - $discount_amount;
                $mentor->saldo = $course_price_amount * $mentor->percentage / 100 + $mentor->saldo;
                $mentor->save();

                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
            }
            $this->resetFields();
            session()->flash($messageType, $pesan);
        }else{
            session()->flash('errMessage', $pesan);
        }
    }

    public function isEnroll($email,$course_id){
        $data = CourseUser::where('user_email', $email)->get();
        $pesan = '';
        if(count($data) != 0){
            global $pesan;
            for ($i=0; $i < count($data); $i++) { 
                global $pesan;
                if($data[$i]->course_id == $course_id){
                    $pesan = "user already enrolled";
                    $this->resetFields();
                }
            }
        }
        return $pesan;
    }

    public function createInvoice($email,$course_id)
    {
        $user = User::where('email',$email)->first();
        $course = Course::find($course_id);

        Invoice::create([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_expertise' => $user->expertise,
            'course_title' => $course->title,
            'course_price' => $course->price,
            'payment_account_name' => $course->payment_account,
            'payment_status' => 'paid',
            'unique_code' => 'SK-'.time()
        ]);
    }

    public function edit($id)
    {
        $this->resetFields();
        $userCourse = CourseUser::find($id); 
        $this->courseId = $userCourse->course_id;
        $this->courseTitle = $userCourse->course_title;
        $this->userEmail = $userCourse->user_email;
        $this->idCourseRow = $userCourse->id;

        $this->openModal();
    }

    public function closeModal()
    {
        $this->isModal = false;
        $this->resetFields();
    }

    public function openModal()
    {
        $this->isModal = true;
    }

    public function update()
    {
        $this->validate([
            'userEmail' => 'required|email',
            'courseTitle' => 'required',
        ]); 

        CourseUser::where('id', $this->idCourseRow)
            ->update([
                'course_id' => $this->courseId,
                'course_title' => $this->courseTitle,
                'user_email' => $this->userEmail,
            ]);

            session()->flash('message', 'success changed user access');
            $this->closeModal(); 
            $this->resetFields();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete($id)
    {
        $userCourse = CourseUser::find($id);
        $userCourse->delete(); 
        $this->resetFields();
        session()->flash('message', $userCourse->course_title . ' Dihapus');
    }

    public function multipleDelete($id)
    {
        $course = CourseUser::destroy($id);
        $this->resetFields();
        session()->flash('message','Berhasil dihapus');
    }
}
