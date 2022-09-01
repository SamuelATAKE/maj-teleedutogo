<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tableau de Bord TeleEduTogo | Connexion</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles --><!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}" />
    <link rel="stylesheet" href="{{asset('css/admin_base_style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/css_global.css')}}" />
    <link rel="stylesheet" href="{{asset('css/custom_admin_style.css')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  {{-- <img src="{{asset('images/logo.svg')}}"> --}}
                </div>
                <h4>Bienvenu cher administrateur</h4>
                <h6 class="font-weight-light">Connectez-vous pour continuer.</h6>
                <form class="pt-3" action="{{route('login.admin')}}" method="POST">
                    @csrf
                    @method('post')
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Adresse mail" value="{{old('email')}}" >
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Mot de passe" value="{{old('password')}}" >
                  </div>
                  <div class="mt-3">
                    <button  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Connexion</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Me garder connecté </label>
                    </div>
                    <a href="#" class="auth-link text-black">Mot de passe oublié?</a>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Vous n'avez pas de compte? <a href="{{route('inscription')}}" class="text-primary">Créer</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/misc.js')}}"></script>
    <!-- endinject -->
  </body>
</html>
