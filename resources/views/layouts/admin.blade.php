<!--
  ----Liste des yields----
title : pour le titre de la page
style : pour les css
content_title : pour le titre du contenu de la page (similaire à title mais sera dans la top bar de la page)
content : pour le contenu de la page
script : pour l'inclusion de scripts

  ----Aide à l'implémentation----
@section('title')@endsection
@section('style')@endsection
@section('content_title')@endsection
@section('content')@endsection
@section('script')@endsection
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->

    <link rel="stylesheet" href="{{asset('css/admin_base_style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/css_global.css')}}" />
    <link rel="stylesheet" href="{{asset('css/custom_admin_style.css')}}" />
    <!-- <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" /> -->

    @yield('style')
    @yield('head_script')
  </head>
  <body class="admin_page_body">
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="../../index.html">
            <img src="{{asset('images/text_teleedutogo.svg')}}" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="{{asset('images/text_teleedutogo.svg')}}" alt="logo" /></a>
          <!-- mini logo à placer ci dessus -->
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">@yield('content_title')</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <form class="search-form d-none d-md-block" action="#">
              <i class="icon-magnifier"></i>
              <input type="search" class="form-control" placeholder="Rechercher" title="Recherche">
            </form>
            <!-- <li class="nav-item"><a href="#" class="nav-link"><i class="icon-basket-loaded"></i></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chart"></i></a></li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="icon-speech"></i>
                <span class="count">7</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                  <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../../images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../../images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../../images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown language-dropdown d-none d-sm-flex align-items-center">
              <a class="nav-link d-flex align-items-center dropdown-toggle" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="d-inline-flex mr-3">
                  <i class="flag-icon flag-icon-us"></i>
                </div>
                <span class="profile-text font-weight-normal">English</span>
              </a>
              <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-us"></i> English </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-fr"></i> French </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-ae"></i> Arabic </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-ru"></i> Russian </a>
              </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="../../images/faces/face8.jpg" alt="Profile image"> <span class="font-weight-normal"> Henry Klein </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="../../images/faces/face8.jpg" alt="Profile image">
                  <p class="mb-1 mt-3">Allen Moreno</p>
                  <p class="font-weight-light text-muted mb-0">allenmoreno@gmail.com</p>
                </div>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-energy text-primary"></i> Activity</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-question text-primary"></i> FAQ</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li> -->
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <!-- <img class="img-xs rounded-circle" src="../../images/faces/face8.jpg" alt="profile image"> -->
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Admin Admin</p>
                  <p class="designation">Administrateur</p>
                </div>
                <!-- <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div> -->
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.index')}}">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Gestion des ressources</span></li>
            <li class="nav-item">
              <a href="{{route('ressources.index')}}" class="nav-link">
                <span class="menu-title">Liste des ressources</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('ressources.add')}}" class="nav-link">
                <span class="menu-title">Ajouter une ressource</span>
                <i class="icon-plus menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <span class="menu-title">Retirer une ressource</span>
                <i class="icon-minus menu-icon danger"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <span class="menu-title">Modifier une ressource</span>
                <i class="icon-pencil menu-icon danger"></i>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">deroulant</span>
                <i class="icon-plus menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a></li>
                </ul>
              </div>
            </li> -->
            <li class="nav-item nav-category"><span class="nav-link">Activités utilisateurs</span></li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#users-bring" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Apports<div class="inline-dot-indicator bg-danger"></div></span>
                <i class="icon-arrow-down menu-icon"></i>
              </a>
              <div class="collapse" id="users-bring">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contributions<div class="nav-link-dot-indicator bg-danger"></div></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Postulats répétition</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#users-management" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Gestion Utilisateurs<div class="inline-dot-indicator bg-danger"></div></span>
                <i class="icon-arrow-down menu-icon"></i>
              </a>
              <div class="collapse" id="users-management">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="#">Elèves</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Enseignants<div class="nav-link-dot-indicator bg-danger"></div></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="">Parents</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Gestion entités</span></li>
            <li class="nav-item">
                <a href="{{route('admin.cycles')}}" class="nav-link">
                    <span class="menu-title">Cycles</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.series')}}" class="nav-link">
                    <span class="menu-title">Séries</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.classes')}}" class="nav-link">
                    <span class="menu-title">Classes</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.matieres')}}" class="nav-link">
                    <span class="menu-title">Matières</span>
                </a>
            </li>

          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @yield('content')
            <!--
              ---------------------------------
              ---------------------------------
              ---------------------------------
              Page content
              ---------------------------------
              ---------------------------------
              ---------------------------------
              ---------------------------------
              ---------------------------------
              ---------------------------------
              Page content
              ---------------------------------
              ---------------------------------
              ---------------------------------
              ---------------------------------
              ---------------------------------
              ---------------------------------
              Page content
              ---------------------------------
              ---------------------------------
              ---------------------------------
              ---------------------------------
              ---------------------------------
              ---------------------------------
              Page content
              ---------------------------------
              ---------------------------------
              ---------------------------------
              ---------------------------------
              ---------------------------------
              ---------------------------------
              Page content
              ---------------------------------
              ---------------------------------
              ---------------------------------
            -->
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © TeleEduTogo 2022</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
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
    @yield('script')
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>
