<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentRequest;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Participant;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    public function index(Request $request)
    {
        $exams = Exam::when(!empty($request->date), function ($query) use ($request) {
                    $query->where('date', $request->date);
        });

        return view('exams.index', [
            'exams' => $exams->get()
        ]);
    }

    public function create()
    {
        $exam = new Exam();
        $courses = Course::all();

        return view('exams.create', [
            'exam' => $exam,
            'courses' => $courses
        ]);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->only(['name', 'course_id', 'date']);

            $exam = new Exam();
            $exam->fill($data)->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('exams.index')->with([
            'success' => 'Exam successfully created.'
        ]);
    }

    public function addStudent(Exam $exam)
    {
        $students = Student::all();

        return view('exams.add-student', [
            'exam' => $exam,
            'students' => $students
        ]);
    }

    public function addStudentStore(AddStudentRequest $request, Exam $exam)
    {
        try {
            DB::beginTransaction();

            $student = Participant::where('student_nis', $request->student_nis)
                                ->where('exam_id', $exam->id)
                                ->count();

            if ($student >= 1) {
                return redirect()->back()->withErrors([
                    'errors' => 'Something wrong.'
                ]);
            }

            $request->merge([
                'exam_id' => $exam->id
            ]);

            $data = $request->only(['student_nis', 'exam_id']);

            $participant = new Participant();
            $participant->fill($data)->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('exams.index')->with([
            'success' => 'Student successfully added.'
        ]);
    }
}
