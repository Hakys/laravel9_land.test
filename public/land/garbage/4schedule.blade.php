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
   <div class="container-fluid text-center my-3">
    <div class="row">
        <div class="row mx-auto my-auto justify-content-center">
        <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">


            @foreach ($viewData['reunions'] as $reunion)
                @if ($viewData["ant"]=="")
                <div class="carousel-item " id="{{$reunion->fechaDia()}}">
                    <div class="col-md-2">
                    <h4 class="mt-0 mb-3 px-2 text-dark op-8 font-weight-bold bg-gray">
                        {{$reunion->fechaDia()}}
                    </h4>
                    <ul class="list-timeline list-timeline-primary">
            @elseif ($viewData["ant"]!=$reunion->fechaDia())
                    </ul>
                    </div>
                </div>
                <div class="carousel-item " id="{{$reunion->fechaDia()}}">
                    <div class="col-md-2">
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


                <div class="carousel-item">
                    
                        <div class="card">
                            <div class="card-img">
                                
                            </div>
                            <div class="card-img-overlay">Slide 1</div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-img">
                                <img src="img/safe.jpg" class="img-fluid">
                            </div>
                            <div class="card-img-overlay">Slide 2</div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-img">
                                <img src="/img/submarine.jpg" class="img-fluid">
                            </div>
                            <div class="card-img-overlay">Slide 3</div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-img">
                                <img src="/img/game.jpg" class="img-fluid">
                            </div>
                            <div class="card-img-overlay">Slide 4</div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-img">
                                <img src="img/4.jpg" class="img-fluid">
                            </div>
                            <div class="card-img-overlay">Slide 4</div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>
    </div>
    
</div>
        <script type="text/javascript">
 let items = document.querySelectorAll('.carousel .carousel-item')

items.forEach((el) => {
    const minPerSlide = 3
    let next = el.nextElementSibling
    for (var i=1; i<minPerSlide; i++) {
        if (!next) {
            // wrap carousel by using first child
            next = items[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
});
    </script>
</div>