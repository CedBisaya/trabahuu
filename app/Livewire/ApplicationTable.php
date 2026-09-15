<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\Component;
use Livewire\Attributes\On;

class ApplicationTable extends Component
{

    // Listen for the local modal update
    #[On('refresh-table')]
     // listen for the Reverb global update
    #[On('echo:applications,ApplicationTableUpdated')] 
    public function refreshList()
    {
        // Livewire will re-render when it hears either of these!
    }

    public function render()
    {
        $applications = Application::latest()->get();

        return view('livewire.application-table', [
            'applications' => $applications
        ]);
    }
}
