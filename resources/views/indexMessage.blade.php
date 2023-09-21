@extends('layout')

@section('title', 'Messages')

@section('css')
    <style>
        .image-circle {
            background-color: #a8c3e6;
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
        a {
            color: inherit !important ;
        }
    </style>
@endsection

@section('content')

    <div class="container mt-4">
        @if ($distinctSenders->count() > 0)
        <div class="row">
            @foreach ($distinctSenders as $index => $message)
                 <div class="row m-sm-auto w-75">
            <div class="col-12 mb-3">
                <a href="{{ route('objet-message' , ['id' => $message->sender->id ] ) }}" class="card text-decoration-none">
                    <div class="card-body bg-light d-flex align-items-center g-2">
                        <div class="d-flex align-items-center">
                            <div class="image-circle">AO</div>
                            <div class="name mx-2 text-capitalize">
                                {{ $message->sender->prenom.' '. $message->sender->nom }}
                            </div>
                        </div>
                        <span class="badge badge-danger">{{ $messageNumber[$index] }}</span>
                    </div>
                </a>
            </div>
         </div>
            @endforeach
        </div>
        @else
        <div class="alert alert-info">Pas de message a ce moment la !</div>
         @endif



    </div>

@endsection
