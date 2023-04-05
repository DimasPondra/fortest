@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
                @include('message')

                <form action="{{ route('exams.add-student.store', $exam) }}" method="POST">
                    @csrf

                    @include('exams.form-add-student')
                </form>
            </div>
        </div>
    </div>
@endsection
