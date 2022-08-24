@extends('layouts.default')


@section('style')
<link rel="stylesheet" href="{{asset('css/500.css')}}">
@endsection

@section('title')
Erreur 500
@endsection

@section('content')
<section class="main-container">
    <h1>Erreur 500</h1>
    <div class="img-container">
        <picture>
            <img src="{{asset('images/500.png')}}" alt="404">
        </picture>
    </div>
    <p class="info">
        Une erreur est survenue lors du traitement de votre requête.
    </p>
</section>
@endsection

@section('script')
@endsection
