<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Register -->
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="{{ asset('assets/img/create-account-office.jpeg') }}"
              alt="Office"
            />
            <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              src="{{ asset('assets/img/create-account-office-dark.jpeg') }}"
              alt="Office"
            />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1
                class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
              >
                Create account
              </h1>
              <label for="name" class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input id="name"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
              </label>
              <label for="username" class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Username</span>
                <input id="username"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  type="text" name="username" :value="old('username')" required autofocus autocomplete="username"
                />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
              </label>
              <label for="email" class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input id="email" 
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  type="email" name="email" :value="old('email')" required autocomplete="username"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </label>
              <label for="password" class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input id="password" 
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="password" 
                  type="password" required autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </label>
              <label for="password_confirmation" class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Confirm password
                </span>
                <input id="password_confirmation"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   type="password" name="password_confirmation" required autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
              </label>

              <!-- You should use a button here, as the anchor is only used for the example  -->
              <button type="submit" 
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
              >
                Create account
            </button>

              <hr class="my-8" />

              <p class="mt-4">
                <a
                  class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                  href="{{ route('login')}}"
                >
                  Already have an account? Login
                </a>
              </p>
            </div>
          </div>
        </div>
    </form>
</x-guest-layout>
