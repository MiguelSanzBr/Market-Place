<?php

namespace App\Policies;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddressPolicy
{
   public function authorize(User $user)
{
    $count = $user->addresses->count();
  
    return $count < 2;
}

}
