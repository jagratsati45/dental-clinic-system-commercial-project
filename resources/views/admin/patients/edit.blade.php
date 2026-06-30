@extends('layouts.admin')

@section('title','Edit Patient')

@section('page-title','Edit Patient')
@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-lg shadow p-8">

        <h2 class="text-3xl font-bold mb-8">
            Edit Patient
        </h2>

        <form action="{{ route('patients.update', $patient) }}" method="POST">

            @csrf

            @method('PUT')


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block font-medium mb-2">
                        Full Name <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="full_name"
                        value="{{ old('full_name', $patient->full_name) }}"
                        class="w-full border rounded px-3 py-2">

                    @error('full_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Mobile Number <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="tel"
                        maxlength="10"
                        name="mobile"
                        value="{{ old('mobile', $patient->mobile) }}"
                        class="w-full border rounded px-3 py-2">

                    @error('mobile')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label class="block font-medium mb-2">
                        Gender <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="gender"
                        class="w-full border rounded px-3 py-2">

                        <option value="">Select Gender</option>

                        <option value="male"
                            {{ old('gender', $patient->gender) == 'male' ? 'selected' : '' }}>
                            Male
                        </option>

                        <option value="female"
                            {{ old('gender', $patient->gender) == 'female' ? 'selected' : '' }}>
                            Female
                        </option>

                        <option value="other"
                            {{ old('gender', $patient->gender) == 'other' ? 'selected' : '' }}>
                            Other
                        </option>

                    </select>

                    @error('gender')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label class="block font-medium mb-2">
                        Date of Birth
                    </label>

                    <input
                        type="date"
                        name="dob"
                        value="{{ old('dob', $patient->dob) }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Age
                    </label>

                    <input
                        type="number"
                        name="age"
                        value="{{ old('age', $patient->age) }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Blood Group
                    </label>

                    <select
                        name="blood_group"
                        class="w-full border rounded px-3 py-2">

                        <option value="">
                            Select Blood Group
                        </option>

                        <option value="A+" {{ old('blood_group', $patient->blood_group) == 'A+' ? 'selected' : '' }}>A+</option>
                        <option value="A-" {{ old('blood_group', $patient->blood_group) == 'A-' ? 'selected' : '' }}>A-</option>
                        <option value="B+" {{ old('blood_group', $patient->blood_group) == 'B+' ? 'selected' : '' }}>B+</option>
                        <option value="B-" {{ old('blood_group', $patient->blood_group) == 'B-' ? 'selected' : '' }}>B-</option>
                        <option value="AB+" {{ old('blood_group', $patient->blood_group) == 'AB+' ? 'selected' : '' }}>AB+</option>
                        <option value="AB-" {{ old('blood_group', $patient->blood_group) == 'AB-' ? 'selected' : '' }}>AB-</option>
                        <option value="O+" {{ old('blood_group', $patient->blood_group) == 'O+' ? 'selected' : '' }}>O+</option>
                        <option value="O-" {{ old('blood_group', $patient->blood_group) == 'O-' ? 'selected' : '' }}>O-</option>

                    </select>
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Address
                    </label>

                    <textarea
                        name="address"
                        rows="3"
                        class="w-full border rounded px-3 py-2">{{ old('address', $patient->address) }}</textarea>
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Allergies
                    </label>

                    <textarea
                        name="allergies"
                        rows="3"
                        class="w-full border rounded px-3 py-2">{{ old('allergies', $patient->allergies) }}</textarea>
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Medical History
                    </label>

                    <textarea
                        name="medical_history"
                        rows="3"
                        class="w-full border rounded px-3 py-2">{{ old('medical_history', $patient->medical_history) }}</textarea>
                </div>


                <div>
                    <label class="block font-medium mb-2">
                        Emergency Contact
                    </label>

                    <input
                        type="text"
                        name="emergency_contact"
                        value="{{ old('emergency_contact', $patient->emergency_contact) }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full border rounded px-3 py-2">

                        <option value="1"
                            {{ old('status', $patient->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ old('status', $patient->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>
                </div>
            </div>

            <div class="mt-8 flex gap-4">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">

                    Update Patient

                </button>

                <a
                    href="{{ route('patients.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">

                    Cancel

                </a>

            </div>
            <!-- Patient Form Starts Here -->

        </form>

    </div>

</div>

@endsection