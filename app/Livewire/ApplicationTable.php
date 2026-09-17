<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads; 
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ApplicationsImport;
use Livewire\WithPagination;

class ApplicationTable extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $statusFilter = '';
    public $perPage = 5;
    public $excelFile;

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

    public function updatedExcelFile()
    {
        $this->validate([
            'excelFile' => 'required|file|mimes:xlsx,xls,csv|max:10240',
        ]);

        // Run the import magic
        Excel::import(new ApplicationsImport, $this->excelFile);

        // Clear the file from Livewire's temporary storage
        $this->reset('excelFile');

        // Optional: Trigger a success notification or refresh the table
        $this->dispatch('notify', message: 'Data imported successfully!', type: 'success');
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
