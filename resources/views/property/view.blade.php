<x-app-layout>
    <div class="container px-6 mx-auto grid">
        <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <span class="uppercase">{{ $property->type }}</span> <small class="text-gray-500">(No.{{$property->number}})</small>
        </h2>

        <div class="flex justify-between items-center mt-6">
            <div class="space-x-4">
                <a class="text-right" href="{{ route('property.index') }}">
                    <button class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        < ALL PROPERTIES</button>
                </a>
                <a class="text-right" href="{{ route('property.edit', $property->id) }}">
                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit Property Details</button>
                </a>
            </div>
        </div>
        <div class="mt-6 w-full">
            <div class="w-1/2 overflow-x-auto">
                <div class="flex flex-col items-center bg-white rounded-lg shadow-xs dark:bg-gray-800 border border-1 overflow-hidden">
                    <div class="mt-3">
                        @if ($property->status === 'vacant')
                        <x-badge.vacant />
                        <a href="{{ url('/rent/create?propid='.$property->id) }}">
                            <x-badge.rentit />
                        </a>
                        @else
                        <x-badge.occupied />
                        @endif
                    </div>
                    <div class="w-full p-4 flex flex-col text-left">
                        <div class="font-semibold dark:text-gray-300 ">Current Tenant:</div>
                        @if (!$currentTenant)
                        <div class="ml-5 text-gray-400">- None -</div>
                        @else
                        <div class="ml-5 flex justify-between">
                            <span class="dark:text-gray-400">{{ optional($currentTenant)->name }}</span>
                            <small class="text-xs text-gray-700 dark:text-gray-400">{{ \Carbon\Carbon::parse($rentStartForCurrentTenant)->format('d/m/Y') }} ~ {{ \Carbon\Carbon::parse($rentEndForCurrentTenant)->format('d/m/Y') }}</small>
                        </div>
                        @endif
                        <ul class="mt-2">
                            <div class="dark:text-gray-300 font-semibold">Previous Tenants:</div>
                            @if($previousTenants->isEmpty())
                            <div class="ml-5 text-gray-400">- None -</div>
                            @else
                                @foreach ($previousTenants as $index => $previousTenant)
                                    <li class="ml-5 flex justify-between">
                                        <span class="dark:text-gray-400">{{ $previousTenant->name }}</span>
                                        <small class="text-xs text-gray-700 dark:text-gray-400">{{ \Carbon\Carbon::parse($rentStartForPreviousTenants[$index])->format('d/m/Y') }} ~ {{ \Carbon\Carbon::parse($rentEndForPreviousTenants[$index])->format('d/m/Y') }}</small>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="mx-auto w-3/4 border-t border-gray-500"></div>
                    <p class="p-4 dark:text-gray-300 ">{{ $property->address }}</p>
                    <div class="mt-2">
                        @foreach($property->images as $image)
                            <img src="{{ asset('/storage/' . $image) }}" alt="multiple image" class="w-20 h-20 border border-blue-600">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>