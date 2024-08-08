document.addEventListener('DOMContentLoaded', function() {
    let  formEvento = document.querySelector("#formularioEvento");             
    let  formContacto = document.querySelector("#formularioContacto");  
    let  formDireccion = document.querySelector("#formularioDireccion");   
    var myModal = new bootstrap.Modal(
        document.getElementById("evento"),{});  
    loadEstados(formEvento.estado);           
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
            console.log(info);  
            $('#nav-reunion-tab').trigger( "click" );   
            modalTitleId.innerHTML = "Crear Nueva Reunión";
            btnEliminarEvento.hidden = true;
            formEvento.reset();
            formContacto.reset();
            formDireccion.reset();
            formEvento.start.value = info.dateStr+" 00:00:00";
            formEvento.end.value = info.dateStr+" 00:00:00"; 
            formEvento.fecha.value = info.dateStr;      
            formEvento.hora.value = "16:30";              
            formEvento.duration.value = "02:00"; 
            loadContacts();
            formEvento.n_personas.value = 7;
            formEvento.p_entrada.value = 5;
            formEvento.t_entradas.value = 35;
            formEvento.chicas.checked = true; 
            formEvento.prepago.checked = false;
            myModal.show();  
                              
        },
        eventClick:function(info){   
            $('#nav-reunion-tab').trigger( "click" );     
            //console.log(evento);
            
            //reset_errors();
            reset_errors_evento();
            axios.post("/evento/edit/"+info.event.id)
            .then(response => {
                //console.log(response.data); 
                modalTitleId.innerHTML = "Datos de la Reunión";
                btnEliminarEvento.hidden = false;
                //REUNION
                formEvento.id.value = response.data.id;                
                formEvento.contacto_id.value = response.data.contacto_id;
                formEvento.direccion_id.value = response.data.direccion_id;
                formEvento.title.value = response.data.title;
                formEvento.start.value = response.data.start;                        
                formEvento.end.value = response.data.end;
                formEvento.fecha.value = response.data.fecha;
                formEvento.hora.value = response.data.hora;
                formEvento.duration.value = response.data.duration;                
                formEvento.t_entradas.value = response.data.t_entradas;
                formEvento.p_entrada.value = response.data.p_entrada;
                formEvento.n_personas.value = response.data.n_personas;
                formEvento.estado.value = response.data.estado;
                formEvento.chicas.checked = response.data.chicas;
                formEvento.prepago.checked = response.data.prepago;
                
                //CONTACTO_ID                
                formEvento.contacto_id_full.value = null;
                formEvento.contacto_id_full.list.innerHTML="";
                var clientes = response.data.clientes;
                for(var i=0;i<clientes.length;i++){
                    var option = document.createElement('option'); 
                    option.dataset.id = clientes[i].id;
                    option.value = clientes[i].full_apodo;
                    formEvento.contacto_id_full.list.appendChild(option);  
                    if(formEvento.contacto_id.value==clientes[i].id){
                        formEvento.contacto_id_full.value = clientes[i].full_apodo; 
                        //formContacto.apodo.id = clientes[i].id;    
                        formContacto.apodo.value = clientes[i].apodo;
                        formContacto.telefono.value = clientes[i].telefono;   
                    }
                }
                
                //DIRECCION_ID                         
                reset_direccion();      
                var list = response.data.direccions;
                var datalist = formEvento.direccion_id_full;
                for(var i=0;i<list.length;i++){
                    var option = document.createElement('option');
                    option.value = list[i].id;
                    option.text = list[i].direccion
                        +" "+list[i].poblacion
                        +" "+list[i].provincia;
                    datalist.appendChild(option);     
                }
                formEvento.direccion_id_full.value = response.data.direccion_id;
                
                //DIRECCION
                formDireccion.full_name.value = response.data.full_name;
                formDireccion.ladireccion.value = response.data.ladireccion;
                formDireccion.eltelefono.value = response.data.telefono;
                formDireccion.cp.value = response.data.cp;
                formDireccion.poblacion.value = response.data.poblacion;
                formDireccion.provincia.value = response.data.provincia;
                formDireccion.pais.value = response.data.pais; 
                formDireccion.viaje.value = response.data.viaje;       
                
                myModal.show();
            })
            .catch(error => {console.log(error);});
        },
    });

    calendar.render();

    document.getElementById("cerrar_modal").addEventListener("click",clear_form);
    document.getElementById("btnCerrar").addEventListener("click",clear_form);

    document.getElementById("btn_contacto_id_full").addEventListener("click",function(){
        $('#nav-cliente-tab').trigger( "click" );
    });

    document.getElementById("btnClear_contacto_id_full").addEventListener("click",reset_contacto);

    document.getElementById("contacto_id_full").addEventListener("change",function(){
        loadDireccions();
        reset_ladireccion();
    });
    
    document.getElementById("btn_direccion_id_full").addEventListener("click",function(){
        $('#nav-cliente-tab').trigger( "click" );
    });
    
    document.getElementById("direccion_id_full").addEventListener("change",function(){
        formEvento.direccion_id.value = formEvento.direccion_id_full.value;
        loadLadireccion();
        //$('#nav-cliente-tab').trigger( "click" );
    });

    document.getElementById("btnContactoNuevo").addEventListener("click",function(){
        reset_contacto();
        reset_direccion();
        reset_ladireccion();
    });

    document.getElementById("btnContactoGuardar").addEventListener("click",storeContacto);

    document.getElementById("btnDireccionNuevo").addEventListener("click",function(){
        formEvento.direccion_id.value = null;
        formEvento.direccion_id_full.value = null;
        reset_ladireccion();
    });

    document.getElementById("btnDireccionGuardar").addEventListener("click",storeDireccion);

    document.getElementById("btnGuardarTodo").addEventListener("click",function(){
        storeContacto();
        storeDireccion();
        storeEvento();
    });

    document.getElementById("p_entrada").addEventListener("input",calculator);
    document.getElementById("n_personas").addEventListener("input",calculator);
    document.getElementById("t_entradas").addEventListener("input",calculator_inv);

/*
    document.getElementById("btnEliminar").addEventListener("click",function(){
        sendData("/evento/delete/"+formulario.id.value);
    });
*/

    function storeContacto(){
        if(formEvento.contacto_id.value)
            sendDataContacto("/contactos/update/"+formEvento.contacto_id.value);
        else{
            sendDataContacto("/contactos/store");
            reset_direccion();
            reset_ladireccion();
        }
    }

    function storeDireccion(){
        if(formEvento.direccion_id.value)
            sendDataDireccion("/direccions/update/"+formEvento.direccion_id.value);
        else
            sendDataDireccion("/direccions/store");
    }

    function storeEvento(){
        if(formEvento.id.value)
            sendDataEvento("/evento/update/"+formEvento.id.value);
        else
            sendDataEvento("/evento/store");
    }

    function sendDataContacto(url){
        reset_errors_contacto();
        const datos = new FormData(formContacto);
        datos.append('id',formEvento.contacto_id.value);
        //console.log(datos);
        axios.post(url,datos)
            .then(response => {
                //console.log(response);
                reset_contacto();
                loadContacts();
                formEvento.contacto_id.value = response.data.contacto_id;
            })
            .catch(error => { 
                //console.log(error);
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
            });
    }

    function sendDataDireccion(url){
        reset_errors_direccion();
        reset_errors_ladireccion();
        const datos = new FormData(formDireccion);
        datos.append('id',formEvento.direccion_id.value);
        datos.append('contacto_id',formEvento.contacto_id.value);
        datos.append('telefono',formDireccion.eltelefono.value);
        datos.append('direccion',formDireccion.ladireccion.value);
        //console.log(datos);
        axios.post(url,datos)
            .then(response => {
                //console.log(response);
                reset_direccion();
                formEvento.direccion_id.value = response.data.direccion_id;
                loadDireccions();
                reset_ladireccion();
                loadLadireccion();
                $('#nav-cliente-tab').trigger( "click" );
            })
            .catch(error => { 
                //console.log(error); 
                if(!(typeof error.response.data.errors === 'undefined')){
                    if(!(typeof error.response.data.errors.contacto_id === 'undefined')){
                        formEvento.contacto_id_full.classList.add("is-invalid");
                        $('#helpContacto_id_full').text("El campo anfitrión/a es obligatorio.");
                    }
                    if(!(typeof error.response.data.errors.full_name === 'undefined')){
                        formDireccion.full_name.classList.add("is-invalid");
                        $('#helpFull_name').text(error.response.data.errors.full_name);
                    } 
                    if(!(typeof error.response.data.errors.ladireccion === 'undefined')){
                        formDireccion.ladireccion.classList.add("is-invalid");
                        $('#helpLadireccion').text(error.response.data.errors.ladireccion);
                    } 
                    if(!(typeof error.response.data.errors.telefono === 'undefined')){
                        formDireccion.eltelefono.classList.add("is-invalid");
                        $('#helpEltelefono').text(error.response.data.errors.telefono);
                    } 
                    if(!(typeof error.response.data.errors.cp === 'undefined')){
                        formDireccion.cp.classList.add("is-invalid");
                        $('#helpCp').text(error.response.data.errors.cp);
                    } 
                    if(!(typeof error.response.data.errors.pais === 'undefined')){
                        formDireccion.pais.classList.add("is-invalid");
                        $('#helpPais').text(error.response.data.errors.pais);
                    } 
                    if(!(typeof error.response.data.errors.poblacion === 'undefined')){
                        formDireccion.poblacion.classList.add("is-invalid");
                        $('#helpPoblacion').text(error.response.data.errors.poblacion);
                    } 
                    if(!(typeof error.response.data.errors.provincia === 'undefined')){
                        formDireccion.provincia.classList.add("is-invalid");
                        $('#helpProvincia').text(error.response.data.errors.provincia);
                    } 
                }
            });
    }

    function sendDataEvento(url){
        reset_errors_evento();
        const datos = new FormData(formEvento); 
        //console.log(datos);
        axios.post(url,datos)
            .then(response => {
                console.log(response);
                myModal.hide();
                calendar.refetchEvents();
            })
            .catch(error => { 
                //console.log(error);
                if(!(typeof error.response.data.errors === 'undefined')){
                    if(!(typeof error.response.data.errors.title === 'undefined')){ 
                        formEvento.title.classList.add("is-invalid");
                        $('#helpTitle').text(error.response.data.errors.title);
                    }
                    if(!(typeof error.response.data.errors.fecha === 'undefined')){
                        formEvento.fecha.classList.add("is-invalid");
                        $('#helpFecha').text(error.response.data.errors.fecha);
                    }
                    if(!(typeof error.response.data.errors.hora === 'undefined')){
                        formEvento.hora.classList.add("is-invalid");
                        $('#helpHora').text(error.response.data.errors.hora);
                    }                                
                    if(!(typeof error.response.data.errors.duration === 'undefined')){
                        formEvento.duration.classList.add("is-invalid"); 
                        $('#helpDuration').text(error.response.data.errors.duration);
                    }
                    if(!(typeof error.response.data.errors.contacto_id === 'undefined')){
                        formEvento.contacto_id_full.classList.add("is-invalid");
                        $('#helpContacto_id_full').text("El campo anfitrión/a es obligatorio.");
                    }        
                    if(!(typeof error.response.data.errors.direccion_id === 'undefined')){
                        formEvento.direccion_id_full.classList.add("is-invalid");
                        $('#helpDireccion_id_full').text("El campo dirección es obligatorio.");
                    }            
                    if(!(typeof error.response.data.errors.p_entrada === 'undefined')){
                        formEvento.p_entrada.classList.add("is-invalid"); 
                        $('#helpP_entrada').text(error.response.data.errors.p_entrada);
                    }
                    if(!(typeof error.response.data.errors.n_personas === 'undefined')){
                        formEvento.n_personas.classList.add("is-invalid"); 
                        $('#helpN_personas').text(error.response.data.errors.n_personas);
                    }
                    if(!(typeof error.response.data.errors.t_entradas === 'undefined')){
                        formEvento.t_entradas.classList.add("is-invalid"); 
                        $('#helpT_entradas').text(error.response.data.errors.t_entradas);
                    }
                }
                
            });
    }

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

    function loadContacts(){
        formEvento.contacto_id_full.value = null;
        var datalist = formEvento.contacto_id_full.list;
        datalist.innerHTML="";
        axios.post("/contactos/datalist")
            .then(response => { 
                //console.log(response.data);  
                var clientes = response.data.clientes;
                for(var i=0;i<clientes.length;i++){
                    var option = document.createElement('option'); 
                    option.id = clientes[i].id;
                    option.value = clientes[i].full_apodo;
                    if(formEvento.contacto_id.value==clientes[i].id){
                        formEvento.contacto_id_full.value = clientes[i].full_apodo;   
                        formContacto.apodo.value = clientes[i].apodo;
                        formContacto.telefono.value = clientes[i].telefono;  
                    }
                    datalist.appendChild(option);    
                }
            })
            .catch(error=> {console.log(error); });
    } 

    function loadDireccions(){
        reset_direccion();
        //console.log("loadDirrecion "+formEvento.contacto_id_full.list);
        axios.post("/contactos/"+formEvento.contacto_id_full.value+"/direccions")
            .then(response => { 
                formEvento.contacto_id.value = response.data.id; 
                formContacto.telefono.value = response.data.telefono;
                formContacto.apodo.value = response.data.apodo;                    
                var list = response.data.direccions;
                for(var i=0;i<list.length;i++){
                    var option = document.createElement('option');
                    option.value = list[i].id;
                    option.text = list[i].direccion
                        +" "+list[i].poblacion
                        +" "+list[i].provincia;
                    formEvento.direccion_id_full.appendChild(option);      
                }
                formEvento.direccion_id_full.value = formEvento.direccion_id.value;
            })
            .catch(error=> { console.log(error); });
        
    }

    function loadLadireccion(){
        //reset_ladireccion();
        if(formEvento.direccion_id.value){
            axios.get("/direcciones/"+formEvento.direccion_id.value)
                .then(response => {
                    //console.log(response.data); 
                    formDireccion.full_name.value = response.data.full_name;
                    formDireccion.ladireccion.value = response.data.ladireccion;
                    formDireccion.eltelefono.value = response.data.telefono;
                    formDireccion.cp.value = response.data.cp;
                    formDireccion.poblacion.value = response.data.poblacion;
                    formDireccion.provincia.value = response.data.provincia;
                    formDireccion.pais.value = response.data.pais;
                    formDireccion.viaje.value = response.data.viaje;
                })
                .catch(error => { console.log(error); });
        }
    }

    function calculator(){
        formEvento.t_entradas.value = formEvento.n_personas.value * formEvento.p_entrada.value;
    }

    function calculator_inv(){
        formEvento.p_entrada.value = formEvento.t_entradas.value / formEvento.n_personas.value;
        //formEvento.n_personas.value = formEvento.t_entradas.value / formEvento.p_entrada.value;
    }

    function reset_contacto(){
        formEvento.contacto_id.value = "";
        formEvento.contacto_id_full.value = null;
        formContacto.apodo.value = "";
        formContacto.telefono.value = "";
    }

    function reset_direccion(){
        //formEvento.direccion_id.value = null;
        formEvento.direccion_id_full.value = null;
        formEvento.direccion_id_full.innerHTML="";
        var option = document.createElement('option');
        option.value = "";
        option.text = "Seleccione una dirección";
        formEvento.direccion_id_full.appendChild(option);
    }

    function reset_ladireccion(){
        formDireccion.full_name.value = "";
        formDireccion.ladireccion.value = "";
        formDireccion.eltelefono.value = "";
        formDireccion.cp.value = "";
        formDireccion.poblacion.value = "";
        formDireccion.provincia.value = "";
        formDireccion.pais.value = "";
        formDireccion.viaje.value = "";
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
        //formEvento.contacto_id_full.remove("is-invalid");
        //$('#helpContacto_id_full').text("");
        formEvento.direccion_id_full.remove("is-invalid");
        $('#helpDireccion_id_full').text("");
        formEvento.p_entrada.classList.remove("is-invalid");
        $('#helpP_entrada').text("");
        formEvento.n_personas.classList.remove("is-invalid");
        $('#helpN_personas').text("");
        formEvento.t_entradas.classList.remove("is-invalid");
        $('#helpT_entradas').text("");
    }

    function reset_errors_contacto(){
        formEvento.contacto_id_full.classList.remove("is-invalid");
        $('#helpContacto_id_full').text("");
        formContacto.telefono.classList.remove("is-invalid");
        $('#helpTelefono').text("");
        formContacto.apodo.classList.remove("is-invalid");
        $('#helpApodo').text("");
    }

    function reset_errors_direccion(){    
        formEvento.direccion_id_full.classList.remove("is-invalid");
        $('#helpDireccion_id_full').text("");
    }
    
    function reset_errors_ladireccion(){      
        formEvento.contacto_id_full.classList.remove("is-invalid");
        $('#helpContacto_id_full').text("");
        formDireccion.full_name.classList.remove("is-invalid");
        $('#helpFull_name').text("");
        formDireccion.ladireccion.classList.remove("is-invalid");
        $('#helpLadireccion').text("");
        formDireccion.eltelefono.classList.remove("is-invalid");
        $('#helpEltelefono').text("");
        formDireccion.cp.classList.remove("is-invalid");
        $('#helpCp').text("");
        formDireccion.pais.classList.remove("is-invalid");
        $('#helpPais').text("");
        formDireccion.poblacion.classList.remove("is-invalid");
        $('#helpPoblacion').text("");
        formDireccion.provincia.classList.remove("is-invalid");
        $('#helpProvincia').text("");      
    }

    function clear_form(){
        reset_contacto();
        reset_direccion();
        reset_ladireccion();
        reset_errors_contacto();
        reset_errors_direccion();
        reset_errors_ladireccion();
        reset_errors_evento();
    }
});