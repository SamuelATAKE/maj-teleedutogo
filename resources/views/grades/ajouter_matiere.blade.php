@extends('layouts.admin')


@section('title')
Ajout de matière
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/formulaires.css')}}">
@endsection

@section('content_title')
Matieres > Ajouter
@endsection

@section('content')
<div class="conteneur-formulaire1">
    <form method="POST" action="{{route('matiere.add')}}">
        @csrf
        @method('post')

        <div class="case_input input_chapitre">
            <label for="chapitre">Nom</label>
            <input type="text" id="chapitre" name="nom" placeholder="Intitulé de la matière">
        </div>
        <div class="case_input">
            <label for="type">Classe</label>
            <select name="classe" id="type" required="">
                <option value="" selected></option>
                @foreach ($classes as $classe)
                    <option value="{{$classe->id}}">{{$classe->nom}}</option>
                @endforeach

            </select>
        </div>
        <button id="bouton_submit" type="submit" class="actif">
            Ajouter
        </button>
    </form>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/contribution.js')}}"></script>
@endsection


