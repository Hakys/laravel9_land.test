<div class="container schedule">  
    <div class="row pt-2">
        @foreach ($viewData['reunions'] as $reunion)
            <div class="col-md-6 col-lg-6" id="{{$reunion->fecha}}">
                @if ($viewData["ant"]!=$reunion->fechaDia())
                    <h4 class="mt-0 mb-3 text-dark op-8 font-weight-bold">
                        {{$reunion->fechaDia()}}
                    </h4>
                @endif
                @php $viewData["ant"]=$reunion->fechaDia() @endphp       
                <ul class="list-timeline list-timeline-primary">
                    <li class="list-timeline-item p-0 pb-3  d-flex flex-wrap flex-column" 
                        data-bs-toggle="collapse" data-bs-target="#tps-{{$reunion->id}}" 
                        aria-expanded="false" aria-controls="tps-{{$reunion->id}}" role="button">
                        <p class="my-0 text-dark flex-fw text-sm text-uppercase">
                            <span class="text-inverse op-8">{{$reunion->duracion(2)}}</span>
                            - {{$reunion->poblacion}}, {{$reunion->provincia}}
                        </p>
                        <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8" 
                            id="tps-{{$reunion->id}}"> 
                            Talk: OpenData / <span class="text-primary">Room 31</span> 
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                            <i class="fa-solid fa-clock"></i>
                            {{$reunion->chicas}}
                            {{$reunion->prepago}}
                            {{$reunion->estado}}
                            {{$reunion->n_personas}}
                            {{$reunion->p_entrada}}
                            {{$reunion->t_entradas}}
                            {{$reunion->direccion_id}}
                        </p>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
</div>

<div class="container">
    <p class="d-inline-flex gap-1">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" 
            role="button" aria-expanded="false" aria-controls="collapseExample">
          Link with href
        </a>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" 
            data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Button with data-bs-target
        </button>
      </p>
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
          Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
        </div>
      </div>
</div>

<div class="container schedule">  
    <div class="row pt-2 ">
        <!-- Days -->
        <div class="col-lg-4 mb-3" id="Friday, Nov 13th">
            <h4 class="mt-0 mb-3 text-dark op-8 font-weight-bold">
                Friday, Nov 13th
            </h4>
            <ul class="list-timeline list-timeline-primary">
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase">
                        <span class="text-inverse op-8">09:00 - 10:00</span> - Registration</p>
                </li>
                <li class="list-timeline-item show p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" 
                    data-toggle="collapse" data-target="#day-1-item-2">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase">
                        <span class="text-primary font-weight-bold op-8 infinite animated flash" 
                            data-animate="flash" data-animate-infinite="1" data-animate-duration="3.5"
                            style="animation-duration: 3.5s;">
                            Now</span> - Vitaly Friedmann</p>
                    <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8 show" 
                        id="day-1-item-2"> Talk: Wireframing / <span class="text-primary">Room 19</span> </p>
                </li>
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">12:00 -
                            13:00</span> - Lunch Break</p>
                </li>
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" data-toggle="collapse"
                    data-target="#day-1-item-4">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">13:00 -
                            15:00</span> - Anthony Jonas</p>
                    <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8" id="day-1-item-4"> Talk:
                        OpenData / <span class="text-primary">Room 31</span> </p>
                </li>
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">15:00 -
                            16:00</span> - Coffee Break</p>
                </li>
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" data-toggle="collapse"
                    data-target="#day-1-item-6">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">16:00 -
                            18:00</span> - Jesscia Lawrence</p>
                    <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8" id="day-1-item-6"> Talk:
                        Ninja coding / <span class="text-primary">Room 31</span> </p>
                </li>
                <li class="list-timeline-item p-0 pb-3 d-flex flex-wrap flex-column">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">18:00 -
                            23:00</span> - After conference</p>
                </li>
            </ul>
        </div>
        <div class="col-lg-4 mb-3" id="Saturday, Nov 14th">
            <h4 class="mt-0 mb-3 text-dark op-8 font-weight-bold">
                Saturday, Nov 14th
            </h4>
            <ul class="list-timeline list-timeline-primary">
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">09:00 -
                            10:00</span> - Registration</p>
                </li>
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" data-toggle="collapse"
                    data-target="#day-2-item-2">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">10:00 -
                            12:00</span> - Vitaly Friedmann</p>
                    <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8" id="day-2-item-2"> Talk:
                        Wireframing / <span class="text-primary">Room 19</span> </p>
                </li>
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">12:00 -
                            13:00</span> - Lunch Break</p>
                </li>
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" data-toggle="collapse"
                    data-target="#day-2-item-4">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">13:00 -
                            15:00</span> - Bruce Lawson</p>
                    <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8" id="day-2-item-4"> Talk: Big
                        Data / <span class="text-primary">Room 19</span> </p>
                </li>
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">15:00 -
                            16:00</span> - Coffee Break</p>
                </li>
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" data-toggle="collapse"
                    data-target="#day-2-item-6">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">16:00 -
                            18:00</span> - Anthony Jonas</p>
                    <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8" id="day-2-item-6"> Talk:
                        OpenData / <span class="text-primary">Room 31</span> </p>
                </li>
                <li class="list-timeline-item p-0 pb-3 d-flex flex-wrap flex-column">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">18:00 -
                            23:00</span> - After conference</p>
                </li>
            </ul>
        </div>
        <div class="col-lg-4 mb-3" id="Sunday, Nov 15th">
            <h4 class="mt-0 mb-3 text-dark op-8 font-weight-bold">
                Sunday, Nov 15th
            </h4>
            <ul class="list-timeline list-timeline-primary">
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">09:00 -
                            10:00</span> - Registration</p>
                </li>
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" data-toggle="collapse"
                    data-target="#day-3-item-2">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">10:00 -
                            12:00</span> - Jesscia Lawrence</p>
                    <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8" id="day-3-item-2"> Talk:
                        Ninja coding / <span class="text-primary">Room 31</span> </p>
                </li>
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">12:00 -
                            13:00</span> - Lunch Break</p>
                </li>
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" data-toggle="collapse"
                    data-target="#day-3-item-4">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">13:00 -
                            15:00</span> - Anthony Jonas</p>
                    <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8" id="day-3-item-4"> Talk:
                        OpenData / <span class="text-primary">Room 31</span> </p>
                </li>
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">15:00 -
                            16:00</span> - Coffee Break</p>
                </li>
                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column" data-toggle="collapse"
                    data-target="#day-3-item-6">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">16:00 -
                            18:00</span> - Anthony Jonas</p>
                    <p class="my-0 collapse flex-fw text-uppercase text-xs text-dark op-8" id="day-3-item-6"> Talk:
                        OpenData / <span class="text-primary">Room 31</span> </p>
                </li>
                <li class="list-timeline-item p-0 pb-3 d-flex flex-wrap flex-column">
                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">18:00 -
                            23:00</span> - After conference</p>
                </li>
            </ul>
        </div>
    </div>
</div>