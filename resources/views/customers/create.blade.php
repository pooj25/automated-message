@extends('products.layout')

@section('content')

<div class="flex flex-col md:flex-row justify-between items-center mb-10">

    <div>
        <h2 class="text-4xl font-extrabold text-slate-900 mb-2">
            Add <span class="text-gradient">Customer</span>
        </h2>

        <p class="text-slate-500 text-lg">
            Enter customer details and save the information.
        </p>
    </div>

    <div class="mt-6 md:mt-0">
        <a
            href="{{ route('customers.index') }}"
            class="px-6 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold transition"
        >
            Back to Customers
        </a>
    </div>

</div>


<div class="glass-panel p-8 rounded-2xl">

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-6 p-5 rounded-xl bg-red-50 border border-red-200 text-red-700">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('customers.store') }}" method="POST">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Customer Name --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Customer Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required
                >
            </div>


            {{-- Phone Number --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Phone Number
                </label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone') }}"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required
                >
            </div>


            {{-- Email --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
            </div>


            {{-- Status --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required
                >
                    <option value="">Select Status</option>

                    <option
                        value="Active"
                        {{ old('status') == 'Active' ? 'selected' : '' }}
                    >
                        Active
                    </option>

                    <option
                        value="Inactive"
                        {{ old('status') == 'Inactive' ? 'selected' : '' }}
                    >
                        Inactive
                    </option>
                </select>

                @error('status')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            {{-- Customer Type --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Customer Type
                </label>

                <select
                    name="customer_type"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required
                >
                    <option value="">Select Customer Type</option>

                    <option
                        value="Permanent Customer"
                        {{ old('customer_type') == 'Permanent Customer' ? 'selected' : '' }}
                    >
                        Permanent Customer
                    </option>

                    <option
                        value="Temporary Customer"
                        {{ old('customer_type') == 'Temporary Customer' ? 'selected' : '' }}
                    >
                        Temporary Customer
                    </option>
                </select>

                @error('customer_type')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            {{-- City --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    City
                </label>

                <input
                    type="text"
                    name="city"
                    value="{{ old('city') }}"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
            </div>


            {{-- State --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    State
                </label>

                <input
                    type="text"
                    name="state"
                    value="{{ old('state') }}"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
            </div>


            {{-- Pincode --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Pincode
                </label>

                <input
                    type="text"
                    name="pincode"
                    value="{{ old('pincode') }}"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
            </div>


            {{-- Address --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Address
                </label>

                <textarea
                    name="address"
                    rows="4"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >{{ old('address') }}</textarea>
            </div>

        </div>


        {{-- Buttons --}}
        <div class="mt-8 flex items-center gap-4">

            <button
                type="submit"
                class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold transition"
            >
                Save Customer
            </button>

            <a
                href="{{ route('customers.index') }}"
                class="px-6 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold transition"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection