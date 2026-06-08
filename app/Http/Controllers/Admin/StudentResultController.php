<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student_Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentResultController extends Controller
{
    public function index()
    {
        // Eager loading (with) ব্যবহার করা হয়েছে যেন কুয়েরি অপ্টিমাইজড থাকে
        $results = Student_Result::with('course')->paginate(10);
        return view('admin.student_result.index', compact('results'));
    }

    public function create()
    {
        $courses = Course::where('status', 1)->get();
        return view('admin.student_result.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course' => 'required|exists:courses,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        try {
            // ================= PHOTO UPLOAD =================
            $photoName = null;
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = time() . '_result.' . $photo->getClientOriginalExtension();
                $photo->storeAs('student_result', $photoName, 'public');
            }

            Student_Result::create([
                'course_id' => $request->course,
                'photo' => $photoName,
            ]);

            return redirect()->route('student-result.index')->with('success', 'Result Added Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function edit($id)
    {
        $result = Student_Result::findOrFail($id);
        $courses = Course::where('status', 1)->get();
        return view('admin.student_result.update', compact('result', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $result = Student_Result::findOrFail($id);

        $request->validate([
            'course' => 'required|exists:courses,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        try {
            // ================= PHOTO UPDATE & OLD DELETE =================
            if ($request->hasFile('photo')) {
                if ($result->photo && Storage::disk('public')->exists('student_result/' . $result->photo)) {
                    Storage::disk('public')->delete('student_result/' . $result->photo);
                }

                $photo = $request->file('photo');
                $photoName = time() . '_result.' . $photo->getClientOriginalExtension();
                $photo->storeAs('student_result', $photoName, 'public');
            } else {
                $photoName = $result->photo;
            }

            $result->update([
                'course_id' => $request->course,
                'photo' => $photoName,
            ]);

            return redirect()->route('student-result.index')->with('success', 'Result Updated Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy($id)
    {
        try {
            $result = Student_Result::findOrFail($id);

            if ($result->photo && Storage::disk('public')->exists('student_result/' . $result->photo)) {
                Storage::disk('public')->delete('student_result/' . $result->photo);
            }

            $result->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Result Deleted Successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something Went Wrong',
            ], 500);
        }
    }
}
