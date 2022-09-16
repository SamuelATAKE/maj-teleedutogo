@extends('layouts.admin')

@section('title')
Ajouter une matiere
@endsection

@section('style')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('css/ress_list.css')}}">
@endsection

@section('content_title')
Matiere
@endsection

@section('content')

<section id="ress_list_container">
    <h1>Liste des matieres</h1>
    <div class="ress_table_container">
        <a href="{{route('matiere.create')}}"><button class="btn btn-primary">Ajouter matière</button></a>
        <table class="ress_table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Cycle</th>
                    <th>Classe</th>
                    <th>Gestion</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matieres as $matiere)
                    <tr>
                        <td>{{$matiere->nom}}</td>
                        <td>{{$matiere->classe->cycle->nom_cycle}}</td>
                        <td>{{$matiere->classe->fullName}}</td>
                        <td class='actions_cel'>
                            <form action="" class="edit_button_form">
                                <input type="hidden">
                                <button type='submit' title="Modifier">
                                    <img src="{{asset('images/edit_icon.png')}}" alt="">
                                </button>
                            </form>
                            <form action="{{ route('admin.matiere.delete', ['id'=>$matiere->id]) }}" method="POST" class="del_button_form">
                                @csrf
                                @method('POST')
                                <input type="hidden">
                                <button type='submit' title="Supprimer">
                                    <img src="{{asset('images/del_icon.png')}}" alt="">
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td>Pas de matieres</td></tr>
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

