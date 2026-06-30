@extends('layouts.admin')

@section('title','Appointment Management')

@section('page-title','Appointment Management')

@section('content')

<div class="max-w-7xl mx-auto">

    <!-- Heading + Button -->

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-3xl font-bold">
            Appointment Management
        </h2>

        <a href="{{ route('appointments.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">

            + New Appointment

        </a>

    </div>

    <!-- Search -->

    <div class="bg-white rounded-lg shadow p-4 mb-6">

        <form
            method="GET"
            action="{{ route('appointments.index') }}"
            class="flex gap-3">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search Appointment No, Patient, Mobile or Date..."
                class="flex-1 border rounded px-4 py-2">

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 rounded">

                Search

            </button>

            @if(request('search'))

                <a
                    href="{{ route('appointments.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">

                    Reset

                </a>

            @endif

        </form>

    </div>

    <!-- Table -->

    <div class="bg-white rounded-lg shadow overflow-hidden">

        <table class="min-w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3 text-left">Appointment No</th>

                    <th class="p-3 text-left">Patient</th>

                    <th class="p-3 text-left">Date</th>

                    <th class="p-3 text-left">Time</th>

                    <th class="p-3 text-left">Status</th>

                    <th class="p-3 text-left">Actions</th>

                </tr>

            </thead>

            <tbody>

                @forelse($appointments as $appointment)

                <tr class="border-t">

                    <td class="p-3">
                        {{ $appointment->appointment_no }}
                    </td>

                    <td class="p-3">
                        {{ $appointment->patient->full_name }}
                    </td>

                    <td class="p-3">
                        {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d-m-Y') }}
                    </td>

                    <td class="p-3">
                        {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                    </td>

                    <td class="p-3">

                        @if($appointment->status == 'scheduled')

                            <span class="text-blue-600">
                                Scheduled
                            </span>

                        @elseif($appointment->status == 'completed')

                            <span class="text-green-600">
                                Completed
                            </span>

                        @else

                            <span class="text-red-600">
                                Cancelled
                            </span>

                        @endif

                    </td>

                    <td class="p-3">

                        <a
                            href="{{ route('appointments.edit',$appointment) }}"
                            class="text-blue-600 hover:underline">

                            Edit

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center p-6">

                        No appointments found.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $appointments->links() }}

    </div>

</div>

@endsection