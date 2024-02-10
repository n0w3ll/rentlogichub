<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            {{config('app.name')}}
        </a>

        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @if (Route::is('dashboard'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('dashboard') ? 'text-blue-600 hover:text-blue-700 dark:hover:text-blue-300 dark:text-blue-400' : 'text-gray-800 hover:text-gray-700 dark:hover:text-gray-300 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 " href="{{ route('dashboard')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                    </svg>

                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                @if (Route::is('properties.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('properties.*') ? 'text-blue-600 hover:text-blue-700 dark:hover:text-blue-300 dark:text-blue-400' : 'text-gray-800 hover:text-gray-700 dark:hover:text-gray-300 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('properties.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
                    </svg>
                    <span class="ml-4">Properties</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (Route::is('tenants.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('tenants.*') ? 'text-blue-600 hover:text-blue-700 dark:hover:text-blue-300 dark:text-blue-400' : 'text-gray-800 hover:text-gray-700 dark:hover:text-gray-300 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('tenants.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>

                    <span class="ml-4">Tenants</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (Route::is('owners.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('owners.*') ? 'text-blue-600 hover:text-blue-700 dark:hover:text-blue-300 dark:text-blue-400' : 'text-gray-800 hover:text-gray-700 dark:hover:text-gray-300 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('owners.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>

                    <span class="ml-4">Owners</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (Route::is('agents.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('agents.*') ? 'text-blue-600 hover:text-blue-700 dark:hover:text-blue-300 dark:text-blue-400' : 'text-gray-800 hover:text-gray-700 dark:hover:text-gray-300 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('agents.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                    </svg>

                    <span class="ml-4">Agents</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (Route::is('vendors.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('vendors.*') ? 'text-blue-600 hover:text-blue-700 dark:hover:text-blue-300 dark:text-blue-400' : 'text-gray-800 hover:text-gray-700 dark:hover:text-gray-300 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('vendors.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                    </svg>

                    <span class="ml-4">Vendors</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (Route::is('rents.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('rents.*') ? 'text-blue-600 hover:text-blue-700 dark:hover:text-blue-300 dark:text-blue-400' : 'text-gray-800 hover:text-gray-700 dark:hover:text-gray-300 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('rents.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                    </svg>
                    <span class="ml-4">Rents</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (Route::is('invoices.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('invoices.*') ? 'text-blue-600 hover:text-blue-700 dark:hover:text-blue-300 dark:text-blue-400' : 'text-gray-800 hover:text-gray-700 dark:hover:text-gray-300 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('invoices.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>

                    <span class="ml-4">Invoices</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (Route::is('transactions.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('transactions.*') ? 'text-blue-600 hover:text-blue-700 dark:hover:text-blue-300 dark:text-blue-400' : 'text-gray-800 hover:text-gray-700 dark:hover:text-gray-300 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('transactions.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>
                    <span class="ml-4">Transactions</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- Mobile sidebar -->
<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            {{config('app.name')}}
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @if (Route::is('dashboard'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('dashboard') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-800 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('dashboard') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                @if (Route::is('properties.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('properties.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-800 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('properties.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819"></path>
                    </svg>
                    <span class="ml-4">Properties</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (Route::is('tenants.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('tenants.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-800 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('tenants.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                    </svg>
                    <span class="ml-4">Tenants</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (Route::is('owners.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('owners.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-800 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('owners.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
                    </svg>
                    <span class="ml-4">Owners</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (Route::is('agents.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('agents.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-800 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('agents.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"></path>
                    </svg>
                    <span class="ml-4">Agents</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (Route::is('vendors.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('vendors.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-800 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('vendors.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"></path>
                    </svg>
                    <span class="ml-4">Vendors</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (Route::is('rents.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('rents.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-800 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('rents.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"></path>
                    </svg>
                    <span class="ml-4">Rents</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (Route::is('invoices.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('invoices.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-800 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('invoices.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                    </svg>
                    <span class="ml-4">Invoices</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (Route::is('transactions.*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="{{ Route::is('transactions.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-800 dark:text-gray-400' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150" href="{{ route('transactions.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"></path>
                    </svg>
                    <span class="ml-4">Transactions</span>
                </a>
            </li>
        </ul>
    </div>
</aside>