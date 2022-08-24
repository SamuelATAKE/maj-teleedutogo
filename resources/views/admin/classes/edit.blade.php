@extends('layouts.admin')


@section('title')
    Editer une Classe
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/formulaires.css')}}">
@endsection

@section('content_title')
    Classes > Editer
@endsection

@section('content')
    <div class="conteneur-formulaire1">
        <form method="POST" action="{{route('classe.update', $classe->id)}}">
            @csrf
            @method('put')

            <div class="case_input input_chapitre">
                <label for="chapitre">Nom</label>
                <input type="text" id="chapitre" name="nom" placeholder="{{$classe->nom}}" value="{{$classe->nom}}">
            </div>
            <div class="case_input">
                <label for="type">Cycle</label>
                <select name="cycle" id="type" required="">
                    <option value="{{$classe->cycle->id}}" selected>{{$classe->cycle->nom}}</option>
                    @foreach ($cycles as $cycle)
                        <option value="{{$cycle->id}}">{{$cycle->nom_cycle}}</option>
                    @endforeach

                </select>
            </div>
            <div class="case_input">
                <label for="examen">Série</label>
                <select name="serie" id="examen">
                    @if($classe->serie)
                        <option value="{{$classe->serie->id}}">{{$classe->serie->nom}}</option>
                    @else
                        <option value="" selected></option>
                    @endif

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
                Mettre à jour
            </button>
        </form>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('js/contribution.js')}}"></script>
@endsection


