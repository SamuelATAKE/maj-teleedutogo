@extends('layouts.admin')


@section('title')
Ajout de Classe
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/form.css')}}">
@endsection

@section('content_title')
Classes > Ajouter
@endsection

@section('content')
<div class="form-wrapper form-s1">
    <form method="POST" action="{{route('classe.add')}}">
        @csrf
        @method('post')
        <div class="input-group">
            <div class="input-part ">
                <label for="nom">Nom sans accent</label>
                <input type="text" id="nom" name="nom" required value="{{old('nom')}}" placeholder="Nom de la classe" />
            </div>
            <div class="instructions">
                <p class="description">Le nom sans accent sert à former les liens.</p>
                <p class="errors">
                    @error('nom')
                        {{$message}}
                    @enderror
                </p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part ">
                <label for="nom_accent">Nom accentué</label>
                <input type="text" id="nom_accent" name="nom_accent" required value="{{old('nom_accent')}}" placeholder="Nom avec les accents"  />
            </div>
            <div class="instructions">
                <p class="description">Nom avec accents affiché sur les pages.</p>
                <p class="errors">
                    @error('nom_accent')
                        {{$message}}
                    @enderror</p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part">
                <label for="cycle">Cycle</label>
                <select name="cycle" id="cycle" required="">
                    <option value="" selected></option>
                    @foreach ($cycles as $cycle)
                        <option value="{{$cycle->id}}"  >{{$cycle->nom_cycle}}</option>
                    @endforeach

                </select>
            </div>
            <div class="instructions">
                <p class="description"></p>
                <p class="errors">
                    @error('cycle')
                        {{$message}}
                    @enderror</p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part">
                <label for="serie">Série</label>
                <select name="serie" id="serie">
                    <option value="" selected></option>
                    @foreach ($series as $serie)
                       <option value="{{$serie->id}}">{{$serie->nom_serie}}</option>
                    @endforeach
                </select>
            </div>
            <div class="instructions">
                <p class="description"></p>
                <p class="errors">
                    @error('serie')
                        {{$message}}
                    @enderror</p>
            </div>
        </div>
        <div class="input-group">
            <div class="input-part">
                <label for="description">Description[facultative]</label>
                <textarea name="description" id="description" rows="10" placeholder="Vous pouvez en dire plus sur la classe ici">{{old('description')}}</textarea>
            </div>
            <div class="instructions">
                <p class="description"></p>
                <p class="errors">
                    @error('description')
                        {{$message}}
                    @enderror</p>
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
<script type="text/javascript" src="{{asset('js/contribution.js')}}"></script>
@endsection


