<x-app-layout>
    <div class="container px-6 mx-auto grid">
        <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Agent
        </h2>

        <form method="POST" action="{{route('tenant.update', $tenant)}}" class="mt-6">
            @csrf
            @method('patch')
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="block md:flex md:space-x-4">
                <label class="block text-sm mt-4 w-full md:w-1/2">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Full Name</span>
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('name',$tenant->name)}}" name="name">
                </label>
                <label class="block text-sm mt-4 w-full md:w-1/2 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Identity / Passport No.</span>
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('identity_no',$tenant->identity_no)}}" name="identity_no">
                </label>
            </div>
            <div class="block md:flex md:space-x-4">
                <label class="block text-sm mt-4 w-full md:w-1/2 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Phone No.</span>
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('phone',$tenant->phone)}}"name="phone">
                </label>
                <label class="block text-sm mt-4 w-full md:w-1/2 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">E-Mail</span>
                    <input type="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('email',$tenant->email)}}" name="email">
                </label>
            </div>
            <div class="block md:flex md:space-x-4">
                <label class="block text-sm mt-4 w-full md:w-1/2 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Registered At</span>
                    <input type="date" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('registered_at',$tenant->registered_at->toDateString()) }}" name="registered_at">
                </label>
                <div class="mt-4 text-sm w-full md:w-1/2">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">
                        Status
                    </span>
                    <div class="mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="renting" @if ($tenant->status === 'renting') checked @endif>
                            <span class="ml-2">Renting</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="free" @if ($tenant->status === 'free') checked @endif>
                            <span class="ml-2">Free</span>
                        </label>
                    </div>
                </div>
            </div>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Agreement Doc</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="image" type="file">
                </label>
                
                

                <div class="flex justify-center my-6 text-sm ">
                    <x-dark-button class="w-1/2 md:w-1/3">Update Tenant</x-dark-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>