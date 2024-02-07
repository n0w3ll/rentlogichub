<x-app-layout>
    <div class="container px-6 mx-auto grid">
        <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            New Property
        </h2>
        <p class="text-sm text-gray-500">( House / Parking )</p>

        <form method="POST" action="{{route('properties.store')}}" class="mt-6" enctype="multipart/form-data">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">
                        Property Type
                    </span>
                    <div class="mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="type" value="house" {{ old('type') === 'house' ?  'checked' : '' }}>
                            <span class="ml-2">House</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="type" value="parking" {{ old('type') === 'parking' ?  'checked' : '' }}>
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
                        <option value="{{ $owner->id }}" {{ old('owner_id') === $owner->id ? 'selected' : '' }}>{{ $owner->name }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Address</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="address" value="{{ old('address') }}">
                </label>
                <div class="block md:flex md:space-x-4">
                    <label class="block text-sm mt-4 w-full md:w-1/2">
                        <span class="text-gray-700 dark:text-gray-400 font-medium">Number <span class="text-xs text-gray-500 dark:text-gray-400">(House / Parking No.)</span></span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="number" value="{{ old('number') }}">
                    </label>
                    <label class="block text-sm mt-4 w-full md:w-1/2 ">
                        <span class="text-gray-700 dark:text-gray-400 font-medium">Rent <span class="text-xs text-gray-500 dark:text-gray-400">(RM)</span></span>
                        <input type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="rent" value="{{ old('rent') }}">
                    </label>
                </div>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Features</span>
                    <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" name="features" value="{{ old('features') }}"></textarea>
                </label>
                <div class="mt-2 hidden">
                    <input type="hidden" name="status" value="vacant">
                </div>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Image <small class="text-gray-400"> (max 5 images)</small></span>
                </label>
                <div class="mt-2 upload__box">
                    <div class="upload__btn-box">
                        <label class="upload__btn">
                            <p>Upload Images</p>
                            <input type="file" multiple data-max_length="4" class="upload__inputfile" name="images[]">
                        </label>
                    </div>
                    <div class="upload__img-wrap"></div>
                </div>
                
                <div class="flex justify-center my-6 text-sm ">
                    <x-dark-button class="w-1/2 md:w-1/3">Add New Property</x-dark-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>