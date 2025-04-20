<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\MedicalAction;
use App\Models\Medicine;
use App\Models\VisitAction;
use App\Models\VisitMedicine;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::with('patient')->get();
        return view('visits.index', compact('visits'));
    }

    public function show(Visit $visit)
    {
        $visit->load('patient', 'employee', 'actions.medicalAction', 'medicines.medicine', 'payments');
        $medicalActions = MedicalAction::all();
        $medicines = Medicine::all();
        return view('visits.show', compact('visit', 'medicalActions', 'medicines'));
    }

    public function addAction(Request $request, Visit $visit)
    {
        $request->validate([
            'medical_action_id' => 'required|exists:medical_actions,id',
            'price' => 'required|numeric|min:0',
        ]);

        VisitAction::create([
            'visit_id' => $visit->id,
            'medical_action_id' => $request->medical_action_id,
            'price' => $request->price,
        ]);

        return redirect()->route('visits.show', $visit)->with('success', 'Medical action added to visit.');
    }

    public function addMedicine(Request $request, Visit $visit)
    {
        $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        VisitMedicine::create([
            'visit_id' => $visit->id,
            'medicine_id' => $request->medicine_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return redirect()->route('visits.show', $visit)->with('success', 'Medicine added to visit.');
    }
}
