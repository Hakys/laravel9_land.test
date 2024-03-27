<div>
    <style>
        .fc-license-message{ visibility: hidden;}    
    </style>
    <div id='agenda'></div>

    <!-- Modal trigger button 
    <button
        type="button"
        class="btn btn-primary btn-lg"
        data-bs-toggle="modal"
        data-bs-target="#evento"
    >
        Launch
    </button>
    -->
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="evento" tabindex="-1" 
        data-bs-backdrop="true" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div role="document" class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Datos del Evento
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">     
                    <form action ="" id="formularioEventos">
                        @csrf  
                        <input type="text" name="id" id="id" hidden/>
                        <input type="datetime-local" name="start" id="start" hidden/>
                        <input type="datetime-local" name="end" id="end" hidden/>
                        <input type="text" name="dir_id" id="dir_id" hidden/>
                        <input type="text" name="con_id" id="con_id" hidden/>                      
                        <div class="flex">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Día y Hora:</span>
                                <input type="date" id="date" name="date" class="form-control form-control-lg">
                                <input type="time" id="time" name="time" list="horas"
                                    class="form-control form-control-lg">
                                <datalist id="horas" class="w-100">
                                    <option value="16:30"></option>
                                    <option value="19:30"></option>
                                    <option value="23:30"></option>  
                                </datalist>
                            </div>                            
                            <div class="input-group mb-3">
                                <input list="clientes" name="cliente_id" 
                                    id="cliente_id" onchange="loadDireccions(this.value)"
                                    class="form-control" aria-label="Clientes"
                                    placeholder="Selecciona un cliente">
                                <datalist id="clientes" class="w-100"></datalist>     
                                <div class="input-group-append">
                                    <button id="btnClear_cliente_id" type="button"
                                        class="btn btn-outline-danger">
                                        <i class="fa fa-times fa-lg" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input list="direccions" name="direccion_id" 
                                    id="direccion_id" onchange="select_id(this)"
                                    class="form-control" aria-label="Dirección"
                                    placeholder="Selecciona una dirección">
                                <datalist id="direccions" class="w-100"></datalist>     
                                <div class="input-group-append">
                                    <button id="btnClear_direccion_id" type="button"
                                        class="btn btn-outline-danger">
                                        <i class="fa fa-times fa-lg" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>                            
                            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                <div class="col-7">
                                    <div class="input-group mb-3 mt-2">
                                        <span class="input-group-text">Duración:</span>                                
                                        <input type="time" id="duration" name="duration"
                                            class="form-control form-control-lg fs-6">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3"> 
                                        <input type="text" class="form-control" placeholder=""
                                            name="t_entradas" id="t_entradas" aria-describedby="helpT_entradas"/>
                                        <label for="t_entradas">Total Entradas</label>
                                        <small id="helpT_entradas" class="form-text text-muted" hidden>Help text</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                <div class="col">
                                    <div class="form-floating mb-3"> 
                                        <input type="text" class="form-control" placeholder=""
                                            name="p_entrada" id="p_entrada" aria-describedby="helpP_entrada"/>
                                        <label for="p_entrada">Precio Entrada</label>
                                        <small id="helpP_entrada" class="form-text text-muted" hidden>Help text</small>
                                    </div>
                                </div>
                                <div class="col"> 
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" placeholder="" min="0" step="1" 
                                            name="n_personas" id="n_personas" aria-describedby="helpN_personas"/>
                                        <label for="n_personas">Nº Personas</label>
                                        <small id="helpN_personas" class="form-text text-muted" hidden>Help text</small>
                                    </div> 
                                </div> 
                                
                            </div>
                            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Estado:</span>  
                                        <select name="estado" id="estado" 
                                            class="form-select form-select-lg text-uppercase">
                                        </select>     
                                    </div>
                                </div>
                            </div>          
                            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                <div class="col form-floating">
                                    <div class="form-check form-switch m-1 fs-5 mb-3">
                                        <input type="checkbox" name="chicas" id="chicas" 
                                            class="form-check-input rounded-3"/>
                                        <label class="form-check-label" for="chicas">Sólo Chicas</label>
                                    </div>
                                </div>
                                <div class="col form-floating">
                                    <div class="form-check form-switch m-1 fs-5 mb-3">
                                        <input type="checkbox" name="prepago" id="prepago" 
                                            class="form-check-input rounded-3"/>
                                        <label class="form-check-label" for="prepago">Prepago</label>
                                    </div>
                                </div>    
                            </div>  
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder=""
                                    name="title" id="title" aria-describedby="helpId"/>
                                <label for="title">Title</label>
                                <small id="helpId" class="form-text text-muted" hidden>Help text</small>
                            </div>
                            
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let  formulario = document.querySelector("#formularioEventos");
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(
                    document.getElementById("evento"),{});
            
            var calendarEl = document.getElementById('agenda');
            var calendar = new FullCalendar.Calendar(calendarEl, { 
                initialView: 'dayGridMonth',
                initialView: 'dayGridMonth',
                locale: 'es',
                timeZone: 'local',
                firstDay: 1,
                titleFormat: {
                    year: 'numeric',
                    month: 'short',
                    day: '2-digit',
                    hour12: false,
                },
                displayEventTime:true,
                navLinks: true,
                headerToolbar: {
                    //left: 'prevYear,prev,today,next,nextYear',
                    left:   'prev,today,next',
                    center: 'title',
                    //right:'timeGridDay,timeGridWeek,dayGridMonth,dayGridYear,listWeek,listMonth,listYear',
                    right:  'dayGridMonth,listYear',
                    day:    'Almanaque',
                    list:    'Listado',
                },
                //slotDuration: '02:00',
                events: "/evento/list/",
                /*
                eventSources:{
                    url:"/evento/list/",
                    method: "POST",
                    extraParams: {
                        _token: formulario._token.value,
                    }
                },
                */
                dateClick:function(info){
                    /*
                    formulario.reset();
                    modalTitleId.innerHTML = "Crear Evento <br/>Día: "+info.dateStr;
                    formulario.start.value = info.dateStr;
                    formulario.end.value = info.dateStr;
                    formulario.hour.value = "00:00";
                    formulario.duration.value = calendar.getOption('slotDuration');
                    //console.log(info.time);
                    myModal.show();
                    */
                    var url = "/reunion/create/?date="+info.dateStr;
                    window.location.href = url;
                },
                eventClick:function(info){
                    var evento = info.event;
                    //console.log(evento);
                    axios.post("/evento/edit/"+info.event.id)
                    .then(response => {
                        //console.log(response.data); 
                        formulario.id.value = response.data.id;
                        formulario.title.value = response.data.title;
                        formulario.start.value = response.data.start;                        
                        formulario.end.value = response.data.end;
                        formulario.con_id.value = response.data.contacto_id;
                        var clientes = response.data.clientes;
                        var datalist = formulario.cliente_id.list;
                        for(var i=0;i<clientes.length;i++){
                            var option = document.createElement('option');
                            option.id = clientes[i].id;
                            option.value = clientes[i].full_apodo;
                            if(clientes[i].id==response.data.contacto_id)
                                formulario.cliente_id.value = clientes[i].full_apodo;
                            datalist.appendChild(option);    
                        }
                        formulario.dir_id.value = response.data.direccion_id;
                        loadDireccions(formulario.cliente_id.value,response.data.direccion_id)
                        formulario.date.value = response.data.date;
                        formulario.time.value = response.data.time;
                        formulario.duration.value = response.data.duration;
                        formulario.t_entradas.value = response.data.t_entradas;
                        formulario.p_entrada.value = response.data.p_entrada;
                        formulario.n_personas.value = response.data.n_personas;
                        formulario.estado.value = response.data.estado;
                        var estados = response.data.estados;
                        var datalist2 = formulario.estado;
                        for(var i=0;i<estados.length;i++){
                            var option = document.createElement('option');
                            option.text = estados[i];
                            option.value = estados[i];
                            datalist2.appendChild(option);
                        }
                        formulario.chicas.checked = response.data.chicas;
                        formulario.prepago.checked = response.data.prepago;
                        myModal.show();
                    })
                    .catch(error => {
                        console.log(error);
                    });
                },
            });

            calendar.render();

            document.getElementById("clientes").addEventListener("onchange",function(){
                console.log("Has cambiado");
            });

            document.getElementById("btnClear_cliente_id").addEventListener("click",function(){
                formulario.cliente_id.value = null;
                formulario.direccion_id.value = null;
                formulario.direccion_id.list.innerHTML="";
                formulario.dir_id.value=null;
            });

            document.getElementById("btnClear_direccion_id").addEventListener("click",function(){
                formulario.direccion_id.value = null;
                formulario.dir_id.value=null;
            });

            document.getElementById("btnGuardar").addEventListener("click",function(){
                if(formulario.id.value)
                    sendData("/evento/update/"+formulario.id.value);
                else
                    sendData("/evento/store");
            });

            document.getElementById("btnEliminar").addEventListener("click",function(){
                sendData("/evento/delete/"+formulario.id.value);
            });
            
            function sendData(url){
                //var baseURL =  json_encode(url('/')) ; 
                //console.log(baseURL);
                //url = baseURL+url;
                const datos = new FormData(formulario);
                //console.log(datos);
                //console.log(formulario.title.value);
                axios.post(url,datos)
                    .then(response => {
                        myModal.hide();
                        calendar.refetchEvents();
                    })
                    .catch(error => {
                        console.log(error.response.datos);
                    });
            }
        }); 
        function loadDireccions(full_apodo,select_id=null){
            //console.log(select_id);
            axios.post("/contactos/"+full_apodo+"/direccions")
                .then(response => { 
                    //console.log(response.data);
                    var list = response.data;
                    var datalist = formulario.direccion_id;
                    for(var i=0;i<list.length;i++){
                        var option = document.createElement('option');
                        option.id = list[i].id;
                        option.value = list[i].direccion
                            +" "+list[i].poblacion
                            +" "+list[i].provincia;
                        if(list[i].id==select_id)
                            datalist.value = option.value;
                        datalist.list.appendChild(option);     
                    }
                })
                .catch(error=> {console.log(error); });
                formulario.direccion_id.focus();
        }
        function select_id(elem){
            var datalist = formulario.direccion_id.list;
            for(var i=0;i<datalist.options.length;i++){
                if(datalist.options[i].value == elem.value){
                    formulario.dir_id.value=datalist.options[i].id;
                }
            }
        }      
    </script>
</div>