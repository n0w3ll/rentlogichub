<x-app-layout>
    <div class="container px-6 mx-auto grid">
        <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            New Property
        </h2>
        <p class="text-sm text-gray-500">( House / Parking )</p>

        <form method="POST" action="{{ route('property.update', $property) }}" class="mt-6">
            @csrf
            @method('patch')
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">
                        Property Type
                    </span>
                    <div class="mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="type" value="house" @if ($property->type === 'house') checked @endif>
                            <span class="ml-2">House</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="type" value="parking" @if ($property->type === 'parking') checked @endif>
                            <span class="ml-2">Parking</span>
                        </label>
                    </div>
                </div>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">
                        Owner
                    </span>
                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="owner">
                        <option value="1">Owner 1</option>
                        <option value="2">Owner 2</option>
                        <option value="3">Owner 3</option>
                    </select>
                </label>
                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Address</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="address" value="{{ old('address', $property->address) }}">
                </label>
                <div class="block md:flex md:space-x-4">
                    <label class="block text-sm mt-4 w-full md:w-1/2">
                        <span class="text-gray-700 dark:text-gray-400 font-medium">Number <span class="text-xs text-gray-500 dark:text-gray-400">(House / Parking No.)</span></span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="number"  value="{{ old('number', $property->number) }}">
                    </label>
                    <label class="block text-sm mt-4 w-full md:w-1/2 ">
                        <span class="text-gray-700 dark:text-gray-400 font-medium">Rent <span class="text-xs text-gray-500 dark:text-gray-400">(RM)</span></span>
                        <input type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="rent"  value="{{ old('rent', $property->rent) }}">
                    </label>
                </div>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Features</span>
                    <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" name="features">{{ old('features', $property->features) }}</textarea>
                </label>

                <div class="mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">
                        Status
                    </span>
                    <div class="mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="vacant" @if ($property->status === 'vacant') checked @endif>
                            <span class="ml-2">Vacant</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="occupied" @if ($property->status === 'occupied') checked @endif>
                            <span class="ml-2">Occupied</span>
                        </label>
                    </div>
                </div>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Upload Image</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="image" type="file">
                </label>
                <div class="flex justify-center my-6 text-sm ">
                    <x-dark-button class="w-1/2 md:w-1/3">Edit Property</x-dark-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>