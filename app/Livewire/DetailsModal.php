<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\Attributes\On;
use App\Events\ApplicationTableUpdated;
use Livewire\Component;

class DetailsModal extends Component
{
    public $applicationId;
    public $company;
    public $job_title;
    public $status;
    public $applied_at;
    public $address;
    public $source;

    #[On('load-edit-data')]
    public function loadApplication($id)
    {
        // 3. Find the specific application
        $application = Application::findOrFail($id);
    
        // 4. Populate the properties so they instantly appear in the UI
        if ($application) {
            $this->applicationId = $application->id;
            $this->company = $application->company;
            $this->job_title = $application->job_title;
            $this->status = $application->status;
            
            // Note: HTML <input type="date"> requires YYYY-MM-DD format strictly
            $this->applied_at = $application->applied_at ? $application->applied_at->format('Y-m-d') : null;
            
            $this->address = $application->job_address;
            $this->source = $application->source_link;
        }
    }

    public function updateApplication(){
        $this->validate([
            'company'    => 'required|string|max:255',
            'job_title'  => 'required|string|max:255',
            'status'     => 'required|string',
            'applied_at' => 'nullable|date',
            'address'    => 'nullable|string|max:255',
            'source'     => 'nullable|url|max:255',
        ]);

        $application = Application::findOrFail($this->applicationId);

        $application->update([
            'company'     => $this->company,
            'job_title'   => $this->job_title,
            'status'      => $this->status,
            'applied_at'  => $this->applied_at,
            'job_address' => $this->address, 
            'source_link' => $this->source, 
        ]);

        $this->dispatch('refresh-table');
        ApplicationTableUpdated::dispatch();

        $this->dispatch('notify', message: 'Application updated successfully.', type: 'success');

        $this->dispatch('close-modal');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.details-modal');
    }
}
