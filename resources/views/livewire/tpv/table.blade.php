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
                            <button class="btn btn-outline-info btn-sm"
                                onclick="copyToClipboard('{{ asset('tpvs/'.$tpv->key) }}')">Copiar URL</button>
                            <a class="btn btn-outline-dark btn-sm"
                                role="button" href="tpvs/{{ $tpv->key}}/detalles">Detalles</a>
                            <a class="btn btn-outline-{{ $tpv->pagado?'secondary':'warning' }} btn-sm"
                                role="button" href="tpvs/{{ $tpv->key}}">{{ $tpv->pagado?'PAGADO':'PAGAR' }}</a>
                            <button type="button" class="btn btn-outline-primary btn-sm" wire:click="deleteTpv({{ $tpv->id }})">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @empty
                    No hay pagos
                @endforelse
        </tbody>
    </table>
</div>
@push('scripts')
    <script>
        function copyToClipboard(url) {
            // Crea un elemento temporal para copiar el texto
            const tempInput = document.createElement('input');
            tempInput.value = url;
            document.body.appendChild(tempInput);

            // Selecciona el texto del elemento temporal
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // Para dispositivos móviles

            // Copia el texto al portapapeles
            document.execCommand('copy');

            // Elimina el elemento temporal
            document.body.removeChild(tempInput);

            // Notifica al usuario que la URL ha sido copiada
            alert('Enlace de la Página de Pago copiado al portapapeles.\n' + url);
        }
    </script>
@endpush
