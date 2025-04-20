<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Visit;
use App\Models\Region;
use Illuminate\Http\Request;

class PatientRegistrationController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patient_registrations.index', compact('patients'));
    }

    public function create()
    {
        $regions = Region::all();
        return view('patient_registrations.create', compact('regions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'address' => 'nullable|string|max:500',
            'region_id' => 'nullable|exists:regions,id',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'visit_date' => 'required|date',
            'visit_type' => 'nullable|string|max:255',
        ]);

        $patient = Patient::create($request->only([
            'name', 'birth_date', 'gender', 'address', 'region_id', 'phone', 'email'
        ]));

        $visit = Visit::create([
            'patient_id' => $patient->id,
            'visit_date' => $request->visit_date,
            'visit_type' => $request->visit_type,
        ]);

        return redirect()->route('patient_registrations.index')->with('success', 'Patient registered and visit created successfully.');
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient_registrations.show', compact('patient'));
    }
}
