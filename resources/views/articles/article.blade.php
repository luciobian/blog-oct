@extends('layouts.app')

@section('content')
@foreach ($articles as $article)

<div class="mt-5 d-block">
    <div class="card mw-50 mx-auto">

        @if (!$article->images)
        <img class="img-fluid main-img rounded mx-auto mt-3  d-block"
            src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22272%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20272%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16ff364d6b3%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16ff364d6b3%22%3E%3Crect%20width%3D%22272%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22100.203125%22%20y%3D%22106.3375%22%3E272x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
            alt="{{$article->title}}" srcset="">
        @else
        <img class="img-fluid main-img rounded mx-auto mt-3  d-block" 
            src="{{ URL::to('/')."/images/{$article->images->path}"}}"
            alt="{{$article->title}}" srcset="">
        @endif
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


    </div>
    @endforeach

    <div class="row mt-5">
        <div class=" mx-auto">
            {{ $articles->links() }}
        </div>
    </div>
    @endsection