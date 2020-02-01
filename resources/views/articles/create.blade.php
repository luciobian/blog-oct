@extends('layouts.app')

@section('content')
<form>
    <div class="form-group mx-3">
        <div class="form-group">
            <label for="title"><h3>Título</h3></label>
            <input type="text" name="title" class="form-control ">
        </div>
    </div>
    <div class="mx-3">
        <input type="file" 
                name="img" 
                id="img" 
                class="form-control-file" 
                onchange="readURL(this);">
        <span class="d-flex justify-content-center">
            <img style="max-width: 180px;" 
                id="ImdID" 
                src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" 
                class="mt-3 mb-3 " 
                alt="Imagen previa">
        </span>
    </div>
    <div class="form-group mx-3">
        <label for="body"><h3>Texto</h3></label>
        <textarea name="body" 
                class="form-control"
                rows="15"></textarea>
    </div>
    <button type="submit" 
            class="btn btn-primary mt-3 float-right">Publicar</button>

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