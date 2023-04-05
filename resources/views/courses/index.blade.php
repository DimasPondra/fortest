@extends('layouts.app')

@section('title', 'Course')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
                @include('message')

                <a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary my-3">Add Course</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="{{ route('courses.edit', $course) }}">Edit</a></li>
                                            <li>
                                                <form action="{{ route('courses.delete', $course) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf

                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
