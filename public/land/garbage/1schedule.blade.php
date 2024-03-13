<div class="container schedule mb-3"> 
    <div class="owl-carousel owl-theme">
        @foreach ($viewData['reunions'] as $reunion)
            @if ($viewData["ant"]=="")
                <div class="item" id="{{$reunion->fechaDia()}}">
                    <h4 class="mt-0 mb-3 px-2 text-dark op-8 font-weight-bold bg-gray">
                        {{$reunion->fechaDia()}}
                    </h4>
                    <ul class="list-timeline list-timeline-primary">
            @elseif ($viewData["ant"]!=$reunion->fechaDia())
                    </ul>
                </div>
                <div class="item" id="{{$reunion->fechaDia()}}">
                    <h4 class="mt-0 mb-3 px-2 text-dark op-8 font-weight-bold bg-gray">
                        {{$reunion->fechaDia()}}
                    </h4>
                    <ul class="list-timeline list-timeline-primary">
            @endif    
                        <li class="list-timeline-item p-0 pb-3 d-flex flex-wrap flex-column" 
                            data-bs-toggle="collapse" data-bs-target="#tps-{{$reunion->id}}" 
                            aria-expanded="false" aria-controls="tps-{{$reunion->id}}" role="button">
                            <p class="my-0 text-dark flex-fw text-sm ">
                                <span class="text-inverse op-8 bg-{{$reunion->getEstado()}}">
                                    {{$reunion->duracion(2)}}</span>
                                @if($reunion->chicas)
                                    <i class="fa fa-venus p-1 venus" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-venus-mars p-1 indigo" aria-hidden="true"></i>
                                @endif  
                                
                                <span class="text-small text-uppercase">
                                    <i class="fa fa-map-marker"></i> {{$reunion->poblacion}}, {{$reunion->provincia}}
                                </span> 
                                
                                
                            </p>
                            <p id="tps-{{$reunion->id}}" class="collapse text-xs text-dark op-8 my-0">  

                                <i class="fa fa-credit-card p-1 @if($reunion->prepago) true @else false @endif"> Prepago</i>
                                <i class="fa p-1">{{$reunion->n_personas}}</i><i class="fa fa-users p-1"></i>
                                <i class="fa p-1">{{$reunion->p_entrada}} €/p</i>
                                <i class="fa p-1">  {{$reunion->t_entradas}} € </i><i class="fa fa-ticket"></i>    
                            </p>
                        </li>
            @php $viewData["ant"]=$reunion->fechaDia() @endphp              
        @endforeach 
                    </ul>
                </div>
    </div>

    <button onclick="myFunction()">Try it</button>
    
    <div class="d-flex justify-content-center">
            <div class="fw-bolder p-1 border border-light">ESTADOS:</div>
            <div><li class="fa fa-pencil p-2 bg-solicitada"> SOLICITADA</li></div>
            <div><li class="fa fa-registered p-2 bg-reservada"> RESERVADA</li></div> 
            <div><li class="fa fa-handshake-o p-2 bg-confirmada"> CONFIRMADA</li></div>
            <div><li class="fa fa-thumbs-o-up p-2 bg-realizada"> REALIZADA</li></div>
            <div><li class="fa fa-ban p-2 bg-cancelada"> CANCELADA</li></div>
        </div>
    </div>
    <script>
        function setup(){
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                autoHeight: false,
                stagePadding: 50,
                loop:true,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                } 
            })
            owl.on('mousewheel', '.owl-stage', function (e) {
                if (e.deltaY>0) {
                    //owl.trigger('prev.owl');
                } else {
                    //owl.trigger('next.owl');
                }
                e.preventDefault();
            });
        }
        function myFunction() {
            setup();
        }
        $(document).ready(function(){
            setup();
        });
    </script>
</div>