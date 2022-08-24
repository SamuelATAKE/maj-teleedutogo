@extends('layouts.default')


@section('style')
<link rel="stylesheet" href="{{asset('css/404.css')}}">
@endsection

@section('title')
Erreur 404
@endsection

@section('content')
<section class="main-container">
    <h1>Erreur 404</h1>
    <div class="img-container">
        <picture>
            <img src="{{asset('images/404.png')}}" alt="404">
        </picture>
    </div>
    <p class="info">
        La page que vous demandez n'existe pas.
    </p>
</section>
@endsection

@section('script')
@endsection
