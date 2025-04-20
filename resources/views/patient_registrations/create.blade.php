@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Register New Patient</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patient_registrations.store') }}" method="POST" class="max-w-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="mb-4">
            <label for="birth_date" class="block text-gray-700 font-medium mb-2">Birth Date</label>
            <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="mb-4">
            <label for="gender" class="block text-gray-700 font-medium mb-2">Gender</label>
            <select name="gender" id="gender"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
            <textarea name="address" id="address" rows="3"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('address') }}</textarea>
        </div>
        <div class="mb-4">
            <label for="region_id" class="block text-gray-700 font-medium mb-2">Region</label>
            <select name="region_id" id="region_id"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Select Region</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                        {{ $region->province }} - {{ $region->district }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-medium mb-2">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="mb-4">
            <label for="visit_date" class="block text-gray-700 font-medium mb-2">Visit Date</label>
            <input type="date" name="visit_date" id="visit_date" value="{{ old('visit_date') }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="mb-4">
            <label for="visit_type" class="block text-gray-700 font-medium mb-2">Visit Type</label>
            <input type="text" name="visit_type" id="visit_type" value="{{ old('visit_type') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200">Register</button>
        <a href="{{ route('patient_registrations.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
    </form>
</div>
@endsection
