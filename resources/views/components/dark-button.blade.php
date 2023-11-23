<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-700 border border-transparent rounded-lg dark:bg-gray-900 dark:hover:border-gray-700 active:bg-gray-800 hover:bg-gray-800 focus:outline-none focus:shadow-outline-gray']) }}>
    {{ $slot }}
</button>
