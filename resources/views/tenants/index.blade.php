<x-app-layout>
  <div class="container px-6 mx-auto grid">
    <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Tenants
    </h2>

    <div class="flex justify-between items-center mt-6">
      <div class="relative w-full max-w-xl mr-6 focus-within:text-blue-500">
        <div class="absolute inset-y-0 flex items-center pl-2">
          <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <form action="{{ route('tenants.index') }}" method="GET">
          <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-blue-300 focus:outline-none focus:shadow-outline-blue form-input" type="text" name="q" value="{{ $searched }}" placeholder="Search for tenant" aria-label="Search">
        </form>
      </div>
      <div class="space-x-4">

        @unless ($searched == "")
        <a class="text-right" href="{{ route('tenants.index') }}">
          <button class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            < ALL TENANTS</button>
        </a>
        @endunless

        <a class="text-right" href="{{ route('tenants.create') }}">
          <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">+ New Tenant</button>
        </a>
      </div>
    </div>
    <div class="mt-4 ml-3 flex text-sm text-gray-400 gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
        </svg> 
        <span class="ml-3">Currently Renting</span>
    </div>
    <div class="mt-6 w-full overflow-hidden rounded-lg shadow-md">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Full Name</th>
              <th class="px-4 py-3">Identity/Passport No.</th>
              <th class="px-4 py-3">Phone</th>
              <th class="px-4 py-3">Email</th>
              <th class="px-4 py-3">Reg Date</th>
              <th class="px-4 py-3">Action</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($tenants as $tenant)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  
                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    @if ($tenant->status == 'renting')
                      <!-- <a href="{{-- url('/rents?q='.$tenant->name) --}}"> -->
                      <a href="{{ route('rents.index', ['q' => $tenant->name]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                        </svg>
                      </a>
                    @endif
                  </div>
                  <div>
                    <p class="font-bold text-gray-600 dark:text-gray-400">
                      
                      <a href="">
                        {{ $tenant->name }}
                      </a>
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $tenant->identity_no }}
              </td>
              <td class="px-4 py-3 text-xs">
                {{ $tenant->phone}}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $tenant->email}}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $tenant->updated_at->format('d-M-Y') }}
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <a href="{{ route('tenants.edit', $tenant->id) }}" class="text-lg btn-info btn-flat text-blue-500 rounded-lg dark:text-gray-400 fa-solid fa-pencil" aria-label="Edit"></a>
                  <a href="{{ route('tenants.destroy', $tenant->id) }}" class="text-lg btn-danger btn-flat text-red-400 dark:text-gray-400 fa-solid fa-trash-can" data-confirm-delete="true"></a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- Pagination Start -->
      <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        {{ $tenants->links() }}
      </div>
    </div>
  </div>
</x-app-layout>