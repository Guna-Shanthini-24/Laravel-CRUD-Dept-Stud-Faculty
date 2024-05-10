@extends('layouts.department')



@section('content')
    <div class="card">

        <div class="card-header"><b>DEPARTMENTS</b></div>



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



            <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Create New Department</a>

            <table class="table">

                <thead>

                    <tr>

                        <th>Name</th>

                        <th>Department Code</th>

                        <th>Actions</th>

                        </tr>

                    </thead>

                <tbody>

                    @foreach ($departments as $department)
                        <tr>

                            <td>{{ $department->name }}</td>

                            <td>{{ $department->department_code }}</td>

                            <td>


                                <a href="{{ route('departments.edit', $department->id) }}"
                                    class="btn btn-warning">Edit</a>

                                <a href="{{ route('departments.show', $department->id) }}"
                                    class="btn btn-primary">View</a>

                                <form action="{{ route('departments.destroy', $department->id) }}"
                                    method="POST" style="display: inline-block;">

                                    @csrf

                                    @method('DELETE')


                                    <!-- <button type="submit" class="btn btn-sm btn-danger">Delete</button> -->

                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete the department {{ $department->name }}?')">Delete</button>



                                    </form>

                                </td>

                            </tr>
                    @endforeach

                    </tbody>

                </table>

        </div>

    </div>
@endsection
