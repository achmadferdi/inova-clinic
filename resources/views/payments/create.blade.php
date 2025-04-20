@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Add New Payment</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('payments.store') }}" method="POST" class="max-w-md">
        @csrf
        <div class="mb-4">
            <label for="visit_id" class="block text-gray-700 font-medium mb-2">Visit</label>
            <select name="visit_id" id="visit_id" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Select Visit</option>
                @foreach($visits as $visit)
                    <option value="{{ $visit->id }}">
                        {{ $visit->id }} - {{ $visit->patient->name }} ({{ $visit->visit_date }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="amount" class="block text-gray-700 font-medium mb-2">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" value="{{ old('amount') }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="mb-4">
            <label for="payment_date" class="block text-gray-700 font-medium mb-2">Payment Date</label>
            <input type="date" name="payment_date" id="payment_date" value="{{ old('payment_date') }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="mb-4">
            <label for="payment_method" class="block text-gray-700 font-medium mb-2">Payment Method</label>
            <input type="text" name="payment_method" id="payment_method" value="{{ old('payment_method') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200">Save</button>
        <a href="{{ route('payments.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
    </form>
</div>
@endsection
