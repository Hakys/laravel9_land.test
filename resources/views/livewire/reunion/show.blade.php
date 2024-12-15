<div>
    <style>
        .form-floating label{
            left:1em;
        }
        label{
            font-weight: 400;
        }
    </style>
    <form>
    <div class="row justify-content-end mb-3">
        <div class="col">
            <div class="input-group">
                <span class="input-group-text">Día:</span>
                <input type="date" id="fecha" name="fecha" wire:model="fecha" aria-describedby="helpFecha"
                    class="form-control form-control-lg @error('fecha') is-invalid @enderror" >
            </div>
            <small id="helpFecha" class="text-danger"></small>
        </div>
        <div class="col">
            <div class="input-group">
                <span class="input-group-text">Hora:</span>
                <input type="time" id="hora" name="hora" list="horas" wire:model="hora" aria-describedby="helpHora"
                    class="form-control form-control-lg @error('hora') is-invalid @enderror">
                <datalist id="horas" class="w-100">
                    <option value="16:30"></option>
                    <option value="19:30"></option>
                    <option value="23:30"></option>
                </datalist>
            </div>
            <small id="helpHora" class="text-danger"></small>
        </div>
        <div class="col">
            <div class="input-group h-100">
                <span class="input-group-text">Estado:</span>
                <select wire:model="estado" name="estado" id="estado" aria-describedby="helpEstado"
                    @if(!$direccion_id) disabled @endif value="{{ old('estado') }}"
                    class="form-select text-uppercase @error('estado') is-invalid @enderror">
                    @foreach ($estados as $item)
                        <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <small id="helpEstado" class="text-danger"></small>
        </div>
        <div class="col">
            <div class="input-group">
                <span class="input-group-text">Duración:</span>
                <input type="time" id="duration" name="duration" value="02:00" disabled readonly
                    class="form-control form-control-lg" aria-describedby="helpDuration">
            </div>
            <small id="helpDuration" class="text-danger"></small>
        </div>
    </div>
    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
        <div class="col-md-6 form-floating mb-3">
            <input wire:model="poblacion" type="text" id="poblacion" name="poblacion"
                placeholder="Población" value="{{ old('poblacion') }}" readonly disabled
                class="form-control rounded-3"/>
            <label class="form-label" for="poblacion">Población</label>
            @error('poblacion')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input wire:model="provincia" type="text" id="provincia" name="provincia"
                placeholder="Provincia" value="{{ old('provincia') }}" disabled readonly
                class="form-control rounded-3 ">
            <label class="form-label" for="provincia">Provincia</label>
            @error('provincia')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
    </div>
    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|} mb-3">

        <div class="col form-floating ">
            <input wire:model="n_personas" type="number" name="n_personas" id="n_personas"
                @if(!$direccion_id) disabled @endif value="{{ old('n_personas') }}" min="0" step="1" value="7"
                class="form-control rounded-3 @error('n_personas') is-invalid @enderror"/>
            <label for="n_personas">Nº Personas</label>
        </div>
        <div class="col form-floating ">
            <input wire:model="p_entrada" type="number" name="p_entrada" id="p_entrada"
                @if(!$direccion_id) disabled @endif value="{{ old('p_entrada') }}" min="0" step="1"  value="5"
                class="form-control rounded-3 @error('p_entrada') is-invalid @enderror"/>
            <label for="p_entrada">Precio Entrada</label>
        </div>
        <div class="col form-floating ">
            <input wire:model="t_entradas" type="number" name="t_entradas" id="t_entradas"
                @if(!$direccion_id) disabled @endif value="{{ old('t_entradas') }}" min="0" step="1"  value="0"
                class="form-control rounded-3 @error('t_entradas') is-invalid @enderror"/>
            <label for="t_entradas">Total Entradas</label>
        </div>
        <div class="col form-floating ">
            <div class="row form-floating">
                <div class="form-check form-switch mx-3 fs-5">
                    <input wire:model="chicas" type="checkbox" name="chicas" id="chicas"
                        @if(!$direccion_id) disabled @endif value="{{ old('chicas') }}"
                        class="form-check-input rounded-3 @error('chicas') is-invalid @enderror"/>
                    <label class="form-check-label" for="chicas">Sólo Chicas</label>
                </div>
            </div>
            <div class="row form-floating">
                <div class="form-check form-switch mx-3 fs-5">
                    <input wire:model="prepago" type="checkbox" name="prepago" id="prepago"
                        @if(!$direccion_id) disabled @endif value="{{ old('prepago') }}"
                        class="form-check-input rounded-3 @error('prepago') is-invalid @enderror"/>
                    <label class="form-check-label" for="prepago">Con Prepago</label>
                </div>
            </div>
        </div>
        <div class="col form-floating ps-2">
            <button wire:click="submit" type="button" class="btn rounded-3 btn-primary ms-5 mt-3">Guardar</button>
        </div>
    </div>
    </form>
</div>
