<div>
    <style>
        .form-floating label{
            left:1em;
        }
        label{
            font-weight: 600;
        }
    </style>
    <form>
    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
        <div class="col-md-6 form-floating mb-3">
            <input wire:model="poblacion" type="text" id="poblacion" name="poblacion" readonly
                placeholder="Población"  disabled  value="{{ old('poblacion') }}"
                class="form-control rounded-3"/>
            <label class="form-label" for="poblacion">Población</label>
            @error('poblacion')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input wire:model="provincia" type="text" id="provincia" name="provincia" readonly
                placeholder="Provincia" disabled value="{{ old('provincia') }}"
                class="form-control rounded-3 ">
            <label class="form-label" for="provincia">Provincia</label>
            @error('provincia')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
    </div>
    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
        <div class="col-md-3 form-floating mb-3">
            <input wire:model="fecha" type="datetime-local" name="fecha" id="fecha"
                @if(!$direccion_id) disabled @endif value="{{ old('fecha') }}"
                class="form-control rounded-3 fs-4 @error('fecha') is-invalid @enderror"/>
            <label for="fecha">Fecha</label>
        </div>
        <div class="col-md-3 form-floating mb-3">
            <input wire:model="n_personas" type="number" name="n_personas" id="n_personas"
                @if(!$direccion_id) disabled @endif value="{{ old('n_personas') }}" min="0" step="1" value="7"               
                class="form-control rounded-3 @error('n_personas') is-invalid @enderror"/>
            <label for="n_personas">Nº Personas</label>
        </div>
        <div class="col-md-3 form-floating mb-3">
            <input wire:model="p_entrada" type="number" name="p_entrada" id="p_entrada"
                @if(!$direccion_id) disabled @endif value="{{ old('p_entrada') }}" min="0" step="1"  value="5"                
                class="form-control rounded-3 @error('p_entrada') is-invalid @enderror"/>
            <label for="p_entrada">Precio Entrada</label>
        </div>
        <div class="col-md-3 form-floating mb-3">
            <input wire:model="t_entradas" type="number" name="t_entradas" id="t_entradas"
                @if(!$direccion_id) disabled @endif value="{{ old('t_entradas') }}" min="0" step="1"  value="0" 
                class="form-control rounded-3 @error('t_entradas') is-invalid @enderror"/>
            <label for="t_entradas">Total Entradas</label>
        </div>
    </div>
    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
        <div class="col-md-4 mb-3"> 
            <label for="estado" class="form-label">Estado</label>   
            <select wire:model="estado" name="estado" id="estado" 
                @if(!$direccion_id) disabled @endif value="{{ old('estado') }}" 
                class="form-select rounded-3 @error('estado') is-invalid @enderror text-uppercase">
                @foreach ($estados as $item)
                    <option value="{{$item}}">{{$item}}</option>
                @endforeach
            </select>           
        </div>
        <div class="col-md-4 form-floating">
            <div class="form-check form-switch m-3 fs-5">
                <input wire:model="chicas" type="checkbox" name="chicas" id="chicas"
                    @if(!$direccion_id) disabled @endif value="{{ old('chicas') }}" 
                    class="form-check-input rounded-3 @error('chicas') is-invalid @enderror"/>
                <label class="form-check-label" for="chicas">Sólo Chicas</label>
            </div>
        </div>
        <div class="col-md-4 form-floating">
            <div class="form-check form-switch m-3 fs-5">
                <input wire:model="prepago" type="checkbox" name="prepago" id="prepago"
                    @if(!$direccion_id) disabled @endif value="{{ old('prepago') }}" 
                    class="form-check-input rounded-3 @error('prepago') is-invalid @enderror"/>
                <label class="form-check-label" for="prepago">Con Prepago</label>
            </div>
        </div>        
    </div>
    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
        <div class="col-md-12 d-flex flex-row-reverse"> 
            <button wire:click="submit" type="button" class="btn rounded-3 btn-primary">Guardar</button>
        </div>
    </div>
    </form>
</div>
