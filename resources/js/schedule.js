let  formEvento = document.querySelector("#formularioEvento");             
let  formContacto = document.querySelector("#formularioContacto");  
let  formDireccion = document.querySelector("#formularioDireccion");  
let  collapseOne = document.querySelector("#flush-collapseOne");             
document.addEventListener('DOMContentLoaded', function() {
    var myModal = new bootstrap.Modal(
        document.getElementById("evento"),{});  
    loadEstados(formReunion.estado);           
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
                _token: formEvento._token.value,
            }
        },
        
        dateClick:function(info){    
            /*
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
            */
            myModal.show();  
                              
        },
        eventClick:function(info){        
            var evento = info.event;
            //console.log(evento);
            //btnEliminar.hidden = false;
            //reset_errors();
            reset_errors_evento();
            axios.post("/evento/edit/"+info.event.id)
            .then(response => {
                //console.log(response.data); 
                modalTitleId.innerHTML = "Datos del Evento";

                //EVENTO
                formEvento.id.value = response.data.id;
                formEvento.contacto_id.value = response.data.contacto_id;
                formEvento.title.value = response.data.title;
                formEvento.start.value = response.data.start;                        
                formEvento.end.value = response.data.end;
                formEvento.fecha.value = response.data.fecha;
                formEvento.hora.value = response.data.hora;
                formEvento.duration.value = response.data.duration;
                
                //CONTACTO_ID                
                formEvento.contacto_id_full.value = null;
                formEvento.contacto_id_full.list.innerHTML="";
                var clientes = response.data.clientes;
                for(var i=0;i<clientes.length;i++){
                    var option = document.createElement('option'); 
                    option.id = clientes[i].id;
                    option.value = clientes[i].full_apodo;
                    formEvento.contacto_id_full.list.appendChild(option);  
                    if(clientes[i].id==formEvento.contacto_id.value){
                        formEvento.contacto_id_full.value = clientes[i].full_apodo; 
                        formContacto.apodo.value = clientes[i].apodo;   
                        formContacto.telefono.value = clientes[i].telefono;   
                    }
                }
                
                //DIRECCION_ID                               
                var list = response.data.direccions;
                var datalist = formEvento.direccion_id;
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
                formEvento.direccion_id.value = response.data.direccion_id;
                
                /*
                formulario.full_name.value = response.data.full_name;
                formulario.ladireccion.value =response.data.ladireccion;
                formulario.telefono.value =response.data.telefono;
                formulario.cp.value = response.data.cp;
                formulario.poblacion.value = response.data.poblacion;
                formulario.provincia.value = response.data.provincia;
                formulario.pais.value = response.data.pais;
                formulario.viaje.value = response.data.viaje;
                //end_DIRECCION_ID        
    


                formulario.t_entradas.value = response.data.t_entradas;
                formulario.p_entrada.value = response.data.p_entrada;
                formulario.n_personas.value = response.data.n_personas;
                formulario.estado.value = response.data.estado;
                formulario.chicas.checked = response.data.chicas;
                formulario.prepago.checked = response.data.prepago;
                */
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

function reset_errors_evento(){
    formEvento.title.classList.remove("is-invalid");
    $('#helpTitle').text("");
    formEvento.fecha.classList.remove("is-invalid");
    $('#helpFecha').text("");
    formEvento.hora.classList.remove("is-invalid");
    $('#helpHora').text("");
    formEvento.duration.classList.remove("is-invalid");
    $('#helpDuration').text("");
}


/*
    formReunion.estado.classList.remove("is-invalid");
    formulario.contacto_id_full.classList.remove("is-invalid");
    $('#helpContacto_id_full').text("");
    formulario.direccion_id.classList.remove("is-invalid");
    formulario.p_entrada.classList.remove("is-invalid");
    formulario.n_personas.classList.remove("is-invalid");
    formulario.t_entradas.classList.remove("is-invalid");
    formulario.chicas.classList.remove("is-invalid");
    formulario.prepago.classList.remove("is-invalid");   
}
*/
        document.getElementById("btnClear_contacto_id_full").addEventListener("click",resetContacto);
        document.getElementById("btnContactoReset").addEventListener("click",resetContacto);

        
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