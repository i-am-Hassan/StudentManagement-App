<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Batch;
use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index(): View
    {
        $studentsCount = Student::count();

        $teachersCount = Teacher::count();

        $coursesCount = Course::count();

        $batchesCount = Batch::count();

        $enrollmentsCount = Enrollment::count();

        $totalPayments = Payment::sum('amount');

        $recentEnrollments = Enrollment::with([
            'student',
            'batch'
        ])
            ->latest('join_date')
            ->take(5)
            ->get();

        $recentPayments = Payment::with([
            'enrollment.student',
            'enrollment.batch'
        ])
            ->latest('paid_date')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'studentsCount',
            'teachersCount',
            'coursesCount',
            'batchesCount',
            'enrollmentsCount',
            'totalPayments',
            'recentEnrollments',
            'recentPayments'
        ));
    }
}
