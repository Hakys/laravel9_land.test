<div>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .payment-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .payment-box {
            display: flex;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-width: 700px;
            width: 100%;
        }
        .payment-details {
            background-color: #eaf4ff;
            padding: 20px;
            flex: 1;
        }
        .payment-details h2 {
            color: #0073e6;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .payment-details p {
            margin: 5px 0;
            font-size: 14px;
        }
        .payment-details .amount {
            background-color: #0073e6;
            color: #fff;
            font-size: 24px;
            padding: 10px;
            text-align: center;
            margin: 10px 0;
            border-radius: 5px;
        }
        .payment-form {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
        }
        .payment-form h3 {
            margin-bottom: 15px;
            font-size: 18px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
        }
        .btn {
            background-color: #ccc;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-primary {
            background-color: #0073e6;
            color: #fff;
        }
        .logos img {
            width: 50px;
            margin-right: 10px;
        }
        .error{
            color:red;
            font-size: 1.5ch;
        }
    </style>
    <div class="payment-container">
        <div class="payment-box">
            <!-- Left Section -->
            <div class="payment-details">
                <h2>Importe:</h2>
                <div class="amount">{{ $amount }} &euro;</div>
                <p><strong>Comercio:</strong> Sex Shop Diabla Roja</p>
                <p><strong>Terminal:</strong> 335255568-1</p>
                <p><strong>Pedido:</strong> 000051894416</p>
                <p><strong>Fecha:</strong> {{ now() }}</p>
                <p><strong>Concepto:</strong> {{ $concepto }}</p>
                <div class="logos">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Mastercard_2019_logo.svg" alt="MasterCard">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/3/30/American_Express_logo_%282018%29.svg" alt="Amex">
                </div>
            </div>

            <!-- Right Section -->
            <div class="payment-form">
                <h3>PAGAR CON TARJETA</h3>
                <form action="{{ route('tpv.pagar', ['key' => $key]) }}" method="POST">
                    @csrf
                    <input type="hidden" wire:model="key">
                    <div class="form-group">
                        <label for="card-number">Titular de la Tarjeta</label>
                        <input type="text" id="card_holder" value="{{ old('card_holder') }}"
                            placeholder="Nombre completo como se muestra en la tarjeta">
                        @error('card_holder') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="card-number">N&uacute;mero de Tarjeta</label>
                        <input type="text" id="card_number" value="{{ old('card_number') }}"
                            placeholder="1234 5678 9012 3456">
                        @error('card_number') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="expiry">Caducidad</label>
                        <input type="text" id="expiration_date" value="{{ old('expiration_date') }}"
                            placeholder="MM/YY">
                        @error('expiration_date') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cvv">C&oacute;d. Seguridad</label>
                        <input type="text" id="cvv" value="{{ old('cvv') }}"
                            placeholder="123">
                        @error('cvv') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="buttons">
                        <button type="button" class="btn">CANCELAR</button>
                        <button type="submit" class="btn btn-primary">PAGAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
