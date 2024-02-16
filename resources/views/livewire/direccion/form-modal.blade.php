<div>
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#DireccionFormModal{{$id_dir}}" >
    @if ($op=="create")
      <i class="bi-plus-square"></i>
    @else
      <i class="bi-pencil-square"></i>
    @endif
  </button>
  <div wire:ignore.self class="modal fade" id="DireccionFormModal{{$id_dir}}" tabindex="-1" 
    aria-labelledby="DireccionFormModalLabel{{$id_dir}}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form>
        <div class="modal-header">
          <h5 class="modal-title" id="DireccionFormModalLabel{{$id_dir}}">{{$titleform}}</h5>
          <button wire:click="close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" x-data="{ recoge: @entangle('recoge') }">          
          <div class="form-floating mb-2">
            <input wire:model="telefono" type="text" id="telefono" name="telefono" placeholder="Teléfono" 
                value="{{ old('telefono') }}"
                class="form-control rounded-3 @error('telefono') is-invalid @enderror">
            <label for="telefono">Teléfono</label>
            @error('telefono')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="d-flex align-items-start mb-2">              
            <input wire:model="recoge" type="checkbox" id="recoge" name="recoge" 
                value="" @if(old('recoge')) checked @endif
                class="form-check-input rounded-3 me-2 @error('recoge') is-invalid @enderror">
            <label for="recoge" class="form-check-label">Entrega en Mano, Recoge Huelva</label>
            @error('recoge')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="form-floating mb-2">
              <input wire:model="full_name" type="text" id="full_name" name="full_name" placeholder="Nombre Completo" 
                  value="{{ old('full_name') }}" @disabled(old('recoge'))
                  class="form-control rounded-3 @error('full_name') is-invalid @enderror" >
              <label for="full_name">Nombre Completo</label>
              @error('full_name')<small class="text-danger">{{ $message }}</small>@enderror
          </div>            
          <div class="form-floating mb-2">
            <input wire:model="ladireccion" type="text" id="ladireccion" name="ladireccion" placeholder="Dirección Completa" 
                value="{{ old('ladireccion') }}"
                class="form-control rounded-3 @error('ladireccion') is-invalid @enderror">
            <label for="ladireccion">Dirección Completa</label>
            @error('ladireccion')<small class="text-danger">{{ $message }}</small>@enderror
          </div>            
          <div class="row">
            <div class="col-md-4"> 
              <div class="form-floating mb-2">
                <input wire:model="cp" type="text" id="cp" name="cp" placeholder="Código Postal" 
                    value="{{ old('cp') }}" @disabled($recoge)
                    class="form-control rounded-3 @error('cp') is-invalid @enderror">
                <label for="cp">Código Postal</label>
                @error('cp')<small class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-2">
                <input wire:model="poblacion" type="text" id="poblacion" name="poblacion" placeholder="Población" 
                    value="{{ old('poblacion') }}"
                    class="form-control rounded-3 @error('poblacion') is-invalid @enderror">
                <label for="poblacion">Población</label>
                @error('poblacion')<small class="text-danger">{{ $message }}</small>@enderror
              </div>                
            </div>
          </div>
          <div class="row">
            <div class="col"> 
              <div class="form-floating mb-2">
                <input wire:model="provincia" type="text" id="provincia" name="provincia" placeholder="Provincia" 
                    value="{{ old('provincia') }}" @disabled($recoge)
                    class="form-control rounded-3 @error('provincia') is-invalid @enderror">
                <label for="provincia">Provincia</label>
                @error('provincia')<small class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating mb-2">
                <input wire:model="pais" type="text" id="pais" name="pais" placeholder="País" 
                    value="{{ old('pais') }}" @disabled($recoge)
                    class="form-control rounded-3 @error('pais') is-invalid @enderror">
                <label for="pais">Pais</label>
                @error('pais')<small class="text-danger">{{ $message }}</small>@enderror
              </div>                
            </div>
          </div>
          <div class="row">
            <div class="col-md-4"> 
              <div class="form-floating mb-2">
                <input wire:model="nif" type="text" id="nif" name="nif" placeholder="NIF ó CIF" 
                    value="{{ old('nif') }}" @disabled($recoge)
                    class="form-control rounded-3 @error('nif') is-invalid @enderror">
                <label for="nif">NIF ó CIF</label>
                @error('nif')<small class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-2">
                <input wire:model="email" type="text" id="email" name="email" placeholder="Correo Electrónico" 
                    value="{{ old('email') }}" @disabled($recoge)
                    class="form-control rounded-3 @error('email') is-invalid @enderror">
                <label for="email">Correo Electrónico</label>
                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
              </div>                
            </div>
          </div>                     
        </div>
        <div class="modal-footer d-flex">                   
          @if($op=='edit')
          <button id='btn_delete' type="button" class="btn btn-danger" wire:click="delete">
            <i class="bi-trash"></i>
          </button>
          @endif
          <button wire:click="submit" type="button" class="btn rounded-3 btn-primary">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
