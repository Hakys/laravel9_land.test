
<div class="container">
    <!--
    <div class="d-flex justify-content-sm-center justify-content-md-start mb-2 flex-wrap small gap-2 ">
        <div class=""><li class="fa">ESTADOS:</li></div>
        <div class=""><li class="fa fa-pencil solicitada"> SOLICITADA</li></div>
        <div class=""><li class="fa fa-handshake-o confirmada"> CONFIRMADA</li></div>       
        <div class=""><li class="fa fa-registered reservada"> RESERVADA</li></div> 
        <div class=""><li class="fa fa-thumbs-o-up realizada"> REALIZADA</li></div>
        <div class=""><li class="fa fa-ban cancelada"> CANCELADA</li></div>
    </div>
    -->
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
                    <div id="collapse{{$reunion->IdfechaDia()}}" class="accordion-collapse " 
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
                    <div id="collapse{{$reunion->IdfechaDia()}}" class="accordion-collapse " 
                        aria-labelledby="heading{{$reunion->IdfechaDia()}}" >
                        <div class="accordion-body">
                            <ul class="list-timeline list-timeline-primary">     
            @endif
                                <li class="list-timeline-item p-0 d-flex flex-column mb-2" 
                                    data-bs-toggle="collapse" data-bs-target="#tps-{{$reunion->id}}" 
                                    aria-expanded="false" aria-controls="tps-{{$reunion->id}}" role="button">
                                    <div class="my-0 d-flex">
                                        <span class="text-inverse {{$reunion->getEstado()}} me-2 fs-5 ">                                          
                                            {{$reunion->hora()}}</span>
                                        <span class="text-uppercase">
                                            <i class="fa fa-home me-2"></i>{{$reunion->getPoblacion()}}, {{$reunion->getProvincia()}} 
                                        </span> 
                                        <span class="fa fa-caret-down ms-auto"></span>                                                                        
                                    </div>
                                    <div id="tps-{{$reunion->id}}" class="collapse small my-0 bg-light">  
                                        <span class="text-uppercase">
                                            <i class="fa fa-map-marker me-2"></i>{{$reunion->getDireccion()}} 
                                        </span> <br>
                                        @if($reunion->getChicas())
                                            <i class="fa fa-venus venus me-2" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-venus-mars indigo me-2" aria-hidden="true"></i>
                                        @endif
                                        <i class="fa ">{{$reunion->n_personas}}</i> <i class="fa fa-users me-2"></i>
                                        <i class="fa ">{{$reunion->p_entrada}} € /</i><i class="fa fa-user me-2"></i>
                                        <i class="fa ">total: {{$reunion->t_entradas}} € </i>     
                                        <br>                                   
                                        <i class="fa fa-credit-card me-2 
                                            @if($reunion->prepago) true @else false @endif">
                                            @if($reunion->prepago) Prepago @else Insitu @endif</i>  
                                        <span>
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
                                        </span>
                                    </div> 
                                                                                                         
                                </li>    
                                <li style="list-style:none"><div class="m-2 text-end">
                                    <a href="{{route('reunion.edit',$reunion->getId())}}"><i class="fa fa-pencil fa-xl"></i></a></div> </li>                             
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