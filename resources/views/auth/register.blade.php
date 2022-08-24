@extends('layouts.little')

@section('title')
Inscription
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/formulaires.css')}}">
@endsection

@section('h1')
    TELEEDUTOGO : Inscription
@endsection

@section('page_description')
Inscrivez-vous.<br>Rejoignez la communauté.
@endsection


@section('content')

<div class="conteneur-formulaire1">
    <form method="POST" action="{{route('register')}}">
        @csrf
        @method('post')
        <div class="case_input">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="Entrez votre nom ici" required="">
        </div>
        <div class="case_input">
            <label for="prenom">Prénom(s)</label>
            <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom ici" required="">
        </div>
        <div class="case_input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Votre adresse email" required="">
        </div>
        <div class="case_input">
            <label for="password">Mot de passe pour votre compte</label>
            <input type="password" name="password" id="password" placeholder="Six (6) caractères au minimum" required="">
        </div>
        <div class="case_input">
            <label for="confirm_pass">Confimation du mot de passe</label>
            <input type="password" name="confirm_pass" id="confirm_pass" placeholder="Confirmez votre mot de passe" required="">
        </div>
        <div class="case_input">
            <label >
                <input type="checkbox" name="seSouvenir" id="se_souvenir">
                Se souvenir de moi
            </label>
        </div>

        <p class="indication">
            Veuillez renseigner tous les champs avec des informations correctes, s'il vous plaît
        </p>
        <button id="bouton_submit" type="submit" class="non-actif">
            S'inscrire
        </button>
    </form>
</div>


@endsection


@section('script')
<script src="{{asset('js/inscription.js')}}"></script>
@endsection
