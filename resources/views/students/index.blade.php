@extends('layouts.department')



@section('content')
    <div class="card">

        <div class="card-header"><b>STUDENTS</b></div>

        <div class="card-body">



            @if (session('success'))
                <div class="alert alert-success">

                    {{ session('success') }}

                    </div>
            @endif



            @if (session('error'))
                <div class="alert alert-danger">

                    {{ session('error') }}

                    </div>
            @endif




            <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>

            <table class="table">

                <thead>

                    <tr>

                        <th>Name</th>

                        <th>Roll No</th>

                        <th>Email</th>

                        <th>Department</th>

                        <th>Actions</th>

                        </tr>

                    </thead>

                <tbody>

                    @foreach ($students as $student)
                        <tr>

                            <td>{{ $student->name }}</td>

                            <td>{{ $student->roll_no }}</td>

                            <td>{{ $student->email }}</td>

                            <td>{{ $student->department->name }}</td>

                            <td>

                                <a href="{{ route('students.edit', $student->id) }}"
                                    class="btn btn-warning">Edit</a>

                                <a href="{{ route('students.show', $student->id) }}"
                                    class="btn btn-primary">View</a>

                                <form action="{{ route('students.destroy', $student->id) }}"
                                    method="POST" style="display: inline-block;">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete the Student {{ $student->name }} ?')">Delete</button>

                                    </form>

                                </td>

                            </tr>
                    @endforeach

                    </tbody>

                </table>

        </div>

    </div>
@endsection
