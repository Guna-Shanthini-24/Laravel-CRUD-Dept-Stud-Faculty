@extends('layouts.department')



@section('content')

    <div class="card">

        <div class="card-header">
            <h2>Create Department<h2>
        </div>



        <div class="card-body">



            <form action="{{ route('departments.store') }}" method="POST">

                @csrf

                <div class="form-group">

                    <label for="name"><b>Department Name<b></label>

                    <input type="text" class="form-control" id="name" name="name">

                    </div>


                <div class="form-group">

                    <label for="department_code">Department Code</label>

                    <input type="text" class="form-control" id="department_code" name="department_code" required>

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



                <button type="submit" class="btn btn-primary mt-3">Create</button>

                </form>

            </div>

    </div>

@endsection
