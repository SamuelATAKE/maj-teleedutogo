@extends('layouts.little')

@section('title')
Concours | TELEEDUTOGO
@endsection

@section('h1')
Concours
@endsection

@section('page_description')
Voici quelques épreuves de certains concours pour t'entrainer.
@endsection

@section('content')
<section id="nationaux" class="conteneur-cartes">
    <div class="titre-decrit-plusImage">
        <h2 class="acceuil">Concours nationaux</h2>
        <span class="description">Les concours qui ont lieu sur le territoire Togolais</span>
        <img src="" alt="" class="only-pc">
    </div>
    <div class="list_concours">
        <div class="item">
            <a href="">
                <img src="" alt="">
                <h3 class="acceuil">Concours d'entrée à l'Ecole PolyTechnique de Lomé</h3>
            </a>
            <span class="description">L'EPL étant la fusion du CIC et de l'ENSI, nous proposons les anciens sujets du concours d'entrées dans ces écoles</span>
        </div>
        <div class="item">
            <a href="">
                <img src="" alt="">
                <h3 class="acceuil">Concours d'entrée au Lycée scientifique de Lomé et de Kara</h3>
            </a>
            <span class="description"><a href=""></a></span>
        </div>
    </div>
</section>
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('css/concours_exam.css')}}">
@endsection

@section('script')
@endsection
