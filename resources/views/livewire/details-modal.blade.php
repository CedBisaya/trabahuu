<div x-data="{ show: false }" 
     @open-details-modal.window="show = true"
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
             class="relative w-full max-w-2xl bg-[#FFFFFF] rounded-2xl shadow-xl border border-gray-100 p-6 sm:p-8 flex flex-col max-h-[90vh]">
            
            <!-- Modal Header -->
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-[#6C7A89]">Edit Application Details</h3>
                <!-- Close Button uses Alpine -->
                <button @click="show = false" type="button" class="text-gray-400 hover:text-[#6C7A89] transition border border-transparent hover:border-gray-200 rounded p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            {{-- load ta muna ta makaboa livewire with alpine --}}
            <div wire:loading class="w-full pr-2 space-y-5">
    
                <!-- Skeleton Row 1 -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="animate-pulse">
                        <div class="h-3 bg-gray-200 rounded w-20 mb-2.5 mt-1"></div>
                        <div class="h-[38px] bg-gray-100 rounded-lg w-full"></div>
                    </div>
                    <div class="animate-pulse">
                        <div class="h-3 bg-gray-200 rounded w-24 mb-2.5 mt-1"></div>
                        <div class="h-[38px] bg-gray-100 rounded-lg w-full"></div>
                    </div>
                </div>

                <!-- Skeleton Row 2 -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="animate-pulse">
                        <div class="h-3 bg-gray-200 rounded w-16 mb-2.5 mt-1"></div>
                        <div class="h-[38px] bg-gray-100 rounded-lg w-full"></div>
                    </div>
                    <div class="animate-pulse">
                        <div class="h-3 bg-gray-200 rounded w-24 mb-2.5 mt-1"></div>
                        <div class="h-[38px] bg-gray-100 rounded-lg w-full"></div>
                    </div>
                </div>

                <!-- Skeleton Row 3 -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="animate-pulse">
                        <div class="h-3 bg-gray-200 rounded w-20 mb-2.5 mt-1"></div>
                        <div class="h-[38px] bg-gray-100 rounded-lg w-full"></div>
                    </div>
                    <div class="animate-pulse">
                        <div class="h-3 bg-gray-200 rounded w-28 mb-2.5 mt-1"></div>
                        <div class="h-[38px] bg-gray-100 rounded-lg w-full"></div>
                    </div>
                </div>

                <!-- Skeleton Footer Buttons -->
                <div class="mt-8 flex justify-end gap-2 pt-2 animate-pulse">
                    <div class="h-9 w-20 bg-gray-100 rounded-lg"></div>
                    <div class="h-9 w-36 bg-gray-200 rounded-lg"></div>
                </div>

            </div>

            <div wire:loading.remove>
                <form class="overflow-y-auto pr-2 space-y-5 custom-scrollbar">
                    
                    <!-- Row 1: Company & Job Title -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Company<span class="text-sm text-red-500">*</span></label>
                            <input type="text" wire:model="company" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF]" required>
                            @error('company') <span class="text-[11px] text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Job Title<span class="text-sm text-red-500">*</span></label>
                            <input type="text" wire:model="job_title" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF]" required>
                            @error('job_title') <span class="text-[11px] text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Row 2: Status & Applied At -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Status<span class="text-sm text-red-500">*</span></label>
                            <select wire:model="status" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF] appearance-none cursor-pointer" required>
                                <option value="">Select Status</option>
                                <option value="Applied">Applied</option>
                                <option value="Pre-Interview">Pre-Interview</option>
                                <option value="Assesment">Assesment</option>
                                <option value="Final-Interview">Final-Interview</option>
                                <option value="Job Offer">Job Offer</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                            @error('status') <span class="text-[11px] text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Applied At</label>
                            <input type="date" wire:model="applied_at" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF]">
                            @error('applied_at') <span class="text-[11px] text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Row 3: Address & Contact No -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Address</label>
                            <input type="text" wire:model="address" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF]">
                            @error('address') <span class="text-[11px] text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Source Link</label>
                            <input type="url" wire:model="source" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF]">
                            @error('source') <span class="text-[11px] text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>
                    </div>

                </form>
            

                <!-- Modal Footer -->
                <div class="mt-8 items-center flex justify-end gap-2 pt-2">

                    <button @click="show = false" type="button" class="px-5 py-2 text-sm font-medium text-gray-500 hover:text-[#6C7A89] transition border border-transparent hover:border-gray-200 rounded-lg">
                        Cancel
                    </button>
                    <button wire:click="updateApplication" class="px-6 py-2 bg-[#6C7A89] hover:bg-[#5B6A8C] text-[#FFFFFF] text-sm font-bold rounded-lg shadow-sm transition-all active:scale-95">
                        <span wire:loading.remove wire:target="updateApplication">
                            Save Application
                        </span>
                        <x-loading target="updateApplication" />
                    </button>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>