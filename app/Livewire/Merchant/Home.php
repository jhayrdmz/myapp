<?php

namespace App\Livewire\Merchant;

use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    #[Title('Home')] 
    public function render()
    {
        return view('livewire.merchant.home');
    }
}
