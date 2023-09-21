<?php

namespace App\Http\Controllers;
use App\Models\Objets;
use Illuminate\Http\Request;

class PageAjouterControleur extends Controller
{
    public function index()
    {
        return view('pageajouter');
    }
    public function donnerajouter(Request $request)
    {
        $request->validate([
           
            'Titre'=>'required',
            'Categorie'=>'required',
            'Description'=>'required',
            'Etet_Objet'=>'required',
            'Date_Recuperation'=>'required',
            'Lieu_Recuperation'=>'required',
            'Image_Objet' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048'     
        ]);
        $objet=new Objets();
        $objet->Titre = $request->Titre;
        $objet->Categorie = $request->Categorie;
        $objet->Description = $request->Description;
        $objet->Date_Annonce =date('Y-m-d ', time());
        $objet->Date_Recuperation = $request->Date_Recuperation;
        $objet->Lieu_Recuperation = $request->Lieu_Recuperation;
        $objet->Etet_Objet = $request->Etet_Objet;
        // $objet->Image_Objet = $request->Image_Objet;
        if ($request->hasFile('Image_Objet')) {
            $image = $request->file('Image_Objet')->store('uplode','public');    
            $objet->Image_Objet = $image;
        }
        $objet->user_id = $request->id_personne;

        $res=$objet->save();
        if($res){
            return redirect('pageacceuil')->with('success', 'L\'objet a été ajouter avec succès.');            
        }else{
            return back()->with('fail','Something wrong');
        }
       
    }
}
