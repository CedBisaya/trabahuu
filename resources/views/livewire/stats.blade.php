<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    
    <!-- Total Applications -->
    <div class="bg-[#FFFFFF] border border-gray-100 rounded-xl p-5 flex flex-col justify-center">
        <p class="text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1">Total Applications</p>
        <h2 class="text-3xl font-bold text-[#6C7A89]">{{ $total }}</h2>
    </div>

    <!-- Interviews -->
    <div class="bg-[#FFFFFF] border border-gray-100 rounded-xl p-5 flex flex-col justify-center">
        <p class="text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1">Interviews</p>
        <h2 class="text-3xl font-bold text-[#6C7A89]">{{ $interviews }}</h2>
    </div>

    <!-- Rejections -->
    <div class="bg-[#FFFFFF] border border-gray-100 rounded-xl p-5 flex flex-col justify-center">
        <p class="text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1">Rejections</p>
        <h2 class="text-3xl font-bold text-[#6C7A89]">{{ $rejections }}</h2>
    </div>

    <!-- Offers -->
    <div class="bg-[#FFFFFF] border border-gray-100 rounded-xl p-5 flex flex-col justify-center">
        <p class="text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1">Offers</p>
        <h2 class="text-3xl font-bold text-[#6C7A89]">{{ $offers }}</h2>
    </div>

</div>