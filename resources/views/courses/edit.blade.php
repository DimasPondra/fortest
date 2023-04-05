@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
                @include('message')

                <form action="{{ route('courses.update', $course) }}" method="POST">
                    @method('PATCH')
                    @csrf

                    @include('courses.form', $course)
                </form>
            </div>
        </div>
    </div>
@endsection
