<div x-data="{ show: false }" 
     @open-add-modal.window="show = true"
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
                <h3 class="text-lg font-bold text-[#6C7A89]">New Application</h3>
                <!-- Close Button uses Alpine -->
                <button @click="show = false" type="button" class="text-gray-400 hover:text-[#6C7A89] transition border border-transparent hover:border-gray-200 rounded p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <form wire:submit="save" class="overflow-y-auto pr-2 space-y-5 custom-scrollbar">
                
                <!-- Row 1: Company & Job Title -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Company</label>
                        <input type="text" wire:model="company" placeholder="e.g. Samsung" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF]">
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Job Title</label>
                        <input type="text" wire:model="job_title" placeholder="e.g. IT Support" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF]">
                    </div>
                </div>

                <!-- Row 2: Status & Applied At -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Status</label>
                        <select wire:model="status" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF] appearance-none cursor-pointer">
                            <option value="Applied">Applied</option>
                            <option value="Pre-Interview">Pre-Interview</option>
                            <option value="Assesment">Assesment</option>
                            <option value="Final-Interview">Final-Interview</option>
                            <option value="Job Offer">Job Offer</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Applied At</label>
                        <input type="date" wire:model="applied_at" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF]">
                    </div>
                </div>

                <!-- Row 3: Address & Contact No -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Address</label>
                        <input type="text" wire:model="address" placeholder="e.g. Tabaco City" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF]">
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Contact No / Email</label>
                        <input type="text" wire:model="contact_no" placeholder="e.g. HR@company.com" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF]">
                    </div>
                </div>

                <!-- Row 4: Source Link -->
                <div>
                    <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Source Link</label>
                    <input type="url" wire:model="source_link" placeholder="https://indeed.com/..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF]">
                </div>

                <!-- Row 5: Job Description -->
                <div>
                    <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Job Description</label>
                    <textarea wire:model="job_description" rows="3" placeholder="Paste the job requirements or description here..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF] resize-none"></textarea>
                </div>

                <!-- Row 6: Notes -->
                <div>
                    <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Notes</label>
                    <textarea wire:model="notes" rows="2" placeholder="Any personal notes (e.g. Referral from John)" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#6C7A89] focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all bg-[#FFFFFF] resize-none"></textarea>
                </div>

            </form>

            <!-- Modal Footer -->
            <div class="mt-8 flex justify-end gap-3 pt-2">
                <!-- Cancel Button uses Alpine -->
                <button @click="show = false" type="button" class="px-5 py-2 text-sm font-medium text-gray-500 hover:text-[#6C7A89] transition border border-transparent hover:border-gray-200 rounded-lg">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2 bg-[#6C7A89] hover:bg-[#5B6A8C] text-[#FFFFFF] text-sm font-bold rounded-lg shadow-sm transition-all active:scale-95">
                    Save Application
                </button>
            </div>

        </div>
    </div>
</div>