<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class CourseVideo extends Model
{
    use HasFactory;

    protected $table = "course_videos";
    protected $fillable = [
        'course_id',
        'content',
        'material_discussed',
        'playlistId',
        'trailerId',
        'course_title'
    ]; 

    public function course()
    {
        return $this->belongsTo(Course::class,'slug','course_title');
    }
}
