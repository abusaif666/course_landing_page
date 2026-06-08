<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Outline;
use Illuminate\Http\Request;

class OutlineController extends Controller
{
    public function index()
    {
        // Eager loading (with) ব্যবহার করে কুয়েরি অপ্টিমাইজ করা হয়েছে
        $outlines = Outline::with('course')->paginate(10);
        return view('admin.outline.index', compact('outlines'));
    }

    public function create()
    {
        $courses = Course::where('status', 1)->get();
        return view('admin.outline.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course' => 'required|exists:courses,id',
            'outline' => 'required|string|max:255',
        ]);

        try {
            Outline::create([
                'course_id' => $request->course,
                'outline' => $request->outline,
            ]);

            return redirect()->route('outline.index')->with('success', 'Outline Added Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function edit($id)
    {
        $outline = Outline::findOrFail($id);
        $courses = Course::where('status', 1)->get();
        return view('admin.outline.update', compact('outline', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $outline = Outline::findOrFail($id);

        $request->validate([
            'course' => 'required|exists:courses,id',
            'outline' => 'required|string|max:255',
        ]);

        try {
            $outline->update([
                'course_id' => $request->course,
                'outline' => $request->outline,
            ]);

            return redirect()->route('outline.index')->with('success', 'Outline Updated Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy($id)
    {
        try {
            $outline = Outline::findOrFail($id);
            $outline->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Outline Deleted Successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something Went Wrong',
            ], 500);
        }
    }
}
