<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BonusCourse;
use App\Models\Course;
use Illuminate\Http\Request;

class BonusCourseController extends Controller
{
    public function index()
    {
        $bonusCourses = BonusCourse::with('course')
            ->latest()
            ->paginate(10);

        return view(
            'admin.bonus-course.index',
            compact('bonusCourses')
        );
    }

    public function create()
    {
        $courses = Course::where('status', 1)
            ->latest()
            ->get();

        return view(
            'admin.bonus-course.create',
            compact('courses')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'status' => 'required|boolean',
        ]);

        BonusCourse::create([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('bonus-course.index')
            ->with('success', 'Bonus Course Added Successfully');
    }

    public function show($id)
    {
        $bonusCourse = BonusCourse::with('course')
            ->findOrFail($id);

        return view(
            'admin.bonus-course.show',
            compact('bonusCourse')
        );
    }

    public function edit($id)
    {
        $bonusCourse = BonusCourse::findOrFail($id);

        $courses = Course::where('status', 1)
            ->latest()
            ->get();

        return view(
            'admin.bonus-course.update',
            compact('bonusCourse', 'courses')
        );
    }

    public function update(Request $request, $id)
    {
        $bonusCourse = BonusCourse::findOrFail($id);

        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'status' => 'required|boolean',
        ]);

        $bonusCourse->update([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('bonus-course.index')
            ->with('success', 'Bonus Course Updated Successfully');
    }

    public function destroy($id)
    {
        try {

            $bonusCourse = BonusCourse::findOrFail($id);

            $bonusCourse->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Bonus Course Deleted Successfully',
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Something Went Wrong',
            ], 500);
        }
    }
}