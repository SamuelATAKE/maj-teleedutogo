@extends('layouts.little')

@section('title')
 {{$exam}} | TELEEDUTOGO
@endsection

@section('h1')
{{$exam}} | {{$year}}
@endsection

{{-- @section('serie')

@if(session('serie'))
Série {{session('serie')->nom_serie}}
@endif

@endsection --}}

@section('page_description')
N'arrêtez jamais d'apprendre!
@endsection

@section('content')
	<section class="flex_column conteneur_principal">
		{{-- <h2>Epreuve  : {{$matiere->nom}}</h2> --}}
		<!-- SECTION POUR LES FICHIERS A TELECHARGER -->
		<section class="liste_contenu flex_column">
            @foreach ($ressources as $ressource)
                <p class="item_contenu flex_row_wrap">
                    <img src="{{asset('images/icon_telecharger_fichier.png')}}" alt="">
                    <a href="" class="nom_contenu">{{$ressource->matiere_id}}</a>
                    <span class="attributs_contenu">
                        <a href=""><img src="{{asset('images/check.png')}}" alt="téléchargé" class="deja_telecharge"></a>
                        <a href=""><img src="{{asset('images/correction.png')}}" alt="" class="corrige"></a>
                    </span>
                </p>
            @endforeach

			{{-- <p class="item_contenu flex_row_wrap">
				<img src="{{asset('images/icon_telecharger_fichier.png')}}" alt="">
				<a href="" class="nom_contenu">Nom contenu</a>
				<span class="attributs_contenu">
					<a href="" class="deja_telecharge"><img src="{{asset('images/check.png')}}" alt="téléchargé" ></a>
					<a href="" class="corrige"><img src="{{asset('images/correction.png')}}" alt="" ></a>
				</span>
			</p> --}}

		</section>
		<!-- SECTION POUR LES LIENS EXTERNES -->
		<section class="liste_contenu flex_column">
			<h2>Quelques liens interressants 😉</h2>
			{{-- <p class="item_contenu flex_row_wrap">
				<img src="{{asset('images/icon_lien_externe.png')}}" alt="">
				<a href="">Lien externe</a>
			</p>
			<p class="item_contenu flex_row_wrap">
				<img src="{{asset('images/icon_lien_externe.png')}}" alt="">
				<a href="">Lien externe</a>
			</p> --}}
		</section>
	</section>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/affich_classe.css')}}">
@endsection

@section('script')
@endsection
