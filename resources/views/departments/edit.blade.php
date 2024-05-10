@extends('layouts.department')



@section('content')

    <div class="card">

        <div class="card-header">
            <h2>Edit Department</h2>
        </div>



        <div class="card-body">

            <form action="{{ route('departments.update', $department->id) }}" method="POST">

                @csrf

                @method('PUT')

                <div class="form-group">

                    <label for="name"><b>Name<b></label>

                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $department->name }}">

                    </div>


                <div class="form-group">

                    <label for="department_code"><b>Department Code<b></label>

                    <input type="text" class="form-control" id="department_code" name="department_code"
                        value="{{ isset($department->department_code) ? $department->department_code : '' }}">

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
