@extends('layout')

@section('title', 'Ajouter un objet')

@section('content')
<form action="{{route('donner-ajouter')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container mt-4 ">
        <div class="card w-75 mx-auto" style="background-image: linear-gradient(to bottom right, rgb(59, 255, 190), rgb(0, 157, 168));" >
            <h3 class="mx-auto">Donner un objet</h3>
            @if(Session::has('success'))
            <div class=" alert alert-success">{{Session::get('success')}}</div> 
            @endif
            @if(Session::has('fail'))
            <div class=" alert alert-danger">{{Session::get('fail')}}</div> 
            @endif
            <div class="card-body container">
                <div class="form-outline mb-4">
                    @if(session('personneId'))
                        @php
                            $loggedInPersonne = \App\Models\Users::find(session('personneId'));
                        @endphp
                        <input type="hidden" name="id_personne" value="{{$loggedInPersonne->id}}">
                    @endif
                    <label class="form-label" for="form2Example17">Titre de votre annonce :</label>
                    <input type="text" id="form2Example17" class="form-control form-control-lg" name="Titre" />
                    <span class="text-danger">@error('Titre') {{$message}}   @enderror</span>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example27">Selectionner une categorir</label>
                    <select class="custom-select my-1 mr-sm-2 form-control-lg" id="inlineFormCustomSelectPref" name="Categorie">
                        <option selected disabled>Choose...</option>
                        <option value="Maison-decoration">Maison-decoration</option>
                        <option value="Electromenage">Electromenage</option>
                        <option value="Image-son">Image-son</option>
                        <option value="Informatique-telephone">Informatique-telephone</option>
                        <option value="Vitement-sacs">Vitement-sacs</option>
                        <option value="Brico-jardin">Brico-jardin</option>
                        <option value="Sports">Sports</option>
                        <option value="Jeux">Jeux</option>
                        <option value="Vehicules">Vehicules</option>
                    </select>
                    <span class="text-danger">@error('Categorie') {{$message}}   @enderror</span>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example27">Description de votre annonce</label>
                    <textarea name="Description" class="form-control" id="form2Example27" rows="3"></textarea>
                    <span class="text-danger">@error('Description') {{$message}}   @enderror</span>
                </div>
                <div class="form-outline rows mb-4">
                    <label class="form-label">Quel est l'etat de votre objet </label>
                    <div class="ml-5">
                        <div class="form-check-inline">
                            <label class="form-check-label" for="radio1">
                              <input type="radio" class="form-check-input" name="Etet_Objet" id="radio1"  value="Trés bon état" >Trés bon état
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label" for="radio2">
                              <input type="radio" class="form-check-input" name="Etet_Objet" id="radio2"  value="état satisfaisant">état satisfaisant
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="Etet_Objet" value="à réparer" >à réparer
                            </label>
                        </div>
                    </div>
                    <span class="text-danger">@error('Etet_Objet') {{$message}}   @enderror</span>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example17">Date limite de recuperation</label>
                    <input type="date" id="form2Example17" name="Date_Recuperation" class="form-control form-control-lg" />
                    <span class="text-danger">@error('Date_Recuperation') {{$message}}   @enderror</span>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example17">Lieu de recuperation</label>
                    <input type="text" id="form2Example17" name="Lieu_Recuperation" class="form-control form-control-lg" />
                    <span class="text-danger">@error('Lieu_Recuperation') {{$message}}   @enderror</span>
                </div>
                <div class="form-outline mb-4">
                    <label for="exampleFormControlFile1">Image de voter objet </label>
                    <input type="file" class="form-control-file" name="Image_Objet" id="exampleFormControlFile1">
                    <span class="text-danger">@error('Image_Objet') {{$message}}   @enderror</span>
                </div>
                <div class="pt-1 mb-4">
                    <input class="btn btn-success btn-lg btn-block" type="submit" value="Valide" />
                  </div>
        </div>
    </div>
</form>
 
@endsection