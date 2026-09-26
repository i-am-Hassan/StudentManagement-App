```blade
@extends('layout')

@section('content')
    <style>
        /* Teacher Details Page */

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


        /* Teacher Card */

        .teacher-card {
            background: #0f172a !important;

            border: 1px solid rgba(192, 132, 252, 0.15);

            border-radius: 18px;

            padding: 32px;

            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.45),
                0 0 30px rgba(168, 85, 247, 0.06);
        }


        /* Avatar */

        .teacher-avatar {
            width: 78px;
            height: 78px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 20px;

            border-radius: 50%;

            background: linear-gradient(135deg, #9333ea, #c026d3);

            color: white;

            font-size: 1.8rem;
            font-weight: 700;

            box-shadow:
                0 8px 25px rgba(147, 51, 234, 0.30);
        }


        /* Teacher Name */

        .teacher-name-title {
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


        /* Mobile */

        .mobile-value {
            color: #c084fc;
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

            .teacher-card {
                padding: 22px;
                border-radius: 14px;
            }

            .teacher-name-title {
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
                    Teacher Details
                </h1>

                <p>
                    View detailed information about this teacher.
                </p>

            </div>


            {{-- Teacher Card --}}

            <div class="teacher-card">

                {{-- Teacher Avatar --}}

                <div class="teacher-avatar">

                    {{ strtoupper(substr($teachers->name, 0, 1)) }}

                </div>


                {{-- Teacher Name --}}

                <h2 class="teacher-name-title">

                    {{ $teachers->name }}

                </h2>


                {{-- ID --}}

                <div class="detail-row">

                    <span class="detail-label">
                        ID
                    </span>

                    <span class="detail-value">
                        #{{ $teachers->id }}
                    </span>

                </div>


                {{-- Name --}}

                <div class="detail-row">

                    <span class="detail-label">
                        Name
                    </span>

                    <span class="detail-value">
                        {{ $teachers->name }}
                    </span>

                </div>


                {{-- Address --}}

                <div class="detail-row">

                    <span class="detail-label">
                        Address
                    </span>

                    <span class="detail-value">
                        {{ $teachers->address }}
                    </span>

                </div>


                {{-- Mobile --}}

                <div class="detail-row">

                    <span class="detail-label">
                        Mobile
                    </span>

                    <span class="detail-value mobile-value">
                        {{ $teachers->mobile }}
                    </span>

                </div>


                {{-- Back Button --}}

                <a href="{{ route('teachers.index') }}" class="back-btn">

                    ← Back to Teachers

                </a>

            </div>

        </div>

    </div>
@endsection
```
