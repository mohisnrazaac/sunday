<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseEditController extends Controller
{
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('contents.admin.courses.course-edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'regular_price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'coursetheme' => 'required|string',
            'course_level' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $course->title = $request->title;
        $course->description = $request->description;
        $course->regular_price = $request->regular_price;
        $course->discount_price = $request->discount_price;
        $course->coursetheme = $request->coursetheme;
        $course->course_level = $request->course_level;

        if ($request->hasFile('image')) {
            if ($course->image) {
                Storage::delete($course->image);
            }
            $course->image = $request->file('image')->store('courses');
        }

        $course->save();

        return redirect()->route('courses.edit', $course->id)->with('success', 'Course updated successfully!');
    }
}
