<div>
    <style>
        .fc-license-message{ visibility: hidden; }  
        @media screen and (max-width: 767px){
            .fc .fc-toolbar{display:block; align-items: center;}
            .fc-toolbar-chunk{     
                display: flex;
                justify-content: center;
                align-items: center;
            }  
        }
        .fc .fc-toolbar-title{margin-top: 4px; margin-bottom: 4px;}
        .fc-col-header { background-color: lightgrey; }
        .fc-col-header-cell-cushion{ text-transform: capitalize; text-decoration: none; color: black;}
        .fc-daygrid-day-number{ font-size: 1.1rem; margin-right: 4px; text-decoration: none; font-weight: 600; }
       
    </style>

    <div id='agenda'></div>

    <div class="modal fade" id="listDia" tabindex="-1" 
        data-bs-backdrop="true" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleIdDia" aria-hidden="true">
        <div role="document" class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleIdDia"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    Contenido Dia
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnGuardarDia">Guardar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminarDia">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
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
                    <h5 class="modal-title" id="modalTitleId"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">     
                    <form action ="" id="formularioEventos">
                        @csrf  
                        <div class="flex">
                            <input type="text" name="id" id="id" hidden/>
                            <input type="datetime" name="start" id="start" hidden/>
                            <input type="datetime" name="end" id="end" hidden/>
                            <input type="text" name="contacto_id_text" id="contacto_id_text" hidden/> 
                            <input type="text" name="full_apodo" id="full_apodo" hidden/>
                        </div>
                        <div class="flex">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder=""
                                    name="title" id="title" aria-describedby="helpId"/>
                                <label for="title">Título / Descripción:</label>
                                <small id="helpId" class="form-text text-muted" hidden>Help text</small>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Día y Hora:</span>
                                <input type="date" id="fecha" name="fecha" 
                                    class="form-control form-control-lg">
                                <input type="time" id="hora" name="hora" list="horas" 
                                    class="form-control form-control-lg">
                                <datalist id="horas" class="w-100">
                                    <option value="16:30"></option>
                                    <option value="19:30"></option>
                                    <option value="23:30"></option>  
                                </datalist>
                            </div>     
                            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Duración:</span>                                
                                        <input type="time" id="duration" name="duration"
                                            class="form-control form-control-lg fs-6">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Estado:</span>  
                                        <select name="estado" id="estado" class="form-select text-uppercase"></select>     
                                    </div>
                                    
                                </div>
                            </div>                       
                            <div class="input-group mb-3">
                                <input list="clientes" name="contacto_id" 
                                    id="contacto_id" onchange="loadDireccions(this)"
                                    class="form-control" aria-label="Clientes"
                                    placeholder="Selecciona un cliente">  
                                <datalist id="clientes" class="w-100"></datalist>      
                                <div class="input-group-append">
                                    <button id="btnClear_contacto_id" type="button"
                                        class="btn btn-outline-danger">
                                        <i class="fa fa-times fa-lg" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <select name="direccion_id" id="direccion_id" class="form-select"></select>  
                            </div>  
                            <div class="input-group mb-3">
                                <input type="text" id="viaje" name="viaje" />
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
            var listDia = new bootstrap.Modal(
                document.getElementById("listDia"),{});   
            loadEstados(formulario.estado);           
            var calendarEl = document.getElementById('agenda');
            var calendar = new FullCalendar.Calendar(calendarEl, { 
                initialView: 'dayGridMonth',
                height: 'auto',
                aspectRatio: 3,
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
                    
                    left:   'prev,today,next',
                    center: 'title',
                    right:  'listDay,dayGridMonth,listYear',
                    //left: 'prevYear,prev,today,next,nextYear',
                    //right:'timeGridDay,timeGridWeek,dayGridMonth,dayGridYear,listWeek,listMonth,listYear',
                },
        
                //events: "/evento/list/",
                //display:'background'
                //eventColor: 'green',
                eventSources:{
                    url:"/evento/list/",
                    method: "POST",
                    extraParams: {
                        _token: formulario._token.value,
                    }
                },
                
                dateClick:function(info){     
                    //console.log(info);   
                    //listDia.show();
                                
                    formulario.reset(); 
                    reset_text();
                    reset_errors();                   
                    modalTitleId.innerHTML = "Crear Nuevo Evento";
                    btnEliminar.hidden = true;
                    formulario.start.value = info.dateStr+" 00:00:00";
                    formulario.end.value = info.dateStr+" 00:00:00"; 
                    formulario.fecha.value = info.dateStr;                    
                    formulario.duration.value = "02:00"; 
                    loadContacts(formulario.contacto_id);

                    formulario.n_personas.value = 7;
                    formulario.p_entrada.value = 5;
                    formulario.t_entradas.value = 35;
                    formulario.chicas.checked = true; 
                    formulario.prepago.checked = false;
                    myModal.show();
                    
                },
                eventClick:function(info){
                    var evento = info.event;
                    //console.log(evento);
                    btnEliminar.hidden = false;
                    reset_errors();
                    axios.post("/evento/edit/"+info.event.id)
                    .then(response => {
                        console.log(response.data); 
                        modalTitleId.innerHTML = "Datos del Evento";
                        formulario.id.value = response.data.id;
                        formulario.title.value = response.data.title;
                        formulario.start.value = response.data.start;                        
                        formulario.end.value = response.data.end;

                        //CONTACTO_ID
                        formulario.contacto_id_text.value = response.data.contacto_id;
                        formulario.contacto_id.value = null;
                        formulario.contacto_id.list.innerHTML="";
                        var clientes = response.data.clientes;
                        for(var i=0;i<clientes.length;i++){
                            var option = document.createElement('option'); 
                            option.id = clientes[i].id;
                            option.value = clientes[i].full_apodo;
                            formulario.contacto_id.list.appendChild(option);  
                            if(clientes[i].id==formulario.contacto_id_text.value){
                                formulario.contacto_id.value = clientes[i].full_apodo; 
                                formulario.full_apodo.value = clientes[i].full_apodo;   
                            }
                        }
                        //end_CONTACTO_ID
                        
                        //DIRECCION_ID                                
                        var list = response.data.direccions;
                        var datalist = formulario.direccion_id;
                        datalist.innerHTML="";
                        option = document.createElement('option');
                        option.value = "";
                        option.text = "Seleccione una dirección";
                        datalist.appendChild(option);
                        for(var i=0;i<list.length;i++){
                            var option = document.createElement('option');
                            option.value = list[i].id;
                            option.text = list[i].direccion
                                +" "+list[i].poblacion
                                +" "+list[i].provincia;
                            datalist.appendChild(option);     
                        }
                        formulario.direccion_id.value = response.data.direccion_id; 
                        formulario.viaje.value = response.data.viaje;
                        //end_DIRECCION_ID        
            
                        formulario.fecha.value = response.data.fecha;
                        formulario.hora.value = response.data.hora;
                        formulario.duration.value = response.data.duration;
                        formulario.t_entradas.value = response.data.t_entradas;
                        formulario.p_entrada.value = response.data.p_entrada;
                        formulario.n_personas.value = response.data.n_personas;
                        formulario.estado.value = response.data.estado;
                        formulario.chicas.checked = response.data.chicas;
                        formulario.prepago.checked = response.data.prepago;
                        myModal.show();
                        formulario.direccion_id.focus();
                    })
                    .catch(error => {console.log(error);});
                },
            });

            calendar.render();

            function sendData(url){
                reset_errors();
                const datos = new FormData(formulario);
                //console.log(datos);
                axios.post(url,datos)
                    .then(response => {
                        myModal.hide();
                        calendar.refetchEvents();
                    })
                    .catch(error => { 
                        console.log(error);
                        console.log(error.response.data.message);
                        //console.log(error.response.data.errors);
                        if(!(typeof error.response.data.errors === 'undefined')){
                            if(!(typeof error.response.data.errors.title === 'undefined')) 
                                formulario.title.classList.add("is-invalid");
                            if(!(typeof error.response.data.errors.fecha === 'undefined'))
                                formulario.fecha.classList.add("is-invalid");
                            if(!(typeof error.response.data.errors.hora === 'undefined')) 
                                formulario.hora.classList.add("is-invalid");
                            if(!(typeof error.response.data.errors.duration === 'undefined'))
                                formulario.duration.classList.add("is-invalid");
                            if(!(typeof error.response.data.errors.estado === 'undefined')) 
                                formulario.estado.classList.add("is-invalid");
                            if(!(typeof error.response.data.errors.contacto_id === 'undefined')) 
                                formulario.contacto_id.classList.add("is-invalid");
                            if(!(typeof error.response.data.errors.direccion_id === 'undefined')) 
                                formulario.direccion_id.classList.add("is-invalid");
                        } 
                    });
            }
            
            document.getElementById("btnGuardar").addEventListener("click",function(){
                if(formulario.id.value)
                    sendData("/evento/update/"+formulario.id.value);
                else
                    sendData("/evento/store");
            });

            document.getElementById("btnEliminar").addEventListener("click",function(){
                sendData("/evento/delete/"+formulario.id.value);
            });

        });

        document.getElementById("btnClear_contacto_id").addEventListener("click",function(){
            formulario.contacto_id_text.value = "";
            formulario.contacto_id.value = null;
            formulario.direccion_id.value = null;
            formulario.direccion_id.innerHTML="";
        });

        function loadEstados(datalist){
            axios.post("/reunion/estados")
                .then(response => {
                    //console.log(response.data);                        
                    var estados = response.data.estados;
                    datalist.innerHTML="";
                    for(var i=0;i<estados.length;i++){
                        var option = document.createElement('option');
                        option.text = estados[i];
                        option.value = estados[i];
                        datalist.appendChild(option);
                    }
                })
            .catch(error=> {console.log(error); });
        }

        function loadContacts(contacto_id,select_id=null){
            contacto_id.value = null;
            var datalist = contacto_id.list;
            datalist.innerHTML="";
            axios.post("/contactos/datalist")
                .then(response => { 
                    //console.log(response.data);  
                    var clientes = response.data.clientes;
                    for(var i=0;i<clientes.length;i++){
                        var option = document.createElement('option'); 
                        option.id = clientes[i].id;
                        option.value = clientes[i].full_apodo;
                        if(clientes[i].id==select_id){
                            formulario.contacto_id.value = clientes[i].full_apodo;
                            formulario.contacto_id_text.value = cliente[i].id;     
                        }
                        datalist.appendChild(option);    
                    }
                })
                .catch(error=> {console.log(error); });
        } 

        function loadDireccions(full_apodo){
            //console.log(full_apodo.value);
            formulario.direccion_id.value = null;
            axios.post("/contactos/"+full_apodo.value+"/direccions")
                .then(response => { 
                    formulario.contacto_id_text.value = response.data.id; 
                    var list = response.data.direccions;
                    var datalist = formulario.direccion_id;
                    datalist.innerHTML="";
                    option = document.createElement('option');
                    option.value = "";
                    option.text = "Seleccione una dirección";
                    datalist.appendChild(option);
                    for(var i=0;i<list.length;i++){
                        var option = document.createElement('option');
                        option.value = list[i].id;
                        option.text = list[i].direccion
                            +" "+list[i].poblacion
                            +" "+list[i].provincia;
                        datalist.appendChild(option);     
                    }
                })
                .catch(error=> {console.log(error); });
        }
        
        function reset_text(){
            formulario.title.value = "";
            formulario.contacto_id.value = "";
            formulario.contacto_id_text.value = "";
            formulario.direccion_id.value = "";
        }

        function reset_errors(){
            formulario.title.classList.remove("is-invalid");
            formulario.fecha.classList.remove("is-invalid");
            formulario.hora.classList.remove("is-invalid");
            formulario.duration.classList.remove("is-invalid");
            formulario.estado.classList.remove("is-invalid");
            formulario.contacto_id.classList.remove("is-invalid");
            formulario.direccion_id.classList.remove("is-invalid");
            formulario.p_entrada.classList.remove("is-invalid");
            formulario.n_personas.classList.remove("is-invalid");
            formulario.t_entradas.classList.remove("is-invalid");
            formulario.chicas.classList.remove("is-invalid");
            formulario.prepago.classList.remove("is-invalid");
        }
    </script>
</div>