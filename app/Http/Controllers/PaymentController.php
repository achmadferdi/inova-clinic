<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Visit;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('visit.patient')->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $visits = Visit::all();
        return view('payments.create', compact('visits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'visit_id' => 'required|exists:visits,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'payment_method' => 'nullable|string|max:255',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment recorded successfully.');
    }

    public function show(Payment $payment)
    {
        $payment->load('visit.patient');
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $visits = Visit::all();
        return view('payments.edit', compact('payment', 'visits'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'visit_id' => 'required|exists:visits,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'payment_method' => 'nullable|string|max:255',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
