@extends('layout')

@section('content')
    <style>
        /* Enrollments Page */

        .enrollments-page {
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

        .enrollments-container {
            padding-left: 15px;
            padding-right: 15px;
        }


        /* Header */

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 700;

            letter-spacing: -0.5px;

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


        /* Enrollments Card */

        .enrollments-card {
            background: #0f172a;

            border: 1px solid rgba(192, 132, 252, 0.12);

            border-radius: 18px;

            padding: 24px;

            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.35),
                0 0 30px rgba(168, 85, 247, 0.05);
        }


        /* Top Bar */

        .top-bar {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;

            margin-bottom: 20px;
        }

        .top-bar h5 {
            color: #f8fafc;

            font-weight: 600;
        }

        .enrollments-count {
            color: #94a3b8;

            font-size: 0.9rem;
        }


        /* Buttons Container */

        .enrollment-actions {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        /* Delete All Form */

        .enrollment-actions form {
            margin: 0;
            padding: 0;

            display: flex;

            align-items: center;
        }


        /* Add Enrollment Button */

        .add-enrollment-btn {
            border: none;

            border-radius: 10px;

            padding: 10px 18px;

            height: 42px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: 600;

            background: linear-gradient(135deg, #9333ea, #c026d3);

            color: white;

            text-decoration: none;

            transition: all 0.2s ease;

            box-shadow:
                0 5px 20px rgba(147, 51, 234, 0.20);
        }

        .add-enrollment-btn:hover {
            background: linear-gradient(135deg, #7e22ce, #a21caf);

            color: white;

            text-decoration: none;

            transform: translateY(-2px);

            box-shadow:
                0 8px 25px rgba(147, 51, 234, 0.30);
        }


        /* Delete All Button */

        .delete-all-btn {
            border: 1px solid rgba(239, 68, 68, 0.25);

            border-radius: 10px;

            padding: 10px 18px;

            height: 42px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: 600;

            background: rgba(239, 68, 68, 0.15);

            color: #f87171;

            transition: all 0.2s ease;

            cursor: pointer;
        }

        .delete-all-btn:hover {
            background: #dc2626;

            color: white;

            transform: translateY(-2px);

            box-shadow:
                0 8px 25px rgba(239, 68, 68, 0.25);
        }


        /* Table */

        .table-wrapper {
            overflow-x: auto;

            border-radius: 12px;
        }

        .enrollments-table {
            width: 100%;

            margin: 0;

            border-collapse: separate;

            border-spacing: 0;

            color: #e2e8f0;
        }

        .enrollments-table thead th {
            background: #171226;

            color: #cbd5e1;

            border: none;

            padding: 16px 14px;

            font-size: 0.82rem;

            text-transform: uppercase;

            letter-spacing: 0.5px;

            white-space: nowrap;
        }

        .enrollments-table thead th:first-child {
            border-top-left-radius: 10px;
        }

        .enrollments-table thead th:last-child {
            border-top-right-radius: 10px;
        }


        /* Table Rows */

        .enrollments-table tbody tr {
            background: #111827;

            transition: all 0.2s ease;
        }

        .enrollments-table tbody tr:hover {
            background: #1d1830;
        }

        .enrollments-table td {
            border: none;

            border-top: 1px solid rgba(148, 163, 184, 0.09);

            padding: 15px 14px;

            vertical-align: middle;

            white-space: nowrap;
        }


        /* Enrollment Data */

        .enrollment-id {
            color: #64748b;

            font-weight: 600;
        }

        .enrollment-number {
            color: #f8fafc;

            font-weight: 600;
        }

        .enrollment-student {
            color: #cbd5e1;
        }

        .enrollment-batch {
            color: #cbd5e1;
        }

        .enrollment-date {
            color: #94a3b8;
        }

        .enrollment-fee {
            color: #94a3b8;

            font-weight: 600;
        }


        /* Action Cell */

        .action-cell {
            text-align: center;
        }


        /* Action Buttons */

        .action-btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-width: 72px;

            padding: 7px 12px;

            border-radius: 8px;

            text-decoration: none;

            font-size: 0.8rem;

            font-weight: 600;

            transition: all 0.2s ease;
        }


        /* View */

        .view-btn {
            background: rgba(168, 85, 247, 0.15);

            color: #c084fc;

            border: 1px solid rgba(168, 85, 247, 0.25);
        }

        .view-btn:hover {
            background: #9333ea;

            color: white;

            text-decoration: none;

            transform: translateY(-1px);
        }


        /* Update */

        .update-btn {
            background: rgba(245, 158, 11, 0.15);

            color: #fbbf24;

            border: 1px solid rgba(245, 158, 11, 0.25);
        }

        .update-btn:hover {
            background: #d97706;

            color: white;

            text-decoration: none;

            transform: translateY(-1px);
        }


        /* Delete */

        .delete-btn {
            background: rgba(239, 68, 68, 0.15);

            color: #f87171;

            border: 1px solid rgba(239, 68, 68, 0.25);
        }

        .delete-btn:hover {
            background: #dc2626;

            color: white;

            text-decoration: none;

            transform: translateY(-1px);
        }


        /* Empty State */

        .empty-state {
            text-align: center;

            padding: 40px 20px !important;

            color: #64748b;
        }


        /* Mobile */

        @media (max-width: 768px) {

            .enrollments-page {
                padding-top: 30px;

                padding-bottom: 30px;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .enrollments-card {
                padding: 15px;

                border-radius: 14px;
            }

            .top-bar {
                align-items: flex-start;

                flex-direction: column;
            }

            .enrollment-actions {
                width: 100%;

                flex-direction: column;

                align-items: stretch;
            }

            .enrollment-actions form {
                width: 100%;
            }

            .add-enrollment-btn,
            .delete-all-btn {
                width: 100%;

                text-align: center;
            }

            .enrollments-table thead th,
            .enrollments-table td {
                padding: 12px 10px;
            }

        }
    </style>


    <div class="enrollments-page">

        <div class="container-fluid enrollments-container">


            {{-- Page Header --}}

            <div class="page-header">

                <h1>
                    Enrollments Dashboard
                </h1>

                <p>
                    Manage and view all registered enrollments from one place.
                </p>

            </div>


            {{-- Enrollments Card --}}

            <div class="enrollments-card">


                {{-- Top Bar --}}

                <div class="top-bar">

                    <div>

                        <h5 class="mb-1">
                            All Enrollments
                        </h5>

                        <span class="enrollments-count">

                            {{ count($enrollments) }} registered enrollments

                        </span>

                    </div>


                    {{-- Buttons --}}

                    <div class="enrollment-actions">


                        {{-- Delete All Enrollments --}}

                        <form action="{{ route('enrollments.destroyAll') }}" method="POST">

                            @csrf

                            @method('DELETE')

                            <button type="submit" class="delete-all-btn"
                                onclick="return confirm('Are you sure you want to delete ALL enrollments? This action cannot be undone.')">

                                Delete All Enrollments

                            </button>

                        </form>


                        {{-- Add Enrollment --}}

                        <a href="{{ route('enrollments.create') }}" class="add-enrollment-btn">

                            + Add Enrollment

                        </a>


                    </div>

                </div>


                {{-- Enrollments Table --}}

                <div class="table-wrapper">

                    <table class="enrollments-table">

                        <thead>

                            <tr>

                                <th>
                                    ID
                                </th>

                                <th>
                                    Enrollment No
                                </th>

                                <th>
                                    Student
                                </th>

                                <th>
                                    Batch
                                </th>

                                <th>
                                    Join Date
                                </th>

                                <th>
                                    Fee
                                </th>

                                <th class="text-center">
                                    View
                                </th>

                                <th class="text-center">
                                    Update
                                </th>

                                <th class="text-center">
                                    Delete
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            @forelse ($enrollments as $enrollment)
                                <tr>


                                    {{-- ID --}}

                                    <td class="enrollment-id">

                                        #{{ $loop->iteration }}

                                    </td>


                                    {{-- Enrollment Number --}}

                                    <td class="enrollment-number">

                                        {{ $enrollment->enrollment_number }}

                                    </td>


                                    {{-- Student --}}

                                    <td class="enrollment-student">

                                        {{ $enrollment->student->name ?? 'N/A' }}

                                    </td>


                                    {{-- Batch --}}

                                    <td class="enrollment-batch">

                                        {{ $enrollment->batch->name ?? 'N/A' }}

                                    </td>


                                    {{-- Join Date --}}

                                    <td class="enrollment-date">

                                        {{ $enrollment->join_date }}

                                    </td>


                                    {{-- Fee --}}

                                    <td class="enrollment-fee">

                                        {{ $enrollment->fee }}

                                    </td>


                                    {{-- View --}}

                                    <td class="action-cell">

                                        <a class="action-btn view-btn"
                                            href="{{ route('enrollments.show', $enrollment->id) }}">

                                            View

                                        </a>

                                    </td>


                                    {{-- Update --}}

                                    <td class="action-cell">

                                        <a class="action-btn update-btn"
                                            href="{{ route('enrollments.edit', $enrollment->id) }}">

                                            Update

                                        </a>

                                    </td>


                                    {{-- Delete --}}

                                    <td class="action-cell">

                                        <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST"
                                            style="display: inline;">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit" class="action-btn delete-btn"
                                                onclick="return confirm('Are you sure you want to delete this enrollment?')">

                                                Delete

                                            </button>

                                        </form>

                                    </td>


                                </tr>

                            @empty

                                <tr>

                                    <td colspan="9" class="empty-state">

                                        No enrollments found.

                                    </td>

                                </tr>
                            @endforelse


                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
@endsection
