<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Login -->
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="{{ asset('assets/img/login-office.jpeg')}}"
              alt="Office"
            />
            <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              src="{{ asset('assets/img/login-office-dark.jpeg')}}"
              alt="Office"
            />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1
                class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
              >
                Login
              </h1>
              <label for="username" class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">{{__('Username')}}</span>
                <input id="username" 
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="username" value="{{old('username')}}" required autofocus autocomplete="username"
                />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
              </label>
              <label for="password"  class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">{{__('Password')}}</span>
                <input id="password"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  type="password" name="password" required autocomplete="current-password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </label>

              <!-- You should use a button here, as the anchor is only used for the example  -->
              <x-dark-button>{{__('Log in')}}</x-dark-button>

              <hr class="my-8" />

              @if (Route::has('password.request'))
              <p class="mt-4">
                <a
                  class="text-sm font-medium text-indigo-800 dark:text-gray-400 hover:font-bold"
                  href="{{ route('password.request') }}"
                >
                  Forgot your password?
                </a>
              </p>
              @endif

              <p class="mt-1">
                <a
                  class="text-sm font-medium text-indigo-800 dark:text-gray-400 hover:font-bold"
                  href="{{ route('register')}}"
                >
                  Create account
                </a>
              </p>
            </div>
          </div>
        </div>
    </form>
</x-guest-layout>
