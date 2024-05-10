@extends('layouts.department')



@section('content')
    <div class="card">

        <div class="card-header"><b>Students</b></div>

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


            <p><strong>Name:</strong> {{ $student->name }}</p>


            <p><strong>Department:</strong> {{ $student->department->name }}</p>

            <p><strong>Roll No:</strong> {{ $student->roll_no }}</p>

            <p><strong>Email:</strong> {{ $student->email }}
            </p>

            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>

            <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary">View</a>

            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline-block;">

                @csrf

                @method('DELETE')

                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete the student {{ $student->name }}?')">Delete</button>

                </form>

        </div>

    </div>
@endsection
