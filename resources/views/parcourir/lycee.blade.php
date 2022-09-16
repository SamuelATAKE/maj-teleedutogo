@extends('layouts.little')

@section('title')
Lycée | TELEEDUTOGO
@endsection

@section('h1')
Parcourir le lycée
@endsection

@section('page_description')
Retouvez des cours et des exercices pour le lycée
@endsection

@section('content')
	<section id="conteneur_principal" class="espace_lycee">
        @foreach ($classes_groupes as $serie_name => $groupe_classes)
            <div class="flex_column bloc_classes serieC">
                <h2 class="titre_series">Série {{$serie_name}} </h2>
                <div class="flex_row_wrap ">
                    @forelse ($groupe_classes as $classe)
                        <div class="groupe_classe">
                            <a href="{{ route('classe', ['nom_cycle'=>'lycee', 'fullname_classe'=>$classe->fullName]) }}" class="lien_cont_classe">
                                <h3 class="classe">{{ucfirst($classe->nom_accentue)}}</h3>
                                <hr>
                                <p class="description"></p>
                            </a>
                        </div>
                    @empty
                        <p class="description">Pas de contenu ici pour le moment</p>
                    @endforelse
                </div>
            </div>
        @endforeach
	</section>
	<script type="text/javascript">
		/*:DECORATION DU BACKGROUND POUR LES BLOCS CLASSES */
		let blocClasses=Array.from(document.querySelectorAll(".bloc_classes"));
		blocClasses.forEach((e, index)=> {
			e.style.backgroundColor = index%2==0? "#6362623b": "";
		});
	</script>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/parcourir_css.css')}}">
@endsection

@section('script')
<script src="{{asset('js/pacourir-js.js')}}"></script>
@endsection
