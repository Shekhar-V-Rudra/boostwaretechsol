<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Services extends Component
{
    #[Title('Services - BoostwareTech Solutions')]
    public function render()
    {
        return view('livewire.services');
    }
}
