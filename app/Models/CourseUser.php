<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    use HasFactory;
    protected $table = 'course_users';
    protected $fillable = [
        'course_id',
        'course_title',
        'user_email',
    ];
}
