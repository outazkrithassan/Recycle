<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\Objets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Session;

class CustomAuthController extends Controller
{

    public function pageinsc () {
        return view('pageinsc');
    }
    public function pagelogin () {
        return view('pagelogin');
    }
    public function Modifierpassword(Request $request )
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:3|max:12',
            'password1' =>'required|same:password'

        ]);
        $user=new Users();
        $personne = Users::where('email','=', $request->email)->first();
        if (!$personne) {
            return redirect()->back()->with('error', 'User not found with the provided email.');
        }

        $personne->update([
            $personne->password = Hash::make($request->password)

        ]);

        return redirect('pagelogin')->with('success', 'User updated successfully.');
    }

    public function registerInsc(Request $request )
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'age'=>'required',
            'adresse'=>'required',
            'ville'=>'required',
            'gender'=>'required',
            'tel'=>'required',
            'CP'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3|max:12',
            'password1' =>'required|same:password',
            'photo' =>'required'

        ]);
        $personne=new Users();
        $personne->nom = $request->nom;
        $personne->prenom = $request->prenom;
        $personne->age = $request->age;
        $personne->adresse = $request->adresse;
        $personne->ville = $request->ville;
        $personne->gender = $request->gender;
        $personne->tel = $request->tel;
        $personne->CP = $request->CP;
        $personne->email = $request->email;
        $personne->password = Hash::make($request->password) ;
        if($request->hasFile('photo')) {
            $image = $request->file('photo')->store('uplodeUser','public');
            $personne->photo = $image;
        }
        $res=$personne->save();
        if($res){
            // return back()->with('success','You have registered successfuly');
            return redirect('pagelogin')->with('success', 'You have registered successfuly.');

        }else{
            return back()->with('fail','Something wrong');
        }
    }
    public function loginpersonne(Request $request)
    {
        $request->validate([

            'email'=>'required',
            'password'=>'required'
        ]);
        $personne = Users::where('email','=', $request->email)->first();
        if($personne){
            if (Hash::check($request->password,$personne->password))
            {
                $request->session()->put('personneId',$personne->id);
                return redirect('pageacceuil');

            } else {
                return back()->with('fail','Password not matches.');
            }


        }else{
            return back()->with('fail','The email is not registered.');
        }

    }
    public function pageacceuil(){

        $data= array();
        $ObjetData= Objets::all();
        if (Session::has('personneId')) {
            $data = Personnes::where('id','=', Session::get('personneId'))->first();
        }
        return view('pageacceuil',compact('data','ObjetData'));
    }
    public function pageprofaill()
    {
        $data= array();

        if (Session::has('personneId')) {
            $data = Personnes::where('id','=', Session::get('personneId'))->first();
            $ObjetData=Objets::where('id_persoone','=', $data->id)->get();
        }
        return view('pageprofaill',compact('data','ObjetData'));
    }
//     public function pageprofaill(Request $request, $id)
// {
//     $objet = Objets::findOrFail($id);
//     // Mettez à jour les champs ici
//     $objet->Titre = $request->Titre;
//     $objet->Categorie = $request->Categorie;
//     $objet->Description = $request->Description;
//     $objet->Date_Annonce =date('Y-m-d ', time());
//     $objet->Date_Recuperation = $request->Date_Recuperation;
//     $objet->Lieu_Recuperation = $request->Lieu_Recuperation;
//     $objet->Etet_Objet = $request->Etet_Objet;
//     // $objet->Image_Objet = $request->Image_Objet;
//     if ($request->hasFile('Image_Objet')) {
//         $image = $request->file('Image_Objet')->store('uplode','public');
//         $objet->Image_Objet = $image;
//     }
//     $objet->id_persoone = $request->id_personne;


//     $objet->save();

//     return redirect()->back()->with('success', 'Object updated successfully.');
// }
    public function pageajouter(){
        $data= array();

        if (Session::has('personneId')) {
            $data = Personnes::where('id','=', Session::get('personneId'))->first();
        }
        return view('pageajouter',compact('data'));
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
        $objet->id_persoone = $request->id_personne;

        $res=$objet->save();
        if($res){
            return redirect('pageacceuil');
        }else{
            return back()->with('fail','Something wrong');
        }

    }
}
