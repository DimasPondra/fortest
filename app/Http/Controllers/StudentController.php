<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('students.index', [
            'students' => $students
        ]);
    }

    public function create()
    {
        $student = new Student();
        return view('students.create', [
            'student' => $student
        ]);
    }

    public function store(StudentStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->only(['nis', 'name', 'address']);

            $student = new Student();
            $student->fill($data)->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('students.index')->with([
            'success' => 'Student successfully created.'
        ]);
    }

    public function edit(Student $student)
    {
        return view('students.edit', [
            'student' => $student
        ]);
    }

    public function update(StudentUpdateRequest $request, Student $student)
    {
        try {
            DB::beginTransaction();

            $data = $request->only(['nis', 'name', 'address']);

            $student->fill($data)->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('students.index')->with([
            'success' => 'Student successfully updated.'
        ]);
    }

    public function destroy(Student $student)
    {
        try {
            DB::beginTransaction();

            $student->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('students.index')->with([
            'success' => 'Student successfully deleted.'
        ]);
    }
}
