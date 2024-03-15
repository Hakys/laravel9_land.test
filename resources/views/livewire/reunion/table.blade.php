<div>
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            
                        </div>
                        <div class="col-sm-6">
                            
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th><i class="fa fa-map-marker"></i> Población</th>
                            <th>Estado</th>
                            <th><i class="fa fa-group"></i></th>
                            <th>Nº. <i class="fa fa-user"></i></th>
                            <th>Entrada</th>
                            <th>Total</th>
                            <th>Reserva</th>                            
                            <th>Dirección</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reunions as $reunion)
                            <tr>
                                <td>{{$reunion->fechaDia()}}</td>
                                <td>{{$reunion->fechaHora()}}</td>
                                <td class="text-uppercase" title="{{$reunion->getDireccion()}}">
                                     {{$reunion->getProvincia()}}, {{$reunion->getPoblacion()}} 
                                </td>
                                <td>
                                    @switch($reunion->estado)
                                        @case("solicitada")
                                            <i class="fa fa-pencil solicitada"> SOLICITADA</i>@break
                                        @case("confirmada")
                                            <i class="fa fa-handshake-o confirmada"> CONFIRMADA</i>@break        
                                        @case("reservada")                        
                                            <i class="fa fa-registered reservada"> RESERVADA</i>@break 
                                        @case("realizada")                                               
                                            <i class="fa fa-thumbs-o-up realizada"> REALIZADA</i>@break
                                        @case("cancelada")
                                            <i class="fa fa-ban cancelada"> CANCELADA</i>@break
                                    @endswitch
                                </td>
                                <td>
                                    @if($reunion->chicas)
                                            <i class="fa fa-venus p-1 venus" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-venus-mars p-1 indigo" aria-hidden="true"></i>
                                        @endif
                                </td>                                    
                                <td>{{$reunion->n_personas}}</td>
                                <td>{{$reunion->p_entrada}} €/p.</td>
                                <td>{{$reunion->t_entradas}} €</td>
                                <td>
                                    <i class="fa fa-credit-card p-1 @if($reunion->prepago) true @else false @endif">
                                        @if($reunion->prepago) Prepago @else Insitu @endif</i> 
                                </td>
                                <td></td>
                                <td class="flex justify-content-center gap-2">
                                    <a href="#editEmployeeModal" data-toggle="modal">
                                        <i class="fa fa-pencil fa-lg" aria-hidden="true" title="Editar"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix">
                    
                </div>
            </div>
        </div>        
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">						
                        <h4 class="modal-title">Add Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>					
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">						
                        <h4 class="modal-title">Edit Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>					
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">						
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>
