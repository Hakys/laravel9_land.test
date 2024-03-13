<div>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ContactoFormModal" >
      @if ($op=="create")
        <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
      @else
        <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
      @endif
    </button>
    <div wire:ignore.self class="modal fade" id="ContactoFormModal" tabindex="-1" aria-labelledby="ContactoFormModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ContactoFormModalLabel">{{$titleform}}</h5>
            <button wire:click="close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                <form>
                <div class="form-floating mb-3">
                    <input wire:model="apodo" type="text" id="apodo" name="apodo" placeholder="Apodo" 
                        value="{{ old('apodo') }}"
                        class="form-control rounded-3 @error('apodo') is-invalid @enderror" >
                    <label for="apodo">Nombre o apodo del contacto</label>
                    @error('apodo')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input wire:model="telefono" type="text" id="telefono" name="telefono" placeholder="Teléfono" 
                        value="{{ old('telefono') }}"
                        class="form-control rounded-3 @error('telefono') is-invalid @enderror" >
                    <label for="telefono">Teléfono</label>
                    @error('telefono')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <!--<small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>-->                    
                <button wire:click="submit" type="button" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary">Guardar</button>
             </form>             
          </div>
        </div>
      </div>
    </div>
</div>
