<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Users;
use App\Models\Objets;
use Illuminate\Http\Request;
use Session;
class PageProfaliControleur extends Controller
{
    public function index()
    {
        return view('pageprofail');
    }
    public function pageprofaill()
    {
        $data= array();
        
        if (Session::has('personneId')) {
            $data = Users::where('id','=', Session::get('personneId'))->first();
            $ObjetData=Objets::where('user_id','=', $data->id)->get();
        }
        return view('pageprofail',compact('data','ObjetData'));
    }
    public function editobjet($id){
        $objet = Objets::find($id);
         return response()->json([
            'status'=>200,
            'objet'=>$objet,
        ]);
    }
    public function Update(Request $request){
        $objet = Objets::find($request->id_objet);
    
    // Mettez à jour les autres champs
    $objet->Titre = $request->Titre;
    $objet->Categorie = $request->Categorie;
    $objet->Description = $request->Description;
    $objet->Date_Annonce =date('Y-m-d ', time());
    $objet->Date_Recuperation = $request->Date_Recuperation;
    $objet->Lieu_Recuperation = $request->Lieu_Recuperation;
    $objet->Etet_Objet = $request->Etet_Objet;
    // Gérez la mise à jour de l'image
        if ($request->hasFile('Image_Objet')) {
        // Supprimez l'ancienne image si nécessaire
            if ($objet->Image_Objet) {
                Storage::disk("public")->delete($objet->Image_Objet);
            }
            $image = $request->file('Image_Objet')->store('uplode','public');    
            $objet->Image_Objet = $image;
        }

    // Enregistrez les modifications
        $objet->update();

        return redirect('pageprofail')->with('success', 'L\'objet a été mis à jour avec succès.');

       
    }
    public function delate($id)
    {
    // dd($id);
    $objet = Objets::findOrFail($id);
    if ($objet->Image_Objet) {
        Storage::disk("public")->delete($objet->Image_Objet);
    }
    // Supprimez l'objet
    $objet->delete();
    
    return redirect('pageprofail')->with('success', 'L\'objet a été supprimé avec succès.');
    }
}
