<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Careers extends Component
{
    #[Title('Careers - BoostwareTech Solutions')]
    public function render()
    {
        return view('livewire.careers');
    }
}
