@extends('layouts.little')

@section('title')
Collège | TELEEDUTOGO
@endsection

@section('h1')
Parcourir le collège
@endsection

@section('page_description')
Retouvez des cours et des exercices pour le collège
@endsection

@section('content')
    <section id="conteneur_principal" class="espace_college">
		<div class="flex_column">
			<p class="description">Choisissez la classe</p>
			<div class="flex_row_wrap">
				<div class="groupe_classe">
					<a href="{{route('classe', ['college','Sixième'])}}" class="lien_cont_classe">
						<h2 class="classe">Sixième</h2>
						<hr>
						<p class="description"></p>
					</a>
				</div>
				<div class="groupe_classe">
					<a href="{{route('classe', ['college','Cinquième'])}}" class="lien_cont_classe">
						<h2 class="classe">Cinquième</h2>
						<hr>
						<p class="description"></p>
					</a>
				</div>
				<div class="groupe_classe">
					<a href="{{route('classe', ['college','Quatrième'])}}" class="lien_cont_classe">
						<h2 class="classe">Quatrième</h2>
						<hr>
						<p class="description"></p>
					</a>
				</div>
				<div class="groupe_classe">
					<a href="{{route('classe', ['college','Troisième'])}}" class="lien_cont_classe">
						<h2 class="classe">Troisième</h2>
						<hr>
						<p class="description"></p>
					</a>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/parcourir_css.css')}}">
@endsection

@section('script')
@endsection
