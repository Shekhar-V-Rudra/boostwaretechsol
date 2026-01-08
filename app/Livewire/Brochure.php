<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Brochure extends Component
{
    #[Title('Corporate Brochure - BoostwareTech Solutions')]
    public function render()
    {
        return view('livewire.brochure');
    }
}
