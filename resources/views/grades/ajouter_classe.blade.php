@extends('layouts.admin')


@section('title')
Ajout de Classe
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/formulaires.css')}}">
@endsection

@section('content_title')
Classes > Ajouter
@endsection

@section('content')
<div class="conteneur-formulaire1">
    <form method="POST" action="{{route('classe.add')}}">
        @csrf
        @method('post')

        <div class="case_input input_chapitre">
            <label for="chapitre">Nom</label>
            <input type="text" id="chapitre" name="nom" placeholder="Nom de la classe">
        </div>
        <div class="case_input">
            <label for="type">Cycle</label>
            <select name="cycle" id="type" required="">
                <option value="" selected></option>
                @foreach ($cycles as $cycle)
                    <option value="{{$cycle->id}}">{{$cycle->nom_cycle}}</option>
                @endforeach

            </select>
        </div>
        <div class="case_input">
            <label for="examen">Série</label>
            <select name="serie" id="examen">
                <option value="" selected></option>
                @foreach ($series as $serie)
                   <option value="{{$serie->id}}">{{$serie->nom_serie}}</option>
                @endforeach
            </select>
        </div>
        <div class="case_input">
            <label for="description">Description[facultative]</label>
            <textarea name="description" id="description" rows="10" placeholder="Vous pouvez en dire plus sur la classe ici"></textarea>
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


