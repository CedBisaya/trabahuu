<div class="border border-gray-100 rounded-lg px-8 py-4">
    <div class="flex flex-col gap-3">
        <!-- Add Application Button -->
        <button @click="$dispatch('open-add-modal')" type="button" class="w-full inline-flex items-center justify-center border border-gray-200 text-[#6C7A89] hover:bg-[#6C7A89] hover:text-[#FFFFFF] px-6 py-2.5 rounded-lg font-bold text-xs transition-all active:scale-95 whitespace-nowrap cursor-pointer bg-[#FFFFFF]">
            <x-heroicon-o-plus class="w-4 h-4 stroke-[3.5px] mr-1.5"/>
            <span>Add Application</span>
        </button>

        <!-- Import Excel Button -->
        <button type="button" class="w-full inline-flex items-center justify-center border border-gray-200 text-[#6C7A89] hover:bg-[#6C7A89] hover:text-[#FFFFFF] px-6 py-2.5 rounded-lg font-bold text-xs transition-all active:scale-95 whitespace-nowrap cursor-pointer bg-[#FFFFFF]">
            <x-heroicon-o-document-arrow-down class="w-4 h-4 mr-1.5"/>
            <span>Import Excel</span>
        </button>
    </div>
</div>