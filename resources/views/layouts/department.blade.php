<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>


    <meta charset="utf-8">


    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>{{ config('app.name', 'Laravel Application') }}</title>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">




    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">





    <link rel="stylesheet" href="{{ asset('css/app.css') }}">  @stack('styles')

</head>

<body>


    <div class="d-flex flex-column h-screen bg-gray-100">




        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

                    </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

                    <ul class="navbar-nav mb-2 mb-lg-0">

                        <li class="nav-item">

                            <a
                                class="nav-link fw-bold px-3 py-2 rounded-pill bg-light border border-light {{ Route::currentRouteNamed('departments.*') ? 'active text-primary' : '' }}"
                                aria-current="page" href="{{ route('departments.index') }}">DEPARTMENTS</a>

                            </li>

                        <li class="nav-item">

                            <a
                                class="nav-link fw-bold px-3 py-2 rounded-pill bg-light border border-light {{ Route::currentRouteNamed('faculties.*') ? 'active text-primary' : '' }}"
                                href="{{ route('faculties.index') }}">FACULTIES</a>

                            </li>

                        <li class="nav-item">

                            <a
                                class="nav-link fw-bold px-3 py-2 rounded-pill bg-light border border-light {{ Route::currentRouteNamed('students.*') ? 'active text-primary' : '' }}"
                                href="{{ route('students.index') }}">STUDENTS</a>

                            </li>

                        </ul>

                    </div>

                </div>

        </nav>






        <div class="container mt-4 flex-grow-1">

            @yield('content')

            </div>




    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVFQWjT9u0V46LJXiI0C7z38gOMsG2tAEgZt9TOuGgHhLl5y4ELs" crossorigin="anonymous">
    </script>




    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')

</body>

</html>
