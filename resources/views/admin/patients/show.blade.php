@extends('layouts.admin')

@section('title','Patient Details')

@section('page-title','Patient Details')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-lg shadow p-8">

        <div class="flex justify-between items-center mb-8">

            <h2 class="text-3xl font-bold">
                Patient Details
            </h2>

            <a href="{{ route('patients.edit', $patient) }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">

                Edit Patient

            </a>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <strong>Patient ID</strong>
                <p>{{ $patient->patient_id }}</p>
            </div>

            <div>
                <strong>Full Name</strong>
                <p>{{ $patient->full_name }}</p>
            </div>

            <div>
                <strong>Mobile Number</strong>
                <p>{{ $patient->mobile }}</p>
            </div>

            <div>
                <strong>Gender</strong>
                <p>{{ ucfirst($patient->gender) }}</p>
            </div>

            <div>
                <strong>Date of Birth</strong>
                <p>{{ $patient->dob ?? '-' }}</p>
            </div>

            <div>
                <strong>Age</strong>
                <p>{{ $patient->age ?? '-' }}</p>
            </div>

            <div>
                <strong>Blood Group</strong>
                <p>{{ $patient->blood_group ?? '-' }}</p>
            </div>

            <div>
                <strong>Status</strong>

                @if($patient->status)

                    <span class="text-green-600 font-semibold">
                        Active
                    </span>

                @else

                    <span class="text-red-600 font-semibold">
                        Inactive
                    </span>

                @endif

            </div>

            <div class="md:col-span-2">

                <strong>Address</strong>

                <p>{{ $patient->address ?: '-' }}</p>

            </div>

            <div>

                <strong>Allergies</strong>

                <p>{{ $patient->allergies ?: '-' }}</p>

            </div>

            <div>

                <strong>Medical History</strong>

                <p>{{ $patient->medical_history ?: '-' }}</p>

            </div>

            <div>

                <strong>Emergency Contact</strong>

                <p>{{ $patient->emergency_contact ?: '-' }}</p>

            </div>

        </div>

        <div class="mt-8">

            <a href="{{ route('patients.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded">

                Back to Patient List

            </a>

        </div>

    </div>

</div>

@endsection