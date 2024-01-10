<?php

namespace App\Livewire;

use Livewire\Component;

class Nav extends Component
{
    public function render()
    {
        return view('livewire.nav');
    }
    public function submit()
{
    auth()->logout();
    return redirect()->to('/');
}
    public function login(){
      return redirect()->to('/register');
    }
}
