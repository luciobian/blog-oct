<form action="/search" method="POST">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control width-input" id="search" name="search" placeholder="Buscar">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">&#x1F50E;</button>
        </div>
    </div>
</form>