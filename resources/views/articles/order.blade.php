<span class="text-right">
    <div class="dropdown show">
        <a class="btn btn-link dropdown-toggle" 
            href="#" 
            role="button" 
            id="dropdownOrder" 
            data-toggle="dropdown"
            aria-haspopup="true" 
            aria-expanded="false">
            Ordenar
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownOrder">
            <a class="dropdown-item" href="#">Últimos</a>
            <a class="dropdown-item" href="#">Populares</a>
            @auth
            <a class="dropdown-item" href="#">Mis artículos</a>
            @endauth

        </div>
    </div>
</span>
<hr>