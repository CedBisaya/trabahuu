<?php

namespace App\Livewire;

use Livewire\Component;

class AddModal extends Component
{

    public $show = false;

    public function render()
    {
        return view('livewire.add-modal');
    }
}
