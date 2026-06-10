<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10);

        return view('admin.course.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.course.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // ভ্যালিডেশন যুক্ত করা হলো
            'video' => 'nullable',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'type' => 'required|boolean',
            'status' => 'required|boolean',
        ]);

        try {
            // টাইটেল থেকে ইউনিক স্লাগ (Slug) তৈরি
            $slug = Str::slug($request->title);
            if (Course::where('slug', $slug)->exists()) {
                $slug = $slug.'-'.time();
            }

            // ================= THUMBNAIL UPLOAD =================
            $thumbnailName = null;
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $thumbnailName = time().'_thumbnail.'.$thumbnail->getClientOriginalExtension();
                $thumbnail->storeAs('course', $thumbnailName, 'public');
            }

            Course::create([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'thumbnail' => $thumbnailName, // শুধু ফাইলের নাম ডাটাবেজে সেভ হবে
                'video' => $request->video,
                'price' => $request->price,
                'discount_price' => $request->discount_price ?? 0,
                'type' => $request->type,
                'status' => $request->status,
                'offer_start' => $request->offer_start,
                'offer_end' => $request->offer_end,
                'whatsapp' => $request->whatsapp,
                'drive' => $request->drive,
            ]);

            return redirect()->route('course.index')->with('success', 'Course Added Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);

        return view('admin.course.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        return view('admin.course.update', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'video' => 'nullable',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'type' => 'required|boolean',
            'status' => 'required|boolean',
        ]);

        try {
            $slug = Str::slug($request->title);
            if (Course::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $slug.'-'.time();
            }

            // ================= THUMBNAIL UPDATE & OLD DELETE =================
            if ($request->hasFile('thumbnail')) {
                // আগের ইমেজটি যদি ফোল্ডারে থাকে তবে তা ডিলিট হবে
                if ($course->thumbnail && Storage::disk('public')->exists('course/'.$course->thumbnail)) {
                    Storage::disk('public')->delete('course/'.$course->thumbnail);
                }

                $thumbnail = $request->file('thumbnail');
                $thumbnailName = time().'_thumbnail.'.$thumbnail->getClientOriginalExtension();
                $thumbnail->storeAs('course', $thumbnailName, 'public');
            } else {
                // নতুন ইমেজ না দিলে আগের ইমেজটাই থাকবে
                $thumbnailName = $course->thumbnail;
            }

            $course->update([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'thumbnail' => $thumbnailName,
                'video' => $request->video,
                'price' => $request->price,
                'discount_price' => $request->discount_price ?? 0,
                'type' => $request->type,
                'status' => $request->status,
                'offer_start' => $request->offer_start,
                'offer_end' => $request->offer_end,
                'whatsapp' => $request->whatsapp,
                'drive' => $request->drive,
            ]);

            return redirect()->route('course.index')->with('success', 'Course Updated Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy($id)
    {
        try {
            $course = Course::findOrFail($id);

            // ডিলিট করার সময় ফোল্ডার থেকেও ইমেজ ডিলিট করে দেওয়া ভালো প্র্যাকটিস
            if ($course->thumbnail && Storage::disk('public')->exists('course/'.$course->thumbnail)) {
                Storage::disk('public')->delete('course/'.$course->thumbnail);
            }

            $course->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Course Deleted Successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something Went Wrong',
            ], 500);
        }
    }
}
