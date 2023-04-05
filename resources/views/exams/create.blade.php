@extends('layouts.app')

@section('title', 'Add Exam')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
                @include('message')

                <form action="{{ route('exams.store') }}" method="POST">
                    @csrf

                    @include('exams.form', [$exam, $courses])
                </form>
            </div>
        </div>
    </div>
@endsection
