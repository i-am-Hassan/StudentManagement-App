<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $payments = Payment::with('enrollment')->get();

        return view('payments.index')->with('payments', $payments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $enrollments = Enrollment::with(['student', 'batch'])->get();

        return view('payments.create', compact('enrollments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'enrollment_id' => 'required|integer|exists:enrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        Payment::create($validated);

        return redirect()->route('payments.index')
            ->with('flash_message', 'Payment Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $payment = Payment::with('enrollment')->findOrFail($id);

        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $payment = Payment::findOrFail($id);

        $enrollments = Enrollment::with(['student', 'batch'])->get();

        return view('payments.edit', compact('payment', 'enrollments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $payment = Payment::findOrFail($id);

        $validated = $request->validate([
            'enrollment_id' => 'required|integer|exists:enrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        $payment->update($validated);

        return redirect()->route('payments.index')
            ->with('flash_message', 'Payment Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $payment = Payment::findOrFail($id);

        $payment->delete();

        return redirect()->route('payments.index')
            ->with('flash_message', 'Payment Deleted');
    }

    /**
     * Delete all payments.
     */
    public function destroyAll(): RedirectResponse
    {
        Payment::query()->delete();

        return redirect()->route('payments.index')
            ->with('flash_message', 'All Payments Deleted');
    }
}
