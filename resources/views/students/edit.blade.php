@extends('layouts.department')



@section('content')

    <div class="card">

        <div class="card-header">
            <h2>Edit Student</h2>
        </div>



        <div class="card-body">

            <form action="{{ route('students.update', $student->id) }}" method="POST">

                @csrf

                @method('PUT')

                <div class="form-group">

                    <label for="name"><b>Name<b></label>

                    <input type="text" name="name" class="form-control" id="name"
                        value="{{ $student->name }}">

                    </div>


                <div class="form-group">

                    <label for="roll_no">Roll No</label>

                    <input type="text" name="roll_no" class="form-control" id="roll_no"
                        value="{{ old('roll_no', $student->roll_no ?? '') }}">

                    </div>

                <div class="form-group">

                    <label for="email">Email</label>

                    <input type="email" name="email" class="form-control" id="email"
                        value="{{ old('email', $student->email ?? '') }}">

                    </div>

                <div class="form-group">

                    <label for="department_id">Department</label>

                    <select name="department_id" class="form-control" id="department_id">

                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                {{ $student->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}
                            </option>
                        @endforeach

                        </select>

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
