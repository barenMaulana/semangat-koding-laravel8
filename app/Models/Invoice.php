<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'user_expertise',
        'course_title',
        'course_price',
        'payment_account_name',
        'payment_status',
        'unique_code'
    ];
}
