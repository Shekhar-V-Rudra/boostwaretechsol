<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Portfolio extends Component
{
    #[Title('Portfolio - BoostwareTech Solutions')]
    public function render()
    {
        return view('livewire.portfolio');
    }
}
