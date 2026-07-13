@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-slate-200 bg-white/90 focus:border-violet-500 focus:ring-4 focus:ring-violet-100 rounded-lg shadow-sm transition-all text-slate-700 placeholder-slate-400', 'disabled:opacity-50 disabled:cursor-not-allowed']) }}>
