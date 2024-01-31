<x-app-layout>
    <div class="container px-6 mx-auto grid">
        <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Owner
        </h2>

        <form method="POST" action="{{ route('owner.update', $owner) }}" class="mt-6">
            @csrf
            @method('patch')
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="block md:flex md:space-x-4">
                <label class="block text-sm mt-4 w-full md:w-1/2">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Full Name</span>
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('name', $owner->name) }}" name="name">
                </label>
                <label class="block text-sm mt-4 w-full md:w-1/2 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Identity / Passport No.</span>
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('identity_no', $owner->identity_no) }}" name="identity_no">
                </label>
            </div>
            <div class="block md:flex md:space-x-4">
                <label class="block text-sm mt-4 w-full md:w-1/2 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Phone No.</span>
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('phone', $owner->phone) }}" name="phone">
                </label>
                <label class="block text-sm mt-4 w-full md:w-1/2 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">E-Mail</span>
                    <input type="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('email', $owner->email) }}" name="email">
                </label>
            </div>
            <div class="block md:flex md:space-x-4">
                <label class="block text-sm mt-4 w-full md:w-1/2 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Registered At</span>
                    <input type="date" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('registered_at', $owner->registered_at->toDateString()) }}" name="registered_at">
                </label>
                <label class="block text-sm mt-4 w-full md:w-1/2 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Status</span>
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('status', $owner->status) }}" name="status">
                </label>
            </div>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Agreement Doc</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="image" type="file">
                </label>
                
                

                <div class="flex justify-center my-6 text-sm ">
                    <x-dark-button class="w-1/2 md:w-1/3">Update Owner</x-dark-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>