<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $guarded = [''];

    use HasFactory;

        protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->slug = Str::slug($course->title);
        });
    }

    public function benefits()
    {
        return $this->hasMany(Benefits::class);
    }

    public function faqs()
    {
        return $this->hasMany(CourseFaq::class);
    }

    public function testimonials()
    {
        return $this->hasMany(StudentTestimonial::class);
    }

    public function results()
    {
        return $this->hasMany(Student_Result::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
