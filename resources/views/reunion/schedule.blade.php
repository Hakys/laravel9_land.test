
<div class="container-fluid">
    <div class="d-flex justify-content-between small mb-2">
        <div><li class="fa">ESTADOS:</li></div>
        <div><li class="fa fa-pencil solicitada"> SOLICITADA</li></div>
        <div><li class="fa fa-handshake-o confirmada"> CONFIRMADA</li></div>        
        <div><li class="fa fa-registered reservada"> RESERVADA</li></div> 
        <div><li class="fa fa-thumbs-o-up realizada"> REALIZADA</li></div>
        <div><li class="fa fa-ban cancelada"> CANCELADA</li></div>
    </div>

    <div class="accordion" id="accordionSchedule">
<!--
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Accordion Item #1
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" 
                aria-labelledby="headingOne" data-bs-parent="#accordionSchedule">
                <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
    -->
        @foreach ($viewData['reunions'] as $reunion)
            @if ($viewData["ant"]=="")
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{$reunion->IdfechaDia()}}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#collapse{{$reunion->IdfechaDia()}}" aria-expanded="false" 
                        aria-controls="collapse{{$reunion->IdfechaDia()}}">
                            {{$reunion->fechaDia()}}
                        </button>
                    </h2>
                    <div id="collapse{{$reunion->IdfechaDia()}}" class="accordion-collapse collapse" 
                        aria-labelledby="heading{{$reunion->IdfechaDia()}}" >
                        <div class="accordion-body">
                            <ul class="list-timeline list-timeline-primary">
            @elseif ($viewData["ant"]!=$reunion->fechaDia())    
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{$reunion->IdfechaDia()}}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#collapse{{$reunion->IdfechaDia()}}" aria-expanded="false" 
                        aria-controls="collapse{{$reunion->IdfechaDia()}}">
                            {{$reunion->fechaDia()}}
                        </button>
                    </h2>
                    <div id="collapse{{$reunion->IdfechaDia()}}" class="accordion-collapse collapse" 
                        aria-labelledby="heading{{$reunion->IdfechaDia()}}" >
                        <div class="accordion-body">
                            <ul class="list-timeline list-timeline-primary">       
            @endif
                                <li class="list-timeline-item p-0 d-flex flex-wrap flex-column mb-2" 
                                    data-bs-toggle="collapse" data-bs-target="#tps-{{$reunion->id}}" 
                                    aria-expanded="false" aria-controls="tps-{{$reunion->id}}" role="button">
                                    <p class="my-0 text-dark flex-fw text-sm ">
                                        <span class="text-inverse op-8 {{$reunion->getEstado()}}">
                                            {{$reunion->duracion(2)}}</span>
                                        @if($reunion->chicas)
                                            <i class="fa fa-venus p-1 venus" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-venus-mars p-1 indigo" aria-hidden="true"></i>
                                        @endif                                          
                                        <span class="text-uppercase">
                                            <i class="fa fa-map-marker"></i> {{$reunion->provincia}}, {{$reunion->poblacion}} 
                                        </span>                                        
                                    </p>
                                    <p id="tps-{{$reunion->id}}" class="collapse text-xs text-dark op-8 my-0">  
                                        <i class="fa p-1">{{$reunion->n_personas}}</i><i class="fa fa-users p-1"></i>
                                        <i class="fa p-1">{{$reunion->p_entrada}} €</i>/<i class="fa fa-user"></i>
                                        <i class="fa p-1"> {{$reunion->t_entradas}} € </i> 
                                        <i class="fa fa-credit-card p-1 @if($reunion->prepago) true @else false @endif">
                                            @if($reunion->prepago) Prepago @else Insitu @endif</i>  
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
                                    </p>
                                    
                                </li>
            @php $viewData["ant"]=$reunion->fechaDia() @endphp
        @endforeach 
                            </ul>
                        </div>
                    </div>
                </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Accordion Item #3
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
      </div>

</div>