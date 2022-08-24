@extends('layouts.little')

@section('title')
Contribuer
@endsection

@section('h1')
Contribuer
@endsection

@section('page_description')
    Votre apport compte! 
    <br>
    Construisons ensemble notre plateforme.
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
                
                   <option value="{$cycle->id}}">{$cycle->nom_cycle}}</option>
                
            </select>
        </div>
        <div class="case_input">
            <label for='classe'>Classe</label>
            <select name="classe" id="classe">
                
                    <option value="{$classe->id}}">{$classe->nom}}</option>
                

            </select>
        </div>
        <div class="case_input">
            <label for="matiere">Matière</label>
            <select name="matiere" id="matiere" required="">
                <option value="" selected></option>
                <optgroup label="Lycée">
                    
                          <option value="{$matiere->id}}">{$matiere->nom}} ({$nom_classe[$matiere->id]}})</option>
                        
                </optgroup>
                <optgroup label="Collège">
                    
                            <option value="{$matiere->id}}">{$matiere->nom}}  ({$nom_classe[$matiere->id]}})</option>
                        
                </optgroup>
                <optgroup label="Primaire">
                    
                            <option value="{$matiere->id}}">{$matiere->nom}}  ({$nom_classe[$matiere->id]}})</option>
                        
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
                <option value="PROBATOIRE">PROBATOIRE</option>
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

@section('style')
<link rel="stylesheet" href="{{asset('css/formulaires.css')}}">
@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/contribution.js')}}"></script>
@endsection
