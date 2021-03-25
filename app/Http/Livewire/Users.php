<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;  
use App\Models\User;

class Users extends Component
{
    use WithPagination;
    use WithFileUploads;

    public  $name,
            $email,
            $expertise,
            $role,
            $profile_photo_path,
            $old_file_name,
            $percentage;

    public $deleteId = false;    
    public $isModal = 0;    
    public $user_id = 0;    
    public $search;
    public $page = 1;
    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    public function render()
    {
        $users = User::where('role','user')
        ->orWhere('role','mentor')
        ->simplePaginate(10);

        if ($this->search !== null) {
            $users = User::where('email', 'like', '%' . $this->search . '%')
                            ->where('role','=','user')
                            ->orWhere('role','=','mentor')
                            ->latest()
                            ->simplePaginate(10);
        }

        return view('livewire.user.users',[
            'users' => $users
        ]);
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
        $this->name = '';
        $this->email = '';
        $this->role = '';
        $this->profile_photo_path = '';    
        $this->user_id = '';
        $this->deleteId = false;
        $this->old_file_name = '';
        $this->percentage = '';
    }

    public function store()
    {
        $imageValidation = '';
        if($this->profile_photo_path != $this->old_file_name){
            $imageValidation = "required|image|mimes:jpg,jpeg,png|max:1024";
        }

        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => 'required',
            'percentage' => 'required|numeric',
            'profile_photo_path' => $imageValidation,
        ]);

        if($this->profile_photo_path != $this->old_file_name){
            $thumbsFileName = $this->profile_photo_path->store('profile');
        }else{
            $thumbsFileName = $this->profile_photo_path;
        }

        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'percentage' => $this->percentage,
            'profile_photo_path' => $thumbsFileName,
        ]);

        session()->flash('message', $this->user_id ? $this->name . ' Diperbaharui': $this->name . ' Ditambahkan');
        $this->closeModal(); 
        $this->resetFields(); 
    }

    public function edit($id)
    {
        $users = User::find($id); 
        $this->user_id = $id;
        $this->name = $users->name;
        $this->email = $users->email;
        $this->role = $users->role;
        $this->profile_photo_path = $users->profile_photo_path;
        $this->old_file_name = $users->profile_photo_path;
        $this->percentage = $users->percentage;

        $this->openModal();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete($id)
    {
        $users = User::find($id);
        $users->delete(); 
        $this->resetFields();
        session()->flash('message', $users->name . ' Dihapus');
    }

    public function multipleDelete($id)
    {
        User::destroy($id);
        $this->resetFields();
        session()->flash('message','Berhasil dihapus');
    }
}
