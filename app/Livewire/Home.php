<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Home extends Component
{
    #[Title('Home - BoostwareTech Solutions')]
    public function render()
    {
        return view('livewire.home');
    }
}
