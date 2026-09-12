<div class="bg-[#FFFFFF] border border-gray-100 rounded-xl shadow-sm p-4 mt-6">
    <!-- Alpine JS Calendar Logic -->
    <div x-data="{
        month: new Date().getMonth(),
        year: new Date().getFullYear(),
        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        get blankDays() { 
            return Array.from({length: new Date(this.year, this.month, 1).getDay()}, (_, i) => i);
        },
        get daysInMonth() { 
            return Array.from({length: new Date(this.year, this.month + 1, 0).getDate()}, (_, i) => i + 1); 
        },
        isToday(date) {
            const today = new Date();
            return date === today.getDate() && this.month === today.getMonth() && this.year === today.getFullYear();
        }
    }">
        
        <!-- Calendar Header (Month / Year & Navigation) -->
        <div class="flex items-center justify-between mb-5">
            <button @click="month === 0 ? (month = 11, year--) : month--" type="button" class="text-gray-400 hover:text-[#6C7A89] transition p-1 rounded hover:bg-gray-50">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            
            <div class="font-bold text-gray-800 text-sm" x-text="monthNames[month] + ' ' + year"></div>
            
            <button @click="month === 11 ? (month = 0, year++) : month++" type="button" class="text-gray-400 hover:text-[#6C7A89] transition p-1 rounded hover:bg-gray-50">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>

        <!-- Days of the Week Header -->
        <div class="grid grid-cols-7 text-center text-[10px] font-bold text-gray-400 mb-3 uppercase tracking-wider">
            <div>Su</div><div>Mo</div><div>Tu</div><div>We</div><div>Th</div><div>Fr</div><div>Sa</div>
        </div>

        <!-- Calendar Grid -->
        <div class="grid grid-cols-7 text-center text-xs text-gray-800 font-medium gap-y-3">
            <!-- Empty slots before the first day of the month -->
            <template x-for="blank in blankDays">
                <div></div>
            </template>
            
            <!-- Actual Days -->
            <template x-for="date in daysInMonth" :key="date">
                <div class="flex justify-center items-center">
                    <div @click="/* Future feature: filter table by this date */"
                         class="w-7 h-7 flex items-center justify-center cursor-pointer rounded-full transition-colors"
                         :class="{
                             'bg-[#6C7A89] text-[#FFFFFF] shadow-sm': isToday(date), 
                             'hover:bg-gray-100 text-gray-700': !isToday(date)
                         }"
                         x-text="date">
                    </div>
                </div>
            </template>
        </div>
        
    </div>
</div>