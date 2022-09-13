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

        <div class="case_input">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="{{old('nom')}}" placeholder="Intitulé de la matière (sans accent)" required>
        </div>
        <div class="case_input">
            <label for="nom_accent">Nom accentué</label>
            <input type="text" id="nom_accent" name="nom_accent" value="{{old('nom_accent')}}" placeholder="Intitulé de la matière (avec accent)" required>
        </div>
        <div class="case_input">
            <label for="classe">Classe</label>
            <select name="classe" id="classe" required="">
                <option value=""></option>
                @foreach ($classes as $classe)
                    <option value="{{$classe->id}}" {{$classe->id == old('classe') ? 'selected' : ''}} >{{$classe->fullName}}</option>
                @endforeach

            </select>
        </div>
        <div class="error">
            @foreach ($errors->all() as $error)
                {{$error}}
            @endforeach
        </div>
        <button id="bouton_submit" type="submit" class="actif">
            Ajouter
        </button>
    </form>
</div>
@endsection

@section('script')
@endsection


