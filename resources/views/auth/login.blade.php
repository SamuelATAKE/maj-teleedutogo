@extends('layouts.little')

@section('title')
Connexion
@endsection

@section('h1')
    TELEEDUTOGO : Connexion
@endsection

@section('page_description')
    Time to work!<br>
    Connectez-vous.
@endsection

@section('content')
<div class="conteneur-formulaire1">
    <form method="POST" action="{{route('login')}}">
        @csrf
        @method('post')
        <div class="case_input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Votre adresse email" required="">
        </div>
        <div class="case_input">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Votre mot de passe" required="">
        </div>
        <div class="case_input">
            <label >
                <input type="checkbox" name="seSouvenir" id="se_souvenir">
                Se souvenir de moi
            </label>
        </div>
        <button id="bouton_submit" type="submit" class="actif">
            Se connecter
        </button>
        <div class="other_auth_actions">
            <a href="{{route('check.password')}}">J'ai oublié mon mot de passe</a>
            <a href="{{route('inscription')}}">Je n'ai pas encore de compte</a>
        </div>
    </form>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="css/formulaires.css">
@endsection

