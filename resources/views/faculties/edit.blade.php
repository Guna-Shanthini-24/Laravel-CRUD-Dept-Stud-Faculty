@extends('layouts.department')



@section('content')

    <div class="card">

        <div class="card-header">
            <h2>Edit Faculty</h2>
        </div>



        <div class="card-body">

            <form action="{{ route('faculties.update', $faculty->id) }}" method="POST">

                @csrf

                @method('PUT')

                <div class="form-group">

                    <label for="name"><b>Name<b></label>

                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $faculty->name }}">

                    </div>


                <div class="form-group">

                    <label for="department_id">Department</label>

                    <select class="form-control" id="department_id" name="department_id">

                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                {{ $faculty->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}
                            </option>
                        @endforeach

                        </select>

                    </div>

                <div class="form-group">

                    <label for="faculty_id">Faculty ID</label>

                    <input type="text" class="form-control" id="faculty_id" name="faculty_id"
                        value="{{ $faculty->faculty_id }}">

                    </div>

                <div class="form-group">

                    <label for="email">Email</label>

                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ $faculty->email }}">

                    </div>

                @if ($errors->any())
                    <div class="alert alert-danger">

                        <ul>

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                            </ul>

                        </div>
                @endif

                <button type="submit" class="btn btn-primary mt-3">Update</button>

                </form>

            </div>

        </div>

@endsection
