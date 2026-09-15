<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\Component;
use Livewire\Attributes\On;

class Stats extends Component
{
    #[On('refresh-table')] //locally
    #[On('echo:applications,ApplicationTableUpdated')] //globally
    public function refreshStats()
    {
        // Livewire will automatically re-run the render() method when it hears this
    }

    public function render()
    {
        // 1. Total Applications (Everything)
        $total = Application::count();

        // 2. Interviews (Combining both Pre and Final interviews)
        $interviews = Application::whereIn('status', ['Pre-Interview', 'Final-Interview'])->count();

        // 3. Rejections
        $rejections = Application::where('status', 'Rejected')->count();

        // 4. Offers
        $offers = Application::where('status', 'Job Offer')->count();

        return view('livewire.stats', [
            'total' => $total,
            'interviews' => $interviews,
            'rejections' => $rejections,
            'offers' => $offers,
        ]);
    }
}
