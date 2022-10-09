@extends('layouts.admin')

@section('title')
Ajouter une classe
@endsection

@section('style')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('css/ress_list.css')}}">
@endsection

@section('content_title')
Classe
@endsection

@section('content')

<section id="ress_list_container">
    <h1>Liste des classes</h1>
    <div class="ress_table_container">
        <a href="{{route('classe.create')}}"><button class="btn btn-primary">Ajouter classe</button></a>
        <table class="ress_table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Nom Accentué</th>
                    <th>Cycle</th>
                    <th>Serie</th>
                    <th>Gestion</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($classes as $classe)
                    <tr>
                        <td>{{$classe->nom}}</td>
                        <td>{{$classe->nom_accentue}}</td>
                        <td>{{$classe->cycle->nom_cycle}}</td>
                        <td>@if($classe->serie) {{$classe->serie->nom_serie}} @else @endif</td>
                        <td class='actions_cel'>
                                <a href="{{route("classe.edit", $classe->id)}}">
                                    <button type='button' title="Modifier">
                                        <img src="{{asset('images/edit_icon.png')}}" alt="">
                                    </button>
                                </a>
                            <form action="" class="del_button_form">
                                <input type="hidden">
                                <button type='submit' title="Supprimer">
                                    <img src="{{asset('images/del_icon.png')}}" alt="">
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td>Pas de classes</td></tr>
                @endforelse

            </tbody>
        </table>
    </div>

</section>


@endsection

@section('head_script')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
@endsection
@section('script')
<script src="{{asset('js/ress_list.js')}}"></script>
@endsection

