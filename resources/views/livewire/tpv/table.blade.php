<div>
    <table class="table">
        <thead>
            <tr class="">
                <th>Clave Única</th>
                <th>Concepto</th>
                <th class="text-end">Importe</th>
                <th class="text-center">Pagado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tpvs as $tpv)
                <tr class="">
                    <td class="text-star">{{ $tpv->key }}</td>
                    <td class="text-star">{{ $tpv->concepto }}</td>
                    <td class="text-end" >{{ $tpv->amount }} €</td>
                    <td class="text-center">{{ $tpv->pagado?'PAGADO':'PENDIENTE' }}</td>
                    <td>
                        <a class="btn btn-outline-secondary" href="{{ url('/tpv/' . $tpv->key) }}">Detalles</a>
                        <a class="btn btn-outline-secondary" href="{{ url('/tpvs/' . $tpv->key) }}">Pagar</a>
                        <button class="btn btn-primary mx-1" wire:click="deleteTpv({{ $tpv->id }})">Eliminar</button>
                    </td>
                </tr>
                @empty
                    No hay pagos
                @endforelse
        </tbody>
    </table>
</div>

