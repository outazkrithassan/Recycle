

@extends('layout')

@section('title', 'INFORMATION DE OBJET ')

@section('content')
    @csrf
    <div class="container">
        @if(Session::has('success'))
        <div class=" alert alert-success text-center">{{Session::get('success')}}</div>
        @endif
        <div class="row mt-4">
        <div class="col-sm-5 mb-3">
        <div class="card">
            <img src="{{ Storage::url($objet->Image_Objet) }}" class=" p-2 rounded mx-auto d-block" width="25%" alt="">
            <div class="card-body">
                <h2 class="card-text">{{$objet->Titre}}</h2>
                <ul class="list-group list-group-horizontal ">
                    <li class="list-group mr-4"><p><i class="fas fa-medal"></i> {{$objet->Etet_Objet}}</p></li>
                    <li class="list-group"><p><i class="bi bi-calendar3"></i> Dispo jusqu au {{$objet->Date_Recuperation}}</p></li>
                </ul>
                <div class="border border-bottom-0 border-left-0 border-right-0 mt-3">
                    <p class="mt-2">
                    {{$objet->Description}}
                    </p>
                </div>
                <div class="text-right">
                    <ul class="list-group">
                        <li class="list-group"><p><i class="bi bi-map-marked"></i> {{$objet->Lieu_Recuperation}}</p></li>
                        <li class="list-group"><p><i class="bi bi-map-marked"></i> Annonce publiée le {{$objet->Date_Annonce}}</p></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div class="col-sm-4">
            <div class="card ">
                <div class="card-body ">
                    <ul class="list-group list-group-horizontal ">
                        <li class="list-group mr-4 text-center"><p><i class="bi bi-eye"></i> {{$objet->visitor_count}} Vue</p> </li>
                    </ul>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body text-center ">
                    <h5 class="card-title ">{{$objet->user->nom}} {{$objet->user->prenom}}</h5>
                    <p>{{$userObjetCount}} annonce désposée</p>

                </div>
                <div class="card-footer text-center">
                    <form action="{{route('message')}}" method="POST" class="form-inline">
                        @csrf
                        <input style="height:50px" type="text" value="{{$objet->user->id}}" name="reciever_id" id="reciever_id" class="hidden">
                        <input style="height:50px" type="text" value="{{$objet->id}}" name="objet_id" id="objet_id" class="hidden">
                        <input style="height:50px" type="text" name="content" id="inputField" class="hidden">
                        <input style="height:50px" type="submit" value="Envoye" id="submitButton" class=" hidden btn btn-success">
                    </form>
                    <i  class="btn btn-success justify-content-center mt-3" id="btndemende" >Le donneur a reçus trop de demandes</i>

                </div>
            </div>
        </div>
    </div>

    </div>


@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnDemende = document.getElementById('btndemende');
        const inputField = document.getElementById('inputField');
        const submitButton = document.getElementById('submitButton');

        btnDemende.addEventListener('click', function () {
            // Afficher les éléments cachés
            inputField.classList.remove('hidden');
            submitButton.classList.remove('hidden');
            btnDemende.style.display = "none";
        });
    });
</script>
@endsection
