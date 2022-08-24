<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Google-font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=New+Tegomin&family=Lexend&family=RocknRoll+One&family=Kiwi+Maru&family=Caladea&family=B612+Mono&display=swap" rel="stylesheet">
	<!-- Icons -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<!-- Ressources globales -->
	<link rel="stylesheet" href="{{asset('css/css_global.css')}}">
	<!-- Ressources liée à la page -->
	<link rel="stylesheet" href="{{asset('css/navbar.css')}}">
	@yield('style')
	<title>@yield('title') | TELEEDUTOGO</title>
</head>

<body>

<div>
        <nav class="top_bar">
            <div class="top_bar_content">
                <div id="nav_logo_place">
                    <a href="{{route('home')}}"><img src="{{asset('images/text_teleedutogo.png')}}" alt="teleedutogo"></a>
                </div>
                <div id="links_place">
                    <div class="quick_links only-pc-850">
                        <!-- non connecté -->
                        <ul type=none class="topbar_links ">
                            @if (!session('user'))
                                <li><a href="{{route('connexion')}}">Connexion</a></li>
                                <li><a href="{{route('inscription')}}">Inscription</a></li>
                            @endif

                        </ul>
                        <!-- connecté -->
                        <ul type = none class="topbar_links not_display">
                            <li><a href="">Pour moi</a></li>
                            <li><a href="{{route('primaire')}}">Primaire</a></li>
                            <li><a href="{{route('college')}}">Collège</a></li>
                            <li><a href="{{route('lycee')}}">Lycée</a></li>
                        </ul>
                    </div>
                    <div class="bouton_affich_menu flex_row_wrap"
                    onclick="document.querySelector('.sidebar').classList.toggle('active');
                    this.classList.toggle('active')"
                    >
                        <p class="">MENU</p>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="sidebar soft_scrool-bar">
            <!-- Sera organisé en liens groupés -->
            <div class="groupe_liens flex_column">
                <p class="titre_groupe">Accueil&Connexion</p>
                <ul class="liste_liens flex_column">
                    <li>
                        <a href="{{route('home')}}" title="Acceuil" class="lien">
                            <span class='bx bx-home'></span>
                            <span class="link_name">Accueil</span>
                        </a>
                    </li>
                    @if(!session('user'))
                       <li>
                            <a href="{{route('connexion')}}" title="Connexion" class="lien">
                                <span class='bx bx-log-in'></span>
                                <span class="link_name">Connexion</span>
                            </a>
                        </li>
						<li>
                            <a href="{{route('inscription')}}" title="Inscription" class="lien">
                                <span class='bx bx-edit-alt'></span>
                                <span class="link_name">Inscription</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
            <hr class="nav_hr">
            <div class="groupe_liens flex_column not_display">
                <p class="titre_groupe">Parcourir</p>
                <ul class="liste_liens">
                    <li>
                        <a href="{{route('primaire')}}" title="Primaire" class="lien">
                            <span class='bx bxs-graduation'></span>
                            <span class="link_name">Primaire</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('college')}}" title="Collège" class="lien">
                            <span class='bx bxs-graduation'></span>
                            <span class="link_name">Collège</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('lycee')}}" title="Lycée" class="lien">
                            <span class='bx bxs-graduation'></span>
                            <span class="link_name">Lycée</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Forum" class="lien">
                            <span class='bx bx-conversation'></span>
                            <span class="link_name">Forum</span>
                        </a>
                    </li>
                </ul>
            </div>
            <hr class="nav_hr">
            <div class="groupe_liens flex_column">
                <p class="titre_groupe">S'exercer</p>
                <ul class="liste_liens">
                    <li>
                        <a href="{{route('concours')}}" title="Concours" class="lien">
                            <span class='bx bx-pencil'></span>
                            <span class="link_name">Concours</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('examens')}}" title="Examens" class="lien">
                            <span class='bx bx-file'></span>
                            <span class="link_name">Examens</span>
                        </a>
                    </li>
                </ul>
            </div>
            <hr class="nav_hr">
            <div class="groupe_liens flex_column">
                <p class="titre_groupe">Découvrir</p>
                <ul class="liste_liens">
                    <li>
                        <a href="#" title="Apprendre +" class="lien">
                            <span class='bx bx-plus'></span>
                            <span class="link_name">Apprendre +</span>
                        </a>
                    </li>
                </ul>
            </div>
            <hr class="nav_hr">
            <div class="groupe_liens flex_column">
                <p class="titre_groupe">Autres</p>
                <ul class="liste_liens">
                    <li>
                        <a href="#" title="Contacter" class="lien">
                            <span class='bx bxs-contact'></span>
                            <span class="link_name">Nous contacter</span>
                        </a>
                    </li>
                    @if(session('user'))
                        <li>
                            <a href="{{route('logout')}}" title="Déconnexion" class="lien">
                                <span class='bx bx-log-out'></span>
                                <span class="link_name">Déconnexion</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
        </nav>
    </div>

	<header class="little-blade_head">
		<h1>@yield('h1')</h1>
		<p class="context">@yield('context')</p><!-- Pour les pages ayant un context comme les séries -->
		<p class="description">@yield('page_description')</p>
	</header>
	<hr>
    @yield('content')

    @yield('script')
</body>
</html>
