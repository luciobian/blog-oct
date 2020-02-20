<div id="accordion">
    <div class="card">
        <div class="card-header" id="comments">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    <h5 class="mb-0">Comentarios ({{$comments->count()}})</h5>
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="comments" data-parent="#accordion">
            <div class="card-body">

                
                @foreach ($comments as $comment)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <h5>{{$comment->users->name}}</h5>
                        <span class="text-muted">{{$comment->created_at->diffForHumans()}}</span>
                    </div>
                    <p class="ml-1">
                        {{$comment->body}}
                    </p>
                </li>
                <hr>
                @endforeach
                
            </div>
        </div>
    </div>
</div>