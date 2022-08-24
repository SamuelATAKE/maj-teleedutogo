@extends('layouts.little')

@section('title')
Compléter mes informations | TELEEDUTOGO
@endsection

@section('h1')
TELEEDUTOGO : Complétion des informations
@endsection

@section('page_description')
Complètez vos informations pour profiter au maximum des offres du site.
@endsection

@section('content')
<script>
    let classes_lycee = [
        @foreach ($classes as $classe)
            @if ($classe->cycle_id == 3)
                "{{ $classe->nom }}",
            @endif
        @endforeach
    ];
    let classes_college = [
        @foreach ($classes as $classe)
            @if ($classe->cycle_id == 2)
                "{{ $classe->nom }}",
            @endif
        @endforeach
    ];
    let classes_primaire = [
        @foreach ($classes as $classe)
            @if ($classe->cycle_id == 1)
                "{{ $classe->nom }}",
            @endif
        @endforeach
    ];
    console.log(classes_primaire[0]);
    let matieres_primaire = [
        @foreach ($matieres as $matiere)
            @if ($matiere->cycle_id == 1)
                "{{$matiere->nom}} {{$matiere->classe_id}}",
            @endif
        @endforeach
    ]
    let matieres_college = [
        @foreach ($matieres as $matiere)
            @if ($matiere->cycle_id == 2)
                "{{$matiere->nom}} {{$matiere->classe_id}}",
            @endif
        @endforeach
    ]
    let matieres_lycee = [
        @foreach ($matieres as $matiere)
            @if ($matiere->cycle_id == 3)
                "{{$matiere->nom}} {{$matiere->classe_id}}",
            @endif
        @endforeach
    ]
</script>

<div class="conteneur-formulaire1">
    <form method="POST" action="{{route('user.info')}}" class="H_multipart_form">
        @csrf
        @method('post')
        <!-- Le role -->
        <div id="part_role" class="form_section" >
            <p class="form_section_num">1</p>
            <div class="case_input">
                <label for='statut'>Statut</label>
                <select name="role" id="statut" value="">
                    <option value="eleve" >Elève</option>
                    <option value="enseignant" >Enseignant</option>
                    <option value="parent" >Parent</option>
                </select>
            </div>
            <div class="boutons_container">
                <p class="bout_suivant">Suivant</p>
            </div>
        </div>
        <!-- Cycle -->
        <div id="part_cycle" class="form_section" >
            <p class="form_section_num">2</p>
            <div class="case_input">
                <label for='cycle'>Cycle</label>
                <select name="cycle" id="cycle" value="">
                    @foreach ($cycles as $cycle)
                       <option value="{{$cycle->id}}" >{{$cycle->nom_cycle}}</option>
                    @endforeach
                </select>
            </div>
            <div class="boutons_container">
                <p class="bout_precedent">Précédent</p>
                <p class="bout_suivant">Suivant</p>
            </div>
        </div>
        <!-- Classes -->
        <div id="part_classes" class="form_section" >
            <p class="form_section_num">3</p>
            <div class="case_input">
                <label for='classe1'>Classe enseignée 1</label>
                <select name="classe_id" id="classe1" value="">
                    <option value="cp1" >CP1</option>

                </select>
            </div>
            <div class="case_input classe_enseignant">
                <label for='classe2'>Classe enseignée 2</label>
                <select name="classe_id" id="classe2" value="">
                    <option value="cp1" >CP1</option>

                </select>
            </div>
            <div class="case_input classe_enseignant">
                <label for='classe3'>Classe enseignée 3</label>
                <select name="classe_id" id="classe3" value="">
                    <option value="cp1" >CP1</option>

                </select>
            </div>
            <div class="case_input classe_enseignant">
                <label for='classe4'>Classe enseignée 4</label>
                <select name="classe4" id="classe4" value="">
                    <option value="cp1" >CP1</option>

                </select>
            </div>
            <div class="boutons_container">
                <p class="bout_precedent">Précédent</p>
                <p class="bout_suivant">Suivant</p>
            </div>
        </div>
        <!-- Matières -->
        <div id="part_matiere" class="form_section" >
            <p class="form_section_num">4</p>
            <div class="case_input">
                <label for='matiere1'>Matière enseignée 1</label>
                <!-- Les matières seront remplis uniquement par les enseigants du collège ou lycée -->
                <select name="matiere1" id="matiere1" value="">
                    <option value="math">math</option>

                </select>
            </div>
            <div class="case_input">
                <label for='matiere2'>Matière enseignée 2</label>
                <select name="matiere2" id="matiere2" value="">
                    <option value="math" >math</option>

                </select>
            </div>
            <div class="case_input">
                <label for='matiere3'>Matière enseignée 3</label>
                <select name="matiere3" id="matiere3" value="">
                    <option value="math" >math</option>

                </select>
            </div>
            <div class="boutons_container">
                <p class="bout_precedent">Précédent</p>
                <p class="bout_suivant">Suivant</p>
            </div>
        </div>
        <!-- Etablissement scolaire -->
        <div id="part_etablissement" class="form_section" >
            <p class="form_section_num">5</p>
            <div class="case_input">
                <label for='etablissement'>Etablissement Scolaire [Facultatif]</label>
                <input type="text" id="etablissement" name="etablissement" placeholder="Entrez le nom de votre établissement scolaire.">
            </div>
            <div class="boutons_container">
                <p class="bout_precedent">Précédent</p>
                <p class="bout_suivant">Suivant</p>
            </div>
        </div>
        <!-- Regions -->
        <div id="part_region" class="form_section" >
            <p class="form_section_num">6</p>
            <div class="case_input">
                <label for='region'>Région [Facultatif]</label>
                <select name="region" id="region">
                    <option value="lome">Lomé</option>
                    <option value="maritime">Maritime</option>
                    <option value="plateaux">Plateaux</option>
                    <option value="centrale">Centrale</option>
                    <option value="kara">Kara</option>
                    <option value="savanes">Savanes</option>
                </select>
            </div>
            <div class="boutons_container">
                <p class="bout_precedent">Précédent</p>
                <button type="submit" class="bout_soumettre">Soumettre</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/formulaires.css')}}">
<link rel="stylesheet" href="{{asset('css/compl_infos.css')}}">
@endsection

@section('script')
<script src="{{asset('js/compl_infos.js')}}"></script>
@endsection
