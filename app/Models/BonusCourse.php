<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusCourse extends Model
{

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'price',
        'discount_price',
        'status',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    use HasFactory;
}
