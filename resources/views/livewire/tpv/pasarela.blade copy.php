<div>{{  $key  }}
    <form wire:submit.prevent="submit">
        @method('post')
        @csrf
        <div>
            <label for="card_number">Número de Tarjeta</label>
            <input type="text" id="card_number" value="{{ old('card_number') }}">
            @error('card_number') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="card_holder">Titular de la Tarjeta</label>
            <input type="text" id="card_holder" value="{{ old('card_holder') }}">
            @error('card_holder') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="expiration_date">Fecha de Expiración</label>
            <input type="date" id="expiration_date" value="{{ old('expiration_date') }}">
            @error('expiration_date') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="cvv">CVV</label>
            <input type="number" id="cvv" value="{{ old('cvv') }}">
            @error('cvv') <span class="error">{{ $message }}</span> @enderror
        </div>

        <input type="hidden" wire:model="key">

        <button class="btn btn-primary" type="submit">Pagar</button>
    </form>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="row gy-3">
        <div class="col-md-6">
          <label for="cc-name" class="form-label">Nombre en la tarjeta</label>
          <input type="text" class="form-control" id="cc-name" placeholder="" required="">
          <small class="text-body-secondary">Nombre completo como se muestra en la tarjeta</small>
          <div class="invalid-feedback">
            Se requiere el nombre en la tarjeta
          </div>
        </div>

        <div class="col-md-6">
          <label for="cc-number" class="form-label">Número de tarjeta de crédito</label>
          <input type="text" class="form-control" id="cc-number" placeholder="" required="">
          <div class="invalid-feedback">
            Se requiere número de tarjeta de crédito
          </div>
        </div>

        <div class="col-md-3">
          <label for="cc-expiration" class="form-label">Caducidad</label>
          <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
          <div class="invalid-feedback">
            Se requiere fecha de vencimiento
          </div>
        </div>

        <div class="col-md-3">
          <label for="cc-cvv" class="form-label">CVV</label>
          <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
          <div class="invalid-feedback">
            Se requiere código de seguridad
          </div>
        </div>
      </div>

</div>
