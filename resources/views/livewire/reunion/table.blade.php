<div>
    <div class="container">

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
                            <th>Hora</th>
                            <th><i class="fa fa-map-marker"></i> Población</th>
                            <th>Estado</th>
                            <th><i class="fa fa-group"></i></th>
                            <th>Nº. <i class="fa fa-user"></i></th>
                            <th>Entrada</th>
                            <th>Total</th>
                            <th>Reserva</th>
                            <th>Dirección</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($reunions as $reunion)
                            <tr>
                                <td class="text-nowrap">{{$reunion->fechaDiaTabla()}}</td>
                                <td>{{$reunion->fechaHoraTabla()}}</td>
                                <td class="text-uppercase text-nowrap">
                                     {{$reunion->getPoblacion()}}, {{$reunion->getProvincia()}}
                                </td>
                                <td class="text-nowrap text-small ">
                                    @switch($reunion->estado)
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
                                </td>
                                <td class="text-center">
                                    @if($reunion->chicas)
                                            <i class="fa fa-venus p-1 venus" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-venus-mars p-1 indigo" aria-hidden="true"></i>
                                        @endif
                                </td>
                                <td class="text-center">{{$reunion->n_personas}}</td>
                                <td class="text-nowrap">{{$reunion->p_entrada}} €/p.</td>
                                <td class="text-nowrap">{{$reunion->t_entradas}} €</td>
                                <td class="text-nowrap text-small">
                                    @if($reunion->prepago)
                                        <i class="fa fa-credit-card true"> Prepago</i>
                                    @else
                                        <i class="fa fa-money false"> Insitu</i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="{{$reunion->getDireccion()}}">
                                        <i class="fa fa-address-card-o fa-lg" aria-hidden="true"></i>
                                    </span>
                                </td>
                                <td class="flex justify-content-center gap-2">
                                    <a href="#editEmployeeModal" data-toggle="modal">
                                        <i class="fa fa-pencil fa-lg" aria-hidden="true" title="Editar"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix">

                </div>

    </div>
</div>
