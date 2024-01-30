<x-app-layout>
    <div class="container px-6 mx-auto grid">
        <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            New Property
        </h2>
        <p class="text-sm text-gray-500">( House / Parking )</p>

        <form method="POST" action="{{route('property.store')}}" class="mt-6">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">
                        Property Type
                    </span>
                    <div class="mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="type" value="house" checked>
                            <span class="ml-2">House</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="type" value="parking">
                            <span class="ml-2">Parking</span>
                        </label>
                    </div>
                </div>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">
                        Owner
                    </span>
                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="owner_id">
                        <option value="">Please select...</option>
                        @foreach($owners as $owner)
                        <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Address</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="address">
                </label>
                <div class="block md:flex md:space-x-4">
                    <label class="block text-sm mt-4 w-full md:w-1/2">
                        <span class="text-gray-700 dark:text-gray-400 font-medium">Number <span class="text-xs text-gray-500 dark:text-gray-400">(House / Parking No.)</span></span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="number">
                    </label>
                    <label class="block text-sm mt-4 w-full md:w-1/2 ">
                        <span class="text-gray-700 dark:text-gray-400 font-medium">Rent <span class="text-xs text-gray-500 dark:text-gray-400">(RM)</span></span>
                        <input type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="rent">
                    </label>
                </div>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Features</span>
                    <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" name="features"></textarea>
                </label>
                <div class="mt-2 hidden">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">
                        Status
                    </span>
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="vacant" checked disabled>
                        <span class="ml-2">Vacant</span>
                    </label>

                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                        <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="occupied" disabled>
                        <span class="ml-2">Occupied</span>
                    </label>
                </div>
                <div class="mt-4 text-sm">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400 font-medium">Upload Image</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="image" type="file">
                    </label>
                </div>
                <div class="flex justify-center my-6 text-sm ">
                    <x-dark-button class="w-1/2 md:w-1/3">Add New Property</x-dark-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>