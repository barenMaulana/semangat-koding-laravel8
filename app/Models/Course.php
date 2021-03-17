<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseVideo;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'price', 
        'description',
        'build_with',
        'consultation',
        'certificate',
        'type',
        'operating_system',
        'ram',
        'empty_storage',
        'will_study',
        'technology',
        'category',
        'payment_account',
        'payment_account_name',
        'phone_number',
        'slug',
        'thumbnail_file_name',
        'populer',
        'bankName',
        'bankName1',
        'payment_account1',
        'payment_account_name1',
        'user_id'
    ];

    public function courseVideo()
    {
        return $this->hasOne(CourseVideo::class,'course_title','slug');
    }
}
