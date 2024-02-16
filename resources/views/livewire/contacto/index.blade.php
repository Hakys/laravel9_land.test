<div>
    <table class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contactos as $contacto)
                <tr>
                    <td class="text-start">
                        <a alt="Nombre o Apodo de {{ $contacto->getId() }}" 
                            href="{{ route("contacto.show", ['telefono' => $contacto->getTelefono()]) }}">
                            {{ $contacto->getApodo() }}
                        </a>
                    </td>
                    <td>
                        <a alt="Teléfono de {{ $contacto->getId() }}" 
                            href="{{ route("contacto.show", ['telefono' => $contacto->getTelefono()]) }}">
                            {{ $contacto->getTelefono() }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
