<div>
    <form wire:submit.prevent="submit">
        <div class="input-group">
            <span id="lb_key" class="input-group-text">URL Key</span>
            <input type="text" id="key" name="key"class="form-control"
            value="{{ old('key') }}" aria-describedby="lb_key" wire:model="key">
        </div>@error('key') <span class="error">{{ $message }}</span> @enderror
        <div class="input-group mt-2">
            <span id="lb_concepto" class="input-group-text">Concepto</span>
            <input type="text" id="concepto" name="concepto"class="form-control"
            value="{{ old('concepto') }}" aria-describedby="lb_concepto" wire:model="concepto">
        </div> @error('concepto') <span class="error">{{ $message }}</span> @enderror
        <div class="input-group mt-2">
            <span id="lb_amount" class="input-group-text">Importe</span>
            <input type="text" id="amount" name="amount" class="form-control"
            value="{{ old('amount') }}" aria-describedby="lb_amount" wire:model="amount">
        </div>@error('amount') <span class="error">{{ $message }}</span> @enderror
        <div class="input-group mt-2">
            <span id="lb_card_number" class="input-group-text">Número de Tarjeta</span>
            <input type="text" id="card_number" name="card_number"class="form-control"
            value="{{ old('card_number') }}" aria-describedby="lb_card_number" wire:model="card_number">
        </div>@error('card_number') <span class="error">{{ $message }}</span> @enderror
        <div class="input-group mt-2">
            <span id="lb_card_holder" class="input-group-text">Titular de la Tarjeta</span>
            <input type="text" id="card_holder" name="card_holder" class="form-control"
            value="{{ old('card_holder') }}" aria-describedby="lb_card_holder" wire:model="card_holder">
        </div>@error('card_holder') <span class="error">{{ $message }}</span> @enderror
        <div class="input-group mt-2">
            <span id="lb_expiration_date" class="input-group-text">Fecha de Expiración</span>
            <input type="text" id="expiration_date" name="expiration_date" class="form-control"
            value="{{ old('expiration_date') }}" aria-describedby="lb_expiration_date" wire:model="expiration_date">
        </div>@error('expiration_date') <span class="error">{{ $message }}</span> @enderror
        <div class="input-group mt-2">
            <span id="lb_cvv" class="input-group-text">CVV</span>
            <input type="text" id="cvv" name="cvv" class="form-control"
            value="{{ old('cvv') }}" aria-describedby="lb_cvv" wire:model="cvv">
        </div>@error('cvv') <span class="error">{{ $message }}</span> @enderror
        <div class="row mt-2">
            <div class="form-floating">
                <div class="form-check form-switch my-2 mx-3 fs-5">
                    <input wire:model="pagado" type="checkbox" name="pagado" id="pagado"
                        value="{{ old('pagado') }}" class="form-check-input rounded-3"/>
                    <label class="form-check-label" for="pagado">Pago {{ $pagado?"Realizado":"Pendiente" }}</label>
                </div>
            </div>
            <button class="btn btn-primary ms-auto" type="submit">Guardar</button>
        </div>
    </form>
    @if (session()->has('message'))
        <div class="alert alert-success mt-2">
            {{ session('message') }}
        </div>
    @endif
</div>
