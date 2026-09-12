<div x-data="{ 
        show: false, 
        message: '', 
        type: 'success' 
    }"
    x-init="
        @if (session()->has('success'))
            message = '{{ session('success') }}'; type = 'success'; show = true;
            setTimeout(() => show = false, 4000);
        @endif
        @if (session()->has('error'))
            message = '{{ session('error') }}'; type = 'error'; show = true;
            setTimeout(() => show = false, 4000);
        @endif
        @if (session()->has('info'))
            message = '{{ session('info') }}'; type = 'info'; show = true;
            setTimeout(() => show = false, 4000);
        @endif
        @if (session()->has('warning'))
            message = '{{ session('warning') }}'; type = 'warning'; show = true;
            setTimeout(() => show = false, 4000);
        @endif
    "
    @notify.window="
        message = $event.detail.message; 
        type = $event.detail.type; 
        show = true;
        setTimeout(() => show = false, 4000);
    "
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-x-8"
    x-transition:enter-end="opacity-100 transform translate-x-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform translate-x-0"
    x-transition:leave-end="opacity-0 transform translate-x-8"
    class="fixed top-5 right-5 z-[200] flex items-center w-full max-w-xs p-4 space-x-3 bg-white rounded-lg shadow-sm border border-gray-100"
    style="display: none;" 
    role="alert">

    {{-- Icon for Success --}}
    <template x-if="type === 'success'">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-full">
            <x-heroicon-o-check-circle class="w-5 h-5"/>
        </div>
    </template>

    {{-- Icon for Error --}}
    <template x-if="type === 'error'">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-full">
            <x-heroicon-o-x-circle class="w-5 h-5"/>
        </div>
    </template>

    {{-- Icon for Information --}}
    <template x-if="type === 'info'">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-full">
            <x-heroicon-o-information-circle class="w-5 h-5"/>
        </div>
    </template>

    <div class="text-sm font-medium text-gray-700 flex-1" x-text="message"></div>

    <button @click="show = false" type="button" class="ms-auto text-gray-400 hover:text-gray-900 p-1.5 inline-flex h-8 w-8 items-center justify-center rounded-md hover:bg-gray-50 transition">
        <x-heroicon-o-x-mark class="w-4 h-4"/>
    </button>
</div>