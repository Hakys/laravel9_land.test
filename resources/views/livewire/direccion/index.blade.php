<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped align-middle caption-top ">
        <thead>
            <caption><h5> 
                <i class="fa fa-address-card-o fa-lg me-2" aria-hidden="true"></i>
                Direciones Asociadas</h5></caption>
            <tr class="text-center">
                <th scope="col">Nombre Completo</th>
                <th scope="col">Dirección</th>
                <th scope="col">Población</th>
                <th scope="col" colspan="2">Distancia</th>
                <td>@livewire('direccion.form-modal',['op'=>'create','to'=>'contacto.show','contacto'=>$contacto],key(0))</td>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse ($contacto->direccions as $item)
                <tr class="text-nowrap">
                    <td scope="row" class="text-start">{{$item->GetFull_name()}}</td>
                    <td>{{$item->getDireccion()}}</td>
                    <td>{{$item->getPoblacion().", ".$item->getProvincia()}}</td>
                    <td>{{ $item->rutas()->first()->getDistanceText() }}</td>
                    <td class="text-small">{{ $item->rutas()->first()->getDurationText() }}</td>
                    <td class="text-center">@livewire('direccion.form-modal', 
                        ['op'=>'edit','contacto'=>$contacto,'direccion'=>$item],key($item->getId()))</td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center"><span class="text-danger"> No hay direciones asociadas</span></td></tr>    
            @endforelse 
        </tbody>
    </table>
</div>