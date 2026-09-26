@extends('layout')

@section('content')
    <style>
        /* Add Course Page */

        .add-course-page {
            min-height: calc(100vh - 70px);

            padding-top: 60px;
            padding-bottom: 60px;

            background:
                radial-gradient(circle at top left, #32134f 0%, transparent 35%),
                radial-gradient(circle at bottom right, #26113f 0%, transparent 35%),
                #080b14;

            color: #f8fafc;
        }


        /* Main Container */

        .add-course-container {
            max-width: 650px;
        }


        /* Header */

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 8px;

            background: linear-gradient(90deg, #c084fc, #e879f9);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-header p {
            color: #94a3b8;
            margin: 0;
            font-size: 0.98rem;
        }


        /* Form Card */

        .form-card {
            background: #0f172a !important;

            border: 1px solid rgba(192, 132, 252, 0.15);

            border-radius: 18px;

            padding: 32px;

            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.45),
                0 0 30px rgba(168, 85, 247, 0.06);
        }


        /* Labels */

        .form-label {
            color: #cbd5e1;

            font-size: 0.9rem;

            font-weight: 600;

            margin-bottom: 8px;
        }


        /* Inputs */

        .form-control {
            background-color: #111827 !important;

            color: #f8fafc !important;

            border: 1px solid #273449 !important;

            border-radius: 10px;

            padding: 12px 14px;

            transition: all 0.2s ease;
        }

        .form-control::placeholder {
            color: #64748b;
        }

        .form-control:focus {
            background-color: #111827 !important;

            color: white !important;

            border-color: #a855f7 !important;

            box-shadow:
                0 0 0 3px rgba(168, 85, 247, 0.15) !important;
        }


        /* Validation Errors */

        .text-danger {
            font-size: 0.85rem;
        }


        /* Submit Button */

        .submit-btn {
            width: 100%;

            border: none;

            border-radius: 10px;

            padding: 12px;

            margin-top: 8px;

            background: linear-gradient(135deg, #9333ea, #c026d3);

            color: white;

            font-weight: 600;

            font-size: 0.95rem;

            transition: all 0.2s ease;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #7e22ce, #a21caf);

            color: white;

            transform: translateY(-2px);

            box-shadow:
                0 8px 25px rgba(147, 51, 234, 0.3);
        }


        /* Back Button */

        .back-btn {
            display: inline-block;

            margin-top: 18px;

            color: #94a3b8;

            text-decoration: none;

            font-size: 0.9rem;

            transition: 0.2s ease;
        }

        .back-btn:hover {
            color: #c084fc;

            text-decoration: none;
        }


        /* Autofill Fix */

        .form-control:-webkit-autofill,
        .form-control:-webkit-autofill:hover,
        .form-control:-webkit-autofill:focus {

            -webkit-text-fill-color: #f8fafc;

            -webkit-box-shadow:
                0 0 0 1000px #111827 inset;

            transition:
                background-color 5000s ease-in-out 0s;
        }


        /* Mobile */

        @media (max-width: 576px) {

            .add-course-page {
                padding-top: 35px;
                padding-bottom: 35px;
            }

            .form-card {
                padding: 22px;
            }

            .page-header h1 {
                font-size: 2rem;
            }

        }
    </style>


    <div class="add-course-page">

        <div class="container add-course-container">

            {{-- Page Header --}}

            <div class="page-header">

                <h1>
                    Add New Course
                </h1>

                <p>
                    Create a new course record and add it to your database.
                </p>

            </div>


            {{-- Form Card --}}

            <div class="form-card">

                <form action="{{ route('courses.store') }}" method="POST">

                    @csrf



                    {{-- Course Name --}}

                    <div class="mb-4">

                        <label for="name" class="form-label">
                            Course Name
                        </label>

                        <select id="name" name="name" class="form-control" required>

                            <option value="" disabled {{ old('name') ? '' : 'selected' }}>
                                Select course name
                            </option>

                            <option value="Computer Science" {{ old('name') == 'Computer Science' ? 'selected' : '' }}>
                                Computer Science
                            </option>

                            <option value="Artificial Intelligence"
                                {{ old('name') == 'Artificial Intelligence' ? 'selected' : '' }}>
                                Artificial Intelligence
                            </option>

                            <option value="Cyber Security" {{ old('name') == 'Cyber Security' ? 'selected' : '' }}>
                                Cyber Security
                            </option>

                            <option value="Data Sciences" {{ old('name') == 'Data Sciences' ? 'selected' : '' }}>
                                Data Sciences
                            </option>

                            <option value="Information Technology"
                                {{ old('name') == 'Information Technology' ? 'selected' : '' }}>
                                Information Technology
                            </option>

                        </select>

                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>





                    {{-- Syllabus --}}

                    <div class="mb-4">

                        <label for="syllabus" class="form-label">
                            Syllabus
                        </label>

                        <select id="syllabus" name="syllabus" class="form-control" required>

                            <option value="" disabled {{ old('syllabus') ? '' : 'selected' }}>
                                Select syllabus
                            </option>

                            <option value="Semester 1" {{ old('syllabus') == 'Semester 1' ? 'selected' : '' }}>
                                Semester 1
                            </option>

                            <option value="Semester 2" {{ old('syllabus') == 'Semester 2' ? 'selected' : '' }}>
                                Semester 2
                            </option>

                            <option value="Semester 3" {{ old('syllabus') == 'Semester 3' ? 'selected' : '' }}>
                                Semester 3
                            </option>

                            <option value="Semester 4" {{ old('syllabus') == 'Semester 4' ? 'selected' : '' }}>
                                Semester 4
                            </option>

                            <option value="Semester 5" {{ old('syllabus') == 'Semester 5' ? 'selected' : '' }}>
                                Semester 5
                            </option>

                            <option value="Semester 6" {{ old('syllabus') == 'Semester 6' ? 'selected' : '' }}>
                                Semester 6
                            </option>

                            <option value="Semester 7" {{ old('syllabus') == 'Semester 7' ? 'selected' : '' }}>
                                Semester 7
                            </option>

                            <option value="Semester 8" {{ old('syllabus') == 'Semester 8' ? 'selected' : '' }}>
                                Semester 8
                            </option>

                        </select>

                        @error('syllabus')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Duration --}}

                    <div class="mb-4">

                        <label for="duration" class="form-label">
                            Duration
                        </label>

                        <select id="duration" name="duration" class="form-control" required>

                            <option value="" disabled {{ old('duration') ? '' : 'selected' }}>
                                Select duration
                            </option>

                            <option value="2 Years" {{ old('duration') == '2 Years' ? 'selected' : '' }}>
                                2 Years
                            </option>

                            <option value="3 Years" {{ old('duration') == '3 Years' ? 'selected' : '' }}>
                                3 Years
                            </option>

                            <option value="4 Years" {{ old('duration') == '4 Years' ? 'selected' : '' }}>
                                4 Years
                            </option>

                        </select>

                        @error('duration')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>



                    {{-- Submit --}}

                    <button type="submit" class="submit-btn">

                        Add Course

                    </button>

                </form>


                {{-- Back --}}

                <div class="text-center">

                    <a href="{{ route('courses.index') }}" class="back-btn">

                        ← Back to Courses

                    </a>

                </div>

            </div>

        </div>

    </div>
@endsection
