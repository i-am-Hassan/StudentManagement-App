```blade
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Management System</title>


    <!-- Bootstrap 5.3.8 -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <style>
        * {
            box-sizing: border-box;
        }


        html,
        body {
            margin: 0;
            padding: 0;

            min-height: 100%;
        }


        body {

            min-height: 100vh;

            background:
                radial-gradient(circle at top left,
                    #32134f 0%,
                    transparent 35%),

                radial-gradient(circle at bottom right,
                    #26113f 0%,
                    transparent 35%),

                #080b14;

            color: #f8fafc;

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        /* =========================================================
           SIDEBAR
        ========================================================= */

        .sidebar {

            position: fixed;

            left: 0;
            top: 0;

            width: 240px;

            height: 100vh;

            padding: 20px 15px;

            background: #0f172a;

            border-right:
                1px solid rgba(192, 132, 252, 0.12);

            box-shadow:
                10px 0 30px rgba(0, 0, 0, 0.20);

            z-index: 1000;
        }


        /* Brand */

        .brand {

            display: block;

            padding: 15px;

            margin-bottom: 25px;

            color: #f8fafc;

            font-size: 21px;

            font-weight: 700;

            text-decoration: none;
        }


        .brand:hover {

            color: #f8fafc;

            text-decoration: none;
        }


        .brand i {

            color: #c084fc;
        }


        .brand span {

            color: #c084fc;
        }


        /* Menu Title */

        .menu-title {

            padding: 10px 15px;

            color: #64748b;

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 0.6px;
        }


        /* Sidebar Menu */

        .sidebar-menu {

            list-style: none;

            padding: 0;

            margin: 0;
        }


        .sidebar-menu li {

            margin-bottom: 5px;
        }


        .sidebar-menu a {

            display: flex;

            align-items: center;

            padding: 12px 15px;

            border-radius: 9px;

            color: #94a3b8;

            text-decoration: none;

            font-size: 0.92rem;

            font-weight: 500;

            transition: all 0.2s ease;
        }


        .sidebar-menu a:hover {

            background: #171226;

            color: #f8fafc;

            transform: translateX(2px);
        }


        .sidebar-menu a.active {

            background:
                linear-gradient(135deg,
                    #9333ea,
                    #c026d3);

            color: white;

            box-shadow:
                0 5px 20px rgba(147, 51, 234, 0.20);
        }


        .sidebar-menu i {

            width: 25px;

            margin-right: 5px;

            font-size: 15px;
        }


        /* =========================================================
           MAIN AREA
        ========================================================= */

        .main-area {

            margin-left: 240px;

            min-height: 100vh;

            background:
                radial-gradient(circle at top left,
                    rgba(50, 19, 79, 0.15),
                    transparent 35%);
        }


        /* =========================================================
           NAVBAR
        ========================================================= */

        .navbar {

            min-height: 70px;

            padding: 0 25px;

            background: #0f172a !important;

            border-bottom:
                1px solid rgba(192, 132, 252, 0.12);

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.18);
        }


        .navbar-brand {

            color: #f8fafc !important;

            font-size: 19px;

            font-weight: 600;
        }


        .navbar-nav .nav-link {

            padding-left: 15px !important;

            padding-right: 15px !important;

            color: #94a3b8 !important;

            font-weight: 500;

            transition: color 0.2s ease;
        }


        .navbar-nav .nav-link:hover {

            color: #c084fc !important;
        }


        .navbar-nav .active .nav-link {

            color: #c084fc !important;
        }


        /* Dropdown */

        .dropdown-menu {

            background: #0f172a;

            border:
                1px solid rgba(192, 132, 252, 0.15);

            border-radius: 10px;

            box-shadow:
                0 15px 40px rgba(0, 0, 0, 0.35);
        }


        .dropdown-item {

            color: #cbd5e1;

            padding: 9px 15px;
        }


        .dropdown-item:hover {

            background: #171226;

            color: #f8fafc;
        }


        .dropdown-divider {

            border-top:
                1px solid rgba(148, 163, 184, 0.10);
        }


        /* Navbar Toggler */

        .navbar-toggler {

            border:
                1px solid rgba(192, 132, 252, 0.25);

            padding: 7px 10px;
        }


        .navbar-toggler:focus {

            box-shadow:
                0 0 0 3px rgba(168, 85, 247, 0.15);
        }


        .navbar-toggler-icon {

            filter: invert(1);
        }


        /* =========================================================
           SEARCH
        ========================================================= */

        .search-form {

            display: flex;

            align-items: center;
        }


        .search-form input {

            width: 220px;

            height: 40px;

            padding: 10px 13px;

            background: #111827 !important;

            color: #f8fafc !important;

            border:
                1px solid #273449 !important;

            border-radius: 9px;

            transition: all 0.2s ease;
        }


        .search-form input::placeholder {

            color: #64748b;
        }


        .search-form input:focus {

            background: #111827 !important;

            color: white !important;

            border-color: #a855f7 !important;

            box-shadow:
                0 0 0 3px rgba(168, 85, 247, 0.15) !important;

            outline: none;
        }


        .search-form button {

            height: 40px;

            margin-left: 8px;

            padding: 0 16px;

            border:
                1px solid rgba(168, 85, 247, 0.25);

            border-radius: 9px;

            background:
                rgba(168, 85, 247, 0.15);

            color: #c084fc;

            font-weight: 600;

            transition: all 0.2s ease;
        }


        .search-form button:hover {

            background: #9333ea;

            border-color: #9333ea;

            color: white;

            transform: translateY(-1px);

            box-shadow:
                0 5px 18px rgba(147, 51, 234, 0.20);
        }


        /* =========================================================
           CONTENT
        ========================================================= */

        .content {

            padding: 0;

            min-height:
                calc(100vh - 70px);
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 991px) {

            .sidebar {

                width: 210px;
            }


            .main-area {

                margin-left: 210px;
            }


            .search-form input {

                width: 180px;
            }
        }


        @media (max-width: 768px) {

            .sidebar {

                position: relative;

                width: 100%;

                height: auto;

                min-height: auto;
            }


            .main-area {

                margin-left: 0;
            }


            .navbar {

                padding:
                    0 15px;
            }


            .search-form {

                margin-top: 15px;

                margin-bottom: 10px;
            }


            .search-form input {

                width: 100%;
            }


            .search-form button {

                flex-shrink: 0;
            }

        }
    </style>

</head>


<body>


    {{-- =========================================================
         SIDEBAR
    ========================================================= --}}

    <div class="sidebar">


        {{-- Brand --}}

        <a href="#" class="brand">

            <i class="fas fa-graduation-cap mr-2"></i>

            Student<span>MS</span>

        </a>


        {{-- Menu Title --}}

        <div class="menu-title">

            Main Menu

        </div>


        {{-- Menu --}}

        <ul class="sidebar-menu">


            {{-- Dashboard --}}

            <li>

                <a href="{{ route('dashboard') }}" class="active">

                    <i class="fas fa-home"></i>

                    Dashboard

                </a>

            </li>


            {{-- Students --}}

            <li>

                <a href="{{ url('/students') }}">

                    <i class="fas fa-user-graduate"></i>

                    Students

                </a>

            </li>


            {{-- Teachers --}}

            <li>

                <a href="{{ route('teachers.index') }}"> <i class="fas fa-chalkboard-teacher">
                    </i> Teachers </a>

            </li>


            {{-- Courses --}}
            <li>

                <a href="{{ route('courses.index') }}">

                    <i class="fas fa-book"></i>

                    Courses

                </a>

            </li>


            {{-- Batches --}}
            <li>

                <a href="{{ route('batches.index') }}">

                    <i class="fas fa-book"></i>

                    Batches

                </a>

            </li>

            {{-- Enrollment --}}

            <li>

                <a href="{{ route('enrollments.index') }}">

                    <i class="fas fa-user-plus"></i>

                    Enrollment

                </a>

            </li>


            {{-- Payment --}}

            <li>

                <a href="{{ route('payments.index') }}">

                    <i class="fas fa-credit-card"></i>

                    Payment

                </a>

            </li>


        </ul>

    </div>


    {{-- =========================================================
         MAIN AREA
    ========================================================= --}}

    <div class="main-area">


        {{-- =====================================================
             NAVBAR
        ===================================================== --}}

        <nav class="navbar navbar-expand-lg navbar-dark">


            {{-- Brand --}}

            <a class="navbar-brand" href="#">

                Student Management System

            </a>


            {{-- Mobile Button --}}

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>


            {{-- Navbar Content --}}

            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                {{-- Navbar Links --}}

                <ul class="navbar-nav me-auto">


                </ul>


                {{-- Search --}}

                <form class="search-form" action="{{ route('students.index') }}" method="GET">

                    <input class="form-control" type="search" name="search" value="{{ request('search') }}"
                        placeholder="Search students..." aria-label="Search students">

                    <button type="submit">
                        Search
                    </button>

                </form>


            </div>

        </nav>


        {{-- =====================================================
             PAGE CONTENT
        ===================================================== --}}

        <div class="content">

            @yield('content')

        </div>


    </div>


    <!-- Bootstrap 5.3.8 JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
```
