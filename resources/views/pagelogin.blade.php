<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"
    />
    <title>Document</title>
  </head>
  <body>
    <form action="{{route('login-personne')}}" method="post" >
      @csrf
      <section
        class="h-100"
        style="
          background-image: linear-gradient(
            rgba(10, 255, 1, 0.801),
            rgb(3, 117, 3)
          );
        "
      >
        <div class="container py-5 h-100">
          <div
            class="row d-flex justify-content-center align-items-center h-100"
          >
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img
                      src="{{ asset('images/recyclage.jpg') }}"
                      alt="login form"
                      class="img-fluid"
                      style="border-radius: 1rem 0 1rem 0 "
                    />
                    <div class="container">
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
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
                      <div
                        class="d-flex align-items-center mb-3 pb-1 justify-content-center"
                      >
                        <h1 class="text-center">Recycle</h1>
                        <span class="h4 fw-bold mb-0">Plus</span>
                      </div>
                      @if(Session::has('success'))
                      <div class=" alert alert-success">{{Session::get('success')}}</div>
                      @endif
                      @if(Session::has('fail'))
                      <div class=" alert alert-danger">{{Session::get('fail')}}</div>
                      @endif

                      <h5
                        class="fw-normal mb-3 pb-3"
                        style="letter-spacing: 1px"
                      >
                        Connectez-vous à votre compte
                      </h5>

                      <div class="form-outline mb-4">
                        <span class="text-danger">@error('email') {{$message}}   @enderror</span>
                        <input
                          type="text"
                          name="email"
                          id="form2Example17"
                          class="form-control form-control-lg"
                          value="{{old('email')}}"
                        />
                        <label class="form-label" for="form2Example17"
                          >Adresse e-mail</label
                        >
                      </div>

                      <div class="form-outline mb-4">
                        <span class="text-danger">@error('password') {{$message}}   @enderror</span>

                        <input
                          type="password"
                          name="password"
                          id="form2Example27"
                          class="form-control form-control-lg"
                        />
                        <label class="form-label" for="form2Example27"
                          >Mot de passe</label
                        >
                      </div>

                      <div class="pt-1 mb-4">
                        <button
                          class="btn btn-success btn-lg btn-block"
                          name="valide"
                          type="submit"
                        >
                          Connexion
                        </button>
                      </div>

                      <a class="small text-muted" href="pagepassword"
                        >Mot de passe oublié?</a
                      >
                      <p class="mb-5 pb-lg-2" style="color: #000000">
                        Vous n'avez pas de compte ?
                        <a href="pageinsc" style="color: #393f81"
                          >Inscrivez-vous ici</a
                        >
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
