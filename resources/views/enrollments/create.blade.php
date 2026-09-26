@extends('layout')

@section('content')
    <style>
        /* Add Enrollment Page */

        .add-enrollment-page {
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

        .add-enrollment-container {
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


        /* Select Arrow */

        select.form-control {
            cursor: pointer;
        }


        /* Date Input */

        input[type="date"] {
            color-scheme: dark;
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

            .add-enrollment-page {
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


    <div class="add-enrollment-page">

        <div class="container add-enrollment-container">

            {{-- Page Header --}}

            <div class="page-header">

                <h1>
                    Add New Enrollment
                </h1>

                <p>
                    Create a new enrollment record and add it to your database.
                </p>

            </div>


            {{-- Form Card --}}

            <div class="form-card">

                <form action="{{ route('enrollments.store') }}" method="POST">

                    @csrf


                    {{-- Enrollment Number --}}

                    <div class="mb-4">

                        <label for="enroll_no" class="form-label">
                            Enrollment Number
                        </label>

                        <input type="text" id="enroll_no" name="enroll_no" class="form-control"
                            placeholder="Enter enrollment number" value="{{ old('enroll_no') }}" required>

                        @error('enroll_no')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Student --}}

                    <div class="mb-4">

                        <label for="student_id" class="form-label">
                            Student
                        </label>

                        <select id="student_id" name="student_id" class="form-control" required>

                            <option value="" disabled {{ old('student_id') ? '' : 'selected' }}>
                                Select student
                            </option>

                            @foreach ($students as $student)
                                <option value="{{ $student->id }}"
                                    {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                    {{ $student->name }}
                                </option>
                            @endforeach

                        </select>

                        @error('student_id')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Batch --}}

                    <div class="mb-4">

                        <label for="batch_id" class="form-label">
                            Batch
                        </label>

                        <select id="batch_id" name="batch_id" class="form-control" required>

                            <option value="" disabled {{ old('batch_id') ? '' : 'selected' }}>
                                Select batch
                            </option>

                            @foreach ($batches as $batch)
                                <option value="{{ $batch->id }}" {{ old('batch_id') == $batch->id ? 'selected' : '' }}>
                                    {{ $batch->name }}
                                </option>
                            @endforeach

                        </select>

                        @error('batch_id')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Join Date --}}

                    <div class="mb-4">

                        <label for="join_date" class="form-label">
                            Join Date
                        </label>

                        <input type="date" id="join_date" name="join_date" class="form-control"
                            value="{{ old('join_date') }}" required>

                        @error('join_date')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Fee --}}

                    <div class="mb-4">

                        <label for="fee" class="form-label">
                            Fee
                        </label>

                        <input type="number" id="fee" name="fee" class="form-control" placeholder="Enter fee"
                            value="{{ old('fee') }}" min="0" step="0.01" required>

                        @error('fee')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Submit --}}

                    <button type="submit" class="submit-btn">

                        Add Enrollment

                    </button>

                </form>


                {{-- Back --}}

                <div class="text-center">

                    <a href="{{ route('enrollments.index') }}" class="back-btn">

                        ← Back to Enrollments

                    </a>

                </div>

            </div>

        </div>

    </div>
@endsection
