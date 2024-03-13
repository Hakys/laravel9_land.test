<div>
    <div class="row">
        <div class="col"><label for="contactoselect2">Cliente</label></div>
        <div class="col"><label for="direccionselect">Dirección del Cliente</label></div>
    </div>
    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
        <div class="col-md-6 form-floating mb-3" wire:ignore>
            <div class="flex d-flex gap-2 " >
                <div class="flex-grow-1" >                    
                    <select class="select2 form-control"
                        id="contactoselect2" wire:model='contacto_id'>
                        <option value="">Selecciona o Crea un Cliente</option>
                        @foreach ($contactos as $item)
                            <option value="{{$item->getId()}}">{{$item->getApodo()}} - {{$item->getTelefono()}}</option>
                        @endforeach
                    </select>
                </div>
                <div> @livewire('contacto.form-modal',['op'=>'create','to'=>'reunion.create']) </div>
            </div>
        </div>   
        <div class="col-md-6 form-floating mb-3">
            <div class="flex d-flex gap-2">
                <div class="flex-grow-1 pe-2">                    
                    <select class="form-control" id="direccionselect" wire:model='direccion_id'
                        @if(!$contacto_id) disabled @endif>
                        <option value="">Selecciona una Dirección</option>
                        @foreach ($direcciones as $item)
                            <option value="{{$item->getId()}}">{{$item->getDireccion()}} - {{$item->getPoblacion()}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    @if($contacto)
                        @livewire('direccion.form-modal',['op'=>'create','to'=>'reunion.create','contacto'=>$contacto]) 
                    @endif
                </div>
            </div>
        </div>   
        <script>
            document.addEventListener('livewire:load', function(){
                $('#contactoselect2').select2();
                $('#contactoselect2').on('change', function(){
                    @this.set('contacto_id',this.value);
                });
                $('#direccionselect').on('change', function(){
                    window.livewire.emit('ReunionShow',this.value)
                });
            })
        </script>
    </div>
</div>
<!--
    <input wire:model='contacto_nombre' list="contactoOptions" id="contactoselect" 
        class="form-control" placeholder="Selecciona o Crea un Cliente"/>
    <datalist id="contactoOptions">
        @foreach ($contactos as $item)
            <option value="{{$item->getApodo()}} - {{$item->getTelefono()}}">
        @endforeach
    </datalist>
-->