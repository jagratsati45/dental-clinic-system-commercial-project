@extends('layouts.admin')

@section('title', 'User Management')

@section('page-title', 'User Management')

@section('content')

<div class="py-8 max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-3xl font-bold">
                User Management
            </h1>

            <a href="{{ route('admin.users.create') }}"
               class="bg-blue-600 text-white px-5 py-2 rounded">
                + Add User
            </a>

        </div>

        <div class="bg-white rounded shadow overflow-hidden">

            <table class="min-w-full">

                <thead class="bg-gray-100">

                <tr>

                    <th class="p-3 text-left">Name</th>

                    <th class="p-3 text-left">Email</th>

                    <th class="p-3 text-left">Role</th>

                    <th class="p-3 text-left">Status</th>

                    <th class="p-3 text-left">Actions</th>

                </tr>

                </thead>

                <tbody>

                @forelse($users as $user)

                    <tr class="border-t">

                        <td class="p-3">
                            {{ $user->name }}
                        </td>

                        <td class="p-3">
                            {{ $user->email }}
                        </td>

                        <td class="p-3">
                            {{ ucfirst($user->role) }}
                        </td>

                        <td class="p-3">

                            @if($user->status)

                                <span class="text-green-600">
                                    Active
                                </span>

                            @else

                                <span class="text-red-600">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <td class="p-3">

                            <a href="{{ route('admin.users.edit',$user) }}"
                               class="text-blue-600">
                                Edit
                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center p-6">
                            No users found.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-6">

            {{ $users->links() }}

        </div>

    </div>

@endsection