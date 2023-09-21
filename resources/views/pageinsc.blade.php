<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <title>Document</title>
</head>

<body>
    <form action="{{ route('register-insc') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <section class="h-100"
            style="
          background-image: linear-gradient(
            rgba(166, 255, 1, 0.808),
            rgb(81, 253, 81)
          );
        ">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem">
                            <div class="card-header bg-white border-bottom-0 h-50 container-sm">
                                <img src="{{ asset('images/recyclage.jpg') }}" alt="login form" class="card-img-top "
                                    style="border-radius: 1rem 1rem 1rem 1rem; height: 250px;" />
                                <div class="container mt-3">
                                    <h4>Pourquoi crèer un compte ?</h4>
                                    <p class="text-justify">
                                        Avoir un compte Recycle Plus est obligatoire pour
                                        rejoindre nos programmes gratuits. C'est ègalement un
                                        moyen pour vous de suivre vos collectes de dèchets, vos
                                        collectes de fonds mais aussi de connaître les dernières
                                        actualitès de Recycle Plus.
                                    </p>
                                </div>
                            </div>
                            <div class="container py-5">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="coordonnees-tab" data-toggle="tab"
                                            href="#coordonnees" role="tab" aria-controls="coordonnees"
                                            aria-selected="true">Coordonnées</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="compte-tab" data-toggle="tab" href="#compte"
                                            role="tab" aria-controls="compte" aria-selected="false">Informations de
                                            compte</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <!-- Coordonnées Section -->
                                    <div class="tab-pane fade show active" id="coordonnees" role="tabpanel"
                                        aria-labelledby="coordonnees-tab">
                                        <!-- Coordonnées section content -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">PRENOM et NOM</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg"
                                                    name="prenom" />
                                                <span class="text-danger">
                                                    @error('prenom')
                                                        {{ $message }}
                                                    @enderror
                                                </span>

                                                <input type="text" class="form-control form-control-lg"
                                                    name="nom" />
                                                <span class="text-danger">
                                                    @error('nom')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">ADRESSE</label>
                                            <input type="text" id="form2Example17"
                                                class="form-control form-control-lg" name="adresse" />
                                            <span class="text-danger">
                                                @error('adresse')
                                                    {{ $message }}
                                                @enderror
                                            </span>

                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">VILLE</label>
                                            <input type="text" id="form2Example27"
                                                class="form-control form-control-lg" name="ville" />
                                            <span class="text-danger">
                                                @error('ville')
                                                    {{ $message }}
                                                @enderror
                                            </span>

                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">CODE POSTAL</label>
                                            <input type="text" id="form2Example17"
                                                class="form-control form-control-lg" name="CP" />
                                            <span class="text-danger">
                                                @error('CP')
                                                    {{ $message }}
                                                @enderror
                                            </span>

                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">TELEPHONE</label>
                                            <input type="text" id="form2Example27"
                                                class="form-control form-control-lg" name="tel" />
                                            <span class="text-danger">
                                                @error('tel')
                                                    {{ $message }}
                                                @enderror
                                            </span>

                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">AGE</label>
                                            <input type="text" id="form2Example27"
                                                class="form-control form-control-lg" name="age" />
                                            <span class="text-danger">
                                                @error('age')
                                                    {{ $message }}
                                                @enderror
                                            </span>

                                        </div>
                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="form2Example27">SEXE</label>
                                            <select class="custom-select my-1 mr-sm-2 form-control-lg"
                                                id="inlineFormCustomSelectPref" name="gender">
                                                <option selected disabled>Choose...</option>
                                                <option value="Homme">Homme</option>
                                                <option value="Femme">Femme</option>
                                            </select>
                                            <span class="text-danger">
                                                @error('gender')
                                                    {{ $message }}
                                                @enderror
                                            </span>

                                        </div>
                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form2Example">PHOTO</label>
                                            <input type="file" name="photo" id="form2Example"
                                                class="form-control form-control-lg">
                                            <span class="text-danger">
                                                @error('photo')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Informations de compte Section -->
                                    <div class="tab-pane fade" id="compte" role="tabpanel"
                                        aria-labelledby="compte-tab">
                                        <!-- Informations de compte section content -->
                                        <div class="container mr-3">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2Example27">EMAIL</label>
                                                <input type="email" id="form2Example27"
                                                    class="form-control form-control-lg" name="email" />
                                                <span class="text-danger">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </span>

                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2Example17">MOT DE PASSE</label>
                                                <input type="password" id="form2Example17"
                                                    class="form-control form-control-lg" name="password" />
                                                <span class="text-danger">
                                                    @error('password')
                                                        {{ $message }}
                                                    @enderror
                                                </span>

                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2Example27">CONFIRMEZ VOTRE MOT DE
                                                    PASSE</label>
                                                <input type="password" id="form2Example27"
                                                    class="form-control form-control-lg" name="password1" />
                                                <span class="text-danger">
                                                    @error('password1')
                                                        {{ $message }}
                                                    @enderror
                                                </span>

                                            </div>
                                            <div class="form-outline mb-4">
                                                <div class="form-check">
                                                    <label class="form-check-label" for="check2">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="check2" name="check"
                                                            value="something" />Veuillez confirmer que vous êtes
                                                        âgé(e) de 18 ans ou
                                                        plus.
                                                    </label>
                                                    <span class="text-danger">
                                                        @error('check')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="pt-1 mb-4">
                                                <input class="btn btn-success btn-lg btn-block" type="submit"
                                                    value="CREER MON COMPTE" name="insert" />
                                            </div>
                                            <p class="" style="color: #000000">
                                                Vous avez dèjà un compte ?
                                                <a href="pagelogin" style="color: #393f81">Connectez ici</a>
                                            </p>
                                            <p class=" " style="color: #000000">
                                                <a class="small text-muted" href="pagepassword">Mot de passe
                                                    oublié?</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous"
                                            id="previous-button">
                                            Previous
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#compte" aria-label="Next" id="next-button">
                                            Next
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <script>
        // JavaScript function to switch to the "Informations de compte" tab when "Next" is clicked
        document.querySelector("#next-button").addEventListener("click", function () {
            document.querySelector("#compte-tab").click();
            document.querySelector("#previous-button").style.display = "block";
            document.querySelector("#next-button").style.display = "none";

        });

        // JavaScript function to switch back to the "Coordonnées" tab when "Previous" is clicked
        document.querySelector("#previous-button").addEventListener("click", function () {
            document.querySelector("#coordonnees-tab").click();
            document.querySelector("#previous-button").style.display = "none";
            document.querySelector("#next-button").style.display = "block";

        });
    </script>
</body>

</html>
