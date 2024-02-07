<x-app-layout>
    <div class="container px-6 mx-auto grid">
        <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ $owner->name }}'s {{$owner->properties->count() > 1 ? 'Properties' : 'Property'}}
        </h2>

        <div class="flex justify-between items-center my-6">
            <div class="space-x-4">
                <a class="text-right" href="{{ route('owners.index') }}">
                    <button class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        < ALL OWNERS</button>
                </a>
                <a class="text-right" href="{{ route('owners.edit', $owner->id) }}">
                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit {{ $owner->name }}'s Details</button>
                </a>
            </div>
        </div>
        <div class="mt-6 w-full">
            <div class="w-full overflow-x-auto">
                @if ($owner->properties->count() > 0)
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($owner->properties as $property)
                    <a href="{{ route('properties.show', $property->id)}}">
                        <div class="flex flex-col items-center bg-white rounded-lg shadow-xs dark:bg-gray-800 border border-1 overflow-hidden">
                            <span class="font-bold uppercase w-full bg-sky-200 text-sky-700 text-center">{{ $property->type }}<small class="text-sky-600 dark:text-sky-500"> (No.{{ $property->number }})</small></span>
                            <p class="p-4 dark:text-gray-300">{{ $property->address }}</p>
                        </div>
                    </a>
                    @endforeach
                    @else
                    <h3 class="dark:text-gray-300">No properties available</h3>
                    @endif
                </div>
            </div>
        </div>
</x-app-layout>