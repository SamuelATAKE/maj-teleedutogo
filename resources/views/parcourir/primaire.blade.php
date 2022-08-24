@extends('layouts.little')

@section('title')
Cours primaire | TELEEDUTOGO
@endsection

@section('h1')
Parcourir le cours Primaire
@endsection

@section('page_description')
Retouvez des cours et des exercices pour le cours primaire
@endsection

@section('content')
    <section id="conteneur_principal" class="espace_primaire">
        <div class="flex_column">
            <p class="description">Votre classe</p>
            <div class="flex_row_wrap">
                <div class="groupe_classe">
                    <a href="{{route('classe', ['primaire','CP1'])}}" class="lien_cont_classe">
                        <h2 class="classe">CP1</h2>
                        <hr>
                        <p class="description">Cours Primaire première année</p>
                    </a>
                    <a href="{{route('classe', ['primaire','CP2'])}}" class="lien_cont_classe">
                        <h2 class="classe">CP2</h2>
                        <hr>
                        <p class="description">Cours Primaire deuxième année</p>
                    </a>
                </div>
                <div class="groupe_classe">
                    <a href="{{route('classe', ['primaire','CE1'])}}" class="lien_cont_classe">
                        <h2 class="classe">CE1</h2>
                        <hr>
                        <p class="description">Cours Elémentaire premère année</p>
                    </a>
                    <a href="{{route('classe', ['primaire','CE2'])}}" class="lien_cont_classe">
                        <h2 class="classe">CE2</h2>
                        <hr>
                        <p class="description">Cours Elémentaire deuxième année</p>
                    </a>
                </div>
                <div class="groupe_classe">
                    <a href="{{route('classe', ['primaire','CM1'])}}" class="lien_cont_classe">
                        <h2 class="classe">CM1</h2>
                        <hr>
                        <p class="description">Cours Moyen premère année</p>
                    </a>
                    <a href="{{route('classe', ['primaire','CM2'])}}" class="lien_cont_classe">
                        <h2 class="classe">CM2</h2>
                        <hr>
                        <p class="description">Cours Moyen deuxième année</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/parcourir_css.css')}}">
@endsection

@section('script')
@endsection
