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

        <div class="case_input ">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required value="{{old('nom')}}" placeholder="Nom de la classe" />
        </div>
        <div class="case_input ">
            <label for="nom_accent">Nom accentué</label>
            <input type="text" id="nom_accent" name="nom_accent" required value="{{old('nom_accent')}}" placeholder="Nom avec les accents"  />
        </div>
        <div class="case_input">
            <label for="cycle">Cycle</label>
            <select name="cycle" id="cycle" required="">
                <option value="" selected></option>
                @foreach ($cycles as $cycle)
                    <option value="{{$cycle->id}}"  >{{$cycle->nom_cycle}}</option>
                @endforeach

            </select>
        </div>
        <div class="case_input">
            <label for="serie">Série</label>
            <select name="serie" id="serie">
                <option value="" selected></option>
                @foreach ($series as $serie)
                   <option value="{{$serie->id}}">{{$serie->nom_serie}}</option>
                @endforeach
            </select>
        </div>
        <div class="case_input">
            <label for="description">Description[facultative]</label>
            <textarea name="description" id="description" rows="10" placeholder="Vous pouvez en dire plus sur la classe ici">{{old('description')}}</textarea>
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
<script type="text/javascript" src="{{asset('js/contribution.js')}}"></script>
@endsection


