@extends('layouts.app')

@section('content')
@include('articles.order')

@if ($articles->count()>0)

@foreach ($articles as $article)

<div class="mt-5 d-block">
    <div class="card mw-50 mx-auto">

        @if (!$article->images || !file_exists( public_path() . '/images/'.$article->images->path))
        <img class="img-fluid main-img rounded mx-auto mt-3  d-block"
            src="{{ URL::to('/')."/img/image-not-found.png"}}"
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
            <span class="d-flex justify-content-between align-items-center">
                @can('delete', $article)
                <form action="{{ route("delete", ['article'=>$article->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-link">Eliminar</button>
                </form>
                @endcan
                <p class="card-text text-right"><small class="text-muted">&#8987;
                        {{$article->updated_at->diffForHumans()}}</small></p>
            </span>
        </div>


    </div>
    @endforeach

    <div class="row mt-5">
        <div class=" mx-auto">
            {{ $articles->links() }}
        </div>
    </div>
    {{public_path()."/img/not-found.svgasdas"}}
@else
    @include('articles.not-found')
@endif

@endsection