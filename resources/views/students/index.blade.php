@extends('layouts.app')

@section('title', 'Student')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
                @include('message')

                <a href="{{ route('students.create') }}" class="btn btn-sm btn-primary my-3">Add Student</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NIS</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->nis }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->address }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="{{ route('students.edit', $student) }}">Edit</a></li>
                                            <li>
                                                <form action="{{ route('students.delete', $student) }}" method="POST">
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
