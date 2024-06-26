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
       .accordion-collapse {
        display: grid;
       }
       .mi-modal-footer{
            display: flex;
            flex-shrink: 0;
            flex-wrap: wrap;
            align-items: center;
            justify-content: flex-end;
            gap: 2px;   
       }
       .mi-modal-footer .btn{
            margin: 2px;
       }
    </style>

    <div id='agenda'></div>
    <!--
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
    -->
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
                    <div id="flush-collapseOne" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushCliente"
                        class="accordion-collapse collapse border border-1 border-success p-1 rounded-3 mb-1">
                        <div class="d-block px-2 mb-2"> 
                            <form id="formContacto" action="">     
                                @csrf                                         
                                <div class="mt-2"><h5>Datos del Cliente:</h5></div>                                      
                                <div class="form-floating mb-2">
                                    <input type="text" id="apodo" name="apodo" placeholder="Nombre Completo" 
                                        class="form-control rounded-3" aria-describedby="helpApodo">
                                    <label for="apodo">Nombre Completo</label>
                                    <small id=helpApodo class="text-danger"></small>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" id="telefono" name="telefono" placeholder="Teléfono" 
                                                class="form-control rounded-3" aria-describedby="helpTelefono">
                                            <label for="new_telefono">Teléfono</label>
                                        </div>  
                                    </div>
                                    <div class="col mi-modal-footer">
                                        <button type="button" class="btn btn-success" id="btnContactoGuardar">Guardar</button>
                                        <button type="button" class="btn btn-secondary" id="btnContactoReset">Reset</button>
                                    </div>
                                    <small id="helpTelefono" class="text-danger"></small>
                                </div>
                            </form>                                                             
                        </div>
                    </div>   
                    <form action ="" id="formularioEventos">
                        @csrf  
                        <div class="flex">
                            <input type="text" name="id" id="id" hidden/>
                            <input type="datetime" name="start" id="start" hidden/>
                            <input type="datetime" name="end" id="end" hidden/>
                            <input type="text" name="contacto_id" id="contacto_id" hidden/> 
                        </div>
                        <div class="flex">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" aria-describedby="helpTitle"
                                    name="title" id="title" />
                                <label for="title">Título / Descripción:</label>                                
                                <small id="helpTitle" class="text-danger"></small>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Día y Hora:</span>
                                <input type="date" id="fecha" name="fecha" aria-describedby="helpFecha"
                                    class="form-control form-control-lg">
                                <input type="time" id="hora" name="hora" list="horas" 
                                    class="form-control form-control-lg" aria-describedby="helpHora">
                                <datalist id="horas" class="w-100">
                                    <option value="16:30"></option>
                                    <option value="19:30"></option>
                                    <option value="23:30"></option>  
                                </datalist>                                
                            </div>
                            <div class="mb-3">
                                <small id="helpFecha" class="text-danger"></small>
                                <small id="helpHora" class="text-danger"></small>
                            </div> 
                            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Duración:</span>                                
                                        <input type="time" id="duration" name="duration" 
                                            class="form-control form-control-lg fs-6"
                                            aria-describedby="helpDuration">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Estado:</span>  
                                        <select name="estado" id="estado" class="form-select text-uppercase"></select>     
                                    </div>                                    
                                </div>
                                <small id="helpDuration" class="text-danger"></small>
                            </div>                       
                            <div class="input-group mb-3 d-block">   
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-cliente-tab" 
                                            data-bs-toggle="tab" data-bs-target="#nav-cliente" type="button" role="tab" 
                                            aria-controls="nav-cliente" aria-selected="true">Cliente</button>
                                        <button class="nav-link" id="nav-reunion-tab" 
                                            data-bs-toggle="tab" data-bs-target="#nav-reunion" type="button" role="tab" 
                                            aria-controls="nav-reunion" aria-selected="false">Reunión</button>
                                    </div>
                                </nav>
                                <div class="tab-content border border-1 bs-border-color rounded-2 p-2 border-top-0 rounded-top-0  " id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-cliente" role="tabpanel" aria-labelledby="nav-cliente-tab">
                                        <div class="input-group"> 
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button class="btn btn-success collapsed" type="button" data-bs-toggle="collapse" 
                                                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                    <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                                                </button>
                                            </h2>
                                            <input list="clientes" name="contacto_id_full" class="form-control"
                                                id="contacto_id_full" onchange="loadDireccions(this)"
                                                aria-label="Clientes" aria-describedby="helpContacto_id_full"
                                                placeholder="Seleccione un Cliente">  
                                            <datalist id="clientes"></datalist>      
                                            <div class="input-group-append">
                                                <button id="btnClear_contacto_id_full" type="button"
                                                    class="btn btn-outline-danger">
                                                    <i class="fa fa-times fa-lg" aria-hidden="true"></i>
                                                </button>
                                            </div> 
                                        </div> 
                                        <div class="mb-3">
                                            <small id="helpContacto_id_full" class="text-danger"></small> 
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-reunion" role="tabpanel" aria-labelledby="nav-reunion-tab">

                                    </div>
                                </div>
                                <div class="accordion accordion-flush" id="accordionFlushCliente">
                                    <div class="accordion-item">
                                        
                                    </div>
                                </div>         
                            </div>
                            <div class="input-group mb-3 d-block">
                                <div class="accordion accordion-flush" id="accordionFlushDireccion">
                                    <div class="accordion-item">
                                        <div><h6>Dirección:</h6></div>   
                                        <div class="input-group">
                                            <h2 class="accordion-header" id="flush-headingTwo">
                                                <button class="btn btn-success collapsed" type="button" data-bs-toggle="collapse" 
                                                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                    <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                                                </button>
                                            </h2>
                                            <select name="direccion_id" id="direccion_id" placeholder="Añada o Seleccione una Dirección." 
                                                class="form-select" aria-describedby="helpDireccion_id"></select>
                                        </div>
                                        <small id="helpDireccion_id" class="text-danger mb-3"></small>
                                        <div id="flush-collapseTwo" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushDireccion"
                                            class="accordion-collapse collapse border border-1 border-success p-1 rounded-3 mt-3" >
                                            <div class="d-block">                                                     
                                                <div><h6>Datos de la Dirección:</h6></div> 
                                                <div class="form-floating">
                                                    <input type="text" id="full_name" name="full_name" placeholder="Nombre Completo" 
                                                        class="form-control rounded-3" aria-describedby="helpFull_name">
                                                    <label for="full_name">Nombre Completo</label>
                                                </div>    
                                                <div class="mb-2"><small id="helpFull_name" class="text-danger"></small> </div>   
                                                <div class="form-floating">
                                                    <input type="text" id="ladireccion" name="ladireccion" placeholder="Dirección Completa" 
                                                        class="form-control rounded-3" aria-describedby="helpLadireccion">
                                                    <label for="ladireccion">Dirección Completa</label>  
                                                </div>  
                                                <div class="mb-2"><small id="helpLadireccion" class="text-danger"></small></div>                                                    
                                                <div class="row">
                                                    <div class="col-md-4"> 
                                                        <div class="form-floating">
                                                            <input type="text" id="telefono" name="telefono" placeholder="Telefóno"  
                                                                class="form-control rounded-3" aria-describedby="helpTelefono">
                                                            <label for="telefono">Telefóno</label>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-4"> 
                                                        <div class="form-floating">
                                                            <input type="text" id="cp" name="cp" placeholder="Código Postal"  
                                                                class="form-control rounded-3" aria-describedby="helpCp">
                                                            <label for="cp">Código Postal</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-floating">
                                                            <input type="text" id="pais" name="pais" placeholder="País"
                                                                class="form-control rounded-3" aria-describedby="helpPais">
                                                            <label for="pais">País</label>
                                                        </div>                
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <small id="helpTelefono" class="text-danger"></small>
                                                    <small id="helpCp" class="text-danger"></small>
                                                    <small id="helpPais" class="text-danger"></small>
                                                </div>    
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-floating">
                                                            <input type="text" id="poblacion" name="poblacion" placeholder="Población" 
                                                                class="form-control rounded-3" aria-describedby="helpPoblacion">
                                                            <label for="poblacion">Población</label> 
                                                        </div>                
                                                    </div>        
                                                    <div class="col"> 
                                                        <div class="form-floating">
                                                            <input type="text" id="provincia" name="provincia" placeholder="Provincia" 
                                                                class="form-control rounded-3" aria-describedby="helpProvincia">
                                                            <label for="provincia">Provincia</label>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="mb-2">
                                                    <small id="helpPoblacion" class="text-danger"></small>
                                                    <small id="helpProvincia" class="text-danger"></small>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                </div>                                  
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
                                        @error('p_entrada')<small class="text-danger">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                                <div class="col"> 
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" placeholder="" min="0" step="1" 
                                            name="n_personas" id="n_personas" aria-describedby="helpN_personas"/>
                                        <label for="n_personas">Nº Personas</label>
                                        <small id="helpN_personas" class="form-text text-muted" hidden>Help text</small>
                                        @error('n_personas')<small class="text-danger">{{ $message }}</small>@enderror
                                    </div> 
                                </div> 
                                <div class="col">
                                    <div class="form-floating mb-3"> 
                                        <input type="text" class="form-control" placeholder=""
                                            name="t_entradas" id="t_entradas" aria-describedby="helpT_entradas"/>
                                        <label for="t_entradas">Total Entradas</label>
                                        <small id="helpT_entradas" class="form-text text-muted" hidden>Help text</small>
                                        @error('t_entradas')<small class="text-danger">{{ $message }}</small>@enderror
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
                    <button type="button" class="btn btn-danger" id="btnPrueba">Prueba</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div> 
            </div>
        </div>
    </div>
    <script>
        let  formulario = document.querySelector("#formularioEventos");             
        let  formContacto = document.querySelector("#formContacto");  
        let  collapseOne = document.querySelector("#flush-collapseOne");             
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(
                document.getElementById("evento"),{}); 
            //var listDia = new bootstrap.Modal(
            //    document.getElementById("listDia"),{});   
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
                    resetContacto();
                    reset_direccion();                 
                    modalTitleId.innerHTML = "Crear Nuevo Evento";
                    btnEliminar.hidden = true;
                    formulario.start.value = info.dateStr+" 00:00:00";
                    formulario.end.value = info.dateStr+" 00:00:00"; 
                    formulario.fecha.value = info.dateStr;                    
                    formulario.duration.value = "02:00"; 
                    loadContacts(formulario.contacto_id_full);

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
                        //console.log(response.data); 
                        modalTitleId.innerHTML = "Datos del Evento";
                        formulario.id.value = response.data.id;
                        formulario.title.value = response.data.title;
                        formulario.start.value = response.data.start;                        
                        formulario.end.value = response.data.end;

                        //CONTACTO_ID
                        formulario.contacto_id.value = response.data.contacto_id;
                        formulario.contacto_id_full.value = null;
                        formulario.contacto_id_full.list.innerHTML="";
                        var clientes = response.data.clientes;
                        for(var i=0;i<clientes.length;i++){
                            var option = document.createElement('option'); 
                            option.id = clientes[i].id;
                            option.value = clientes[i].full_apodo;
                            formulario.contacto_id_full.list.appendChild(option);  
                            if(clientes[i].id==formulario.contacto_id.value){
                                formulario.contacto_id_full.value = clientes[i].full_apodo; 
                                formContacto.apodo.value = clientes[i].apodo;   
                                formContacto.telefono.value = clientes[i].telefono;   
                            }
                        }
                        //end_CONTACTO_ID
                        
                        //DIRECCION_ID                                
                        var list = response.data.direccions;
                        var datalist = formulario.direccion_id;
                        datalist.innerHTML="";
                        option = document.createElement('option');
                        option.value = "";
                        option.text = "Añada o Seleccione una dirección";
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
                        formulario.full_name.value = response.data.full_name;
                        formulario.ladireccion.value =response.data.ladireccion;
                        formulario.telefono.value =response.data.telefono;
                        formulario.cp.value = response.data.cp;
                        formulario.poblacion.value = response.data.poblacion;
                        formulario.provincia.value = response.data.provincia;
                        formulario.pais.value = response.data.pais;
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
                        //console.log(error);
                        //console.log(error.response.data);
                        //console.log(error.response.data.errors);
                        if(!(typeof error.response.data.errors === 'undefined')){
                            if(!(typeof error.response.data.errors.title === 'undefined')){ 
                                formulario.title.classList.add("is-invalid");
                                $('#helpTitle').text(error.response.data.errors.title);
                            }
                            if(!(typeof error.response.data.errors.fecha === 'undefined')){
                                formulario.fecha.classList.add("is-invalid");
                                $('#helpFecha').text(error.response.data.errors.fecha);
                            }
                            if(!(typeof error.response.data.errors.hora === 'undefined')){
                                formulario.hora.classList.add("is-invalid");
                                $('#helpHora').text(error.response.data.errors.hora);
                            }                                
                            if(!(typeof error.response.data.errors.duration === 'undefined')){
                                formulario.duration.classList.add("is-invalid"); 
                                $('#helpDuration').text(error.response.data.errors.duration);
                            }
                            if(!(typeof error.response.data.errors.estado === 'undefined')) 
                                formulario.estado.classList.add("is-invalid");
                            if(!(typeof error.response.data.errors.contacto_id === 'undefined')){
                                formulario.contacto_id_full.classList.add("is-invalid");
                                $('#helpContacto_id_full').text(error.response.data.errors.contacto_id);
                            } 
                            if(!(typeof error.response.data.errors.direccion_id === 'undefined')){
                                formulario.direccion_id.classList.add("is-invalid");
                                $('#helpDireccion_id').text(error.response.data.errors.direccion_id);
                            } 
                            if(!(typeof error.response.data.errors.full_name === 'undefined')){
                                formulario.direccion_id.classList.add("is-invalid");
                                formulario.full_name.classList.add("is-invalid");
                                $('#helpDireccion_id').text("Seleccione o Rellene los datos.");
                                $('#helpFull_name').text(error.response.data.errors.full_name);
                                $('#flush-collapseTwo').collapse('show');
                            } 
                                
                        }
                        
                        console.log(error.response.data);
                        //formulario.contacto_id.value = error.response.data.contacto_id;
                    });
            }

            function sendDataContacto(url){
                reset_errors_contacto();
                const datos = new FormData(formContacto);
                datos.append('id',formulario.contacto_id.value);
                //console.log(datos);
                axios.post(url,datos)
                    .then(response => {
                        console.log(response);
                        formulario.contacto_id.value = response.data.contacto_id;
                        loadContacts(formulario.contacto_id_full,response.data.contacto_id);
                        resetContacto();
                        $('#flush-collapseOne').collapse('hide');
                        loadDireccions(formulario.contacto_id_full.value);XXXXXX
                    })
                    .catch(error => { 
                        //console.log(error);
                        console.log(error.response.data);
                        //console.log(error.response.data.errors);
                        if(!(typeof error.response.data.errors === 'undefined')){
                            if(!(typeof error.response.data.errors.apodo === 'undefined')){
                                formContacto.apodo.classList.add("is-invalid");
                                $('#helpApodo').text(error.response.data.errors.apodo);
                            } 

                            if(!(typeof error.response.data.errors.telefono === 'undefined')){
                                formContacto.telefono.classList.add("is-invalid");
                                $('#helpTelefono').text(error.response.data.errors.telefono); 
                            } 
                        }
                        //formulario.contacto_id.value = error.response.data.contacto_id;
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
            document.getElementById("btnPrueba").addEventListener("click",function(){
                $('#flush-collapseOne').collapse('hide');
            });

            document.getElementById("btnContactoGuardar").addEventListener("click",function(){
                if(formulario.contacto_id.value)
                    sendDataContacto("/contactos/update/"+formulario.contacto_id.value);
                else
                    sendDataContacto("/contactos/store");
            });
            

            document.getElementById("direccion_id").addEventListener("change",function(){
                //console.log("has cambiado: "+formulario.direccion_id.value);  
                reset_direccion();
                if(formulario.direccion_id.value){
                    url = "/direcciones/"+formulario.direccion_id.value;
                    axios.get(url)
                        .then(response => {
                            //console.log(response.data); 
                            formulario.full_name.value = response.data.full_name;
                            formulario.ladireccion.value = response.data.ladireccion;
                            formulario.telefono.value = response.data.telefono;
                            formulario.cp.value = response.data.cp;
                            formulario.poblacion.value = response.data.poblacion;
                            formulario.provincia.value = response.data.provincia;
                            formulario.pais.value = response.data.pais;
                            formulario.viaje.value = response.data.viaje;
                        })
                        .catch(error => { 
                            console.log(error);
                            console.log(error.response.data.message);
                        });
                }
            });
        });

        document.getElementById("btnClear_contacto_id_full").addEventListener("click",resetContacto);
        document.getElementById("btnContactoReset").addEventListener("click",resetContacto);

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

        function loadContacts(contacto_id_full,select_id=null){
            contacto_id_full.value = null;
            var datalist = contacto_id_full.list;
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
                            formulario.contacto_id_full.value = clientes[i].full_apodo;
                            formulario.contacto_id.value = select_id;   
                            formContacto.apodo.value = clientes[i].apodo;
                            formContacto.telefono.value = clientes[i].telefono;  
                        }
                        datalist.appendChild(option);    
                    }
                })
                .catch(error=> {console.log(error); });
        } 

        function loadDireccions(apodo){
            //console.log(apodo.value);
            formulario.direccion_id.value = null;
            reset_direccion();
            axios.post("/contactos/"+apodo.value+"/direccions")
                .then(response => { 
                    formulario.contacto_id.value = response.data.id; 
                    formContacto.telefono.value = response.data.telefono;
                    formContacto.apodo.value = response.data.apodo;                    
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
            formulario.contacto_id_full.value = "";
            formulario.contacto_id.value = "";
            formulario.direccion_id.value = "";
            formulario.direccion_id.innerHTML="";
            reset_direccion();
        }

        function reset_errors(){
            formulario.title.classList.remove("is-invalid");
            $('#helpTitle').text("");
            formulario.fecha.classList.remove("is-invalid");
            $('#helpFecha').text("");
            formulario.hora.classList.remove("is-invalid");
            $('#helpHora').text("");
            formulario.duration.classList.remove("is-invalid");
            $('#helpDuration').text("");
            formulario.estado.classList.remove("is-invalid");
            formulario.contacto_id_full.classList.remove("is-invalid");
            $('#helpContacto_id_full').text("");
            formulario.direccion_id.classList.remove("is-invalid");
            formulario.p_entrada.classList.remove("is-invalid");
            formulario.n_personas.classList.remove("is-invalid");
            formulario.t_entradas.classList.remove("is-invalid");
            formulario.chicas.classList.remove("is-invalid");
            formulario.prepago.classList.remove("is-invalid");   
        }

        function resetContacto(){
            formulario.contacto_id.value = "";
            formulario.contacto_id_full.value = null;
            formulario.direccion_id.value = null;
            formulario.direccion_id.innerHTML="";
            formContacto.apodo.value = "";
            formContacto.telefono.value = "";
            reset_direccion();
        }
        
        function reset_errors_contacto(){
            formContacto.telefono.classList.remove("is-invalid");
            $('#helpTelefono').text("");
            formContacto.apodo.classList.remove("is-invalid");
            $('#helpApodo').text("");
        }

        function reset_direccion(){
            formulario.full_name.value = "";
            formulario.ladireccion.value = "";
            formulario.telefono.value = "";
            formulario.cp.value = "";
            formulario.poblacion.value = "";
            formulario.provincia.value = "";
            formulario.pais.value = "";
            formulario.viaje.value = "";
        }
    </script>
</div>