<div>
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ContactoFormModal" >
      @if ($op=="create")
        <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
      @else
        <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
      @endif
      <i class="fa fa-user fa-lg" aria-hidden="true"></i>
    </button>
    <div wire:ignore.self class="modal fade" id="ContactoFormModal"
      tabindex="-1" aria-labelledby="ContactoFormModalLabel" aria-hidden="true"
      data-bs-backdrop="true" data-bs-keyboard="false">
      <div class="modal-dialog p-2">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ContactoFormModalLabel">
              <i class="fa fa-user fa-lg me-2" aria-hidden="true"></i>{{$titleform}}</h5>
            <button wire:click="close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body mx-3">
                @include('contacto.form')
          </div>
        </div>
      </div>
    </div>
</div>
