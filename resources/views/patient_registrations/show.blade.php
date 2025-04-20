@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Patient Details</h1>

    <div class="mb-6 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Patient Information</h2>
        <p><strong>Name:</strong> {{ $patient->name }}</p>
        <p><strong>Birth Date:</strong> {{ $patient->birth_date }}</p>
        <p><strong>Gender:</strong> {{ ucfirst($patient->gender) }}</p>
        <p><strong>Address:</strong> {{ $patient->address }}</p>
        <p><strong>Region:</strong> {{ $patient->region ? $patient->region->province . ' - ' . $patient->region->district : '-' }}</p>
        <p><strong>Phone:</strong> {{ $patient->phone }}</p>
        <p><strong>Email:</strong> {{ $patient->email }}</p>
    </div>

    <div class="mb-6 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Visits</h2>
        @if($patient->visits->isEmpty())
            <p>No visits found for this patient.</p>
        @else
            <table class="min-w-full bg-white rounded shadow">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Visit Date</th>
                        <th class="py-2 px-4 border-b">Visit Type</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patient->visits as $visit)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $visit->visit_date }}</td>
                        <td class="py-2 px-4 border-b">{{ $visit->visit_type }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('visits.show', $visit) }}" class="text-blue-600 hover:underline">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <a href="{{ route('patient_registrations.index') }}" class="text-gray-600 hover:underline">Back to Patient Registrations</a>
</div>
@endsection
