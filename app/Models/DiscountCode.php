<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;

    protected $table = 'discount_codes';
    
    protected $fillable = [
        "course_id",
        "user_id",
        "discount_percentage",
        "time_period",
        "unique_code",
        "request_code",
        "status"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }    

    public function course()
    {
        return $this->belongsTo(Course::class);
    }    
}
