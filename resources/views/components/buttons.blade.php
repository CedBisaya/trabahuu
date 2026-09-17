<div class="border border-gray-100 rounded-lg px-8 py-4">
    <div class="flex flex-col gap-3">
        <!-- Add Application Button -->
        <button @click="$dispatch('open-add-modal')" type="button" class="w-full inline-flex items-center justify-center border border-gray-200 text-[#6C7A89] hover:bg-[#6C7A89] hover:text-[#FFFFFF] px-6 py-2.5 rounded-lg font-bold text-xs transition-all active:scale-95 whitespace-nowrap cursor-pointer bg-[#FFFFFF]">
            <x-heroicon-o-plus class="w-4 h-4 stroke-[3.5px] mr-1.5"/>
            <span>Add Application</span>
        </button>

        <!-- Import Excel Button with Tooltip -->
        <div x-data class="relative w-full">
            <!-- Hidden File Input -->
            <input type="file" x-ref="fileInput" wire:model.live="excelFile" class="hidden" accept=".csv, .xlsx, .xls">

            <!-- Main Button -->
            <button x-on:click="$refs.fileInput.click()" type="button" class="group relative w-full inline-flex items-center justify-center border border-gray-200 text-[#6C7A89] hover:bg-[#6C7A89] hover:text-[#FFFFFF] px-6 py-2.5 rounded-lg font-bold text-xs transition-all active:scale-95 whitespace-nowrap cursor-pointer bg-[#FFFFFF]">
                <x-heroicon-o-document-arrow-down class="w-4 h-4 mr-1.5"/>
                <span wire:loading.remove wire:target="excelFile">Import Excel</span>
                <span wire:loading wire:target="excelFile">Uploading...</span>

                <!-- Info Question Mark & Tooltip -->
                <div class="relative ml-2 inline-flex items-center group/tooltip" @click.stop>
                    <x-heroicon-o-question-mark-circle class="w-4 h-4 text-[#6C7A89]/70 group-hover:text-white transition-colors cursor-help" />

                    <!-- Tooltip Popover -->
                    <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2.5 hidden group-hover/tooltip:block w-56 p-3 bg-white text-gray-600 text-left font-normal rounded-xl shadow-xl border border-gray-100 z-50 pointer-events-none">
                        <p class="font-semibold text-gray-800 text-[11px] mb-1.5 border-b border-gray-100 pb-1">
                            Your Excel file should have columns:
                        </p>
                        <ul class="space-y-1 text-[11px]">
                            <li>• <span class="font-semibold text-[#1E50A4]">Company</span></li>
                            <li>• <span class="font-semibold text-[#1E50A4]">Job title</span></li>
                            <li>• <span class="font-semibold text-[#1E50A4]">Address</span></li>
                            <li>• <span class="font-semibold text-[#1E50A4]">Applied at</span></li>
                            <li>• <span class="font-semibold text-[#1E50A4]">Source link</span></li>
                            <li>• <span class="font-semibold text-[#1E50A4]">Status</span></li>
                        </ul>
                    </div>
                </div>
            </button>
        </div>
    </div>
</div>