<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Str;
use App\Models\CourseVideo;
use Livewire\WithPagination;


class CourseVideos extends Component
{   
    use WithPagination;

    public  $courseTitle,
            $courseId,
            $search,
            $trailerId,
            $playlistId,
            $content,
            $materialDiscussed,
            $idPlaylistRow;

    public $openButton = false;
    public $isModal = false;    
    public $deleteId = false;

    public function render()
    {   
        $courses = [];
        $courseVideos = CourseVideo::latest()->limit(10)->simplePaginate(5);

        if ($this->search !== null) {
            $courseVideos = CourseVideo::where('course_title', 'like', '%' . $this->search . '%')
                            ->latest()
                            ->simplePaginate(5);
        }

        if ($this->courseTitle != null){
            $courses = Course::where('title', 'like', '%' . $this->courseTitle . '%')->get();
        }

        if($this->courseTitle != null)
        {
            if($this->trailerId != null){
                if($this->playlistId != null){
                    if($this->content != null){
                        if($this->materialDiscussed != null){
                            $this->openButton = true;
                        }
                    }
                }
            }
        }

        return view('livewire.course_video.course-videos',[
            'courses' => $courses,
            'courseVideos' => $courseVideos
        ]);
    }

    public function resetFields()
    {
        $this->courseTitle = '';
        $this->trailerId = '';
        $this->playlistId = '';
        $this->content = '';
        $this->materialDiscussed = '';
        $this->courseId = '';
        $this->openButton = false;
        $this->deleteId = false;
        $this->idPlaylistRow = null;
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
        
        $this->courseTitle = Str::slug($this->courseTitle,'-');

        $pesan = $this->isPlaylist($this->courseId);
        if($pesan == ""){
            $pesan = "add new videos success";
            
            $this->validate([
                'courseTitle' => 'required',
                'courseId' => 'required',
                'playlistId' => 'required',
                'trailerId' => 'required',
                'content' => 'required',
                'materialDiscussed' => 'required'
            ]); 
    
            $course_user = CourseVideo::create([
                'course_id' => $this->courseId,
                'course_title' => $this->courseTitle,
                'content' => $this->content,
                'material_discussed' => $this->materialDiscussed,
                'playlistId' => $this->playlistId,
                'trailerId' => $this->trailerId
            ]);

            $this->resetFields();
            session()->flash('message', $pesan);
        }else{
            session()->flash('errMessage', $pesan);
        }
    }

    public function isPlaylist($course_id){
        $data = CourseVideo::where('course_id', $course_id)->get();
        $pesan = '';
        if(count($data) != 0){
            global $pesan;
            for ($i=0; $i < count($data); $i++) { 
                global $pesan;
                if($data[$i]->course_id == $course_id){
                    $pesan = "Course already have playlist";
                    $this->resetFields();
                }
            }
        }
        return $pesan;
    }

    public function edit($id)
    {
        $this->resetFields();
        $courseVideo = CourseVideo::find($id); 
        $this->courseId = $courseVideo->course_id;
        $this->courseTitle = $courseVideo->course_title;
        $this->content = $courseVideo->content;
        $this->materialDiscussed = $courseVideo->material_discussed;
        $this->trailerId = $courseVideo->trailerId;
        $this->playlistId = $courseVideo->playlistId;
        $this->idPlaylistRow = $courseVideo->id;
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
            'courseTitle' => 'required',
            'courseId' => 'required',
            'playlistId' => 'required',
            'trailerId' => 'required',
            'content' => 'required',
            'materialDiscussed' => 'required'
        ]); 

        CourseVideo::where('id', $this->idPlaylistRow)
            ->update([
                'course_id' => $this->courseId,
                'course_title' => $this->courseTitle,
                'content' => $this->content,
                'material_discussed' => $this->materialDiscussed,
                'playlistId' => $this->playlistId,
                'trailerId' => $this->trailerId
            ]);

            session()->flash('message', 'success change video playlist');
            $this->closeModal(); 
            $this->resetFields();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete($id)
    {
        $courseVideo = CourseVideo::find($id);
        $courseVideo->delete(); 
        $this->resetFields();
        session()->flash('message', 'playlist '.$courseVideo->course_title . ' Dihapus');
    }

    public function multipleDelete($id)
    {
        $course = CourseVideo::destroy($id);
        $this->resetFields();
        session()->flash('message','Berhasil dihapus');
    }
}
