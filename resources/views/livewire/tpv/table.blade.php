<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="">
                <th>Fecha Mod.</th>
                <th>Clave Única</th>
                <th>Concepto</th>
                <th class="text-end">Importe</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tpvs as $tpv)
                <tr>
                    <td class="text-center text-nowrap">{{ $tpv->getUpdatedAt() }}</td>
                    <td class="text-star">{{ $tpv->key }}</td>
                    <td class="text-star">{{ $tpv->concepto }}</td>
                    <td class="text-end" >{{ $tpv->amount }} €</td>
                    <td class="p-0 pt-1">
                        <div class="btn-group w-100" role="group" aria-label="Actions">
                            <a class="btn btn-outline-secondary btn-sm"
                                role="button" href="tpvs/{{ $tpv->key}}/detalles">Detalles</a>
                            <a class="btn btn-outline-secondary btn-sm"
                                role="button" href="tpvs/{{ $tpv->key}}">{{ $tpv->pagado?'PAGADO':'PAGAR' }}</a>
                            <button type="button" class="btn btn-primary btn-sm" wire:click="deleteTpv({{ $tpv->id }})">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @empty
                    No hay pagos
                @endforelse
        </tbody>
    </table>
</div>

