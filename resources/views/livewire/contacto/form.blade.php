<form class="w-100">
    <div class="form-floating mb-3">
        <input wire:model="apodo" type="text" id="apodo" name="apodo" placeholder="Apodo"
            value="{{ old('apodo') }}"
            class="form-control rounded-3 @error('apodo') is-invalid @enderror">
        <label for="apodo">Nombre o apodo del contacto</label>
        @error('apodo')<small class="text-danger">{{ $message }}</small>@enderror

    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="form-floating">
                <input wire:model="telefono" type="text" id="telefono" name="telefono" placeholder="Teléfono"
                    value="{{ old('telefono') }}"
                    class="form-control rounded-3 @error('telefono') is-invalid @enderror" >
                <label for="telefono">Teléfono</label>
                @error('telefono')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <!--
            <button wire:click="gen_avatar" type="button" class="btn btn-outline-primary float-end">Generar Imagen Avatar</button>
            -->
        </div>
    </div>
    <div class="p-2 border rounded mb-3">
        <label class="">Coincidencias:</label>
        <ul class="list-unstyled">
            @forelse ($contactos as $item)
                <li class="text-danger fs-6"><small>
                    <a class="text-decoration-none" href="{{ route("contacto.show", ['telefono' => $item->getTelefono()]) }}"
                        >{{ $item->getFullApodoAttribute() }}</a></small></li>
            @empty
                    <li class="text-success">No hay confictos</li>
            @endforelse
        </ul>
    </div>
    <!--<small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>-->
    <button wire:click="submit" type="button" class="w-100 mb-2 btn btn-lg rounded-3 btn-outline-success">Guardar</button>
 </form>
