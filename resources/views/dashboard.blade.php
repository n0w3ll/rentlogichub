<x-app-layout>
    
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 border border-1">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Properties : <span class="text-lg font-bold">{{ (intval($prop_vacant) + intval($prop_occupied)) > 0 ? ($prop_vacant + $prop_occupied) : 0 }}</span>
                    </p>
                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">

                    @if ($prop_vacant > 0)
                    <a href="{{ url('properties?q=vacant')}}">
                    @endif
                    <span class="mr-2 px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        Vacant : <span class="text-bold">{{ ($prop_vacant) > 0 ? ($prop_vacant) : 0 }}</span>
                    </span>
                    @if ($prop_vacant > 0)
                    </a>
                    @endif

                    @if ($prop_occupied > 0)
                    <a href="{{ url('properties?q=occupied')}}">
                    @endif
                    <span class="mr-2 px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                        Occupied : <span class="text-bold">{{ ($prop_occupied) > 0 ? ($prop_occupied) : 0 }}</span>
                    </span>
                    @if ($prop_occupied > 0)
                    </a>
                    @endif

                    @if ($prop_pending > 0)
                    <a href="{{ url('properties?q=pending')}}">
                    @endif
                    <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-700">
                        Pending : <span class="text-bold">{{ ($prop_pending) > 0 ? ($prop_pending) : 0 }}</span>
                    </span>
                    @if ($prop_pending > 0)
                    </a>
                    @endif
                    
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 border border-1">
                <div class="p-3 mr-4 text-sky-500 bg-sky-100 rounded-full dark:text-sky-100 dark:bg-sky-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                    </svg>
                </div>
                <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Tenants : <span class="text-lg font-bold">{{ (intval($tenant_free) + intval($tenant_renting) + intval($tenant_pending)) > 0 ? ($tenant_free + $tenant_renting + $tenant_pending) : 0 }}</span>
                    </p>
                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">

                    @if ($tenant_free > 0)
                    <a href="{{ url('tenants?q=free')}}">
                    @endif
                    <span class="mr-2 px-2 py-1 font-semibold leading-tight text-sky-700 bg-sky-100 rounded-full dark:bg-sky-700 dark:text-sky-100">
                        Free : <span class="text-bold">{{ ($tenant_free) > 0 ? ($tenant_free) : 0 }}</span>
                    </span>
                    @if ($tenant_free > 0)
                    </a>
                    @endif

                    @if ($tenant_renting > 0)
                    <a href="{{ url('tenants?q=renting')}}">
                    @endif
                    <span class="mr-2 px-2 py-1 font-semibold leading-tight text-teal-700 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-700">
                        Renting : <span class="text-bold">{{ ($tenant_renting) > 0 ? ($tenant_renting) : 0 }}</span>
                    </span>
                    @if ($tenant_renting > 0)
                    </a>
                    @endif

                    @if ($tenant_pending > 0)
                    <a href="{{ url('tenants?q=pending')}}">
                    @endif
                    <span class="px-2 py-1 font-semibold leading-tight text-amber-700 bg-amber-100 rounded-full dark:text-amber-100 dark:bg-amber-700">
                        Pending : <span class="text-bold">{{ ($tenant_pending) > 0 ? ($tenant_pending) : 0 }}</span>
                    </span>
                    @if ($tenant_pending > 0)
                    </a>
                    @endif
                    
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 border border-1">
                <div class="p-3 mr-4 text-fuchsia-500 bg-fuchsia-100 rounded-full dark:text-fuchsia-100 dark:bg-fuchsia-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Agents
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        0
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 border border-1">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Overdue Invoices
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        0
                    </p>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>