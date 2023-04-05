@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
                @include('message')

                <form action="{{ route('students.update', $student) }}" method="POST">
                    @method('PATCH')
                    @csrf

                    @include('students.form', $student)
                </form>
            </div>
        </div>
    </div>
@endsection
