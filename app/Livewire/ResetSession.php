<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ResetSession extends Component
{
    public function ResetSession(Request $request)
    {
       // return view('livewire.reset-session');
      $request->session()->forget(['cep', 'response']);
      
      return redirect()->route('address');
    }
}
