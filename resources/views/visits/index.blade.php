@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Visits</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Patient</th>
                <th class="py-2 px-4 border-b">Visit Date</th>
                <th class="py-2 px-4 border-b">Visit Type</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visits as $visit)
            <tr>
                <td class="py-2 px-4 border-b">{{ $visit->id }}</td>
                <td class="py-2 px-4 border-b">{{ $visit->patient->name }}</td>
                <td class="py-2 px-4 border-b">{{ $visit->visit_date }}</td>
                <td class="py-2 px-4 border-b">{{ $visit->visit_type }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('visits.show', $visit) }}" class="text-blue-600 hover:underline">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
