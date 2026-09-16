@props(['status'])

@php
    $colorClass = match ($status) {
        'Applied'         => 'bg-[#f3f4f6] text-gray-600',
        'Pre-Interview'   => 'bg-[#e0f2fe] text-sky-700',
        'Assesment'       => 'bg-[#fef9c3] text-yellow-700', 
        'Final-Interview' => 'bg-[#dbeafe] text-blue-700',
        'Job Offer'       => 'bg-[#dcfce7] text-green-700',
        'Rejected'        => 'bg-[#ef4444] text-[#FFFFFF]',
        default           => 'bg-[#f3f4f6] text-gray-600',
    };
@endphp

<span class="{{ $colorClass }} text-[11px] px-3 py-1.5 rounded-full font-medium tracking-wide">
    {{ $status ?? 'To Apply' }}
</span>