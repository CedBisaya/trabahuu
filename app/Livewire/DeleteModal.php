<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteModal extends Component
{
    public $deleteId;

    #[On('prepare-delete')]
    public function setDeleteId($id){
        $this->deleteId = $id;
    }

    public function deleteApplication(){
        if ($this->deleteId) {
            Application::findOrFail($this->deleteId)->delete();
            
            $this->dispatch('close-modal');
            $this->dispatch('refresh-table');
            $this->dispatch('notify', message: 'Application deleted successfully.', type: 'success');
            $this->deleteId = null; // Reset
        }
    }
    public function render()
    {
        return view('livewire.delete-modal');
    }
}
