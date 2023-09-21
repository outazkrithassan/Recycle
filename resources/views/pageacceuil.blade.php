@extends('layout')

@section('title', 'Acceuil')

@section('content')
@if(Session::has('success'))
<div class=" alert alert-success text-center">{{Session::get('success')}}</div> 
@endif
@if(Session::has('fail'))
<div class=" alert alert-danger text-center">{{Session::get('fail')}}</div> 
@endif
<div class="row container mt-4 mx-auto"> 
 
  @foreach ($ObjetData as $ObjetDat)                                                         
  <div class="col-md-3 col-sm-7">
    <a class="card text-body text-decoration-none mb-3 " href="{{route('page-info' , [ "id" => $ObjetDat->id])  }}"  >
      <div class="card-header"" > 
        <img src="{{ Storage::url($ObjetDat->Image_Objet) }}" class="card-img" style="height: 200px; background-color: rgba(255,0,0,0.1);""/>
      </div>
      <div class="card-body">
        <h5 id="titel" class="card-title">{{ $ObjetDat->Titre }}</h5>
        <p id="desc" class="card-text">{{ $ObjetDat->Description }}</p>
      </div>                      
    </a>
  </div>    
  @endforeach  
</div>
@endsection