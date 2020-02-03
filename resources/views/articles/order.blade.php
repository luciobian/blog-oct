<div class="d-flex justify-content-between align-center">
    @include('articles.filter')
    <span>
        <div class="dropdown show">
            <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownOrder" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Ordenar
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownOrder">
                <a class="dropdown-item" href="#" selected>Últimos</a>
                <a class="dropdown-item" href="#">Populares</a>
                @auth
                <a class="dropdown-item" href="#">Mis artículos</a>
                @endauth

            </div>
        </div>
    </span>
</div>
<hr>