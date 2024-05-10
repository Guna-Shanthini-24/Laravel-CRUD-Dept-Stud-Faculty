@extends('layouts.department')



@section('content')
    <div class="card">

        <div class="card-header"><b>Departments</b></div>

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




            <p><strong>Name:</strong> {{ $department->name }}</p>

            <p><strong>Department:</strong> {{ $department->department_code }}</p>

            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary">Edit</a>

            <a href="{{ route('departments.show', $department->id) }}" class="btn btn-primary">View</a>

            <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                style="display: inline-block;">

                @csrf

                @method('DELETE')

                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete the department {{ $department->name }}?')">Delete</button>

                </form>

        </div>

    </div>
@endsection
