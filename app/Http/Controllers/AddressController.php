<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AddressController extends Controller
{
   public function create(Request $r)
   {
      
 //  $this->authorize('authorize',Address::class);
      return view('profile.address');
    }
    public function store(Request $r,Address $ads){
      $r->validate([
        'Rua' => ['required','string','max:255'],
        'Numero'=>['required','numeric'],
        'Bairro'=>['required','string','max:255'],
        'Cidade'=>['required','string','max:255'],
        'Estado'=>['required','string','max:2'],
        'Cep' =>['required','numeric','max:99999999'] 
        ]);
       $userId = Auth::id(); 
        
          $address = Address::create([
            'rua' => $r->Rua,
            'numero' => $r->Numero,
            'bairro' => $r->Bairro,
            'cidade' => $r->Cidade,
            'estado' => $r->Estado,
            'cep' => $r->Cep,
            'user_id' => $userId
              ]);
             return Redirect('/profile')->with(['new'=>'Seu novo Endereço foi cadastrado']);
    }
}
