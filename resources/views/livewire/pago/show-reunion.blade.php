<div class="container-fluid">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
    <table class="table table-responsive table-striped table-hover table-bordered">
        <thead>
            <tr class="text-center text-nowrap">
                <th>Fecha</th>
                <th><i class="fa fa-map-marker"></i> Contacto</th>
                <th>Concepto</th>
                <th>Método</th>
                <th>Importe</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="align-middle">
            @foreach ($pagos as $item)
                <tr class='clickable-row' data-href='{{ route("reunion.show", ['id' => $item->getId()]) }}'>
                    <td class="text-nowrap">{{ $item->fechaDiaTabla() }}</td>
                    <td>{{ $item->contacto->getApodo() }}</td>
                    <td class="text-nowrap">
                        {{ $item->getConcepto() }}
                        <!--
                        @switch($item->estado)
                            @case("solicitada")
                                <i class="fa fa-pencil solicitada"> SOLICITADA</i>@break
                            @case("confirmada")
                                <i class="fa fa-handshake-o confirmada"> CONFIRMADA</i>@break
                            @case("reservada")
                                <i class="fa fa-registered reservada"> RESERVADA</i>@break
                            @case("realizada")
                                <i class="fa fa-thumbs-o-up realizada"> REALIZADA</i>@break
                            @case("cancelada")
                                <i class="fa fa-ban cancelada"> CANCELADA</i>@break
                        @endswitch
                        -->
                    </td>
                    <td class="text-center">
                        {{ $item->getMetodo() }}
                        <!--
                        @if($item->chicas)
                                <i class="fa fa-venus p-1 venus" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-venus-mars p-1 indigo" aria-hidden="true"></i>
                            @endif
                        -->
                    </td>
                    <td class="text-nowrap">{{ $item->getImporte() }} €</td>
                    <td class="flex justify-content-center gap-2">
                        <a href="#" data-toggle="modal">
                            <i class="fa fa-pencil fa-lg" aria-hidden="true" title="Editar"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="clearfix"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            jQuery(document).ready(function($) {
                $(".clickable-row").click(function() {
                    window.location = $(this).attr('data-href');
                });
            });
        });
    </script>
</div>
