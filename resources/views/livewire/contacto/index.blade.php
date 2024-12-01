<div>
<div class="row">
    <div class="col-auto me-2 d-inline-flex flex-column text-center fs-5 fw-bold border rounded">
        <div>
            <input class="form-check-input" hidden type="radio" name="numero" id="numeroX" value="__"
                wire:model.live="numero" wire:click="resetNumero">
            <label class="form-check-label mano" for="numeroX"><i class="fa fa-window-close-o fa-lg" aria-hidden="true"></i></label>
        </div>
        @foreach($numeros as $n)
            <div>
                <input class="form-check-input" hidden type="radio" name="numero" id="numero{{ $n }}" value="{{ $n }}"
                    wire:model.live="numero">
                <label class="form-check-label mano @if($n==$numero)text-danger @endif" for="numero{{ $n }}">{{ $n }}</label>
            </div>
        @endforeach
    </div>
    <div class="col-auto me-2 d-inline-flex flex-column fs-5 fw-bold border rounded">
        <div class="text-center">
            <input class="form-check-input" hidden type="radio" name="letra" id="letraX" value=""
                wire:model.live="letra" wire:click="resetLetra">
            <label class="form-check-label mano" for="letraX"><i class="fa fa-window-close-o fa-lg" aria-hidden="true"></i></label>
        </div>
        @foreach($letras as $n)
            <div class="text-center">
                <input class="form-check-input" hidden type="radio" name="letra" id="letra{{ $n }}" value="{{ $n }}"
                    wire:model.live="letra">
                <label class="form-check-label mano @if($n==$letra)text-danger @endif" for="letra{{ $n }}">{{ $n }}</label>
            </div>
        @endforeach
    </div>
    <div class="col">
        <div class="row mb-2">
            <div class="col">
                <div class="form-floating">
                    <input wire:model.live="search" type="text" id="search" name="search" placeholder="Buscar" value="" class="form-control rounded-3">
                    <label for="search">Buscar nombre, apodo ó teléfono</label>
                </div>
            </div>
            <div class="col-auto d-flex align-items-center">
                <button class="btn btn-outline-danger" type="button" id="del_search" wire:click="resetSearch">
                    <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <div class="row">
            <table class="mitable table table-responsive table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr class="text-center bg-">
                        <th>
                            <div wire:loading><div class="spinner-border text-danger"></div></div>
                            <div wire:loading.remove>{{$contactos->count()}}</div>
                        </th>
                        <th scope="col">Nombre / Apodo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col"><i class="fa fa-address-card-o fa-lg" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactos as $contacto)
                        <tr class='clickable-row' data-href='{{ route("contacto.show", ['telefono' => $contacto->getTelefono()]) }}'>
                            <td class="cell-con-imagen bor" style="background-image: url('{{ $contacto->getAvatar() }}');"></td>
                            <td class="text-start">{{ $contacto->getApodo() }}</td>
                            <td class="text-end">{{ $contacto->getTelefono() }}</td>
                            <td class="text-center">{{ $contacto->direccions->count()}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $contactos->links('vendor.livewire.bootstrap')}}
        </div>
    </div>
</div>
<style>
    .clickable-row{
        cursor: pointer;
    }
    .img_avatar{
        height:30px;
    }
    .mano{
        cursor: pointer;
    }
    .cell-con-imagen {
      background-size: cover;
      background-position: center;
      height: 50px;
      width: 50px;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).attr('data-href');
            });
        });
    });
</script>
</div>
