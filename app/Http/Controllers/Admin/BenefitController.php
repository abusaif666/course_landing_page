<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Benefits;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function index()
    {
        $benefits = Benefits::with('course')->paginate(10);
        return view('admin.benefit.index', compact('benefits'));
    }

    public function create()
    {
        $courses = Course::where('status', 1)->get();
        return view('admin.benefit.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course' => 'required|exists:courses,id',
            'benefit' => 'required|string|max:255',
        ]);

        try {
            Benefits::create([
                'course_id' => $request->course,
                'benefit' => $request->benefit,
            ]);

            return redirect()->route('benefit.index')->with('success', 'Benefit Added Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function edit($id)
    {
        $benefit = Benefits::findOrFail($id);
        $courses = Course::where('status', 1)->get();
        return view('admin.benefit.update', compact('benefit', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $benefit = Benefits::findOrFail($id);

        $request->validate([
            'course' => 'required|exists:courses,id',
            'benefit' => 'required|string|max:255',
        ]);

        try {
            $benefit->update([
                'course_id' => $request->course,
                'benefit' => $request->benefit,
            ]);

            return redirect()->route('benefit.index')->with('success', 'Benefit Updated Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy($id)
    {
        try {
            $benefit = Benefits::findOrFail($id);
            $benefit->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Benefit Deleted Successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something Went Wrong',
            ], 500);
        }
    }
}
