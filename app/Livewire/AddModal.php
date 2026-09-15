<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Application;
use App\Events\ApplicationTableUpdated;
use Illuminate\Support\Facades\Log;

class AddModal extends Component
{

    public $show = false;
    public $job_title;
    public $description;
    public $company;
    public $address;
    public $contact_no;
    public $source;
    public $applied_at;
    public $status;
    public $notes;

    public function storeApplication()
    {
        $this->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'source' => 'nullable|url|max:255',
            'applied_at' => 'nullable|date',
            'status' => 'nullable|string|max:50',
        ]);

        return rescue(
            function () {
                Application::create([
                    'job_title' => $this->job_title,
                    'company' => $this->company,
                    'job_address' => $this->address,
                    'source_link' => $this->source,
                    'applied_at' => $this->applied_at,
                    'status' => $this->status,
                ]);

            $this->reset();
            $this->dispatch('refresh-table');
            ApplicationTableUpdated::dispatch();
            $this->dispatch('application-added');
            $this->dispatch('notify', message: 'Application created successfully.', type: 'success');
            $this->dispatch('close-modal');
                
                
            },
            // The "Catch" function
            function (\Exception $e) {
                Log::error('Save failed: ' . $e->getMessage());
                $this->addError('database', 'Something went wrong while saving.');
            }
        );
    }
    

    public function render()
    {
        return view('livewire.add-modal');
    }
}
