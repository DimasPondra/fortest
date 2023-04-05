@extends('layouts.app')

@section('title', 'Add Course')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
                @include('message')

                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf

                    @include('courses.form', $course)
                </form>
            </div>
        </div>
    </div>
@endsection
