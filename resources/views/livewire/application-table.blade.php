<div class="bg-[#FFFFFF] rounded-xl">
    {{-- Search and Filters Section --}}
    <div class="flex flex-col sm:flex-row items-center justify-end gap-3 w-full lg:w-auto mb-4">
        <!-- Add Application Button -->
        <button class="w-full sm:w-auto inline-flex items-center justify-center border border-gray-200 text-[#6C7A89] hover:bg-[#6C7A89] hover:text-[#FFFFFF] px-6 py-2.5 rounded-lg font-bold text-xs transition-all active:scale-95 whitespace-nowrap cursor-pointer bg-[#FFFFFF]">
            <x-heroicon-o-plus class="w-4 h-4 stroke-[3.5px] mr-1.5"/>
            <span>Add Application</span>
        </button>

        <!-- Import Excel Button -->
        <button class="w-full sm:w-auto inline-flex items-center justify-center border border-gray-200 text-[#6C7A89] hover:bg-[#6C7A89] hover:text-[#FFFFFF] px-6 py-2.5 rounded-lg font-bold text-xs transition-all active:scale-95 whitespace-nowrap cursor-pointer bg-[#FFFFFF]">
            <x-heroicon-o-document-arrow-down class="w-4 h-4 mr-1.5"/>
            <span>Import Excel</span>
        </button>

        <!-- Status Filter -->
        <div class="w-full sm:w-auto">
            <select {{-- wire:model.live="status" --}} class="w-full border border-gray-200 text-[#6C7A89] py-2.5 text-xs rounded-lg focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none bg-[#FFFFFF] px-5 h-[42px] appearance-none cursor-pointer transition-all">
                <option value="">All Status</option>s
                <option>Applied</option>
                <option>Pre-Interview</option>
                <option>Assesment</option>
                <option>Final-Interview</option>
                <option>Job Offer</option>
                <option>Rejected</option>
            </select>
        </div>

        <!-- Search Bar -->
        <div class="relative w-full sm:w-64">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-[#6C7A89]">
                <x-heroicon-o-magnifying-glass class="w-4 h-4" />
            </span>
            <input type="text" 
                {{-- wire:model.live.debounce.200ms="search"  --}}
                placeholder="Search" 
                class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm text-[#6C7A89] placeholder-[#6C7A89]/60 focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all h-[42px] bg-[#FFFFFF]">
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-[#FFFFFF] rounded-lg border border-gray-200 overflow-x-auto min-h-[400px] flex flex-col justify-between shadow-xs">
        <table class="w-full text-left text-xs text-gray-600 whitespace-nowrap">
            <thead class="text-[#6C7A89] text-xs border-b border-gray-100 font-semibold uppercase tracking-wider bg-[#FFFFFF]">
                <tr>
                    <th class="px-6 py-4">Company</th>
                    <th class="px-6 py-4">Job Title</th>
                    <th class="px-6 py-4">Address</th>
                    <th class="px-6 py-4">Contact No</th>
                    <th class="px-6 py-4">Applied At</th>
                    <th class="px-6 py-4">Source Link</th>
                    <th class="px-6 py-4">Job Description</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Notes</th>
                    <th class="px-6 py-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <!-- Mock Data Row -->
                @for ($i = 0; $i < 10; $i++)
                    <tr class="hover:bg-gray-50/50 transition duration-150">
                        <td class="px-6 py-4 font-medium text-gray-800">Samsung</td>
                        <td class="px-6 py-4">IT Support</td>
                        <td class="px-6 py-4">Tabaco City</td>
                        <td class="px-6 py-4">HR@HR.COM</td>
                        <td class="px-6 py-4">25 August 2026</td>
                        <td class="px-6 py-4">UNK</td>
                        <td class="px-6 py-4 text-gray-500 truncate max-w-[150px]">Job description details...</td>
                        <td class="px-6 py-4">
                            <!-- Updated Minimalist Badge -->
                            <span class="bg-[#6C7A89] text-[#FFFFFF] text-[11px] px-3 py-1.5 rounded-full font-medium tracking-wide">Applied</span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">NOTES</td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-[#6C7A89] hover:text-[#4A5568] hover:bg-gray-100 border border-transparent hover:border-gray-200 rounded p-1.5 transition">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                            </button>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>