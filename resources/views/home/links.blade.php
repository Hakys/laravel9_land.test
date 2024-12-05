@extends('layouts.app')
@section('title', $viewData['title'])
@section('header')
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-4 text-center m-4">
            <ul class="list-group">
                <li class="list-group-item rounded mb-2">
                    <h2>DISEÑO</h2>
                    <div class="list-group text-start">
                        <a href="https://photokit.com/colors/color-wheel/?lang=es" target="_blank"
                            class="list-group-item list-group-item-action" aria-current="true">
                            Rueda de Color
                        </a>
                        <a href="https://getbootstrap.com/docs/5.3/getting-started/introduction/" target="_blank"
                            class="list-group-item list-group-item-action">Bootstrap v5.3 Docs
                        </a>
                        <a href=" https://fontawesome.com/v4/icons/" target="_blank"
                            class="list-group-item list-group-item-action">Iconos Fontawesome</a>
                        <a href="https://excalidraw.com/" target="_blank"
                            class="list-group-item list-group-item-action">Pizarra Digital</a>
                        <!-- <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                        <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled link item</a>
                        -->
                    </div>
                </li>
                <li class="list-group-item rounded">
                    <h2>RECURSOS APIS</h2>
                    <div class="list-group text-start">
                        <a href="https://account.distancematrix.ai/dashboard/" target="_blank"
                            class="list-group-item list-group-item-action" aria-current="true">
                            Distance Matriz AI - API Km.
                        </a>

                    </div>
                </li>
                <!--
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
                -->
              </ul>



        </div>
    </div>
    <div class="d-flex align-items-center flex-column bg-theme text-white text-center">
        <h2>@yield('subtitle', 'App Sex Shop Diabla Roja')</h2>
    </div>
@endsection
