@extends('layouts.default')

@section('style')
<link rel="stylesheet" href="{{asset('css/index-css.css')}}">
@endsection


@section('content')
<!-- header -->
<header class="full-screen banniere-acceuil">
    <div class="slogan-accroche">
        <h1>TELEEDUTOGO</h1>
        <p class="accroche">
        Le réseau togolais qui rassemble <strong class="">Elèves</strong>, <strong class="">Enseignants</strong>, <strong class="">Parents d'élèves</strong>.
        </p>
    </div>
    <div class="poster-container">
        <div class="banniere-poster left-poster">
            <p class="poster-message">
                Enseignant
            </p>
            <ul class="poster-message-list">
                <li>Faites vous connaitre</li>
                <li>Partagez vos connaissances</li>
                <li>Rapprochez vous des parents d'élèves</li>
            </ul>
            <picture class="cadre-image-poster">
                <source srcset="{{asset('images/professeur-devant-tableau.png')}}">
                <img src="{{asset('images/professeur-devant-tableau.png')}}" alt="Un professeur devant un tableau" class="poster-image"/>
            </picture>
        </div>
        <div class="banniere-poster center-poster">
            <p class="poster-message">
                Elève
            </p>
            <ul class="poster-message-list">
                <li>Trouve des ressources de cours</li>
                <li>Exerce-toi </li>
                <li>Participe activement à la croissance de la plateforme</li>
            </ul>
            <picture class="cadre-image-poster">
                <source srcset="{{asset('images/eleves-devant-casiers.png')}}">
                <img src="{{asset('images/eleves-devant-casiers.png')}}" alt="" class="poster-image" />
            </picture>
        </div>
        <div class="banniere-poster right-poster">
            <p class="poster-message">
                Parent d'élève
            </p>
            <ul class="poster-message-list">
                <li>Assistez les révisions de vos enfants à la maison</li>
                <li>Prenez contact avec des professeurs</li>
                <li>Soutenez vos enfants dans leurs études</li>
            </ul>
            <picture class="cadre-image-poster">
                <source srcset="{{asset('images/mere-avec-sa-fille.png')}}">
                <img src="{{asset('images/mere-avec-sa-fille.png')}}" alt="Une mere et sa fille" class="poster-image" />
            </picture>
        </div>
    </div>
    <div class="appel-a-action">
        Rejoignez la communauté./Suivez nous sur les réseaux.
    </div>
</header>
<!-- corps de la page -->

<!-- Barre de choix pour indiquer quel utilisateur on est (Elève, Prof ou Parent) .-->
<!-- Ce choix est important car il va permettre d'afficher certaines choses de façon personalisée.-->
<!-- L'ORDRE EST IMPORTANT -->
<!-- UNIQUEMENT POUR LE DEBUGAGE -->
<!-- <div class="flex_column div-choix-statut">
    <p class="font-more-visible">Qui êtes vous?</p>
    <div class="liste-choix-statut">
        <p class="choix-statut">Je suis parent d'élève</p>
        <p class="choix-statut actif">Je suis élève</p>
        <p class="choix-statut">Je suis enseignant</p>
    </div>
</div> -->

<!-- SESSION PAR DEFFAUT -->
@if (session('user'))
  @if(!(session('user')->role_id))
      <section id="session-acceuil-A0" class="conteneur-cartes session-acceuil">

        <div class="titre-decrit-plusImage">
            <h2 class="acceuil">Ayez plus de contôle sur vos activités!</h2>
            <span class="description">
                <br>_ Débloquez votre dashboard
                <br>_ Gardez un historique des ressources déjà téléchargées
                <br>_ Profitez d'une expérience personnalisée sur TeleEduTogo
            </span>
        </div>

        <div class="contenu-session-acceuil flex_row_wrap">
            <a href="{{route('completer_info')}}" class="text_card">
                <p class="card_title">Terminer mon inscription</p>
                <p class="description">Complétez vos informations.</p>
            </a>
        </div>
    </section>
  @endif
@endif

<!-- SESSION POUR MOI A1 pour les élèves. -->
<!--
<section id="session-acceuil-A1" class="conteneur-cartes session-acceuil">

    <div class="titre-decrit-plusImage">
        <h2 class="acceuil">Pour Moi</h2>
        <span class="description">Pas de temps à perdre! Va directement à l'essentiel.</span>
        <img src="{{asset('images/dessin_sac_a_dos.png')}}" alt="" class="only-pc">
    </div>

    <div class="contenu-session-acceuil flex_row_wrap">
        <div class="item-en-carte">
            <a href="">
                <img src="{{asset('images/ma_dashboard.png')}}" alt="Une pile de livre avec une pomme.">
                <h3 class="acceuil">Ma dashboard</h3>
            </a>
            <span class="description">Accède à ton tableau de bord.</span>
        </div>
    </div>
</section>
-->
<!-- SESSION DES ENSEIGNANTS A2. -->
<!--
<section id="session-acceuil-A2" class="conteneur-cartes session-acceuil ">
    <div class="titre-decrit-plusImage">
        <h2 class="acceuil">Faites vous remarquer!</h2>
        <a href="" class="text_card">
            <p class="card_title">Contribuer</p>
            <p class="description">Construisons ensemble notre communauté.</p>
        </a>
        <img src="" alt="" class="only-pc">
    </div>
    <div class="contenu-session-acceuil flex_row_wrap">
        <div class="item-en-carte">
            <a href="">
                <img src="{{asset('images/ma_dashboard.png')}}" alt="Une pile de livre avec une pomme.">
                <h3 class="acceuil">Ma dashboard</h3>
            </a>
            <span class="description">Accédez à votre tableau de bord.</span>
        </div>
    </div>
</section>
-->
<!-- SESSION DES PARENTS D'ELEVES A3 pour les élèves. -->
<!--
<section id="session-acceuil-A3" class="conteneur-cartes session-acceuil">

    <div class="titre-decrit-plusImage">
        <h2 class="acceuil">Toujours mieux suivre l'éducation de son enfant.</h2>
        <p class="description">
            <q>De tous les devoirs des parents, le principal est la bonne éducation de leurs enfants.</q>
            <cite>Jean Baptiste Blanchard</cite>
        </p>
        <img src="" alt="" class="only-pc">
    </div>
    <div class="contenu-session-acceuil flex_row_wrap">
        <div class="item-en-carte">
            <a href="">
                <img src="{{asset('images/ma_dashboard.png')}}" alt="Une pile de livre avec une pomme.">
                <h3 class="acceuil">Ma dashboard</h3>
            </a>
            <span class="description">Accédez à votre tableau de bord.</span>
        </div>
    </div>
</section>
-->




<!-- SESSION DE PRESENTATION DE CONTENU DE TOUS NIVEAU -->
<section id="session-acceuil-B" class="conteneur-cartes session-acceuil">

    <div class="titre-decrit-plusImage">
        <h2 class="acceuil">Parcourir</h2>
        <span class="description">Visite le contenu de chaque niveau, téléchage du contenu pour tes connaissances.</span>
        <img src="{{asset('images/illustration_online_learning.png')}}" alt="Un apprenant suivant un formateur en ligne." class="only-pc">
    </div>

    <div class="contenu-session-acceuil flex_row_wrap">
        <div class="item-en-carte">
            <a href="{{route('primaire')}}">
                <img src="{{asset('images/illustration_cours_primaire.png')}}" alt="Deux élèves de sexe opposés face à face.">
                <h3 class="acceuil">Cours Primaire</h3>
            </a>
            <span class="description">Vous cherchez du contenu pour le cours primaire? C'est par ici.</span>
        </div>
        <div class="item-en-carte">
            <a href="{{route('college')}}">
                <img src="{{asset('images/illustration_collegiens_composants.png')}}" alt="Deux élèves qui composent.">
                <h3 class="acceuil">Collège</h3>
            </a>
            <span class="description">Les cours et les épreuves du collège vous attendent ici.</span>
        </div>
        <div class="item-en-carte">
            <a href="{{route('lycee')}}">
                <img src="{{asset('images/illustration_lyceene_apprenant.png')}}" alt="Une élève qui étudie.">
                <h3 class="acceuil">Lycée</h3>
            </a>
            <span class="description">Du contenu pour la première, la seconde et la terminale.</span>
        </div>
    </div>

</section>

@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/accueil-js.js')}}"></script>
@endsection
