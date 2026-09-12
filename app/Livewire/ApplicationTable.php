<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\Component;

class ApplicationTable extends Component
{
    public function deleteApplication($id){
        Application::findOrFail($id)->delete();
    }

    public function render()
    {
        $applications = Application::latest()->get();

        return view('livewire.application-table', [
            'applications' => $applications
        ]);
    }
}
