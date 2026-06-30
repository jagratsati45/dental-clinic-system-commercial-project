@extends('layouts.admin')

@section('title', 'Patient Management')

@section('page-title', 'Patient Management')

@section('content')

<div class="py-8 px-6">

    <div class="flex justify-between items-center mb-6">

        <div class="bg-white rounded-lg shadow p-4 mb-6">

            <form method="GET"
                action="{{ route('patients.index') }}"
                class="flex gap-3">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by Patient ID, Name or Mobile..."
                    class="flex-1 border rounded px-4 py-2">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 rounded">

                    Search

                </button>

                @if(request('search'))

                <a href="{{ route('patients.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">

                    Reset

                </a>

                @endif

            </form>

        </div>

        <h1 class="text-3xl font-bold">
            Patient Management
        </h1>

        <a href="{{ route('patients.create') }}"
            class="bg-blue-600 text-white px-5 py-2 rounded">
            + Add Patient
        </a>

    </div>

    <div class="bg-white rounded shadow overflow-hidden">

        <table class="min-w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3 text-left">Patient ID</th>

                    <th class="p-3 text-left">Name</th>

                    <th class="p-3 text-left">Mobile</th>

                    <th class="p-3 text-left">Gender</th>

                    <th class="p-3 text-left">
                        Age
                    </th>

                    <th class="p-3 text-left">Status</th>

                    <th class="p-3 text-left">Actions</th>

                </tr>

            </thead>

            <tbody>

                @forelse($patients as $patient)

                <tr class="border-t">

                    <td class="p-3">{{ $patient->patient_id }}</td>

                    <td class="p-3">{{ $patient->full_name }}</td>

                    <td class="p-3">{{ $patient->mobile }}</td>

                    <td class="p-3">{{ ucfirst($patient->gender) }}</td>

                    <td class="p-3">
                        {{ $patient->age ?? '-' }}
                    </td>

                    <td class="p-3">

                        @if($patient->status)

                        <span class="text-green-600">Active</span>

                        @else

                        <span class="text-red-600">Inactive</span>

                        @endif

                    </td>

                    <td class="p-3">

                        <div class="flex gap-4">

                            <a href="{{ route('patients.show',$patient) }}"
                                class="text-green-600 hover:underline">

                                View

                            </a>

                            <a href="{{ route('patients.edit',$patient) }}"
                                class="text-blue-600 hover:underline">

                                Edit

                            </a>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center p-6">

                        No patients found.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $patients->links() }}

    </div>

</div>

@endsection