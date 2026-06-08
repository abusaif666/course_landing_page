<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\StudentTestimonial;
use Illuminate\Http\Request;

class StudentTestimonialController extends Controller
{
    public function index()
    {
        // Eager loading (with) ব্যবহার করা হয়েছে কুয়েরি অপ্টিমাইজড রাখার জন্য
        $testimonials = StudentTestimonial::with('course')->paginate(10);
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        $courses = Course::where('status', 1)->get();
        return view('admin.testimonial.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course' => 'required|exists:courses,id',
            'video' => 'required|string', // ভিডিওর URL বা পাথ
        ]);

        try {
            StudentTestimonial::create([
                'course_id' => $request->course,
                'video' => $request->video,
            ]);

            return redirect()->route('student-testimonial.index')->with('success', 'Testimonial Added Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function edit($id)
    {
        $testimonial = StudentTestimonial::findOrFail($id);
        $courses = Course::where('status', 1)->get();
        return view('admin.testimonial.update', compact('testimonial', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = StudentTestimonial::findOrFail($id);

        $request->validate([
            'course' => 'required|exists:courses,id',
            'video' => 'required|string',
        ]);

        try {
            $testimonial->update([
                'course_id' => $request->course,
                'video' => $request->video,
            ]);

            return redirect()->route('student-testimonial.index')->with('success', 'Testimonial Updated Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy($id)
    {
        try {
            $testimonial = StudentTestimonial::findOrFail($id);
            $testimonial->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Testimonial Deleted Successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something Went Wrong',
            ], 500);
        }
    }
}
