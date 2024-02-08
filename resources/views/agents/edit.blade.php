<x-app-layout>
    <div class="container px-6 mx-auto grid">
        <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            New Agent
        </h2>

        <form method="POST" action="{{route('agents.update', $agent->id)}}" class="mt-6">
            @csrf
            @method("patch")
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">
                        Company Name
                    </span>
                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="vendor_id">
                        <option value="">Please select...</option>
                        @foreach($vendors as $vendor)
                        <option value="{{ $vendor->id }}" {{ $agent->vendor_id  === $vendor->id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                </label>

                <label class="block text-sm mt-4 ">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Full Name</span>
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('name', $agent->name )}}" name="name">
                </label>


                <div class="block md:flex md:space-x-4">
                    <label class="block text-sm mt-4 w-full md:w-1/2 ">
                        <span class="text-gray-700 dark:text-gray-400 font-medium">Phone No.</span>
                        <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('phone', $agent->phone )}}" name="phone">
                    </label>
                    <label class="block text-sm mt-4 w-full md:w-1/2 ">
                        <span class="text-gray-700 dark:text-gray-400 font-medium">E-Mail</span>
                        <input type="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ old('email', $agent->email )}}" name="email">
                    </label>
                </div>
                <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400 font-medium">
                  Status
                </span>
                <div class="mt-2">
                  <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input type="radio" {{ old('active', $agent->status) == 'actv' ? 'checked' : '' }} class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="actv">
                    <span class="ml-2">Active</span>
                  </label>
                  <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                    <input type="radio" {{ old('active', $agent->status) == 'inatv' ? 'checked' : '' }} class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="inatv">
                    <span class="ml-2">Inactive</span>
                  </label>
                </div>
                
                <div class="flex justify-center my-6 text-sm ">
                    <x-dark-button class="w-1/2 md:w-1/3">Update Agent</x-dark-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>