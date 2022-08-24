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
		<!-- BLOC SERIE CD -->
		<div class="flex_column bloc_classes serieCD">
			<h2 class="titre_series">Série CD </h2>
			<div class="flex_row_wrap ">
				<div class="groupe_classe">
					<a href="{{route('classe', ['lycee','Seconde CD'])}}" class="lien_cont_classe">
						<h3 class="classe">Seconde</h3>
						<hr>
						<p class="description"></p>
					</a>
				</div>
			</div>
		</div>
		<!-- BLOC SERIE C -->
		<div class="flex_column bloc_classes serieC">
			<h2 class="titre_series">Série C </h2>
			<div class="flex_row_wrap ">
				<div class="groupe_classe">
					<a href="{{route('classe', ['lycee','Première C'])}}" class="lien_cont_classe">
						<h3 class="classe">Première</h3>
						<hr>
						<p class="description"></p>
					</a>
				</div>
				<div class="groupe_classe">
					<a href="{{route('classe', ['lycee','Terminale C'])}}" class="lien_cont_classe">
						<h3 class="classe">Terminale</h3>
						<hr>
						<p class="description"></p>
					</a>
				</div>
			</div>
		</div>
		<!-- BLOC SERIE D -->
		<div class="flex_column bloc_classes serieD">
			<h2 class="titre_series">Série D </h2>
			<div class="flex_row_wrap ">
				<div class="groupe_classe">
					<a href="{{route('classe', ['lycee','Première D'])}}" class="lien_cont_classe">
						<h3 class="classe">Première</h3>
						<hr>
						<p class="description"></p>
					</a>
				</div>
				<div class="groupe_classe">
					<a href="{{route('classe', ['lycee','Terminale D'])}}" class="lien_cont_classe">
						<h3 class="classe">Terminale</h3>
						<hr>
						<p class="description"></p>
					</a>
				</div>
			</div>
		</div>
		<!-- BLOC SERIE A4 -->
		<div class="flex_column bloc_classes serieA4">
			<h2 class="titre_series">Série A4 </h2>
			<div class="flex_row_wrap ">
				<div class="groupe_classe">
					<a href="{{route('classe', ['lycee','Seconde L'])}}" class="lien_cont_classe">
						<h3 class="classe">Seconde</h3>
						<hr>
						<p class="description"></p>
					</a>
				</div>
				<div class="groupe_classe">
					<a href="{{route('classe', ['lycee','Première L'])}}" class="lien_cont_classe">
						<h3 class="classe">Première</h3>
						<hr>
						<p class="description"></p>
					</a>
				</div>
				<div class="groupe_classe">
					<a href="{{route('classe', ['lycee','Terminale L'])}}" class="lien_cont_classe">
						<h3 class="classe">Terminale</h3>
						<hr>
						<p class="description"></p>
					</a>
				</div>
			</div>
		</div>
		<!-- BLOC SERIE E -->
		<div class="flex_column bloc_classes serieE">
			<h2 class="titre_series">Série E </h2>
			<div class="flex_row_wrap ">
				<div class="groupe_classe">
					<a href="{{route('classe', ['lycee','Seconde E'])}}" class="lien_cont_classe">
						<h3 class="classe">Seconde</h3>
						<hr>
						<p class="description"></p>
					</a>
				</div>
				<div class="groupe_classe">
					<a href="{{route('classe', ['lycee','Première E'])}}" class="lien_cont_classe">
						<h3 class="classe">Première</h3>
						<hr>
						<p class="description"></p>
					</a>
				</div>
				<div class="groupe_classe">
					<a href="{{route('classe', ['lycee','Terminale E'])}}" class="lien_cont_classe">
						<h3 class="classe">Terminale</h3>
						<hr>
						<p class="description"></p>
					</a>
				</div>
			</div>
		</div>
		<!-- BLOC SERIE F4 -->
		<div class="flex_column bloc_classes serieF4">
			<h2 class="titre_series">Série F4 </h2>
			<div class="flex_row_wrap ">
				<div class="groupe_classe">
					<a href="{{route('classe', ['lycee','Seconde F4'])}}" class="lien_cont_classe">
						<h3 class="classe">Seconde</h3>
						<hr>
						<p class="description"></p>
					</a>
				</div>
				<div class="groupe_classe">
					<a href="{{route('classe', ['lycee','Première F4'])}}" class="lien_cont_classe">
						<h3 class="classe">Première</h3>
						<hr>
						<p class="description"></p>
					</a>
				</div>
				<div class="groupe_classe">
					<a href="{{route('classe', ['lycee','Terminale F4'])}}" class="lien_cont_classe">
						<h3 class="classe">Terminale</h3>
						<hr>
						<p class="description"></p>
					</a>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		/*:::::: DECORATION DU BACKGROUND POUR LES BLOCS CLASSES ::::::*/
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
