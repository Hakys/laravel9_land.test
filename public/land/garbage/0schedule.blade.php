<div class="container schedule mb-3">  
    <div class="row pt-2">
        @foreach ($viewData['reunions'] as $reunion)
            @if ($viewData["ant"]=="")
                <div class="col-lg-4 mb-3" id="{{$reunion->fechaDia()}}">
                    <h4 class="mt-0 mb-3 text-dark op-8 font-weight-bold">
                        {{$reunion->fechaDia()}}
                    </h4>
                    <ul class="list-timeline list-timeline-primary">
            @elseif ($viewData["ant"]!=$reunion->fechaDia())
                    </ul>
                </div>
                <div class="col-lg-4 mb-3" id="{{$reunion->fechaDia()}}">
                    <h4 class="mt-0 mb-3 text-dark op-8 font-weight-bold">
                        {{$reunion->fechaDia()}}
                    </h4>
                    <ul class="list-timeline list-timeline-primary">
            @endif    
                        <li class="list-timeline-item p-0 pb-3 d-flex flex-wrap flex-column" 
                            data-bs-toggle="collapse" data-bs-target="#tps-{{$reunion->id}}" 
                            aria-expanded="false" aria-controls="tps-{{$reunion->id}}" role="button">
                            <p class="my-0 text-dark flex-fw text-sm text-uppercase">
                                <span class="text-inverse op-8 bg-{{$reunion->getEstado()}}">
                                    {{$reunion->duracion(2)}}</span>
                                @if($reunion->chicas)
                                    <i class="fa fa-venus p-1 venus" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-venus-mars p-1 indigo" aria-hidden="true"></i>
                                @endif  
                                 
                                <span class="text-small">
                                    <i class="fa fa-map-marker"></i> {{$reunion->poblacion}}, {{$reunion->provincia}}
                                </span> 
                                
                                
                            </p>
                            <p id="tps-{{$reunion->id}}" class="my-0 collapse flex-fw text-xs text-dark op-8">  
                                
                                <i class="fa fa-credit-card p-1 @if($reunion->prepago) true @else false @endif"> Prepago</i>
                                <i class="fa fa-users p-1"> {{$reunion->n_personas}}</i>
                                
                                <i class="fa fa-ticket p-1"> {{$reunion->p_entrada}} €/p</i>
                                
                                <i class="fa fa-euro p-1"> {{$reunion->t_entradas}} €</i>
                                <span class="text-uppercase">{{$reunion->estado}}</span>
                            </p>
                        </li>
                  
            @php $viewData["ant"]=$reunion->fechaDia() @endphp       

        @endforeach 
                    </ul>
                </div>
    </div>
    <div class="d-flex justify-content-center">
            <div class="fw-bolder p-1 border border-light">ESTADOS:</div>
            <div><li class="fa fa-pencil p-2 bg-solicitada"> SOLICITADA</li></div>
            <div><li class="fa fa-registered p-2 bg-reservada"> RESERVADA</li></div> 
            <div><li class="fa fa-handshake-o p-2 bg-confirmada"> CONFIRMADA</li></div>
            <div><li class="fa fa-thumbs-o-up p-2 bg-realizada"> REALIZADA</li></div>
            <div><li class="fa fa-ban p-2 bg-cancelada"> CANCELADA</li></div>
        </div>
    </div>
</div>