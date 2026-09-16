<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ApplicationTable extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';
    public $perPage = 5;

    public function updatingSearch() {
        $this->resetPage(); 
    }
    public function updatingStatusFilter() {
        $this->resetPage(); 
    }
    public function updatingPerPage() {
        $this->resetPage(); 
    }

    public function clearFilters(){
        $this->reset(['search', 'statusFilter']);
        
        $this->resetPage();
    }

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
        $applications = Application::query()
            ->search($this->search)
            ->filterByStatus($this->statusFilter) //filter by status
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.application-table', [
            'applications' => $applications
        ]);
    }
}
