@extends('layouts.admin')

@section('title','New Appointment')

@section('page-title','New Appointment')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-lg shadow p-8">

        <h2 class="text-3xl font-bold mb-8">
            Book Appointment
        </h2>

        @if($errors->has('appointment_time'))
        <div class="mb-6 rounded border border-red-300 bg-red-100 text-red-700 px-4 py-3">
            {{ $errors->first('appointment_time') }}
        </div>
        @endif

        <form action="{{ route('appointments.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Patient -->

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

                        <option
                            value="{{ $patient->id }}"
                            {{ old('patient_id') == $patient->id ? 'selected' : '' }}>

                            {{ $patient->patient_id }} - {{ $patient->full_name }}

                        </option>

                        @endforeach

                    </select>

                    @error('patient_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>

                <!-- Date -->

                <div>

                    <label class="block font-medium mb-2">
                        Appointment Date <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="date"
                        name="appointment_date"
                        value="{{ old('appointment_date') }}"
                        class="w-full border rounded px-3 py-2">

                    @error('appointment_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>

                <!-- Time -->

                <div>

                    <label class="block font-medium mb-2">
                        Appointment Time <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="time"
                        name="appointment_time"
                        value="{{ old('appointment_time') }}"
                        class="w-full border rounded px-3 py-2">

                    @error('appointment_time')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>

                <!-- Status -->

                <div>

                    <label class="block font-medium mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full border rounded px-3 py-2">

                        <option value="scheduled"
                            {{ old('status','scheduled') == 'scheduled' ? 'selected' : '' }}>
                            Scheduled
                        </option>

                        <option value="completed"
                            {{ old('status') == 'completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                        <option value="cancelled"
                            {{ old('status') == 'cancelled' ? 'selected' : '' }}>
                            Cancelled
                        </option>

                    </select>

                </div>

                <!-- Chief Complaint -->

                <div class="md:col-span-2">

                    <label class="block font-medium mb-2">
                        Chief Complaint <span class="text-red-500">*</span>
                    </label>

                    <textarea
                        name="chief_complaint"
                        rows="4"
                        class="w-full border rounded px-3 py-2">{{ old('chief_complaint') }}</textarea>

                    @error('chief_complaint')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>

                <!-- Remarks -->

                <div class="md:col-span-2">

                    <label class="block font-medium mb-2">
                        Remarks
                    </label>

                    <textarea
                        name="remarks"
                        rows="3"
                        class="w-full border rounded px-3 py-2">{{ old('remarks') }}</textarea>

                    @error('remarks')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

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