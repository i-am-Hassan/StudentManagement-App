<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $batches = Batch::with('course')->get();

        return view('batches.index')->with('batches', $batches);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $courses = Course::all();

        return view('batches.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|integer|exists:courses,id',
            'start_date' => 'required|date',
        ]);

        Batch::create($validated);

        return redirect()->route('batches.index')
            ->with('flash_message', 'Batch Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $batch = Batch::with('course')->findOrFail($id);

        return view('batches.show', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $batch = Batch::findOrFail($id);
        $courses = Course::all();

        return view('batches.edit', compact('batch', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $batch = Batch::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|integer|exists:courses,id',
            'start_date' => 'required|date',
        ]);

        $batch->update($validated);

        return redirect()->route('batches.index')
            ->with('flash_message', 'Batch Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $batch = Batch::findOrFail($id);

        $batch->delete();

        return redirect()->route('batches.index')
            ->with('flash_message', 'Batch Deleted');
    }

    /**
     * Delete all batches.
     */
    public function destroyAll(): RedirectResponse
    {
        Batch::query()->delete();

        return redirect()->route('batches.index')
            ->with('flash_message', 'All Batches Deleted');
    }
}
