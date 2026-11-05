@extends('products.layout')

@section('content')

<div class="max-w-5xl mx-auto py-10 px-4">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Edit Customer
        </h1>

        <p class="text-gray-500 mt-2">
            Update customer information
        </p>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-xl p-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Customer Form -->
    <div class="glass-panel rounded-2xl p-6 md:p-8">

        <form action="{{ route('customers.update', $customer) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Customer Name -->
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Customer Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $customer->name) }}"
                        class="input-premium w-full"
                        placeholder="Enter customer name"
                        required
                    >

                    @error('name')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Phone Number
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone', $customer->phone) }}"
                        class="input-premium w-full"
                        placeholder="Enter phone number"
                        required
                    >

                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $customer->email) }}"
                        class="input-premium w-full"
                        placeholder="Enter email address"
                    >

                    @error('email')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="input-premium w-full"
                        required
                    >
                        <option value="Active"
                            {{ old('status', $customer->status) == 'Active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="Inactive"
                            {{ old('status', $customer->status) == 'Inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>

                    @error('status')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Customer Type -->
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Customer Type
                    </label>

                    <select
                        name="customer_type"
                        class="input-premium w-full"
                        required
                    >
                        <option value="Permanent Customer"
                            {{ old('customer_type', $customer->customer_type) == 'Permanent Customer' ? 'selected' : '' }}>
                            Permanent Customer
                        </option>

                        <option value="Temporary Customer"
                            {{ old('customer_type', $customer->customer_type) == 'Temporary Customer' ? 'selected' : '' }}>
                            Temporary Customer
                        </option>
                    </select>

                    @error('customer_type')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- City -->
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        City
                    </label>

                    <input
                        type="text"
                        name="city"
                        value="{{ old('city', $customer->city) }}"
                        class="input-premium w-full"
                        placeholder="Enter city"
                    >

                    @error('city')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- State -->
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        State
                    </label>

                    <input
                        type="text"
                        name="state"
                        value="{{ old('state', $customer->state) }}"
                        class="input-premium w-full"
                        placeholder="Enter state"
                    >

                    @error('state')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Pincode -->
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Pincode
                    </label>

                    <input
                        type="text"
                        name="pincode"
                        value="{{ old('pincode', $customer->pincode) }}"
                        class="input-premium w-full"
                        placeholder="Enter pincode"
                    >

                    @error('pincode')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold mb-2">
                        Address
                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        class="input-premium w-full"
                        placeholder="Enter customer address"
                    >{{ old('address', $customer->address) }}</textarea>

                    @error('address')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </div>

            <!-- Buttons -->
            <div class="flex flex-wrap gap-4 mt-8">

                <button
                    type="submit"
                    class="btn-premium px-6 py-3"
                >
                    Update Customer
                </button>

                <a
                    href="{{ route('customers.index') }}"
                    class="btn-outline px-6 py-3"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection