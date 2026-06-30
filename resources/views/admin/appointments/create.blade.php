@extends('layouts.admin')

@section('title','New Appointment')

@section('page-title','New Appointment')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-lg shadow p-8">

        <h2 class="text-3xl font-bold mb-8">
            Book Appointment
        </h2>

        <form action="{{ route('appointments.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>

                    <label class="block font-medium mb-2">
                        Patient <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="patient_id"
                        class="w-full border rounded px-3 py-2">

                        <option value="">
                            Select Patient
                        </option>

                        @foreach($patients as $patient)

                            <option value="{{ $patient->id }}">
                                {{ $patient->patient_id }} - {{ $patient->full_name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block font-medium mb-2">
                        Appointment Date
                    </label>

                    <input
                        type="date"
                        name="appointment_date"
                        class="w-full border rounded px-3 py-2">

                </div>

                <div>

                    <label class="block font-medium mb-2">
                        Appointment Time
                    </label>

                    <input
                        type="time"
                        name="appointment_time"
                        class="w-full border rounded px-3 py-2">

                </div>

                <div>

                    <label class="block font-medium mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full border rounded px-3 py-2">

                        <option value="scheduled">
                            Scheduled
                        </option>

                        <option value="completed">
                            Completed
                        </option>

                        <option value="cancelled">
                            Cancelled
                        </option>

                    </select>

                </div>

                <div class="md:col-span-2">

                    <label class="block font-medium mb-2">
                        Chief Complaint
                    </label>

                    <textarea
                        name="chief_complaint"
                        rows="4"
                        class="w-full border rounded px-3 py-2"></textarea>

                </div>

                <div class="md:col-span-2">

                    <label class="block font-medium mb-2">
                        Remarks
                    </label>

                    <textarea
                        name="remarks"
                        rows="3"
                        class="w-full border rounded px-3 py-2"></textarea>

                </div>

            </div>

            <div class="mt-8 flex gap-4">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">

                    Save Appointment

                </button>

                <a
                    href="{{ route('appointments.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection