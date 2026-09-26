@extends('layout')

@section('content')
    <style>
        /* Enrollment Details Page */

        .details-page {
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

        .details-container {
            max-width: 800px;
        }


        /* Header */

        .details-header {
            margin-bottom: 30px;
        }

        .details-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 8px;

            background: linear-gradient(90deg, #c084fc, #e879f9);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            background-clip: text;
        }

        .details-header p {
            color: #94a3b8;
            margin: 0;
            font-size: 0.98rem;
        }


        /* Enrollment Card */

        .enrollment-card {
            background: #0f172a !important;

            border: 1px solid rgba(192, 132, 252, 0.15);

            border-radius: 18px;

            padding: 32px;

            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.45),
                0 0 30px rgba(168, 85, 247, 0.06);
        }


        /* Avatar */

        .enrollment-avatar {
            width: 78px;
            height: 78px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 20px;

            border-radius: 50%;

            background: linear-gradient(135deg, #9333ea, #c026d3);

            color: white;

            font-size: 1.5rem;
            font-weight: 700;

            box-shadow:
                0 8px 25px rgba(147, 51, 234, 0.30);
        }


        /* Enrollment Number */

        .enrollment-title {
            color: #f8fafc;

            font-size: 1.6rem;

            font-weight: 600;

            margin-bottom: 25px;
        }


        /* Detail Rows */

        .detail-row {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            padding: 18px 0;

            border-bottom: 1px solid rgba(148, 163, 184, 0.10);
        }

        .detail-row:last-child {
            border-bottom: none;
        }


        /* Labels */

        .detail-label {
            color: #94a3b8;

            font-size: 0.85rem;

            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: 0.6px;
        }


        /* Values */

        .detail-value {
            color: #f8fafc;

            font-size: 1rem;

            font-weight: 500;

            text-align: right;
        }


        /* Enrollment Number */

        .enroll-no-value {
            color: #c084fc;
        }


        /* Student */

        .student-value {
            color: #e879f9;
        }


        /* Batch */

        .batch-value {
            color: #c084fc;
        }


        /* Fee */

        .fee-value {
            color: #e879f9;

            font-weight: 600;
        }


        /* Back Button */

        .back-btn {
            display: inline-block;

            margin-top: 25px;

            padding: 10px 20px;

            border-radius: 10px;

            background: rgba(168, 85, 247, 0.15);

            color: #c084fc;

            border: 1px solid rgba(168, 85, 247, 0.25);

            text-decoration: none;

            font-weight: 600;

            transition: all 0.2s ease;
        }

        .back-btn:hover {
            background: #9333ea;

            color: white;

            transform: translateY(-2px);

            box-shadow:
                0 8px 20px rgba(147, 51, 234, 0.25);

            text-decoration: none;
        }


        /* Mobile */

        @media (max-width: 576px) {

            .details-page {
                padding-top: 35px;
                padding-bottom: 35px;
            }

            .details-header h1 {
                font-size: 2rem;
            }

            .enrollment-card {
                padding: 22px;
                border-radius: 14px;
            }

            .enrollment-title {
                font-size: 1.4rem;
            }

            .detail-row {
                align-items: flex-start;

                flex-direction: column;

                gap: 7px;
            }

            .detail-value {
                text-align: left;

                word-break: break-word;
            }

        }
    </style>


    <div class="details-page">

        <div class="container details-container">

            {{-- Page Header --}}

            <div class="details-header">

                <h1>
                    Enrollment Details
                </h1>

                <p>
                    View detailed information about this enrollment.
                </p>

            </div>


            {{-- Enrollment Card --}}

            <div class="enrollment-card">

                {{-- Enrollment Avatar --}}

                <div class="enrollment-avatar">

                    {{ strtoupper(substr($enrollment->enroll_no, 0, 2)) }}

                </div>


                {{-- Enrollment Number --}}

                <h2 class="enrollment-title">

                    {{ $enrollment->enroll_no }}

                </h2>


                {{-- ID --}}

                <div class="detail-row">

                    <span class="detail-label">
                        ID
                    </span>

                    <span class="detail-value">
                        #{{ $enrollment->id }}
                    </span>

                </div>


                {{-- Enrollment Number --}}

                <div class="detail-row">

                    <span class="detail-label">
                        Enrollment No
                    </span>

                    <span class="detail-value enroll-no-value">
                        {{ $enrollment->enroll_no }}
                    </span>

                </div>


                {{-- Student --}}

                <div class="detail-row">

                    <span class="detail-label">
                        Student
                    </span>

                    <span class="detail-value student-value">
                        {{ $enrollment->student->name ?? 'N/A' }}
                    </span>

                </div>


                {{-- Batch --}}

                <div class="detail-row">

                    <span class="detail-label">
                        Batch
                    </span>

                    <span class="detail-value batch-value">
                        {{ $enrollment->batch->name ?? 'N/A' }}
                    </span>

                </div>


                {{-- Join Date --}}

                <div class="detail-row">

                    <span class="detail-label">
                        Join Date
                    </span>

                    <span class="detail-value">
                        {{ $enrollment->join_date }}
                    </span>

                </div>


                {{-- Fee --}}

                <div class="detail-row">

                    <span class="detail-label">
                        Fee
                    </span>

                    <span class="detail-value fee-value">
                        {{ $enrollment->fee }}
                    </span>

                </div>


                {{-- Back Button --}}

                <a href="{{ route('enrollments.index') }}" class="back-btn">

                    ← Back to Enrollments

                </a>

            </div>

        </div>

    </div>
@endsection
