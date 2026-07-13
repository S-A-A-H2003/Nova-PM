@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-emerald-700 bg-emerald-50 border border-emerald-100 rounded-lg px-4 py-3 animate-soft-scale']) }}>
        {{ $status }}
    </div>
@endif
