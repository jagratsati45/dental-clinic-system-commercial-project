<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->search;

    $appointments = Appointment::with('patient')

        ->when($search, function ($query) use ($search) {

            $query->where('appointment_no', 'like', "%{$search}%")

                ->orWhereHas('patient', function ($patient) use ($search) {

                    $patient->where('full_name', 'like', "%{$search}%")
                            ->orWhere('mobile', 'like', "%{$search}%");

                })

                ->orWhere('appointment_date', 'like', "%{$search}%");

        })

        ->latest()

        ->paginate(10)

        ->withQueryString();

    return view(
        'admin.appointments.index',
        compact('appointments', 'search')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = \App\Models\Patient::where('status', true)
            ->orderBy('full_name')
            ->get();

        return view('admin.appointments.create', compact('patients'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'patient_id' => 'required|exists:patients,id',

            'appointment_date' => 'required|date',

            'appointment_time' => 'required',

            'chief_complaint' => 'required|max:1000',

            'status' => 'required|in:scheduled,completed,cancelled',

            'remarks' => 'nullable|max:1000',

        ]);

        $validated['appointment_no'] =
            'APT-' . date('Y') . '-' .
            str_pad(
                Appointment::count() + 1,
                4,
                '0',
                STR_PAD_LEFT
            );

        Appointment::create($validated);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment booked successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
{
    $patients = Patient::where('status', true)
        ->orderBy('full_name')
        ->get();

    return view(
        'admin.appointments.edit',
        compact('appointment', 'patients')
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
{
    $validated = $request->validate([

        'patient_id' => 'required|exists:patients,id',

        'appointment_date' => 'required|date',

        'appointment_time' => 'required',

        'chief_complaint' => 'required|max:1000',

        'status' => 'required|in:scheduled,completed,cancelled',

        'remarks' => 'nullable|max:1000',

    ]);

    $appointment->update($validated);

    return redirect()
        ->route('appointments.index')
        ->with('success', 'Appointment updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
