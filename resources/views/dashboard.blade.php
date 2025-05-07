<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Clinic Inova Medika</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-600 text-white p-4 flex justify-between items-center">
        <div class="text-lg font-semibold">Clinic Inova Medika</div>
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:underline"><i class="fas fa-sign-out-alt mr-1"></i> Logout</button>
            </form>
        </div>
    </nav>
    <main class="p-6">
        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('regions.index') }}" class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                <i class="fas fa-map-marker-alt text-blue-600 text-3xl mb-2"></i>
                <h2 class="text-xl font-semibold">Regions</h2>
                <p class="text-gray-600">Manage provinces and districts</p>
            </a>
            <a href="{{ route('users.index') }}" class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                <i class="fas fa-users-cog text-blue-600 text-3xl mb-2"></i>
                <h2 class="text-xl font-semibold">Users</h2>
                <p class="text-gray-600">Manage system users and roles</p>
            </a>
            <a href="{{ route('employees.index') }}" class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                <i class="fas fa-user-tie text-blue-600 text-3xl mb-2"></i>
                <h2 class="text-xl font-semibold">Employees</h2>
                <p class="text-gray-600">Manage clinic employees</p>
            </a>
            <a href="{{ route('medical_actions.index') }}" class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                <i class="fas fa-stethoscope text-blue-600 text-3xl mb-2"></i>
                <h2 class="text-xl font-semibold">Medical Actions</h2>
                <p class="text-gray-600">Manage medical procedures and actions</p>
            </a>
            <a href="{{ route('medicines.index') }}" class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                <i class="fas fa-pills text-blue-600 text-3xl mb-2"></i>
                <h2 class="text-xl font-semibold">Medicines</h2>
                <p class="text-gray-600">Manage medicines and prescriptions</p>
            </a>
            <a href="{{ route('patient_registrations.index') }}" class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                <i class="fas fa-user-plus text-blue-600 text-3xl mb-2"></i>
                <h2 class="text-xl font-semibold">Patient Registrations</h2>
                <p class="text-gray-600">Register new patients and visits</p>
            </a>
            <a href="{{ route('visits.index') }}" class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                <i class="fas fa-notes-medical text-blue-600 text-3xl mb-2"></i>
                <h2 class="text-xl font-semibold">Visits</h2>
                <p class="text-gray-600">Manage patient visits and treatments</p>
            </a>
            <a href="{{ route('payments.index') }}" class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                <i class="fas fa-cash-register text-blue-600 text-3xl mb-2"></i>
                <h2 class="text-xl font-semibold">Payments</h2>
                <p class="text-gray-600">Manage payments and billing</p>
            </a>
        </div>
    </main>
</body>
</html>
