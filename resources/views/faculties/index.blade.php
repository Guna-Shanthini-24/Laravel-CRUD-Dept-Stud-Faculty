@extends('layouts.department')



@section('content')
    <div class="card">

        <div class="card-header"><b>FACULTIES</b></div>



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



            <a href="{{ route('faculties.create') }}" class="btn btn-primary mb-3">Add Faculty</a>



            <table class="table">

                <thead>

                    <tr>

                        <th>Name</th>

                        <th>Department</th>

                        <th>Faculty ID</th>

                        <th>Email</th>

                        <th>Action</th>

                        </tr>

                    </thead>

                <tbody>

                    @foreach ($faculties as $faculty)
                        <tr>

                            <td>{{ $faculty->name }}</td>

                            <td>{{ $faculty->department->name }}</td>

                            <td>{{ $faculty->faculty_id }}</td>

                            <td>{{ $faculty->email }}</td>

                            <td>

                                <a href="{{ route('faculties.edit', $faculty->id) }}"
                                    class="btn btn-warning">Edit</a>

                                <a href="{{ route('faculties.show', $faculty->id) }}"
                                    class="btn btn-primary">View</a>

                                <form
                                    action="{{ route('faculties.destroy', $faculty->id) }}" method="POST"
                                    style="display: inline;">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete the faculty {{ $faculty->name }}?')">Delete</button>

                                    </form>

                                </td>

                            </tr>
                    @endforeach

                    </tbody>

                </table>


        </div>

        </div>
@endsection
