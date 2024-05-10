@extends('layouts.department')



@section('content')

    <div class="card">

        <div class="card-header">
            <h2>Add Student</h2>
        </div>



        <div class="card-body">

            <form action="{{ route('students.store') }}" method="POST">

                @csrf

                <div class="form-group">

                    <label for="name"><b>Name<b></label>

                    <input type="text" name="name" id="name" class="form-control">

                    </div>

                <div class="form-group">


                    <label for="roll_no">Roll No</label>

                    <input type="text" name="roll_no" id="roll_no" class="form-control">

                    </div>

                <div class="form-group">

                    <label for="email">Email</label>

                    <input type="email" name="email" id="email" class="form-control">

                    </div>

                <div class="form-group">

                    <label for="department_id">Department</label>

                    <select name="department_id" id="department_id" class="form-control">

                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
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



                <button type="submit" class="btn btn-primary mt-3">Add Student</button>

                </form>

            <div>

            </div>

        @endsection
