<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Objets;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Session;
class PageAcceuilControleur extends Controller
{
    // public function Home()
    // {
    //     return view('pageacceuil');
    // }
    public function pageacceuil(){

        $data= array();
        $ObjetData= Objets::all();
        if (Session::has('personneId')) {
            $data = Users::where('id','=', Session::get('personneId'))->first();
        }
        return view('pageacceuil',compact('data','ObjetData'));
    }
    // public function Home(){

    //     $data= array();
    //     $ObjetData= Objets::all();
    //     if (Session::has('personneId')) {
    //         $data = Personnes::where('id','=', Session::get('personneId'))->first();
    //     }
    //     return view('pageacceuil',compact('data','ObjetData'));
    // }
}
