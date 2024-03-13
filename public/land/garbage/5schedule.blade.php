<div class="container">
    <style>
        @media (max-width: 767px) {
            .carousel-inner .carousel-item > div {
                display: none;
            }
            .carousel-inner .carousel-item > div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* medium and up screens */
        @media (min-width: 768px) {
            
            .carousel-inner .carousel-item-end.active,
            .carousel-inner .carousel-item-next {
            transform: translateX(25%);
            }
            
            .carousel-inner .carousel-item-start.active, 
            .carousel-inner .carousel-item-prev {
            transform: translateX(-25%);
            }
        }

        .carousel-inner .carousel-item-end,
        .carousel-inner .carousel-item-start { 
        transform: translateX(0);
        }
        .card{
            height: 100px;
        }
    </style>
    <div class="container-fluid my-3">
        <div id="recipeCarousel" class="carousel slide" 
            data-bs-interval="false" data-bs-keyborad="true" data-bs-ride="false" data-bs-touch="false">
            <div class="carousel-inner" role="listbox">
                @foreach ($viewData['reunions'] as $reunion)
                    <div class="carousel-item @if($viewData['hoy']==$reunion->fechaDia()) active @endif" 
                        id="{{$reunion->fechaDia()}}">
                        <div class="col-auto mx-1 border border-1 border-black">
                            <h4 class="mt-0 mb-3 px-2 text-dark op-8 font-weight-bold bg-gray">
                                {{$reunion->fechaDia()}}
                            </h4>
                            <ul class="list-timeline list-timeline-primary ms-2">
                                <li class="list-timeline-item px-3 pb-3 d-flex flex-wrap flex-column" 
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
                            </ul>
                        </div>
                    </div>
                @endforeach
                <!--
                @foreach ($viewData['reunions'] as $reunion)
                    @if ($viewData["ant"]=="")
                    <div class="carousel-item @if($viewData['hoy']==$reunion->fechaDia()) active @endif" 
                        id="{{$reunion->fechaDia()}}">
                        <div class="col-auto mx-1 border border-1 border-black">
                            <h4 class="mt-0 mb-3 px-2 text-dark op-8 font-weight-bold bg-gray">
                                {{$reunion->fechaDia()}}
                            </h4>
                            <ul class="list-timeline list-timeline-primary ms-2">
                    @elseif ($viewData["ant"]!=$reunion->fechaDia())
                            </ul>
                        </div>
                    </div>
                    <div class="carousel-item @if($viewData['hoy']==$reunion->fechaDia()) active @endif" 
                        id="{{$reunion->fechaDia()}}">
                        <div class="col-auto mx-1 border border-1 border-black">
                            <h4 class="mt-0 mb-3 px-2 text-dark op-8 font-weight-bold bg-gray">
                                {{$reunion->fechaDia()}}
                            </h4>
                            <ul class="list-timeline list-timeline-primary ms-2">
                    @endif    
                                <li class="list-timeline-item px-3 pb-3 d-flex flex-wrap flex-column" 
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
                    <div class="carousel-item" id="AddReunion">
                        <div class="col-auto border border-2 border-black mx-1 border-star-2">
                            <h4 class="mt-0 mb-3 px-2 text-dark op-8 font-weight-bold bg-gray">
                                Añadir Reunión
                            </h4>
                            
                            <div class=" text-center ">
                                <a class="btn btn-success" href="{{route('reunion.create')}}">                    
                                    <i class="fa fa-calendar-plus-o fa-lg" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" 
                    role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" 
                    role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            -->
            </div>
        </div>
    </div>
    <script type="text/javascript">
        let items = document.querySelectorAll('.carousel .carousel-item')
        items.forEach((el) => {
            const minPerSlide = 4;
            let next = el.nextElementSibling;
            for (var i=1; i<minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0];
                }
                let cloneChild = next.cloneNode(true);
                el.appendChild(cloneChild.children[0]);
                next = next.nextElementSibling;
            }
        });
    </script>

    
<hr/>
<!--
    <div class="accordion" id="accordionExample">
    @foreach ($viewData['reunions'] as $reunion)
        @if ($viewData["ant"]=="")
            <div class="accordion" id="{{$reunion->IdfechaDia()}}">
                <h2 class="accordion-header" id="heading{{$reunion->IdfechaDia()}}">    
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{$reunion->fechaDia()}}
                    </button>
                </h2>
                <div id="collapse{{$reunion->IdfechaDia()}}" class="accordion-collapse collapse show" 
                    aria-labelledby="heading{{$reunion->IdfechaDia()}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-timeline list-timeline-primary">
        @elseif ($viewData["ant"]!=$reunion->fechaDia())
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion" id="{{$reunion->IdfechaDia()}}">
                <h2 class="accordion-header" id="heading{{$reunion->IdfechaDia()}}">    
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{$reunion->fechaDia()}}
                    </button>
                </h2>
                <div id="collapse{{$reunion->IdfechaDia()}}" class="accordion-collapse collapse show" 
                    aria-labelledby="heading{{$reunion->IdfechaDia()}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
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
            </div>
    </div>
-->
</div>