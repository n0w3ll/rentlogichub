<x-app-layout>
  <div class="container px-6 mx-auto grid">
    <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Transactions
    </h2>

    
    @if ($transactions->count() > 0)
    <div class="mt-6 w-full overflow-hidden rounded-lg shadow-md">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Invoice No</th>
              <th class="px-4 py-3">Payment Method</th>
              <th class="px-4 py-3">Paid Amount</th>
              <th class="px-4 py-3">Date</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($transactions as $transaction)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold">{{ $transaction->invoice->number }}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold uppercase">{{ $transaction->payment_method }}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                RM {{ $transaction->paid_amount }}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $transaction->created_at->format('d-m-Y') }}
              </td>

              
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      <!-- Pagination Start -->
      <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        {{ $transactions->links() }}
      </div>
    </div>
    @else
    <p class="mt-4 py-3 text-gray-300 dark:text-gray-500 text-center">No transactions available</p>
    @endif
  </div>

</x-app-layout>