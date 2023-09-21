<nav class="navbar bg-light navbar-light navbar-expand-sm ">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('page-acceuil')}}" ><h1 class="text-success">RECY<span class="text-warning h5">CLAGE</span></h1></a>
        <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#myNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link"  href="{{route('page-ajouter')}}" >Donne un objet</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('message')}}">Messagerie <sup class="badge badge-danger"> {{ $unreadMessagesCount }} </sup></a></li>
                <li class="nav-item dropdown">
                    @if(session('personneId'))
                        @php
                            $loggedInPersonne = \App\Models\Users::find(session('personneId'));
                        @endphp
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                            {{-- {{ Auth::Users()->prenom }} {{ Auth::Users()->nom }} --}}
                            {{ $loggedInPersonne->prenom }} {{ $loggedInPersonne->nom }}
                        </a>
                    @endif
                    {{-- @auth --}}

                    {{-- @endauth --}}
                    <div class="dropdown-menu bg-light">
                        <a class="dropdown-item " href="{{route('page-profaill')}}">Profail</a>
                        <a class="dropdown-item " href="/">Déconnecter</a>
                    </div>
                </li>
            </ul>
        </div>

    </div>


</nav>
