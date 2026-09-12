<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\Component;

class DeleteModal extends Component
{
    public function deleteApplication($id){
        Application::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.delete-modal');
    }
}
