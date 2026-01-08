<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Contact extends Component
{
    #[Title('Contact Us - BoostwareTech Solutions')]
    public $name = '';
    public $email = '';
    public $message = '';

    public function submit()
    {
        // Placeholder for submission logic
        // Contact::create($this->validate(...));
        session()->flash('success', 'Message sent successfully!');
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
