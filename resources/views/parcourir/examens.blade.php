@extends('layouts.little')

@section('title')
Examens | TELEEDUTOGO
@endsection

@section('h1')
Examens
@endsection

@section('page_description')
Voici quelques épreuves d'examens pour te préparer.
@endsection

@section('content')
    <section id="examens" class="conteneur-cartes">
		<!-- <div class="titre-decrit-plusImage">
			<h2 class="acceuil">Concours nationaux</h2>
			<span class="description">Les consours qui ont lieux sur le téritoire togolais</span>
			<img src="" alt="" class="only-pc">
		</div> -->
		<div class="list_examens">
			<div class="item">
				<a href="{{route('annee_examen', 'CEPD')}}">
					<img src="" alt="">
					<h3 class="acceuil">CEPD</h3>
				</a>
				<span class="description">Certificat de Fin d'Etudes du Premier Degré</span>
			</div>
			<div class="item">
				<a href="{{route('annee_examen', 'BEPC')}}">
					<img src="" alt="">
					<h3 class="acceuil">BEPC</h3>
				</a>
				<span class="description">Brevet de fin d'Etudes du Premier Cycle du secondaire</span>
			</div>
            <div class="item">
				<a href="{{route('annee_examen', 'BAC1')}}">
					<img src="" alt="">
					<h3 class="acceuil">BAC1</h3>
				</a>
				<span class="description">Baccalauréat première partie</span>
			</div>
            <div class="item">
				<a href="{{route('annee_examen', 'BAC2')}}">
					<img src="" alt="">
					<h3 class="acceuil">BAC2</h3>
				</a>
				<span class="description">Baccalauréat deuxième partie</span>
			</div>
		</div>
	</section>
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('css/concours_exam.css')}}">
@endsection

@section('script')
@endsection
