@extends('layouts.admin')


@section('title')
Modifier de une ressource
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/form.css', Request::secure())}}">
@endsection

@section('content_title')
Ressources > Modifier
@endsection

@section('content')
<div class="form-wrapper form-s1 ">
    <form method="POST" action="{{route('ressource.update')}}" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="input-group">
            <div class="input-part">
                <label for="ressource">Ressource</label>
                <input type="file" name="ressource" id="ressource">
            </div>
            <div class="instructions">
                <p class="description">
                    Sélectionnez un fichier si vous souhaitez remplacer le précédent
                    <a href="">Téléchargez le ficher précédent</a>
                </p>
                <p class="errors">
                    @error('ressource')
                        {{$message}}
                    @enderror
                </p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part">
                <label for="matiere">Matière</label>
                <select name="matiere" id="matiere" >
                    @foreach ($matieres as $matiere)
                        <option value="{{$matiere->id}}"
                            @if ($matiere->id == $ressource->matiere->id)
                                selected
                            @endif
                        >{{$matiere->nom}} ({{$classesFullAccentName[$matiere->classe_id]}})</option>
                    @endforeach
                </select>
            </div>
            <div class="instructions">
                <p class="description"></p>
                <p class="errors">
                    @error('matiere')
                        {{$message}}
                    @enderror</p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part">
                <label for="type">Type de la ressource</label>
                <select name="type" id="type" >
                    <option value="cours"
                        @if ($ressource->type == 'cours') selected @endif
                    >Cours ou résumé de cours</option>
                    <option value="examen"
                        @if ($ressource->type == 'examen') selected @endif
                    >Examen Nationnal(CEPD,BEPC...)</option>
                    <option value="epreuve"
                        @if ($ressource->type == 'epreuve') selected @endif
                    >Epreuve d'une école</option>
                    <option value="concours"
                        @if ($ressource->type == 'concours') selected @endif
                    >Epreuve d'un concours</option>
                    <option value="exercice"
                        @if ($ressource->type == 'exercice') selected @endif
                    >Exercice</option>
                </select>
            </div>
            <div class="instructions">
                <p class="description"></p>
                <p class="errors">
                    @error('type')
                        {{$message}}
                    @enderror</p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part input_examen">
                <label for="examen">Examen</label>
                <select name="examen" id="examen">
                    <option value="cepd"
                        @if ($ressource->examen == 'cours') selected @endif
                    >CEPD</option>
                    <option value="bepc">BEPC</option>
                    <option value="probatoire">PROBATOIRE</option>
                    <option value="bac">BAC</option>
                </select>
            </div>
            <div class="instructions">
                <p class="description"></p>
                <p class="errors">
                    @error('examen')
                        {{$message}}
                    @enderror</p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part input_concours">
                <label for="concours">Provenance de la ressource</label>
                <input type="text" id="concours" name="concours" placeholder="Nom du concours">
            </div>
            <div class="instructions">
                <p class="description"></p>
                <p class="errors">
                    @error('concours')
                        {{$message}}
                    @enderror</p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part input_etablissemenent">
                <label for="etablissement">Provenance de la ressource</label>
                <input type="text" id="etablissement" name="etablissement" placeholder="Etablissement scolaire">
            </div>
            <div class="instructions">
                <p class="description"></p>
                <p class="errors">
                    @error('etablissement')
                        {{$message}}
                    @enderror</p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part input_annee">
                <label for="annee">Année[facultative]</label>
                <input type="number" id="annee" name="annee" min="1900">
            </div>
            <div class="instructions">
                <p class="description"></p>
                <p class="errors">
                    @error('annee')
                        {{$message}}
                    @enderror</p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part input_chapitre">
                <label for="chapitre">Chapitre[facultatif]</label>
                <input type="text" id="chapitre" name="chapitre" placeholder="Chapitre">
            </div>
            <div class="instructions">
                <p class="description">Le chapitre du cours auquel la ressource est liée.</p>
                <p class="errors">
                    @error('chapitre')
                        {{$message}}
                    @enderror</p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part">
                <label for="description">Description[facultative]</label>
                <textarea name="description" id="description" rows="10" placeholder="Vous pouvez en dire plus sur la ressource ici."></textarea>
            </div>
            <div class="instructions">
                <p class="description"></p>
                <p class="errors">
                    @error('description')
                        {{$message}}
                    @enderror</p>
            </div>
        </div>

        <div class="input-group">
            <div class="input-part input_contributor_name">
                <label for="contributor_name">Entrez votre nom</label>
                <input type="text" id="contributor_name" name="contributor_name" placeholder="Votre nom">
            </div>
            <div class="instructions">
                <p class="description">Votre nom sera affiché comme contributeur</p>
                <p class="errors">
                    @error('contributor_name')
                        {{$message}}
                    @enderror</p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part input_contributor_contact">
                <label for="contributor_contact">Entrez votre nom</label>
                <input type="text" id="contributor_contact" name="contributor_contact" placeholder="Votre contact">
            </div>
            <div class="instructions">
                <p class="description">On pourrait avoir besoin de vous contacter</p>
                <p class="errors">
                    @error('contributor_contact')
                        {{$message}}
                    @enderror</p>
            </div>
        </div>
        <div class="errors">
            @foreach ($errors->all() as $message)
            {{$message}} <br>
            @endforeach
        </div>
        <div class="input-group form-buttons">
            <button id="bouton_submit" type="submit" class="main-button">
                Ajouter La ressource
            </button>
        </div>
    </form>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/contribution.js')}}"></script>
@endsection


