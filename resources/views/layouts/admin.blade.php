<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dental Clinic System')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">

    <div class="flex h-screen">

        <!-- Sidebar -->

        <aside class="w-64 bg-blue-900 text-white">

            <div class="text-2xl font-bold p-6 border-b border-blue-700">

                🦷 Dental Clinic

            </div>

            <nav class="mt-6">

                <a href="{{ route('admin.dashboard') }}"
                    class="block px-6 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="block px-6 py-3 {{ request()->routeIs('admin.users.*') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                    User Management
                </a>

                <a href="{{ route('patients.index') }}"
                    class="block px-6 py-3 {{ request()->routeIs('patients.*') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                    Patients
                </a>

                <a href="#"
                    class="block px-6 py-3 hover:bg-blue-700">
                    Appointments
                </a>

                <a href="#"
                    class="block px-6 py-3 hover:bg-blue-700">
                    Treatments
                </a>

                <a href="#"
                    class="block px-6 py-3 hover:bg-blue-700">
                    Billing
                </a>

                <a href="#"
                    class="block px-6 py-3 hover:bg-blue-700">
                    Reports
                </a>

            </nav>

        </aside>

        <!-- Main -->

        <div class="flex-1">

            <!-- Topbar -->

            <header class="bg-white shadow px-8 py-4 flex justify-between items-center">

                <h1 class="text-2xl font-semibold">

                    @yield('page-title')

                </h1>

                <div class="flex items-center gap-4">

                    <span>

                        {{ auth()->user()->name }}

                    </span>

                    <form action="{{ route('logout') }}" method="POST">

                        @csrf

                        <button
                            class="bg-red-500 text-white px-4 py-2 rounded">

                            Logout

                        </button>

                    </form>

                </div>

            </header>

            <main class="p-8">

                @yield('content')

            </main>

        </div>

    </div>

</body>

</html>