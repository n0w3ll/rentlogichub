<x-app-layout>
    <div class="container px-6 mx-auto grid">
        <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Rent
        </h2>
        <p class="text-sm text-gray-500">( House / Parking )</p>

        <form method="POST" action="{{route('rent.update', $rent)}}" class="mt-6">
            @csrf
            @method('patch')
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">
                        Property
                    </span>
                    <input type="hidden" name="property_id" value="{{ $rent->property_id }}">
                    <h1 class="text-md uppercase font-semibold dark:text-gray-300">{{ $rent->property->type }} <small class="text-xs">(No.{{ $rent->property->number}})</small></h1>
                    
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">
                        Tenant
                    </span>
                    <input type="hidden" name="tenant_id" value="{{ $rent->tenant_id }}">
                    <h1 class="text-md font-semibold dark:text-gray-300">{{ $rent->tenant->name }}</h1>
                    
                </label>
                <div class="block md:flex md:space-x-4">
                    <label class="block text-sm mt-4 w-full md:w-1/2">
                        <span class="text-gray-700 dark:text-gray-400 font-medium">Date Start </span>
                        <input type="date" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('rent_start',$rent->rent_start->toDateString()) }}" name="rent_start">
                    </label>
                    <label class="block text-sm mt-4 w-full md:w-1/2 ">
                        <span class="text-gray-700 dark:text-gray-400 font-medium">Date End </span>
                        <input type="date" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('rent_end',$rent->rent_end->toDateString()) }}" name="rent_end">
                    </label>
                </div>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Deposit (RM)</span>
                    <input type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('deposit',$rent->deposit) }}" name="deposit">
                </label>

                <div class="flex justify-center my-6 text-sm ">
                    <x-dark-button class="w-1/2 md:w-1/3">Update Rent</x-dark-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>