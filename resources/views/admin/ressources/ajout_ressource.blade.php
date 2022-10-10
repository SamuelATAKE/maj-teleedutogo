@extends('layouts.admin')


@section('title')
Ajout de ressource
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/formulaires.css')}}">
@endsection

@section('content_title')
Ressources > Ajouter
@endsection

@section('content')
<div class="conteneur-formulaire1">
    <form method="POST" action="{{route('ressource.add')}}" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="case_input">
            <label for="files">Ressource</label>
            <input type="file" name="ressource">
        </div>
        <div class="case_input">
            <label for="matiere">Matière</label>
            <select name="matiere" id="matiere" >
                <option value="" selected></option>
                @foreach ($matieres as $matiere)
                    <option value="{{$matiere->id}}">{{$matiere->nom}} ({{$classesFullAccentName[$matiere->classe_id]}})</option>
                @endforeach
            </select>
        </div>
        <div class="case_input">
            <label for="type">Type de la ressource</label>
            <select name="type" id="type" >
                <option value="" selected></option>
                <option value="cours">Cours ou résumé de cours</option>
                <option value="examen">Examen Nationnal(CEPD,BEPC...)</option>
                <option value="epreuve">Epreuve d'une école</option>
                <option value="concours">Epreuve d'un concours</option>
                <option value="exercice">Exercice</option>
            </select>
        </div>
        <div class="case_input input_examen">
            <label for="examen">Examen</label>
            <select name="examen" id="examen">
                <option value=""></option>
                <option value="cepd">CEPD</option>
                <option value="bepc">BEPC</option>
                <option value="probatoire">PROBATOIRE</option>
                <option value="bac">BAC</option>
            </select>
        </div>
        <div class="case_input input_etablissemenent">
            <label for="etablissement">Provenance de la ressource</label>
            <input type="text" id="etablissement" name="etablissement" placeholder="Etablissement scolaire">
        </div>
        <div class="case_input input_annee">
            <label for="annee">Année[facultative]</label>
            <input type="number" id="annee" name="annee" min="1900">
        </div>
        <div class="case_input input_chapitre">
            <label for="chapitre">Chapitre[facultatif]</label>
            <input type="text" id="chapitre" name="chapitre" placeholder="Chapitre">
        </div>
        <div class="case_input">
            <label for="description">Description[facultative]</label>
            <textarea name="description" id="description" rows="10" placeholder="Vous pouvez en dire plus sur la ressource ici."></textarea>
        </div>
        <button id="bouton_submit" type="submit" class="actif">
            Ajouter
        </button>
        <div class="error">
            @foreach ($errors->all() as $message)
                {{$message}} <br>
            @endforeach
        </div>
    </form>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/contribution.js')}}"></script>
@endsection


