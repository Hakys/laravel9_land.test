<div>
    
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
        data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div role="document" class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
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
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder=""
                                name="title" id="title" aria-describedby="helpId"/>
                            <label for="title">Title</label>
                            <small id="helpId" class="form-text text-muted" hidden>Help text</small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="datetime-local" class="form-control" placeholder=""
                                name="start" id="start" aria-describedby="helpId"/>
                            <label for="start">Inicio</label>
                            <small id="helpId" class="form-text text-muted" hidden>Help text</small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="datetime-local" class="form-control" placeholder=""
                                name="end" id="end" aria-describedby="helpId"/>
                            <label for="end">Fin</label>
                            <small id="helpId" class="form-text text-muted" hidden>Help text</small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                    <button type="button" class="btn btn-primary" id="btnModificar">Modificar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(
                document.getElementById("evento"),{
                    'backdrop': true,
                    'keyboard': false,
                    'focus': false,
                }
            );

            let formulario = document.querySelector("#formularioEventos");
            var calendarEl = document.getElementById('agenda');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'bootstrap5',
                initialView: 'dayGridMonth',
                locale: 'es',
                displayEventTime:true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek,listMonth',
                },
                //events: "{{route('evento.list')}}",
                eventSources:{
                    url:"{{route('evento.list')}}",
                    method: "POST",
                    extraParams: {
                        _token: formulario._token.value,
                    }
                },
                dateClick:function(info){
                    formulario.reset();
                    formulario.start.value=info.dateStr;
                    formulario.end.value=info.dateStr;
                    myModal.show();
                },
                eventClick:function(info){
                    var evento = info.event;
                    //console.log(evento);
                    axios.post('/evento/edit/'+info.event.id)
                    .then((response) => {
                        formulario.id.value = response.data.id;
                        formulario.title.value = response.data.title;
                        formulario.start.value = response.data.start;
                        formulario.end.value = response.data.end;
                        myModal.show();
                    })
                    .catch(error => {
                        console.log(error.response.datos);
                    });
                }
            });

            calendar.render();

            document.getElementById("btnGuardar").addEventListener("click",function(){
                sendData("{{route('evento.store')}}");
            });

            document.getElementById("btnEliminar").addEventListener("click",function(){
                sendData("/evento/delete/"+formulario.id.value);
            });

            document.getElementById("btnModificar").addEventListener("click",function(){
                sendData("/evento/update/"+formulario.id.value);
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
    </script>
</div>