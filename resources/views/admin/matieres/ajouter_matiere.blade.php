@extends('layouts.admin')


@section('title')
Ajout de matière
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/form.css')}}">
@endsection

@section('content_title')
Matieres > Ajouter
@endsection

@section('content')
<div class="form-wrapper form-s1">
    <form method="POST" action="{{route('matiere.add')}}">
        @csrf
        @method('post')
        <div class="input-group">
            <div class="input-part">
                <label for="nom">Nom sans accent</label>
                <input type="text" id="nom" name="nom" value="{{old('nom')}}" placeholder="Intitulé de la matière (sans accent)" required>
            </div>
            <div class="instructions">
                <p class="description">
                    Le nom de la matière sans les accents. Il servira à composer les liens.
                </p>
                <p class="errors">
                    @error('nom')
                        {{$message}}
                    @enderror
                </p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part">
                <label for="nom_accent">Nom accentué</label>
                <input type="text" id="nom_accent" name="nom_accent" value="{{old('nom_accent')}}" placeholder="Intitulé de la matière (avec accent)" required>
            </div>
            <div class="instructions">
                <p class="description">Le nom de la matière proprement écrit avec les accents. Il sera affiché sur les pages.</p>
                <p class="errors">
                    @error('nom_accent')
                        {{$message}}
                    @enderror
                </p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part">
                <label for="classe">Classe</label>
                <select name="classe" id="classe" required="">
                    <option value=""></option>
                    @foreach ($classes as $classe)
                        <option value="{{$classe->id}}" {{$classe->id == old('classe') ? 'selected' : ''}} >{{$classe->fullName}}</option>
                    @endforeach

                </select>
            </div>
            <div class="instructions">
                <p class="description"></p>
                <p class="errors">
                    @error('classe')
                        {{$message}}
                    @enderror
                </p>
            </div>
        </div>
        <div class="error">
            @foreach ($errors->all() as $error)
                {{$error}}
            @endforeach
        </div>
        <div class="input-group form-buttons">
            <button id="bouton_submit" type="submit" class="main-button">
                Ajouter
            </button>
        </div>
    </form>
</div>
@endsection

@section('script')
@endsection


