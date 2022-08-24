@extends('layouts.admin')


@section('title')
Ajout de série
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/formulaires.css')}}">
@endsection

@section('content_title')
Séries > Ajouter
@endsection

@section('content')
<div class="conteneur-formulaire1">
    <form method="POST" action="{{route('serie.add')}}">
        @csrf
        @method('post')
        <div class="case_input input_chapitre">
            <label for="chapitre">Série</label>
            <input type="text" id="chapitre" name="serie" placeholder="Série">
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


