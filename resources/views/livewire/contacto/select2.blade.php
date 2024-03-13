<div>
    <div wire:ignore class="d-flex">
        <select class="form-control select2" id="contactoselect2" wire:model='contacto_id'>
            <option selected>Select one</option>
            @foreach ($contactos as $contacto)
                <option value="{{$contacto->getId()}}">{{$contacto->getApodo()}} - {{$contacto->getTelefono()}}</option>
            @endforeach
        </select>
    </div>
    <script>
        document.addEventListener('livewire:load', function(){
            $('#contactoselect2').select2();
            $('#contactoselect2').on('change', function(){
                @this.set('contacto_id',this.value);
                //window.livewire.emit('DireccionSelect2',this.value)
            });
        })
    </script>
</div>
