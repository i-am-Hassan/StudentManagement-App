<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->search;

        $courses = Course::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('syllabus', 'like', "%{$search}%")
                    ->orWhere('duration', 'like', "%{$search}%");
            })
            ->get();

        return view('Courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('Courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'syllabus' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
        ]);

        Course::create($validated);

        return redirect()->route('courses.index')
            ->with('flash_message', 'Course Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $course = Course::findOrFail($id);

        return view('Courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $course = Course::findOrFail($id);

        return view('Courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $course = Course::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'syllabus' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
        ]);

        $course->update($validated);

        return redirect()->route('courses.index')
            ->with('flash_message', 'Course Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return redirect()->route('courses.index')
            ->with('flash_message', 'Course Deleted');
    }

    /**
     * Delete all courses.
     */
    public function destroyAll(): RedirectResponse
    {
        Course::query()->delete();

        return redirect()->route('courses.index')
            ->with('flash_message', 'All Courses Deleted');
    }
}

