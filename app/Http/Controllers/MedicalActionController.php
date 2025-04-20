<?php

namespace App\Http\Controllers;

use App\Models\MedicalAction;
use Illuminate\Http\Request;

class MedicalActionController extends Controller
{
    public function index()
    {
        $actions = MedicalAction::all();
        return view('medical_actions.index', compact('actions'));
    }

    public function create()
    {
        return view('medical_actions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        MedicalAction::create($request->all());

        return redirect()->route('medical_actions.index')->with('success', 'Medical action created successfully.');
    }

    public function show(MedicalAction $medicalAction)
    {
        return view('medical_actions.show', compact('medicalAction'));
    }

    public function edit(MedicalAction $medicalAction)
    {
        return view('medical_actions.edit', compact('medicalAction'));
    }

    public function update(Request $request, MedicalAction $medicalAction)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $medicalAction->update($request->all());

        return redirect()->route('medical_actions.index')->with('success', 'Medical action updated successfully.');
    }

    public function destroy(MedicalAction $medicalAction)
    {
        $medicalAction->delete();

        return redirect()->route('medical_actions.index')->with('success', 'Medical action deleted successfully.');
    }
}
