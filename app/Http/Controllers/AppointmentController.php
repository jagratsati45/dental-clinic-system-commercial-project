<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
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

        return view('admin.appointments.index', compact('appointments', 'search'));
    }

    public function create()
    {
        $patients = Patient::where('status', true)
            ->orderBy('full_name')
            ->get();

        return view('admin.appointments.create', compact('patients'));
    }

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

        $slotExists = Appointment::where('appointment_date', $validated['appointment_date'])
            ->where('appointment_time', $validated['appointment_time'])
            ->exists();

        if ($slotExists) {

            return back()
                ->withInput()
                ->withErrors([
                    'appointment_time' => 'This appointment slot is already booked.'
                ]);
        }

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

    public function show(Appointment $appointment)
    {
        //
    }

    public function edit(Appointment $appointment)
    {
        $patients = Patient::where('status', true)
            ->orderBy('full_name')
            ->get();

        return view('admin.appointments.edit', compact('appointment', 'patients'));
    }

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

        $slotExists = Appointment::where('appointment_date', $validated['appointment_date'])
            ->where('appointment_time', $validated['appointment_time'])
            ->where('id', '!=', $appointment->id)
            ->exists();

        if ($slotExists) {

            return back()
                ->withInput()
                ->withErrors([
                    'appointment_time' => 'This appointment slot is already booked.'
                ]);
        }

        $appointment->update($validated);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment updated successfully.');
    }

    public function destroy(Appointment $appointment)
    {
        //
    }
}