@extends('layouts.little')

@section('title')
Concours/Examen de | TELEEDUTOGO
@endsection

@section('h1')
{{$exam}}
@endsection

@section('page_description')
Voici quelques épreuves d'examens pour te préparer.
@endsection

@section('content')
	<section id="annees_contenu">
        @if (count($years) != 0)
            @for($i = 0; $i < count($years); $i++)
                <a href="" class="annee">
                    <h3> {{ $years[$i] }} </h3>
                </a>
            @endfor
        @else
                <h3>Pas de ressource disponibles pour le moment</h3>
        @endif

	</section>
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('css/annee-matiere_contenu.css')}}">
@endsection

@section('script')
@endsection
