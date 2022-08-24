@extends('layouts.admin')

@section('title')
Ajouter un cycle
@endsection

@section('style')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('css/ress_list.css')}}">
@endsection

@section('content_title')
Cycles
@endsection

@section('content')

<section id="ress_list_container">
    <h1>Liste des cycles</h1>
    <div class="ress_table_container">
        <a href="{{route('cycle.create')}}"><button class="btn btn-primary">Ajouter cycle</button></a>
        <table class="ress_table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Gestion</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cycles as $cycle)
                    <tr>
                        <td>{{$cycle->nom_cycle}}</td>
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
                    <tr><td>Pas de cycle</td></tr>
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

