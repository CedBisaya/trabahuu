<div x-data="{ show: false }" 
     @open-delete-modal.window="show = true"
     @close-modal.window="show = false">
    
    <!-- Modal Backdrop -->
    <div x-show="show" 
         style="display: none;"
         class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden bg-gray-900/30 backdrop-blur-sm p-4">
        
        <!-- Modal Card -->
        <div x-show="show"
             @click.away="show = true"
             x-transition:enter="ease-out duration-150"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative w-full max-w-lg bg-[#FFFFFF] rounded-2xl shadow-xl border border-gray-100 p-6 sm:p-8 flex flex-col max-h-[90vh]">
            
            <!-- Modal Header -->
            <div class="flex justify-between mb-6">
                <h3 class="text-lg font-bold text-[#6C7A89]">Delete Application</h3>
                <button @click="show = false" type="button" class="text-gray-400 hover:text-[#6C7A89] transition border border-transparent hover:border-gray-200 rounded p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <div class="">
                <!-- Text Content -->
                <h3 class="text-md font-bold text-gray-600">Are you sure you want to delete this application?</h3>
                <p class="text-gray-500 text-sm mt-1">This action is permanent andcannot be undone.</p>
            </div>

            <!-- Modal Footer -->
            <div class="mt-8 flex justify-end gap-3 pt-2">
                <!-- Cancel Button uses Alpine -->
                <button @click="show = false" type="button" class="px-5 py-2 text-sm font-medium text-gray-500 hover:text-[#6C7A89] transition border border-transparent hover:border-gray-200 rounded-lg">
                    Cancel
                </button>
                <button wire:click="deleteApplication" class="px-6 py-2 bg-red-400 hover:bg-red-500 text-[#FFFFFF] text-sm font-bold rounded-lg shadow-sm transition-all active:scale-95">
                    Delete
                </button>
            </div>
        </div>

    </div>
</div>