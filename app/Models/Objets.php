<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Objets extends Model
{
    public function user() {
        return $this->belongsTo(Users::class); // Relation de clé étrangère
    }


    public function message() {
        return $this->hasMany(Message::class) ;
    }



    public static function boot() {
        parent::boot();

        // Supprime l'image associée lorsque l'objet est supprimé
        static::deleting(function($objet) {
            if ($objet->Image_Objet) {
                Storage::delete($objet->Image_Objet);
            }
        });
    }
}
