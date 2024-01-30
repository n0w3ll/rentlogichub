<x-app-layout>
  <div class="container px-6 mx-auto grid">
    <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Rent
    </h2>
    <p class="text-sm text-gray-500">( House / Parking )</p>

    <div class="flex justify-between items-center mt-6">
      <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
        <div class="absolute inset-y-0 flex items-center pl-2">
          <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Search for rent details" aria-label="Search">
      </div>
      <div class="space-x-4">
        <a class="text-right" href="{{ route('rent.create') }}">
          <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">+ New Rent</button>
        </a>
      </div>
    </div>
    <div class="mt-6 w-full overflow-hidden rounded-lg shadow-md">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Property</th>
              <th class="px-4 py-3">Tenant</th>
              <th class="px-4 py-3">Start Rent</th>
              <th class="px-4 py-3">End Rent</th>
              <th class="px-4 py-3">Deposit</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($rents as $rent)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">

                  <div>
                    <p class="font-semibold uppercase">{{ $rent->property->type }} <small class="text-xxs text-gray-500">(No. {{ $rent->property->number }})</small></p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold">{{ $rent->tenant->name }}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $rent->rent_start->format('d-m-Y') }}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $rent->rent_end->format('d-m-Y') }}
              </td>
              <td class="px-4 py-3 text-sm">
                RM {{ $rent->deposit }}
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <a href="{{ route('rent.edit', $rent->id) }}" class="text-lg btn-info btn-flat text-blue-500 rounded-lg dark:text-gray-400 fa-solid fa-pencil" aria-label="Edit"></a>
                  <a href="{{ route('rent.destroy', $rent->id) }}" class="text-lg btn-danger btn-flat text-red-400 dark:text-gray-400 fa-solid fa-trash-can" data-confirm-delete="true"></a>
                </div>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      <!-- Pagination Start -->
      <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        {{ $rents->links() }}
      </div>
    </div>
  </div>

</x-app-layout>