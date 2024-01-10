<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Address;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request,Address $Address,User $user): View
    {
     
      
   $idUser = $request->user()->id;
   $ads = $Address->where('user_id', $idUser)->get();
        return view('profile.edit', [
            'user' => $request->user(),
            'ads' => $ads
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request,Address $ads): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        $id = Auth::id();
     $tes = $ads->where('user_id',$id)->delete();
    
        Auth::logout();
        
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function addresDelete(Request $r,Address $ads){
    
  
     $ads->findOrFail($r->input('id'))->delete();
     return Redirect::to('/profile')->with(['status'=>'Endereço apagado']);
     
    }
    public function addresEdit(Request $r,Address $ads){
    $r->validate([
        'rua' => ['required','string','max:255'],
        'numero'=>['required','numeric'],
        'bairro'=>['required','string','max:255'],
        'cidade'=>['required','string','max:255'],
        'estado'=>['required','string','max:2'],
        'cep' =>['required','numeric','max:99999999'] 
        ]);
    
    $cepI = $r->input('cep');
     $response = Http::get("viacep.com.br/ws/$cepI/json/")->json();
     
     if(isset($response['cep'])){
      
      $id = $r->input('id');
      $rua = $response['logradouro'];
      $bairro = $response['bairro'];
      $estado = $response['uf'];
      $cidade = $response['localidade'];
      $cep = $response['cep']; 
      $numero = $r->input('numero');
    $upd=$ads->where('id',$id)->update([
         'rua'=>$rua,
        'numero'=>$numero,
        'bairro'=>$bairro,
        'cidade'=>$cidade,
        'estado'=>$estado,
        'cep'=>$cep,
        ]);
      return Redirect::to('/profile')->with(['edited'=>'Endereço editado com sucesso']);
    }else {
      return Redirect::to('/profile')->with(['cepi'=>'Seu cep Não existe']);
      die();
    }
      
    }
}
