@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
                @include('message')

                <form action="{{ route('students.store') }}" method="POST">
                    @csrf

                    @include('students.form', $student)
                </form>
            </div>
        </div>
    </div>
@endsection
