<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-5 py-2.5 bg-violet-600 hover:bg-violet-700 active:bg-violet-800 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-widest shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
