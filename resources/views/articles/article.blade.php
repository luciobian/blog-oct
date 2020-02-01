@extends('layouts.app')

@section('content')
@foreach ($articles as $article)

<div class="mt-5 d-block">
        <div class="card mw-50 mx-auto">
            <img class="card-img-top img-fluid main-image mx-auto"
                src="https://previews.123rf.com/images/anatolymas/anatolymas1209/anatolymas120900004/15066838-persona-3d-peque%C3%B1a-mirando-a-trav%C3%A9s-de-binoculares-imagen-en-3d-aislado-fondo-blanco-.jpg"
                alt="Card image cap">
            <div class="card-body">
                <a href="{{ url('/articles/'.$article->id) }}">
                    <h3 class="card-title">{{$article->title}}</h3>
                </a>
                <p class="card-text">{{ str_limit($article->body, $limit = 350, $end = '...') }}</p>
            </div>
            <div class="card-footer">
                <p class="card-text text-right"><small class="text-muted">&#8987;
                        {{$article->updated_at->diffForHumans()}}</small></p>
            </div>
    

        </div >  
        @endforeach
            
            <div class="row mt-5">
                <div class=" mx-auto">
                    {{ $articles->links() }}
                </div>
            </div>
@endsection