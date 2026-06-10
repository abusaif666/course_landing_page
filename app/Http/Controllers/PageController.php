<?php

namespace App\Http\Controllers;
use App\Models\Benefits;
use App\Models\Course;
use App\Models\CourseFaq;
use App\Models\Outline;
use App\Models\Student_Result;
use App\Models\StudentTestimonial;

class PageController extends Controller
{
    public function home()
    {
        $course = Course::firstOrFail();
        $benefits = Benefits::all();
        $outlines = Outline::all();
        $testimonial = StudentTestimonial::all();
        $result = Student_Result::all();
        $faqs = CourseFaq::all();
        return view('frontend.home', compact(
            'course',
            'benefits',
            'outlines',
            'testimonial',
            'result',
            'faqs',
            ));
    }


}