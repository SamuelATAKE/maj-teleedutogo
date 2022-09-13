@extends('layouts.admin')


@section('title')
Ajout de cycle
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/formulaires.css')}}">
@endsection

@section('content_title')
Cycle > Ajouter
@endsection

@section('content')
<div class="conteneur-formulaire1">
    <form method="POST" action="{{route('cycle.add')}}">
        @csrf
        @method('post')
        <div class="case_input input_chapitre">
            <label for="chapitre">Cycle</label>
            <input type="text" id="chapitre" name="cycle" placeholder="Cycle">
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


