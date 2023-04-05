<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('courses.index', [
            'courses' => $courses
        ]);
    }

    public function create()
    {
        $course = new Course();
        return view('courses.create', [
            'course' => $course
        ]);
    }

    public function store(CourseStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->only(['name']);

            $course = new Course();
            $course->fill($data)->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('courses.index')->with([
            'success' => 'Course successfully created.'
        ]);
    }

    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course
        ]);
    }

    public function update(CourseUpdateRequest $request, Course $course)
    {
        try {
            DB::beginTransaction();

            $data = $request->only(['name']);

            $course->fill($data)->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('courses.index')->with([
            'success' => 'Course successfully updated.'
        ]);
    }

    public function destroy(Course $course)
    {
        try {
            DB::beginTransaction();

            $course->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('courses.index')->with([
            'success' => 'Course successfully deleted.'
        ]);
    }
}
