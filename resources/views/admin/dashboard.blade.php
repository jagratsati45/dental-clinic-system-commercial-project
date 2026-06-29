@extends('layouts.admin')

@section('title','Admin Dashboard')

@section('page-title','Dashboard')

@section('content')

<div class="grid grid-cols-4 gap-6">

    <div class="bg-white rounded shadow p-6">

        <h2 class="text-gray-500">

            Doctors

        </h2>

        <p class="text-4xl font-bold">

            0

        </p>

    </div>

    <div class="bg-white rounded shadow p-6">

        <h2 class="text-gray-500">

            Receptionists

        </h2>

        <p class="text-4xl font-bold">

            0

        </p>

    </div>

    <div class="bg-white rounded shadow p-6">

        <h2 class="text-gray-500">

            Patients

        </h2>

        <p class="text-4xl font-bold">

            0

        </p>

    </div>

    <div class="bg-white rounded shadow p-6">

        <h2 class="text-gray-500">

            Appointments

        </h2>

        <p class="text-4xl font-bold">

            0

        </p>

    </div>

</div>

@endsection