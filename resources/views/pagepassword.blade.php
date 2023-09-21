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
    <link rel="shortcut icon" type="image/jpg" href="photoDN/icon.png" />
    <title>Document</title>
</head>

<body>
    <form action="{{ route('modifier-passeword') }}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="h-100"
            style="
          background-image: linear-gradient(
            rgba(10, 255, 1, 0.801),
            rgb(3, 117, 3)
          );">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem">
                            <div class="row g-0">
                                <div class="col-md-7 col-lg-5 d-none d-md-block">
                                    <img src="{{ asset('images/recyclage.jpg') }}" alt="login form"
                                        class="img-fluid h-75" style="border-radius: 1rem 0 0 1rem" />
                                </div>
                                <div class="col-md-5 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">
                                        <div class="d-flex align-items-center mb-3 pb-1 justify-content-center">
                                            <h1 class="text-center">Recycle</h1>
                                            <span class="h4 fw-bold mb-0">Plus</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px">
                                            Rèinitialiser le mot de passe
                                        </h5>

                                        <div class="form-outline mb-4">
                                            @if (session('success'))
                                                <div class="alert alert-success">{{ session('success') }}</div>
                                            @endif
                                            @if (session('error'))
                                                <div class="alert alert-danger">{{ session('error') }}</div>
                                            @endif
                                            <span class="text-danger">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            <input type="email" id="form2Example17"
                                                class="form-control form-control-lg" name="email" />
                                            <label class="form-label" for="form2Example17">Adresse e-mail</label>
                                        </div>


                                        <div class="form-outline mb-4">
                                            <span class="text-danger">
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </span>

                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-lg" name="password" />
                                            <label class="form-label" for="form2Example27">Mot de passe</label>
                                        </div>
                                        <div class="form-outline mb-4">

                                        </div>
                                        <div class="form-outline mb-4">

                                        </div>
                                        <div class="form-outline mb-4">

                                        </div>
                                        <div class="form-outline mb-4">
                                            <span class="text-danger">
                                                @error('password1')
                                                    {{ $message }}
                                                @enderror
                                            </span>

                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-lg" name="password1" />
                                            <label class="form-label" for="form2Example27">Confirmer Mot de
                                                passe</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <input class="btn btn-success btn-lg btn-block" type="submit"
                                                value="Reinitialiser" name="Modifier" />
                                        </div>

                                        <p class="" style="color: #000000">
                                            Vous avez dèjà un compte ?
                                            <a href="pagelogin" style="color: #393f81">Connectez ici</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>

</html>
