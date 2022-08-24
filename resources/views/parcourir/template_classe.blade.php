@extends('layouts.little')

@section('title')
>classe< | TELEEDUTOGO
@endsection

@section('h1')
{{$classe->nom}}
{{-- @if(session('serie'))
    {{session('serie')->nom_serie}}
@endif  --}}
@endsection

@section('page_description')
N'arrêtez jamais d'apprendre!
@endsection

@section('content')
    <section class="general_container">
		<section class="flex_row_wrap conteneur_matieres">
            @foreach ($matieres as $matiere)
                <section class="bloc_matiere">
                    <h2>{{$matiere->nom}}</h2>
                    <p class="niveau">
                        <span class="classe">{{$classe->nom}}</span>
                        {{-- <span class="serie">
                        @if(session('serie'))
                            Série {{session('serie')->nom_serie}}
                        @endif
                     </span> --}}
                    </p>
                    <div class="contenu_matiere">
                        <!-- Partie cours -->
                        <p class="cours">
                            <img src="{{asset('images/icon_pour_cours.png')}}" alt="">
                            <a href="{{route('matiere', [$cycle, $classe->nom, $matiere->nom])}}">Aller aux cours</a>
                        </p>
                        <hr>
                        <!-- Partie exercices -->
                        <p class="exercice">
                            <img src="{{asset('images/icon_pour_exercice.png')}}" alt="">
                            <a href="">Aller aux exercices</a>
                        </p>
                    </div>
                    <p class="contribuer">
                        <a href="">Vous avez des ressources? Contribuez</a>
                    </p>
                </section>
            @endforeach

			{{-- <section class="bloc_matiere">
				<h2>Nom Matière</h2>
				<p class="niveau">
					<span class="classe">Terminal</span>
					<span class="serie">serie A4</span>
				</p>
				<div class="contenu_matiere">
					<!-- Partie cours -->
					<p class="cours">
						<img src="{{asset('images/icon_pour_cours.png')}}" alt="">
						<a href="">Aller aux cours</a>
					</p>
					<hr>
					<!-- Partie exercices -->
					<p class="exercice">
						<img src="{{asset('images/icon_pour_exercice.png')}}" alt="">
						<a href="">Aller aux exercices</a>
					</p>
				</div>
				<p class="contribuer">
					<a href="">Vous avez des ressources? Contribuez</a>
				</p>
			</section>
			<section class="bloc_matiere">
				<h2>Nom Matière</h2>
				<p class="niveau">
					<span class="classe">Terminal</span>
					<span class="serie">serie A4</span>
				</p>
				<div class="contenu_matiere">
					<!-- Partie cours -->
					<p class="cours">
						<img src="{{asset('images/icon_pour_cours.png')}}" alt="">
						<a href="">Aller aux cours</a>
					</p>
					<hr>
					<!-- Partie exercices -->
					<p class="exercice">
						<img src="{{asset('images/icon_pour_exercice.png')}}" alt="">
						<a href="">Aller aux exercices</a>
					</p>
				</div>
				<p class="contribuer">
					<a href="">Vous avez des ressources? Contribuez</a>
				</p>
			</section>
			<section class="bloc_matiere">
				<h2>Nom Matière</h2>
				<p class="niveau">
					<span class="classe">Terminal</span>
					<span class="serie">serie A4</span>
				</p>
				<div class="contenu_matiere">
					<!-- Partie cours -->
					<p class="cours">
						<img src="{{asset('images/icon_pour_cours.png')}}" alt="">
						<a href="">Aller aux cours</a>
					</p>
					<hr>
					<!-- Partie exercices -->
					<p class="exercice">
						<img src="{{asset('images/icon_pour_exercice.png')}}" alt="">
						<a href="">Aller aux exercices</a>
					</p>
				</div>
				<p class="contribuer">
					<a href="">Vous avez des ressources? Contribuez</a>
				</p>
			</section> --}}
		</section>
	</section>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/affich_matiere.css')}}">
<link rel="stylesheet" href="{{asset('css/affich_classe.css')}}">
@endsection

@section('script')
@endsection
