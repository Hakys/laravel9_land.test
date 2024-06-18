<div>
    <div id='agenda'></div>
    <div class="modal fade" id="evento" tabindex="-1" 
        data-bs-backdrop="true" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true"> 
        <div role="document" class="modal-dialog modal-dialog-centered modal-md modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-nav">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-reunion-tab" 
                                data-bs-toggle="tab" data-bs-target="#nav-reunion" type="button" role="tab" 
                                aria-controls="nav-reunion" aria-selected="true">REUNIÓN</button>
                            <button class="nav-link" id="nav-cliente-tab" 
                                data-bs-toggle="tab" data-bs-target="#nav-cliente" type="button" role="tab" 
                                aria-controls="nav-cliente" aria-selected="false">ANFITRIÓN</button>
                        </div>
                    </nav>
                </div>
                <div class="modal-body">                       
                    <div class="tab-content border border-1 bs-border-color rounded-2 p-2 border-top-0 rounded-top-0" id="nav-tabContent">
                        {{-- EVENTO --}} 
                        <div class="tab-pane fade show active" id="nav-reunion" role="tabpanel" aria-labelledby="nav-reunion-tab">
                            <form action ="" id="formularioEvento">
                                @csrf  
                                <div class="flex">
                                    <input type="text" name="id" id="id" hidden/>
                                    <input type="datetime" name="start" id="start" hidden/>  
                                    <input type="datetime" name="end" id="end" hidden/> 
                                    <input type="text" name="contacto_id" id="contacto_id" hidden/>  
                                    <input type="text" name="direccion_id" id="direccion_id" hidden/>  
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
                                    <div class="row justify-content-end">
                                        <div class="col-auto">
                                            <div class="input-group">
                                                <span class="input-group-text">Duración:</span>                                
                                                <input type="time" id="duration" name="duration" 
                                                    class="form-control form-control-lg fs-6"
                                                    aria-describedby="helpDuration">
                                                 
                                            </div>
                                        </div>
                                    </div>                                    
                                    <small id="helpDuration" class="text-danger"></small>                                    
                                    <div class="ps-1 mt-2"><h6>Anfitrión/a:</h6></div> 
                                    <div class="input-group">                                       
                                        <button class="btn btn-success" type="button" id="btn_contacto_id_full">  
                                            <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                        </button>                                                                  
                                        <input list="clientes" name="contacto_id_full" class="form-control"
                                            id="contacto_id_full"
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
                                                                     
                                    <small id="helpContacto_id_full" class="text-danger"></small> 
                                    
                                    <div class="ps-1 mt-2"><h6>Dirección:</h6></div> 
                                    <div class="input-group">  
                                        <button class="btn btn-success" type="button" id="btn_direccion_id_full">
                                            <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                        </button>                                     
                                        <select name="direccion_id_full" id="direccion_id_full" placeholder="Seleccione una Dirección." 
                                            class="form-select" aria-describedby="helpDireccion_id_full"></select>
                                    </div>                                
                                    <div class="mb-3">
                                        <small id="helpDireccion_id_full" class="text-danger mb-3"></small>
                                    </div>                            
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-floating my-2"> 
                                                <input type="text" class="form-control" placeholder=""
                                                    name="p_entrada" id="p_entrada" aria-describedby="helpP_entrada"/>
                                                <label for="p_entrada">Precio Entrada</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4"> 
                                            <div class="form-floating my-2">
                                                <input type="text" class="form-control" placeholder="" min="0" step="1" 
                                                    name="n_personas" id="n_personas" aria-describedby="helpN_personas"/>
                                                <label for="n_personas">Nº Personas</label>                                            
                                            </div> 
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="form-floating my-2"> 
                                                <input type="text" class="form-control" placeholder=""
                                                    name="t_entradas" id="t_entradas" aria-describedby="helpT_entradas"/>
                                                <label for="t_entradas">Total Entradas</label>       
                                            </div>
                                        </div>
                                    </div> 
                                    <div>
                                        <small id="helpP_entrada" class="text-danger"></small>
                                        <small id="helpN_personas" class="text-danger"></small>
                                        <small id="helpT_entradas" class="text-danger"></small>
                                    </div>                                  
                                    <div class="row align-items-center">
                                        <div class="col-md form-floating">
                                            <div class="input-group">
                                                <span class="input-group-text">Estado:</span>  
                                                <select name="estado" id="estado" class="form-select text-uppercase"></select>     
                                            </div>   
                                        </div>
                                        <div class="col-auto form-floating">
                                            <div class="row form-check form-switch fs-5 m-3">
                                                <input type="checkbox" name="chicas" id="chicas" 
                                                    class="form-check-input rounded-3"/>
                                                <label class="form-check-label" for="chicas">Sólo Chicas</label>
                                            </div>
                                            <div class="row form-check form-switch fs-5 m-3">
                                                <input type="checkbox" name="prepago" id="prepago" 
                                                    class="form-check-input rounded-3"/>
                                                <label class="form-check-label" for="prepago">Prepago</label>
                                            </div>
                                        </div>
                                    </div>
                                    <small id="helpEstado" class="text-danger"></small> 
                                </div>
                            </form>
                        </div>
                        {{-- CLIENTE --}}
                        <div class="tab-pane fade" id="nav-cliente" role="tabpanel" aria-labelledby="nav-cliente-tab">
                            <form id="formularioContacto" action="">     
                                @csrf                                         
                                <div class="mt-2"><h6>Datos del Cliente:</h6></div>                                      
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
                                            <label for="telefono">Teléfono</label>
                                        </div>  
                                    </div>
                                    <div class="col mi-modal-footer">
                                        <button class="btn btn-info text-white" type="button" id="btnContactoNuevo">
                                            <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                                        </button> 
                                        <button type="button" class="btn btn-success" id="btnContactoGuardar">Guardar</button>
                                        <button type="button" class="btn btn-secondary" id="btnContactoReset">Reset</button>
                                    </div>
                                    <small id="helpTelefono" class="text-danger"></small>
                                </div>
                            </form>                             
                            <form id="formularioDireccion" action="">  
                                @csrf                                            
                                <div class="mt-2"><h6>Dirección del Cliente:</h6></div> 
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
                                <div class="row mb-md-2">
                                    <div class="col-md-4 mb-2 mb-md-0"> 
                                        <div class="form-floating">
                                            <input type="text" id="eltelefono" name="eltelefono" placeholder="Telefóno"  
                                                class="form-control rounded-3" aria-describedby="helpEltelefono">
                                            <label for="eltelefono">Telefóno</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 mb-2 mb-md-0"> 
                                        <div class="form-floating">
                                            <input type="text" id="cp" name="cp" placeholder="Código Postal"  
                                                class="form-control rounded-3" aria-describedby="helpCp">
                                            <label for="cp">Código Postal</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 mb-2 mb-md-0">
                                        <div class="form-floating">
                                            <input type="text" id="pais" name="pais" placeholder="País"
                                                class="form-control rounded-3" aria-describedby="helpPais">
                                            <label for="pais">País</label> 
                                        </div>                
                                    </div>
                                </div>
                                <div>
                                    <small id="helpEltelefono" class="text-danger"></small>
                                    <small id="helpCp" class="text-danger"></small>
                                    <small id="helpPais" class="text-danger"></small>
                                </div>    
                                <div class="row">
                                    <div class="col-7">
                                        <div class="form-floating">
                                            <input type="text" id="poblacion" name="poblacion" placeholder="Población" 
                                                class="form-control rounded-3" aria-describedby="helpPoblacion">
                                            <label for="poblacion">Población</label> 
                                        </div>                
                                    </div>        
                                    <div class="col-5"> 
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
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">Ruta:</span>                                
                                            <input type="text" id="viaje" name="viaje" 
                                                class="form-control fs-6" aria-describedby="helpViaje">
                                        </div>    
                                    </div>                                
                                    <div class="col">
                                        <div class="mi-modal-footer">
                                            <button class="btn btn-info text-white" type="button" id="btnDireccionNuevo">
                                                <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-success" id="btnDireccionGuardar">Guardar</button>
                                            <button type="button" class="btn btn-secondary" id="btnDireccionReset">Reset</button>
                                        </div>
                                    </div>
                                </div>    
                                <small id="helpViaje" class="text-danger"></small>
                            </form>
                        </div>
                    </div>      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnGuardarTodo">Guardar Todo</button>
                    <button type="button" class="btn btn-danger" id="btnEliminarEvento">Eliminar Evento</button>
                    <button type="button" class="btn btn-danger" id="btnPrueba">Prueba</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div> 
            </div>
        </div>
    </div>
</div>