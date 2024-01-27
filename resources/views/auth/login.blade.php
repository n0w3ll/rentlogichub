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
              <div class="flex items-center text-gray-200 dark:text-gray-600 my-3">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
              </svg>
              <h1 class="text-3xl  flex">
                @php
                  $appName = config('app.name');
                  $words = explode(' ', $appName);
                  
                  $styles = ['font-bold', 'font-thin', 'font-semibold']; // Add more styles as needed

                  foreach ($words as $index => $word) {
                      $currentStyle = $styles[$index % count($styles)];
                      echo '<span class="' . $currentStyle . ' uppercase">' . $word . '</span> ';
                  }
                @endphp
                <!-- <span class="font-bold">RENT</span>
                <span class="font-thin">LOGIC</span>
                <span class="font-semibold">HUB</span> -->

              </h1>
              </div>

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
