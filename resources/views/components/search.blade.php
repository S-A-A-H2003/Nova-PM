@props([
    'result_search' => ''
])
<form action="{{URL::current()}}" method="GET" class="relative w-full max-w-md h-12 bg-white/90 rounded-lg shadow-sm flex items-center border border-slate-200 hover:border-violet-300 transition-colors">

    <input type="text" name="search" id="search" placeholder="{{ __('Search...') }}" value="{{$result_search}}" class="w-full h-full border-none rounded-lg pl-5 pr-12 placeholder-slate-400 text-slate-700 bg-transparent focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent">
    <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 p-1.5 hover:bg-slate-100 rounded-lg transition-colors">
        <svg
            width="20"
            height="20"
            viewBox="0 0 20 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path d="M8.83333 14.6667C12.0146 14.6667 14.6667 12.0146 14.6667 8.83333C14.6667 5.65202 12.0146 3 8.83333 3C5.65202 3 3 5.65202 3 8.83333C3 12.0146 5.65202 14.6667 8.83333 14.6667Z" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round"/>
            <path d="M12.5 12.5L16.6667 16.6667" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
    </button>
</form>
