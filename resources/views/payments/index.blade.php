@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Payments</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('payments.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        <i class="fas fa-plus mr-2"></i> Add New Payment
    </a>

    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Visit</th>
                <th class="py-2 px-4 border-b">Patient</th>
                <th class="py-2 px-4 border-b">Amount</th>
                <th class="py-2 px-4 border-b">Payment Date</th>
                <th class="py-2 px-4 border-b">Payment Method</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td class="py-2 px-4 border-b">{{ $payment->id }}</td>
                <td class="py-2 px-4 border-b">{{ $payment->visit->id }}</td>
                <td class="py-2 px-4 border-b">{{ $payment->visit->patient->name }}</td>
                <td class="py-2 px-4 border-b">{{ number_format($payment->amount, 2) }}</td>
                <td class="py-2 px-4 border-b">{{ $payment->payment_date }}</td>
                <td class="py-2 px-4 border-b">{{ $payment->payment_method }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('payments.edit', $payment) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                    <form action="{{ route('payments.destroy', $payment) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this payment?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
