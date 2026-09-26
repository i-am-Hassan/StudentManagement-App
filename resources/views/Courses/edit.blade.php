@extends('layout')

@section('content')
    <style>
        /* Edit Course Page */

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
                    Update Course
                </h1>

                <p>
                    Update the information of this course.
                </p>

            </div>


            {{-- Form Card --}}

            <div class="form-card">

                <form action="{{ route('courses.update', $course->id) }}" method="POST">

                    @csrf
                    @method('PUT')


                    {{-- Course Name --}}

                    <div class="mb-4">

                        <label for="name" class="form-label">
                            Course Name
                        </label>

                        <input type="text" id="name" name="name" value="{{ old('name', $course->name) }}"
                            class="form-control" placeholder="Enter course name" required>

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

                        <input type="text" id="syllabus" name="syllabus"
                            value="{{ old('syllabus', $course->syllabus) }}" class="form-control"
                            placeholder="Enter course syllabus" required>

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

                        <input type="text" id="duration" name="duration"
                            value="{{ old('duration', $course->duration) }}" class="form-control"
                            placeholder="Enter course duration" required>

                        @error('duration')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Submit --}}

                    <button type="submit" class="submit-btn">

                        Update Course

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
