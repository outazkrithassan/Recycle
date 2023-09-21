@extends('layout')

@section('title', 'Messages')

@section('css')
    <style>
        .image-circle {
            background-color: #a8e6c0;
            color: #FFF;
            font-weight: bold;
            font-size: 20px;
            height: 60px;
            width: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection

@section('content')

    <div class="container mt-4">
        <div class="row">
            @php
                $array = [] ;
            @endphp
            @foreach ($objets as $objet)
            @if ( !in_array( $objet->objet->id , $array ) )
            @php
                $array[] =  $objet->objet->id ;
            @endphp
            <div class="col-6 mb-3">
                <div class="card">
                    <div class="card-header"> {{ $objet->objet->Titre }} </div>
                    <div class="card-body"> {{ $objet->objet->Description }} </div>
                    <div class="card-footer">
                        <a class="btn btn-success" href="{{ route('show-message' , [ "sender_id" => $id , 'objet_id' => $objet->objet->id  ] ) }}">Lire</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>
    </div>

@endsection
