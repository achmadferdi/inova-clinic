@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Employees</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('employees.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        <i class="fas fa-plus mr-2"></i> Add New Employee
    </a>

    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Position</th>
                <th class="py-2 px-4 border-b">Phone</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td class="py-2 px-4 border-b">{{ $employee->id }}</td>
                <td class="py-2 px-4 border-b">{{ $employee->name }}</td>
                <td class="py-2 px-4 border-b">{{ $employee->position }}</td>
                <td class="py-2 px-4 border-b">{{ $employee->phone }}</td>
                <td class="py-2 px-4 border-b">{{ $employee->email }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('employees.edit', $employee) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this employee?');">
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
