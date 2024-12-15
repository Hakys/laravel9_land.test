<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="submit" class="mb-3">
        <div class="input-group rounded-3">
            <span class="input-group-text" for="concepto">Concepto</span>
            <input type="text" id="concepto" wire:model="concepto"
                class="form-control form-control-lg @error('concepto') is-invalid @enderror">
            <span class="input-group-text" for="amount">Importe</span>
            <input type="text" id="amount" wire:model="amount"
                class="form-control form-control-lg @error('amount') is-invalid @enderror">
            <span class="input-group-text">€</span>
            <button class="btn btn-primary" type="submit">Crear</button>
        </div>
        @error('amount') <span class="error">{{ $message }}</span> @enderror
        @error('concepto') <span class="error">{{ $message }}</span> @enderror
    </form>
</div>
