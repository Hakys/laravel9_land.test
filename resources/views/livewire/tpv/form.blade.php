<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div>
            <label for="card_number">Número de Tarjeta</label>
            <input type="text" id="card_number" wire:model="card_number">
            @error('card_number') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="card_holder">Titular de la Tarjeta</label>
            <input type="text" id="card_holder" wire:model="card_holder">
            @error('card_holder') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="expiration_date">Fecha de Expiración</label>
            <input type="text" id="expiration_date" wire:model="expiration_date">
            @error('expiration_date') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" wire:model="cvv">
            @error('cvv') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="amount">Monto</label>
            <input type="text" id="amount" wire:model="amount">
            @error('amount') <span class="error">{{ $message }}</span> @enderror
        </div>

        <input type="hidden" wire:model="key">

        <button type="submit">Pagar</button>
    </form>
</div>
