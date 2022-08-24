@extends('layouts.admin')

@section('title')
Ajouter ressource
@endsection

@section('style')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('css/ress_list.css')}}">
@endsection

@section('content_title')
Ressources
@endsection

@section('content')

<section id="ress_list_container">
    <h1>Liste des ressources</h1>
    <div class="ress_table_container">
        <table class="ress_table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Matière</th>
                    <th>Contributeur</th>
                    <th>Année</th>
                    <th>Chapitre</th>
                    <th>Etablissement</th>
                    <th>Gestion</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ressources as $ressource)
                    <tr>
                        <td>{{$ressource->nom}}</td>
                        <td>{{$ressource->type}}</td>
                        <td>{{$ressource->matiere}}</td>
                        <td>{{$ressource->contributeur}}</td>
                        <td>{{$ressouce->annee}}</td>
                        <td>{{$ressouce->chapitre}}</td>
                        <td>{{$ressource->etablissement}} </td>
                        <td class='actions_cel'>
                            <form action="" class="edit_button_form">
                                <input type="hidden">
                                <button type='submit' title="Modifier">
                                    <img src="{{asset('images/edit_icon.png')}}" alt="">
                                </button>
                            </form>
                            <form action="" class="del_button_form">
                                <input type="hidden">
                                <button type='submit' title="Supprimer">
                                    <img src="{{asset('images/del_icon.png')}}" alt="">
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td>Pas de ressources</td></tr>
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

