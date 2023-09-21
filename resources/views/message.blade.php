@extends('layout')

@section('title', 'Messages')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection
@section('content')

    {{-- <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Conversation for the item :</div>
                    <div class="card-body height3">
                        <ul class="chat-list">
                            @php
                                $currentUser = session('personneId') ;
                            @endphp
                            @foreach ($messages as $message)
                                <li class=" {{  $currentUser == $message->sender->id ? 'out' : 'in'   }} ">
                                    <div class="chat-img">
                                        <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-message">
                                            <h5 id="NOM"> {{ $message->sender->nom . ' ' . $message->sender->prenom }} </h5>
                                            <p id="CONTENT"> {{ $message->content }} </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach


                            <!-- Add more chat messages with product names as needed -->
                        </ul>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('send-response') }}" method="post">
                            @csrf
                            <input type="hidden" name="reciever_id" value="{{ $sender_id }}">
                            <input type="hidden" name="objet_id" value="{{ $objet_id }}">
                            <textarea name="reponse"  class="form-control" placeholder="Write message ...."></textarea>
                            <button class="btn btn-success mt-2">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <div id="app">

        <message-component :objet={{ $objet_id }} :sender={{ $sender_id }}  :user={{ session('personneId') }} ></message-component>
    </div>

@endsection
