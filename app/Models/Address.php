<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\belongsTo;
class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'user_id'
    ];
    protected $hidden = [
        'numero',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
