<?php

namespace App\Livewire\Merchant;

use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('merchant.livewire.home')
            ->title('Home');
    }
}
