<x-app-layout>
    <div class="container px-6 mx-auto grid">
        <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            New Tenant
        </h2>

        <form method="POST" action="{{route('tenants.store')}}" class="mt-6">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="block md:flex md:space-x-4">
                <label class="block text-sm mt-4 w-full md:w-1/2">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Full Name</span>
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="name">
                </label>
                <label class="block text-sm mt-4 w-full md:w-1/2 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Identity / Passport No.</span>
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="identity_no">
                </label>
            </div>
            <div class="block md:flex md:space-x-4">
                <label class="block text-sm mt-4 w-full md:w-1/2 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Phone No.</span>
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="phone">
                </label>
                <label class="block text-sm mt-4 w-full md:w-1/2 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">E-Mail</span>
                    <input type="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="email">
                </label>
            </div>
            <div class="block md:flex md:space-x-4">
                <label class="block text-sm mt-4 w-full md:w-1/2 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Registered At</span>
                    <input type="date" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="registered_at">
                </label>
                <label class="block mt-4 text-sm w-full md:w-1/2 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Agreement Doc</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="image" type="file">
                </label>
            </div>
            <input type="hidden" name="status" value="free">
                
                

                <div class="flex justify-center my-6 text-sm ">
                    <x-dark-button class="w-1/2 md:w-1/3">Add New Tenant</x-dark-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>