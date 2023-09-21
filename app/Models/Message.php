<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function reciever() {
        return $this->belongsTo(Users::class , "reciever_id"); // Relation inverse
        
    }

    public function sender() {
        return $this->belongsTo(Users::class , "sender_id"); // Relation inverse
        
    }

    public function objet() {
        return $this->belongsTo(Objets::class , "objet_id"); // Relation inverse
        
    }
}
