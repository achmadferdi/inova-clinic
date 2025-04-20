@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Visit Details</h1>

    <div class="mb-6 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Visit Information</h2>
        <p><strong>Patient:</strong> {{ $visit->patient->name }}</p>
        <p><strong>Visit Date:</strong> {{ $visit->visit_date }}</p>
        <p><strong>Visit Type:</strong> {{ $visit->visit_type }}</p>
    </div>

    <div class="mb-6 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Medical Actions</h2>
        <form action="{{ route('visits.addAction', $visit) }}" method="POST" class="mb-4 max-w-md">
            @csrf
            <div class="flex space-x-4">
                <select name="medical_action_id" required
                    class="flex-grow px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Medical Action</option>
                    @foreach($medicalActions as $action)
                        <option value="{{ $action->id }}">{{ $action->name }} - {{ number_format($action->price, 2) }}</option>
                    @endforeach
                </select>
                <input type="number" name="price" step="0.01" placeholder="Price" required
                    class="w-24 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200">Add</button>
            </div>
        </form>
        @if($visit->actions->isEmpty())
            <p>No medical actions added for this visit.</p>
        @else
            <table class="min-w-full bg-white rounded shadow">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Action</th>
                        <th class="py-2 px-4 border-b">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visit->actions as $visitAction)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $visitAction->medicalAction->name }}</td>
                        <td class="py-2 px-4 border-b">{{ number_format($visitAction->price, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="mb-6 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Medicines</h2>
        <form action="{{ route('visits.addMedicine', $visit) }}" method="POST" class="mb-4 max-w-md">
            @csrf
            <div class="flex space-x-4">
                <select name="medicine_id" required
                    class="flex-grow px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Medicine</option>
                    @foreach($medicines as $medicine)
                        <option value="{{ $medicine->id }}">{{ $medicine->name }} ({{ $medicine->unit }}) - {{ number_format($medicine->price, 2) }}</option>
                    @endforeach
                </select>
                <input type="number" name="quantity" placeholder="Quantity" min="1" required
                    class="w-24 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <input type="number" name="price" step="0.01" placeholder="Price" required
                    class="w-24 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200">Add</button>
            </div>
        </form>
        @if($visit->medicines->isEmpty())
            <p>No medicines added for this visit.</p>
        @else
            <table class="min-w-full bg-white rounded shadow">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Medicine</th>
                        <th class="py-2 px-4 border-b">Quantity</th>
                        <th class="py-2 px-4 border-b">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visit->medicines as $visitMedicine)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $visitMedicine->medicine->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $visitMedicine->quantity }}</td>
                        <td class="py-2 px-4 border-b">{{ number_format($visitMedicine->price, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <a href="{{ route('visits.index') }}" class="text-gray-600 hover:underline">Back to Visits</a>
</div>
@endsection
