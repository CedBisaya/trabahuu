<div class="flex items-center justify-between py-4 text-sm text-[#6C7A89] bg-[#FFFFFF] rounded-b-lg">
    
    <!-- LEFT SIDE: Per Page Dropdown & Showing Text -->
    <div class="flex items-center gap-4">
        
        <!-- Per Page Dropdown (UI Only) -->
        <div class="relative">
            <select class="appearance-none border border-gray-200 text-xs text-[#6C7A89] rounded-md pl-3 pr-8 py-1 focus:outline-none focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] bg-transparent cursor-pointer">
                <option value="6">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>

        <!-- Range Text -->
        <span>Showing 1 to 5 of 40</span>
    </div>

    <!-- RIGHT SIDE: Navigation Controls -->
    <div class="flex items-center text-xs gap-5">
        
        <!-- Previous Group -->
        <div class="flex items-center gap-4">
            <!-- First Page -->
            <button class="disabled:text-gray-300 disabled:cursor-not-allowed text-[#1E50A4] hover:text-[#133A7C] transition">
                <x-heroicon-o-chevron-double-left class="w-4 h-4 stroke-[1.5px]" />
            </button>

            <!-- Previous Page -->
            <button class="disabled:text-gray-300 disabled:cursor-not-allowed text-[#1E50A4] hover:text-[#133A7C] transition text-gray-300" disabled>
                <x-heroicon-o-chevron-left class="w-4 h-4 stroke-[1.5px]" />
            </button>
        </div>

        <!-- Current Page Box -->
        <div class="flex items-center gap-2">
            <div class="border border-gray-200 rounded px-3 py-1 min-w-[36px] text-center text-gray-700">
                1
            </div>
            <span>of 8</span>
        </div>

        <!-- Next Group -->
        <div class="flex items-center gap-4">
            <!-- Next Page -->
            <button class="disabled:text-gray-300 disabled:cursor-not-allowed text-[#1E50A4] hover:text-[#133A7C] transition">
                <x-heroicon-o-chevron-right class="w-4 h-4 stroke-[1.5px]" />
            </button>

            <!-- Last Page -->
            <button class="disabled:text-gray-300 disabled:cursor-not-allowed text-[#1E50A4] hover:text-[#133A7C] transition">
                <x-heroicon-o-chevron-double-right class="w-4 h-4 stroke-[1.5px]" />
            </button>
        </div>

    </div>
</div>