<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Buscar extends Component
{
    public $response;
    public $cep;

    protected $rules = [
        'cep' => 'digits:8',
    ];

    public function Buscar(Request $request)
    {
        $this->validate();

        $this->response = Http::get("viacep.com.br/ws/$this->cep/json/")->json();
        if (isset($this->response["uf"])) {
    //   dd($this->response);
            session(['cep' => $this->cep, 'response' => $this->response]);

        // Redirecionar para a próxima página
        
       
           return redirect()->route('address'); 
        } else {
            // Não faça nada com os outros campos
        }
    }
    
}