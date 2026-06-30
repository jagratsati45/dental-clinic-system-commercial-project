<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $patients = Patient::when($search, function ($query) use ($search) {

            $query->where('patient_id', 'like', "%{$search}%")
                ->orWhere('full_name', 'like', "%{$search}%")
                ->orWhere('mobile', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.patients.index', compact('patients', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'full_name' => 'required|max:255',

            'mobile' => 'required|digits:10|unique:patients,mobile',
            
            'gender' => 'required|in:male,female,other',

            'dob' => 'nullable|date',

            'age' => 'nullable|integer|min:0|max:120',

            'address' => 'nullable',

            'blood_group' => 'nullable',

            'allergies' => 'nullable',

            'medical_history' => 'nullable',

            'emergency_contact' => 'nullable|max:15',

            'status' => 'required|boolean',

        ]);


        $lastPatient = Patient::latest('id')->first();

        $nextNumber = $lastPatient
            ? $lastPatient->id + 1
            : 1;

        $validated['patient_id'] = 'PAT-' . date('Y') . '-' . str_pad(
            $nextNumber,
            4,
            '0',
            STR_PAD_LEFT
        );

        Patient::create($validated);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
{
    return view('admin.patients.show', compact('patient'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('admin.patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([

            'full_name' => 'required|max:255',

            'mobile' => 'required|digits:10|unique:patients,mobile,' . $patient->id,

            'gender' => 'required|in:male,female,other',

            'dob' => 'nullable|date',

            'age' => 'nullable|integer|min:0|max:120',

            'address' => 'nullable',

            'blood_group' => 'nullable',

            'allergies' => 'nullable',

            'medical_history' => 'nullable',

            'emergency_contact' => 'nullable|max:15',

            'status' => 'required|boolean',

        ]);

        $patient->update($validated);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
