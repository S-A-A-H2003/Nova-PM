@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 bg-white focus:border-violet-500 focus:ring-2 focus:ring-violet-200 rounded-lg shadow-sm transition-all', 'disabled:opacity-50 disabled:cursor-not-allowed']) }}>
