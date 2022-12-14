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
            <input type="file" name="ressource" multiple>
        </div>
        <div class="case_input">
            <label for="cycle">Cycle</label>
            <select name="cycle" id="cycle">
                @foreach ($cycles as $cycle)
                   <option value="{{$cycle->id}}">{{$cycle->nom_cycle}}</option>
                @endforeach
            </select>
        </div>
        <div class="case_input">
            <label for='classe'>Classe</label>
            <select name="classe" id="classe">
                @foreach ($classes as $classe)
                    <option value="{{$classe->id}}">{{$classe->nom}}</option>
                @endforeach

            </select>
        </div>
        <div class="case_input">
            <label for="matiere">Matière</label>
            <select name="matiere" id="matiere" required="">
                <option value="" selected></option>
                <optgroup label="Lycée">
                    @foreach ($matieres as $matiere)
                        @if ($matiere->cycle_id == 3)
                          <option value="{{$matiere->id}}">{{$matiere->nom}} ({{$nom_classe[$matiere->id]}})</option>
                        @endif
                    @endforeach
                </optgroup>
                <optgroup label="Collège">
                    @foreach ($matieres as $matiere)
                        @if ($matiere->cycle_id == 2)
                            <option value="{{$matiere->id}}">{{$matiere->nom}}  ({{$nom_classe[$matiere->id]}})</option>
                        @endif
                    @endforeach
                </optgroup>
                <optgroup label="Primaire">
                    @foreach ($matieres as $matiere)
                        @if ($matiere->cycle_id == 1)
                            <option value="{{$matiere->id}}">{{$matiere->nom}}  ({{$nom_classe[$matiere->id]}})</option>
                        @endif
                    @endforeach
                </optgroup>
            </select>
        </div>
        <div class="case_input">
            <label for="type">Type de la ressource</label>
            <select name="type" id="type" required="">
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
                <option value="CEPD">CEPD</option>
                <option value="BEPC">BEPC</option>
                <option value="PROBA">PROBATOIRE</option>
                <option value="BAC">BAC</option>
            </select>
        </div>
        <div class="case_input input_etablissemenent">
            <label for="etablissement">Etablissement Scolaire</label>
            <input type="text" id="etablissement" name="etablissement" placeholder="L'école de la ressource">
        </div>
        <div class="case_input input_annee">
            <label for="annee">Année</label>
            <input type="number" id="annee" name="annee" min="1900">
        </div>
        <div class="case_input input_chapitre">
            <label for="chapitre">Chapitre</label>
            <input type="text" id="chapitre" name="chapitre" placeholder="Chapitre">
        </div>
        <div class="case_input">
            <label for="description">Description[facultative]</label>
            <textarea name="description" id="description" rows="10" placeholder="Vous pouvez en dire plus sur la ressource ici."></textarea>
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


