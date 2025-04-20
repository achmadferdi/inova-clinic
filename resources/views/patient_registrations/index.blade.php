@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Patient Registrations</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('patient_registrations.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        <i class="fas fa-plus mr-2"></i> Register New Patient
    </a>

    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Birth Date</th>
                <th class="py-2 px-4 border-b">Gender</th>
                <th class="py-2 px-4 border-b">Phone</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td class="py-2 px-4 border-b">{{ $patient->id }}</td>
                <td class="py-2 px-4 border-b">{{ $patient->name }}</td>
                <td class="py-2 px-4 border-b">{{ $patient->birth_date }}</td>
                <td class="py-2 px-4 border-b capitalize">{{ $patient->gender }}</td>
                <td class="py-2 px-4 border-b">{{ $patient->phone }}</td>
                <td class="py-2 px-4 border-b">{{ $patient->email }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('patient_registrations.show', $patient) }}" class="text-blue-600 hover:underline mr-2">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
