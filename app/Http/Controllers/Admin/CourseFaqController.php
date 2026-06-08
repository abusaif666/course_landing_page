<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseFaq;
use Illuminate\Http\Request;

class CourseFaqController extends Controller
{
    public function index()
    {
        // Eager loading (with) ব্যবহার করা হয়েছে কুয়েরি অপ্টিমাইজেশনের জন্য
        $faqs = CourseFaq::with('course')->paginate(10);
        return view('admin.course_faq.index', compact('faqs'));
    }

    public function create()
    {
        $courses = Course::where('status', 1)->get();
        return view('admin.course_faq.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course' => 'required|exists:courses,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        try {
            CourseFaq::create([
                'course_id' => $request->course,
                'question' => $request->question,
                'answer' => $request->answer,
            ]);

            return redirect()->route('course-faq.index')->with('success', 'FAQ Added Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function edit($id)
    {
        $faq = CourseFaq::findOrFail($id);
        $courses = Course::where('status', 1)->get();
        return view('admin.course_faq.update', compact('faq', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $faq = CourseFaq::findOrFail($id);

        $request->validate([
            'course' => 'required|exists:courses,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        try {
            $faq->update([
                'course_id' => $request->course,
                'question' => $request->question,
                'answer' => $request->answer,
            ]);

            return redirect()->route('course-faq.index')->with('success', 'FAQ Updated Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy($id)
    {
        try {
            $faq = CourseFaq::findOrFail($id);
            $faq->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'FAQ Deleted Successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something Went Wrong',
            ], 500);
        }
    }
}
