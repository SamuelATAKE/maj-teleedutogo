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
			<p class="description"></p>
			<div class="flex_row_wrap">
                @foreach ($classes as $classe)
                    <div class="groupe_classe">
                        <a href="{{ route('classe', ['nom_cycle'=>'college', 'fullname_classe'=>$classe->fullName]) }}"
                            class="lien_cont_classe"
                        >
                            <h2 class="classe">{{ucfirst($classe->nom_accentue)}}</h2>
                            <hr>
                            <p class="description"></p>
                        </a>
                    </div>
                @endforeach
			</div>
		</div>
	</section>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/parcourir_css.css')}}">
@endsection

@section('script')
@endsection
