@extends('layouts.app')
@section('content')
@if($article->clean)
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>	
    No se realizaron modificaciones.

</div>
@endif

<form method="POST" action="/articles/{{$article->id}}" enctype="multipart/form-data">
    {{csrf_field()}}
    {{ method_field('PUT') }}
    <div class="form-group mx-3">
        <div class="form-group">
            <label for="title">
                <h3>Título</h3>
            </label>
            <input type="text" name="title" class="form-control" value="{{$article->title}}">
        </div>
    </div>
    <div class="mx-3">
        <input type="file" name="image" id="image" accept="image/*" value="{{public_path()."/images/{$article->images->path}"}}" class="form-control-file" onchange="readURL(this);">
        <span class="d-flex justify-content-center">
            <img style="max-width: 180px;" id="ImdID" src="{{ URL::to('/')."/images/{$article->images->path}" }}"
                class="mt-3 mb-3 " alt="Imagen previa">
        </span>
    </div>
    <div class="form-group mx-3">
        <label for="body">
            <h3>Texto</h3>
        </label>
        <textarea name="body" class="form-control" rows="15">{{$article->body}}</textarea>
    </div>
    <div class="container text-right">
        <button type="submit" class="btn btn-primary mt-3 mb-3">Actulizar</button>
    </div>   
</form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    // https://stackoverflow.com/questions/16207575/how-to-preview-an-image-before-and-after-upload
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#ImdID').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection