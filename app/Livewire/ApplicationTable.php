<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\Component;

class ApplicationTable extends Component
{


    public function render()
    {
        $applications = Application::latest()->get();

        return view('livewire.application-table', [
            'applications' => $applications
        ]);
    }
}
