@extends('layouts.department')



@section('content')
    <div class="card">

        <div class="card-header"><b>Faculties</b></div>

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




            <p><strong>Name:</strong> {{ $faculty->name }}</p>

            <p><strong>Department:</strong> {{ $faculty->department->name }}</p>

            <p><strong>Roll No:</strong> {{ $faculty->faculty_id }}</p>

            <p><strong>Email:</strong> {{ $faculty->email }}</p>

            <a href="{{ route('faculties.edit', $faculty->id) }}" class="btn btn-primary">Edit</a>

            <a href="{{ route('faculties.show', $faculty->id) }}" class="btn btn-primary">View</a>

            <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST" style="display: inline-block;">

                @csrf

                @method('DELETE')

                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete the faculty {{ $faculty->name }}?')">Delete</button>

                </form>



        </div>

    </div>
@endsection
