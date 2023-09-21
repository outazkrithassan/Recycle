<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public function objets() {
        return $this->hasMany(Objets::class); // Relation inverse

    }
    public function messages()
    {
        return $this->hasMany(Message::class,'sender_id');
    }

    public function FunctionName(){

    }

    protected $fillable = [
            'nom', 'prenom', 'age', 'adresse', 'ville', 'gender', 'tel', 'CP', 'email', 'password'
        ];
}
