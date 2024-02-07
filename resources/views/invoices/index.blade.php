<x-app-layout>
  <div class="container px-6 mx-auto grid">
    <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Invoice
    </h2>

    <div class="flex justify-between items-center mt-6">
      <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
        <div class="absolute inset-y-0 flex items-center pl-2">
          <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <form action="{{ route('invoices.index') }}" method="GET">
          <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Search for invoice details" value="{{ $searched }}" name="q" aria-label="Search">
        </form>
      </div>
      <div class="space-x-4">
        @unless ($searched == "")
        <a class="text-right" href="{{ route('invoices.index') }}">
          <button class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            < ALL INVOICES</button>
        </a>
        @endunless

      </div>
    </div>
    @if ($invoices->count() > 0)
    <div class="mt-6 w-full overflow-hidden rounded-lg shadow-md">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Invoice No</th>
              <th class="px-4 py-3">Property</th>
              <th class="px-4 py-3">Tenant</th>
              <th class="px-4 py-3">Amount</th>
              <th class="px-4 py-3">Fully Paid</th>
              <th class="px-4 py-3">Created At</th>
              <th class="px-4 py-3 text-center">Payment</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($invoices as $invoice)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold">{{ $invoice->number }}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold uppercase">{{ $invoice->rent->property->type }} <small class="text-xxs text-gray-500">(No. {{ $invoice->rent->property->number }})</small></p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold uppercase">{{ $invoice->rent->tenant->name }} </p>
                  </div>
                </div>
              </td>

              <td class="px-4 py-3 text-sm">
                RM {{ $invoice->amount }}
              </td>
              <td class="px-4 py-3 text-sm">
                @if ($invoice->fully_paid)
                <x-badge type="yes">YES</x-badge>
                @else
                <x-badge type="no">NO</x-badge>
                @endif
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $invoice->created_at->format('d-m-Y') }}
              </td>

              <td class="px-4 py-3 text-sm text-center">
                @unless ($invoice->fully_paid)
                <a href="{{ route('transactions.create',['inv' => $invoice->id]) }}">
                  <span class="ml-2 px-2 py-1 font-semibold leading-tight text-lime-700 bg-lime-100 rounded-full dark:bg-lime-500 dark:text-lime-100 uppercase">
                    Make Payment
                  </span>
                </a>
                @endunless
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      <!-- Pagination Start -->
      <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        {{ $invoices->links() }}
      </div>
    </div>
    @else
    <p class="mt-4 py-3 text-gray-300 dark:text-gray-500 text-center">No invoices available</p>
    @endif
  </div>

</x-app-layout>