<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;   
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\CourseVideo;

class Courses extends Component
{
    use WithPagination;
    use WithFileUploads;

    public  $courses,
            $course_id,
            $title,
            $price,
            $description,
            $build_with,
            $consultation,
            $certificate,
            $type,
            $operating_system,
            $ram,
            $empty_storage,
            $will_study,
            $technology,
            $category,
            $payment_account,
            $payment_account_name,
            $phone_number,
            $slug,
            $thumbnail_file_name,
            $old_file_name,
            $idCheck,
            $populer,
            $bankName,
            $payment_account1,
            $bankName1,
            $payment_account_name1,
            $isUpdate;

    public $isModal = 0;
    public $deleteId = false;
    public $search;
    public $page = 1;

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    public function render()
    {
        $courses = Course::latest()->simplePaginate(10);

        if ($this->search !== null) {
            $courses = Course::where('title', 'like', '%' . $this->search . '%')
                            ->latest()
                            ->simplePaginate(10);
        }

        return view('livewire.course.courses',[
            'posts' => $courses
        ]);
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }

    public function closeModal()
    {
        $this->isModal = false;
    }

    public function openModal()
    {
        $this->isModal = true;
    }

    public function resetFields()
    {
        $this->title = '';
        $this->price = '';
        $this->description = '';
        $this->build_with = '';
        $this->consultation = '';
        $this->certificate = '';
        $this->type = '';
        $this->operating_system = '';
        $this->ram = '';
        $this->empty_storage = '';
        $this->will_study = '';
        $this->technology = '';
        $this->category = '';
        $this->payment_account = '';
        $this->payment_account_name = '';
        $this->phone_number = '';
        $this->thumbnail_file_name = '';
        $this->course_id = '';
        $this->deleteId = false;
        $this->old_file_name = '';
        $this->populer = 0;
        $this->bankName = '';
        $this->payment_account1 = '';
        $this->payment_account_name1 = '';
        $this->bankName = '';
        $this->isUpdate = false;
    }

    public function store()
    {
        $imageValidation = '';
        if($this->thumbnail_file_name != $this->old_file_name){
            $imageValidation = "required|image|mimes:jpg,jpeg,png|max:1024";
        }

        $this->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required',
            'build_with' => 'required',
            'consultation' => 'required',
            'certificate' => 'required',
            'type' => 'required',
            'operating_system' => 'required',
            'ram' => 'required',
            'empty_storage' => 'required',
            'will_study' => 'required',
            'technology' => 'required',
            'category' => 'required',
            'payment_account' => 'required',
            'payment_account_name' => 'required',
            'phone_number' => 'required',
            'thumbnail_file_name' => $imageValidation,
            'populer' => 'required',
            'bankName' => 'required',
        ]);

        if($this->thumbnail_file_name != $this->old_file_name){
            $thumbsFileName = $this->thumbnail_file_name->store('course');
        }else{
            $thumbsFileName = $this->thumbnail_file_name;
        }
        $slug = Str::slug($this->title,'-');

        if($this->isUpdate == true){
            DB::beginTransaction();

                try {
                Course::updateOrCreate(['id' => $this->course_id], [
                    'title' => $this->title,
                    'price' => $this->price,
                    'description' => $this->description,
                    'build_with' => $this->build_with,
                    'consultation' => $this->consultation,
                    'certificate' => $this->certificate,
                    'type' => $this->type,
                    'operating_system' => $this->operating_system,
                    'ram' => $this->ram,
                    'empty_storage' => $this->empty_storage,
                    'will_study' => $this->will_study,
                    'technology' => $this->technology,
                    'category' => $this->category,
                    'payment_account' => $this->payment_account,
                    'payment_account_name' => $this->payment_account_name,
                    'phone_number' => $this->phone_number,
                    'thumbnail_file_name' => $thumbsFileName,
                    'slug' => $slug,
                    'populer' => $this->populer,
                    'bankName' => $this->bankName,
                    'payment_account1' => $this->payment_account1,
                    'payment_account_name1' => $this->payment_account_name1,
                    'bankName1' => $this->bankName1,
                ]);


                CourseUser::where('course_id',$this->course_id)
                            ->update([
                                'course_title' => $this->title
                            ]);

                CourseVideo::where('course_id',$this->course_id)
                            ->update([
                                'course_title' => $slug
                            ]);
                DB::commit();
                // all good
            } catch (Exception $e) {
                DB::rollback();
                session()->flash('errMessage', 'failed to change, please try again');
                $this->closeModal(); 
                $this->resetFields();
                exit; 
            }
        }else{
            Course::updateOrCreate(['id' => $this->course_id], [
                'title' => $this->title,
                'price' => $this->price,
                'description' => $this->description,
                'build_with' => $this->build_with,
                'consultation' => $this->consultation,
                'certificate' => $this->certificate,
                'type' => $this->type,
                'operating_system' => $this->operating_system,
                'ram' => $this->ram,
                'empty_storage' => $this->empty_storage,
                'will_study' => $this->will_study,
                'technology' => $this->technology,
                'category' => $this->category,
                'payment_account' => $this->payment_account,
                'payment_account_name' => $this->payment_account_name,
                'phone_number' => $this->phone_number,
                'thumbnail_file_name' => $thumbsFileName,
                'slug' => $slug,
                'populer' => $this->populer,
                'bankName' => $this->bankName,
                'payment_account1' => $this->payment_account1,
                'payment_account_name1' => $this->payment_account_name1,
                'bankName1' => $this->bankName1,
            ]);
        }




        session()->flash('message', $this->course_id ? $this->title . ' Diperbaharui': $this->title . ' Ditambahkan');
        $this->closeModal(); 
        $this->resetFields(); 
    }

    public function edit($id)
    {
        $course = Course::find($id); 
        $this->course_id = $id;
        $this->title = $course->title;
        $this->price = $course->price;
        $this->description = $course->description;
        $this->build_with = $course->build_with;
        $this->consultation = $course->consultation;
        $this->certificate = $course->certificate;
        $this->type = $course->type;
        $this->operating_system = $course->operating_system;
        $this->ram = $course->ram;
        $this->empty_storage = $course->empty_storage;
        $this->will_study = $course->will_study;
        $this->technology = $course->technology;
        $this->category = $course->category;
        $this->payment_account = $course->payment_account;
        $this->payment_account_name = $course->payment_account_name;
        $this->phone_number = $course->phone_number;
        $this->thumbnail_file_name = $course->thumbnail_file_name;
        $this->old_file_name = $course->thumbnail_file_name;
        $this->populer = $course->populer;
        $this->bankName = $course->bankName;
        $this->bankName1 = $course->bankName1;
        $this->payment_account1 = $course->payment_account1;
        $this->payment_account_name1 = $course->payment_account_name1;
        $this->isUpdate = true;

        $this->openModal();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete($id)
    {
        $course = Course::find($id);
        $course->delete(); 
        $this->resetFields();
        session()->flash('message', $course->title . ' Dihapus');
    }

    public function multipleDelete($id)
    {
        $course = Course::destroy($id);
        $this->resetFields();
        session()->flash('message','Berhasil dihapus');
    }
}