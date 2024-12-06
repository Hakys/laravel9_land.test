@extends('layouts.app')
@section('title','Online Store')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-star fs-2 gap-4">
            <div class="fw-bolder">PROVEEDORES: </div>
            <ul>
         
            <li><a href="{{route('dreamlove.index')}}">DREAMLOVE</a></li>
            <li><a href="{{route('lovecherry.index')}}">LOVECHERRY</a></li>
            </ul>
        </div>
    </div>

    <div class="container-fluid d-flex">
        <div class="card m-2" style="width: 18rem;">
            <!--<img src="..." class="card-img-top" alt="...">-->
            <div class="card-body">
                <h5 class="card-title">Contactos</h5>
                <p class="card-text">[apodo, telefono]</p>
                <h5 class="card-title">Direcciones</h5>
                <p class="card-text">[full_name,telefono, email, nif, direccion,
                    cp, poblacion, provincia, pais, contacto_id,
                    distance_text, distance_value, duration_text, duration_value]</p>
                <a class="text-decoration-none text-nowrap" href="{{route('import.contacto')}}">Importar Google Contacts</a>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Total Contactos: {{ $contactos->count() }}</li>
                <li class="list-group-item">Total Direciones: {{ $direccions->count() }}</li>
            </ul>
        </div>
        <div class="card m-2" style="width: 18rem;">
            <!--<img src="..." class="card-img-top" alt="...">-->
            <div class="card-body">
                <h5 class="card-title">Reuniones</h5>
                <p class="card-text">[fecha, hora, chicas, prepago, n_personas,
                    p_entrada, t_entradas, direccion_id, estado]</p>
                <h5 class="card-title">Pagos</h5>
                <p class="card-text">[concepto, importe, fecha, metodo,
                    contacto_id, reunion_id]</p>
                <h5 class="card-title">Rutas</h5>
                <p class="card-text">[distance_text, distance_value,
                    duration_text, duration_value, origen, destino]</p>
                <!--<a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>-->
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Total Reuniones: {{ $reunions->count() }}</li>
                <li class="list-group-item">Total Pagos: {{ $pagos->count() }}</li>
                <li class="list-group-item">Total Rutas: {{ $rutas->count() }}</li>
            </ul>
        </div>
        <div class="card m-2" style="width: 18rem;">
            <!--<img src="..." class="card-img-top" alt="...">-->
            <div class="card-body">
                <h5 class="card-title">Productos</h5>
                <p class="card-text">[referencia, stock, coste, price, vat, title,
                    slug, new, available, url, released_at,
                    html_description, url_image, updated_server]</p>
                <a class="text-decoration-none text-nowrap" href="{{route('dreamlove.index')}}">Fichero DREAMLOVE</a>
                <a class="text-decoration-none text-nowrap" href="{{route('lovecherry.index')}}">Fichero LOVECHERRY</a>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Productos: {{ $productos->count() }}</li>
            </ul>
        </div>
    </div>
@endsection
