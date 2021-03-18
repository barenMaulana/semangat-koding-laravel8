<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Invoice;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class UserCourses extends Component
{   
    use WithPagination;


    public  $userEmail,
            $courseTitle,
            $courseId,
            $search,
            $idCourseRow;

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

            // saldo update for mentor
                $course = Course::find($this->courseId);
                $mentor = User::find($course->user_id);
                $mentor->saldo = $course->price * 20 / 100;
                $mentor->save();

                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
            }
            $this->resetFields();
            session()->flash('message', $pesan);
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
