@props([
    'attachment' => null,
    'id' => null
])

@php
    if ($id === null) {
        $id = 'attachment_update_' . str_replace('.', '', uniqid());
    }
@endphp

<div class="hidden" id="{{$id}}">
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" onclick="closeAttachmentUpdate('{{$id}}')">
        <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-md mx-4" onclick="event.stopPropagation()">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">{{ __('Update Attachment') }}</h3>
                <button onclick="closeAttachmentUpdate('{{$id}}')" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <x-form-structure action="{{route('attachment.update', $attachment->id)}}" method="PUT" buttonClass="w-full mt-4 bg-violet-600 hover:bg-violet-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors" button="svg-send" formClass="w-full space-y-4">
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">{{ __('Current file:') }}</p>
                    <a href="{{route('utilities.viewFile', ['App\Models\Attachment', $attachment->id, 'attachment'])}}" target="_blank" class="text-violet-600 hover:text-violet-700 hover:underline text-sm break-all">
                        {{$attachment->attachment}}
                    </a>
                </div>

                <x-form-fieldset-file name="attachment" fieldsetClass="w-full" :isUpdate="true">
                    <div class="text-center">
                        <svg class="w-12 h-12 text-violet-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                        <p class="text-sm text-gray-600">{{ __('Choose new file to replace') }}</p>
                    </div>
                </x-form-fieldset-file>
            </x-form-structure>
        </div>
    </div>
</div>

<script>
function closeAttachmentUpdate(id) {
    document.getElementById(id).classList.add('hidden');
}
</script>
