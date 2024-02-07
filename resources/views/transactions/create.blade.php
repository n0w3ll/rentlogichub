<x-app-layout>
  <div class="container px-6 mx-auto grid">
    <h2 class="mt-6 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Payment
    </h2>

    <form method="POST" action="{{route('transactions.store')}}" class="mt-6">
      @csrf
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400 font-medium">
            Invoice No.
          </span>
          <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray uppercase" name="invoice_id">
            <option value="">Please select...</option>
            @foreach($invoices as $invoice)
            <option value="{{ $invoice->id }}" {{ request('inv') == $invoice->id ? 'selected' : '' }}>{{ $invoice->number }}</option>
            @endforeach
          </select>
        </label>
        <div class="mt-4">
          <label class="block text-sm mt-4 w-full md:w-1/2">
            <span class="text-gray-700 dark:text-gray-400 font-medium">Payable Amount</span>
            <h2 class="mt-2 text-lg text-gray-700 dark:text-gray-400 font-bold">RM {{ $inv->amount }}</h2>
          </label>
        </div>
        <div class="mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400 font-medium">
            Payment Method
          </span>
          <div class="mt-2">
            <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
              <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="payment_method" value="cash">
              <span class="ml-2">Cash</span>
            </label>
            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
              <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="payment_method" value="cheque">
              <span class="ml-2">Cheque</span>
            </label>
            <label class="inline-flex items-center  ml-6 text-gray-600 dark:text-gray-400">
              <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="payment_method" value="bank_transfer">
              <span class="ml-2">Bank Transfer</span>
            </label>
            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
              <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="payment_method" value="ewallet">
              <span class="ml-2">E-Wallet</span>
            </label>
          </div>
        </div>
        <div class="block md:flex md:space-x-4">
          <label class="block text-sm mt-4 w-full md:w-1/2">
            <span class="text-gray-700 dark:text-gray-400 font-medium">Paid Amount</span>
            <input type="integer" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="paid_amount">
          </label>
          <label class="block text-sm mt-4 w-full md:w-1/2">
            <span class="text-gray-700 dark:text-gray-400 font-medium">Payment Proof</span>
            <input type="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="payment_proof">
          </label>
        </div>

        <div class="flex justify-center my-6 text-sm ">
          <x-dark-button class="w-1/2 md:w-1/3">Make Payment</x-dark-button>
        </div>
      </div>
    </form>
  </div>
</x-app-layout>