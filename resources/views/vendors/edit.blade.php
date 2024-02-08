<x-app-layout>
    <div class="container px-6 mx-auto grid">
        <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Vendor
        </h2>

        <form method="POST" action="{{route('vendors.update', $vendor->id)}}" class="mt-6" enctype="multipart/form-data">
            @csrf
            @method("patch")
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="block md:flex md:space-x-4">
                    <label class="block text-sm mt-4 w-full md:w-1/2">
                        <span class="text-gray-700 dark:text-gray-400 font-medium">Name</span>
                        <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('name', $vendor->name) }}" name="name">
                    </label>
                    <label class="block text-sm mt-4 w-full md:w-1/2 ">
                        <span class="text-gray-700 dark:text-gray-400 font-medium">Phone</span>
                        <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('phone', $vendor->phone) }}" name="phone">
                    </label>
                </div>

                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Address</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="address" value="{{ old('address', $vendor->address) }}">
                </label>
                

                <div class="flex justify-center my-6 text-sm ">
                    <x-dark-button class="w-1/2 md:w-1/3">Add New Vendor</x-dark-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>