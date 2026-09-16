<div class="grid grid-cols-10 gap-2">
    <div class="col-span-2">
        {{-- button --}}
        <div>
            <x-buttons />
        </div>
        {{-- calendar --}}
        <div>
            <x-calendar />
        </div>
    </div>
    <div class="col-start-3 col-span-8 bg-[#FFFFFF] rounded-xl">
        {{-- Search and Filters Section --}}
        <div class="flex flex-col sm:flex-row items-center justify-start gap-3 w-full lg:w-auto mb-4">

            <div class="w-full sm:w-auto">
                <select {{-- wire:model.live="status" --}} class="w-full border border-gray-100 text-[#6C7A89] py-2.5 text-xs rounded-lg focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none bg-[#FFFFFF] px-5 h-[42px] appearance-none cursor-pointer transition-all">
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
                    class="w-full pl-10 pr-4 py-2.5 border border-gray-100 rounded-lg text-xs text-[#6C7A89] placeholder-[#6C7A89]/60 focus:border-[#6C7A89] focus:ring-1 focus:ring-[#6C7A89] outline-none transition-all h-[42px] bg-[#FFFFFF]">
            </div>
        </div>
        <div
        <!-- Data Table -->
        <div class="bg-[#FFFFFF] rounded-lg border border-gray-100 overflow-x-auto min-h-[400px] flex flex-col justify-between shadow-xs">
            <table class="w-full text-left text-xs text-gray-600 whitespace-nowrap">
                <thead class="text-[#6C7A89] text-xs border-b border-gray-100 font-semibold uppercase tracking-wider bg-[#FFFFFF]">
                    <tr>
                        <th class="px-6 py-4">Company</th>
                        <th class="px-6 py-4">Job Title</th>
                        <th class="px-6 py-4">Address</th>
                        <th class="px-6 py-4">Applied At</th>
                        <th class="px-6 py-4">Source Link</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <!-- Mock Data Row -->
                    @forelse ($applications as $application)
                        <tr class="hover:bg-gray-50/50 transition duration-150">
                            <td class="px-6 py-2">{{ $application->company }}</td>
                            <td class="px-6 py-2">{{ $application->job_title }}</td>
                            <td class="px-6 py-2">{{ $application->job_address ?? 'Not Provided'}}</td>
                            <td class="px-6 py-2">{{ $application->applied_at?->format('M d, Y') ?? 'Not Yet Applied'}}</td>
                            <td class="px-6 py-2">
                                @if($application->source_link)
                                    <a href="{{ $application->source_link }}" target="_blank" @click.stop
                                        class="inline-flex items-center gap-1 underline transition-colors group">
                                        Visit
                                        <x-heroicon-o-arrow-up-right class="w-3.5 h-3.5 stroke-[1.5px] group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform"/>
                                    </a>
                                @else
                                    <span class="text-gray-400 italic text-xs">No link</span>
                                @endif
                            </td>
                            <td class="px-6 py-2">
                                <!-- Updated Minimalist Badge -->
                                <span class="bg-[#6C7A89] text-[#FFFFFF] text-[11px] px-3 py-1.5 rounded-full font-medium tracking-wide">{{ $application->status ?? 'To Apply'}}</span>
                            </td>
                            <td class="px-6 py-2 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <button @click="$dispatch('open-details-modal')" wire:click="$dispatch('load-edit-data', { id: {{ $application->id }} })"
                                            title="Edit Application"
                                            class="text-[#6C7A89] hover:text-[#4A5568] hover:bg-gray-100 border border-transparent hover:border-gray-200 rounded-lg p-1.5 transition">
                                        <x-heroicon-o-pencil class="w-4 h-4" />
                                    </button>

                                    <button @click="$dispatch('open-delete-modal')" wire:click="$dispatch('prepare-delete', { id: {{ $application->id }} })"
                                            title="Delete Application"
                                            class="text-red-400 hover:text-red-600 hover:bg-red-50 border border-transparent hover:border-red-100 rounded-lg p-1.5 transition">
                                        <x-heroicon-o-trash class="w-4 h-4" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <!-- Optional soft icon -->
                                    <div class="bg-gray-50 text-gray-300 p-3 rounded-full mb-3">
                                        <x-heroicon-o-document-plus class="w-8 h-8 stroke-[1.5px]" />
                                    </div>
                                    
                                    <p class="text-[#6C7A89] text-sm font-medium mb-4">Create your list of applications</p>
                                    
                                    <!-- Triggers your Add Modal -->
                                    <button @click="$dispatch('open-add-modal')" class="px-5 py-2 bg-[#6C7A89] hover:bg-[#5B6A8C] text-[#FFFFFF] text-xs font-bold rounded-lg shadow-sm transition-all active:scale-95">
                                        Add First Application
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 border-t border-gray-100">
           <x-pagination/>
        </div>
        

        <livewire:add-modal />
        <livewire:details-modal />
        <livewire:delete-modal />
    </div>
</div>