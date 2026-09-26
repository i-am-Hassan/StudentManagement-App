@extends('layout')

@section('content')
    <style>
        /* Dashboard */

        .dashboard-page {
            min-height: calc(100vh - 70px);

            padding: 50px 30px 60px;

            background:
                radial-gradient(circle at top left, #32134f 0%, transparent 35%),
                radial-gradient(circle at bottom right, #26113f 0%, transparent 35%),
                #080b14;

            color: #f8fafc;
        }


        /* Header */

        .dashboard-header {
            margin-bottom: 30px;
        }

        .dashboard-header h1 {
            font-size: 2.5rem;
            font-weight: 700;

            margin-bottom: 8px;

            background: linear-gradient(90deg, #c084fc, #e879f9);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            background-clip: text;
        }

        .dashboard-header p {
            color: #94a3b8;

            margin: 0;

            font-size: 0.98rem;
        }


        /* Statistics Grid */

        .stats-grid {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 20px;

            margin-bottom: 30px;
        }


        /* Stat Card */

        .stat-card {
            background: #0f172a;

            border: 1px solid rgba(192, 132, 252, 0.12);

            border-radius: 16px;

            padding: 24px;

            display: flex;

            align-items: center;

            gap: 18px;

            box-shadow:
                0 15px 35px rgba(0, 0, 0, 0.25);

            transition: all 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 20px 40px rgba(0, 0, 0, 0.35);
        }


        /* Stat Icon */

        .stat-icon {
            width: 55px;
            height: 55px;

            flex-shrink: 0;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: linear-gradient(135deg, #9333ea, #c026d3);

            color: white;

            font-size: 1.3rem;

            box-shadow:
                0 8px 20px rgba(147, 51, 234, 0.25);
        }


        /* Stat Information */

        .stat-info {
            min-width: 0;
        }

        .stat-title {
            color: #94a3b8;

            font-size: 0.85rem;

            font-weight: 600;

            margin-bottom: 5px;
        }

        .stat-number {
            color: #f8fafc;

            font-size: 1.7rem;

            font-weight: 700;

            line-height: 1.2;

            word-break: break-word;
        }


        /* Recent Section Grid */

        .dashboard-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 20px;
        }


        /* Dashboard Card */

        .dashboard-card {
            background: #0f172a;

            border: 1px solid rgba(192, 132, 252, 0.12);

            border-radius: 16px;

            padding: 24px;

            box-shadow:
                0 15px 35px rgba(0, 0, 0, 0.25);
        }


        /* Card Header */

        .dashboard-card-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 20px;
        }

        .dashboard-card-header h5 {
            color: #f8fafc;

            margin: 0;

            font-weight: 600;
        }

        .view-all {
            color: #c084fc;

            text-decoration: none;

            font-size: 0.85rem;

            font-weight: 600;
        }

        .view-all:hover {
            color: #e879f9;

            text-decoration: none;
        }


        /* Recent List */

        .recent-item {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            padding: 14px 0;

            border-bottom: 1px solid rgba(148, 163, 184, 0.09);
        }

        .recent-item:last-child {
            border-bottom: none;
        }


        .recent-main {
            min-width: 0;
        }

        .recent-title {
            color: #f8fafc;

            font-weight: 600;

            font-size: 0.92rem;

            margin-bottom: 3px;
        }

        .recent-subtitle {
            color: #64748b;

            font-size: 0.8rem;
        }


        .recent-value {
            color: #c084fc;

            font-weight: 600;

            font-size: 0.85rem;

            white-space: nowrap;
        }


        .payment-value {
            color: #4ade80;

            font-weight: 700;

            white-space: nowrap;
        }


        /* Quick Actions */

        .quick-actions {
            margin-top: 20px;
        }

        .quick-action-grid {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 12px;
        }

        .quick-action {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 12px;

            border-radius: 10px;

            background: rgba(168, 85, 247, 0.10);

            border: 1px solid rgba(168, 85, 247, 0.20);

            color: #c084fc;

            text-decoration: none;

            font-size: 0.85rem;

            font-weight: 600;

            transition: all 0.2s ease;
        }

        .quick-action:hover {
            background: #9333ea;

            color: white;

            transform: translateY(-2px);

            text-decoration: none;
        }


        /* Empty */

        .empty-state {
            text-align: center;

            padding: 25px 10px;

            color: #64748b;

            font-size: 0.9rem;
        }


        /* Mobile */

        @media (max-width: 992px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 576px) {

            .dashboard-page {
                padding: 35px 15px 40px;
            }

            .dashboard-header h1 {
                font-size: 2rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-card {
                padding: 20px;
            }

            .quick-action-grid {
                grid-template-columns: 1fr;
            }

            .dashboard-card {
                padding: 20px;
            }

        }
    </style>


    <div class="dashboard-page">

        <div class="container-fluid">


            {{-- Header --}}

            <div class="dashboard-header">

                <h1>
                    Dashboard
                </h1>

                <p>
                    Overview of your Student Management System.
                </p>

            </div>


            {{-- Statistics --}}

            <div class="stats-grid">


                {{-- Students --}}

                <div class="stat-card">

                    <div class="stat-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>

                    <div class="stat-info">

                        <div class="stat-title">
                            Total Students
                        </div>

                        <div class="stat-number">
                            {{ $studentsCount }}
                        </div>

                    </div>

                </div>


                {{-- Teachers --}}

                <div class="stat-card">

                    <div class="stat-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>

                    <div class="stat-info">

                        <div class="stat-title">
                            Total Teachers
                        </div>

                        <div class="stat-number">
                            {{ $teachersCount }}
                        </div>

                    </div>

                </div>


                {{-- Courses --}}

                <div class="stat-card">

                    <div class="stat-icon">
                        <i class="fas fa-book"></i>
                    </div>

                    <div class="stat-info">

                        <div class="stat-title">
                            Total Courses
                        </div>

                        <div class="stat-number">
                            {{ $coursesCount }}
                        </div>

                    </div>

                </div>


                {{-- Batches --}}

                <div class="stat-card">

                    <div class="stat-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>

                    <div class="stat-info">

                        <div class="stat-title">
                            Total Batches
                        </div>

                        <div class="stat-number">
                            {{ $batchesCount }}
                        </div>

                    </div>

                </div>


                {{-- Enrollments --}}

                <div class="stat-card">

                    <div class="stat-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>

                    <div class="stat-info">

                        <div class="stat-title">
                            Total Enrollments
                        </div>

                        <div class="stat-number">
                            {{ $enrollmentsCount }}
                        </div>

                    </div>

                </div>


                {{-- Payments --}}

                <div class="stat-card">

                    <div class="stat-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>

                    <div class="stat-info">

                        <div class="stat-title">
                            Total Payments
                        </div>

                        <div class="stat-number">
                            Rs. {{ number_format($totalPayments, 0) }}
                        </div>

                    </div>

                </div>


            </div>


            {{-- Recent Sections --}}

            <div class="dashboard-grid">


                {{-- Recent Enrollments --}}

                <div class="dashboard-card">

                    <div class="dashboard-card-header">

                        <h5>
                            Recent Enrollments
                        </h5>

                        <a href="{{ route('enrollments.index') }}" class="view-all">
                            View All
                        </a>

                    </div>


                    @forelse ($recentEnrollments as $enrollment)
                        <div class="recent-item">

                            <div class="recent-main">

                                <div class="recent-title">

                                    {{ $enrollment->student->name ?? 'N/A' }}

                                </div>

                                <div class="recent-subtitle">

                                    {{ $enrollment->enrollment_number }}
                                    ·
                                    {{ $enrollment->batch->name ?? 'N/A' }}

                                </div>

                            </div>

                            <div class="recent-value">

                                {{ $enrollment->join_date }}

                            </div>

                        </div>

                    @empty

                        <div class="empty-state">

                            No enrollments found.

                        </div>
                    @endforelse

                </div>


                {{-- Recent Payments --}}

                <div class="dashboard-card">

                    <div class="dashboard-card-header">

                        <h5>
                            Recent Payments
                        </h5>

                        <a href="{{ route('payments.index') }}" class="view-all">
                            View All
                        </a>

                    </div>


                    @forelse ($recentPayments as $payment)
                        <div class="recent-item">

                            <div class="recent-main">

                                <div class="recent-title">

                                    {{ $payment->enrollment->student->name ?? 'N/A' }}

                                </div>

                                <div class="recent-subtitle">

                                    {{ $payment->enrollment->enrollment_number ?? 'N/A' }}
                                    ·
                                    {{ $payment->paid_date }}

                                </div>

                            </div>

                            <div class="payment-value">

                                Rs. {{ number_format($payment->amount, 0) }}

                            </div>

                        </div>

                    @empty

                        <div class="empty-state">

                            No payments found.

                        </div>
                    @endforelse

                </div>


            </div>


            {{-- Quick Actions --}}

            <div class="dashboard-card quick-actions">

                <div class="dashboard-card-header">

                    <h5>
                        Quick Actions
                    </h5>

                </div>


                <div class="quick-action-grid">


                    <a href="{{ route('students.create') }}" class="quick-action">

                        <i class="fas fa-user-graduate"></i>

                        Add Student

                    </a>


                    <a href="{{ route('teachers.create') }}" class="quick-action">

                        <i class="fas fa-chalkboard-teacher"></i>

                        Add Teacher

                    </a>


                    <a href="{{ route('courses.create') }}" class="quick-action">

                        <i class="fas fa-book"></i>

                        Add Course

                    </a>


                    <a href="{{ route('batches.create') }}" class="quick-action">

                        <i class="fas fa-layer-group"></i>

                        Add Batch

                    </a>


                    <a href="{{ route('enrollments.create') }}" class="quick-action">

                        <i class="fas fa-user-plus"></i>

                        Add Enrollment

                    </a>


                    <a href="{{ route('payments.create') }}" class="quick-action">

                        <i class="fas fa-credit-card"></i>

                        Add Payment

                    </a>


                </div>

            </div>


        </div>

    </div>
@endsection
