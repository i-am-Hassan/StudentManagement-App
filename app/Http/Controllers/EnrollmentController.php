<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Batch;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->search;

        $enrollments = Enrollment::query()
            ->when($search, function ($query, $search) {
                $query->where('enroll_no', 'like', "%{$search}%")
                    ->orWhereHas('student', function ($studentQuery) use ($search) {
                        $studentQuery->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('batch', function ($batchQuery) use ($search) {
                        $batchQuery->where('name', 'like', "%{$search}%");
                    })
                    ->orWhere('join_date', 'like', "%{$search}%")
                    ->orWhere('fee', 'like', "%{$search}%");
            })
            ->with(['student', 'batch'])
            ->get();

        return view('Enrollments.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $students = Student::all();
        $batches = Batch::all();

        return view('Enrollments.create', compact('students', 'batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'enroll_no' => 'required|string|max:255',
            'batch_id' => 'required|exists:batches,id',
            'student_id' => 'required|exists:students,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric|',
        ]);

        Enrollment::create([
            'enrollment_number' => $validated['enroll_no'],
            'batch_id' => $validated['batch_id'],
            'student_id' => $validated['student_id'],
            'join_date' => $validated['join_date'],
            'fee' => $validated['fee'],
        ]);

        return redirect()->route('enrollments.index')
            ->with('flash_message', 'Enrollment Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $enrollment = Enrollment::with(['student', 'batch'])->findOrFail($id);

        return view('Enrollments.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $enrollment = Enrollment::findOrFail($id);

        $students = Student::all();
        $batches = Batch::all();

        return view('Enrollments.edit', compact('enrollment', 'students', 'batches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $enrollment = Enrollment::findOrFail($id);

        $validated = $request->validate([
            'enroll_no' => 'required|string|max:255',
            'batch_id' => 'required|exists:batches,id',
            'student_id' => 'required|exists:students,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric',
        ]);

        $enrollment->update($validated);

        return redirect()->route('enrollments.index')
            ->with('flash_message', 'Enrollment Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $enrollment = Enrollment::findOrFail($id);

        $enrollment->delete();

        return redirect()->route('enrollments.index')
            ->with('flash_message', 'Enrollment Deleted');
    }

    /**
     * Delete all enrollments.
     */
    public function destroyAll(): RedirectResponse
    {
        Enrollment::query()->delete();

        return redirect()->route('enrollments.index')
            ->with('flash_message', 'All Enrollments Deleted');
    }
}
