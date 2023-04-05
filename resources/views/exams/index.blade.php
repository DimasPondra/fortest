@extends('layouts.app')

@section('title', 'Exam')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('message')

                <a href="{{ route('exams.create') }}" class="btn btn-sm btn-primary my-3">Add Exam</a>

                <form action="" method="GET">
                    <input type="date" class="form-control" name="date">
                    <button type="submit" class="btn btn-sm btn-warning">Search</button>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Course</th>
                            <th scope="col">Date</th>
                            <th scope="col">Total Students</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exams as $exam)
                            <tr>
                                <td>{{ $exam->name }}</td>
                                <td>{{ $exam->course->name }}</td>
                                <td>{{ $exam->format_date }}</td>
                                <td>{{ count($exam->participants) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="{{ route('exams.add-student', $exam) }}">Add Student</a></li>
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
