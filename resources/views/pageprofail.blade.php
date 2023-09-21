@extends('layout')

@section('title', 'Profail')

@section('content')
      <div class="panel panel-inf">
          <div class=" panel-heading h1 text-center">mes listes des Dechtes :</div>
          <hr>
          <!-- ?action=suppremeObjet&id_objet= -->
      </div>
      @if(Session::has('success'))
      <div class=" alert alert-success text-center">{{Session::get('success')}}</div> 
      @endif
      <div class="container mt-5">
          <div class="row">
              <div class="col-sm-7">
                  @foreach ($ObjetData as $ObjetDat)
                  <div class="card mb-3" id="{{ $ObjetDat->id }}">
                    
                        <div class="row g-0">
                            <div class="col-md-3 m-2">
                                <div class="position-relative" style="height: 100%;">
                                    <img src="{{ Storage::url($ObjetDat->Image_Objet) }}" class="img-fluid rounded-start h-100 w-100" alt="...">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $ObjetDat->Titre }}</h5>
                                    <p class="card-text">{{ $ObjetDat->Description }}.</p>
                                </div>
                            </div>
                            <div class="col-md-1 align-items-lg-center d-flex flex-column justify-content-center">
                                <button class="btn btn-warning me-2 editbtn" type="button" value="{{ $ObjetDat->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <form action="{{ route('delete-objet', $ObjetDat->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger mt-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet objet ?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                                
                            </div>
                        </div>
                </div>
                    @endforeach
                    
                </div>
            </div>
            <!-- Modale d'édition -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title align-items-center" id="editModalLabel">Éditer l'objet</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('update-objet')}}" method="POST" enctype="multipart/form-data">
                                @csrf 
                                @method('PUT')   
                                    <div class="modal-body">
                                        
                                        <div class="container mt-4 ">
                                            <div class="card w-75 mx-auto" style="background-image: linear-gradient(to bottom right, rgb(59, 255, 190), rgb(0, 157, 168));" >
                                                
                                                <div class="row">
                                                    <div class="col-sm-6">                       
                                                            <input type="file" class="form-control-file" name="Image_Objet" id="Image_Objet">
                                                            <span class="text-danger">@error('Image_Objet') {{$message}}   @enderror</span>                                           
                                                    </div>
                                                    <div class="col-sm-6 text-center">                                                  
                                                            <img src="" width="25%"  id="editimage" name="Image_Objet" >                                               
                                                    </div>
                                                  </div>
                                                <div class="card-body container">
                                                    <div class="row">
                                                        <div class="form-outline mb-4 col">
                                                        </div>
                                                        <div class="col">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id_objet" id="id_objet"  >

                                                    <div class="form-outline mb-4">
                                                        <label class="form-label" for="Titre">Titre de votre annonce :</label>
                                                        <input type="text" id="Titre" class="form-control form-control-lg" name="Titre" />
                                                        <span class="text-danger">@error('Titre') {{$message}}   @enderror</span>
                                                    </div>
                                    
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label" for="Categorie">Selectionner une categorir</label>
                                                        <select class="custom-select my-1 mr-sm-2 form-control-lg" id="Categorie" name="Categorie">
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
                                                        <label class="form-label" for="Description">Description de votre annonce</label>
                                                        <textarea name="Description" class="form-control" id="Description" rows="3"></textarea>
                                                        <span class="text-danger">@error('Description') {{$message}}   @enderror</span>
                                                    </div>
                                                    <div class="form-outline rows mb-4">
                                                        <label class="form-label">Quel est l'etat de votre objet </label>
                                                        <div class="ml-5">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label" for="radio1">
                                                                <input type="radio" class="form-check-input" name="Etet_Objet" id="Etet_Objet"  value="Trés bon état" required >Trés bon état
                                                                </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label" for="radio2">
                                                                <input type="radio" class="form-check-input" name="Etet_Objet" id="Etet_Objet"  value="état satisfaisant" required>état satisfaisant
                                                                </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="Etet_Objet" id="Etet_Objet" value="à réparer" required >à réparer
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger">@error('Etet_Objet') {{$message}}   @enderror</span>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label" for="Date_Recuperation">Date limite de recuperation</label>
                                                        <input type="date" id="Date_Recuperation" name="Date_Recuperation" class="form-control form-control-lg" />
                                                        <span class="text-danger">@error('Date_Recuperation') {{$message}}   @enderror</span>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label" for="Lieu_Recuperation">Lieu de recuperation</label>
                                                        <input type="text" id="Lieu_Recuperation" name="Lieu_Recuperation" class="form-control form-control-lg" />
                                                        <span class="text-danger">@error('Lieu_Recuperation') {{$message}}   @enderror</span>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        
                                                    </div>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                 
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

        
                </div>
            </div>

  
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $(document).on('click','.editbtn',function () {
            var cardId = $(this).val();
            // alert(cardId);
            $('#editModal').modal('show')
            $.ajax({
                url: "/edit-objet/" + cardId,
                type: "GET",
                success: function (response) {
                    // Remplissez la modale avec les données reçues
                    $('#id_objet').val(cardId); // Exemple
                    $('#Titre').val(response.objet.Titre); // Exemple
                    $('#Categorie').val(response.objet.Categorie); // Exemple
                    $('#Description').val(response.objet.Description); // Exemple
                    $('#Date_Recuperation').val(response.objet.Date_Recuperation); // Exemple
                    $('#Lieu_Recuperation').val(response.objet.Lieu_Recuperation); // Exemple
                    // $('#Etet_Objet').prop('checked', response.objet.Etet_Objet == 'Vrai');
                    $('input[name="Etet_Objet"][value="' + response.objet.Etet_Objet + '"]').prop('checked', true);
                    // $('#editimage').attr('src', response.objet.Image_Objet);
                    var imageUrl = '{{ Storage::url('') }}' + response.objet.Image_Objet;
                    $('#editimage').attr('src', imageUrl);
                    // Ouvrez la modale
                    $('.modal').show();
                    // console.log(response.objet.Image_Objet);
                    
                }
            });
        });
    });
    // $(document).ready(function () {
    //     $(document).on('click','.editbtn',function () {
    //         var cardId = $(this).val();
    //         $('#editModal').modal('show')
    //         $.ajax({
    //             url: "/edit-objet/" + cardId,
    //             type: "GET",
    //             success: function (response) {
                    
    //                 $('.modal').show();
                   
                    
    //             }
    //         });
    //     });
    // });
</script>

@endsection
