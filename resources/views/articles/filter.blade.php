<form action="/search" method="POST">
    @csrf
    <div class="input-group ">
        <input type="text" class="form-control w-75" id="search" name="search" placeholder="Buscar">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">&#x1F50E;</button>
        </div>
    </div>
</form>
<hr>