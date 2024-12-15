@extends('layouts.landing')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
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
            height: 75vh;
        }
        .payment-box {
            display: flex;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-width: 350px;
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
        .logossup img{
            height: 100%;
            width: 128px;
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
                <h2>Pago con Tarjeta</h2>
                <div class="amount">{{ $viewData['tpv']->amount }} &euro; <br/> Pago Realizado</div>
                <p><strong>Comercio:</strong> Sex Shop Diabla Roja</p>
                <p><strong>Terminal:</strong> 333856102-1</p>
                <p><strong>Pedido:</strong> {{ $viewData['tpv']->getPedido() }}</p>
                <p><strong>Fecha:</strong> {{ $viewData['tpv']->updated_at->format('y-m-d H:i') }}</p>
                <p><strong>Concepto:</strong> {{ $viewData['tpv']->concepto }}</p>
                <div class="logossup">
                    <img src="{{ asset('/img/verified-visa.png') }}" alt="Verified by VISA">
                    <img src="{{ asset('/img/securecode.png') }}" alt="MasterCard SecureCode">
                </div>
                <div class="logos">
                    <img src="{{ asset('/img/visa.png') }}" alt="Visa">
                    <img src="{{ asset('/img/visa-electron.png') }}" alt="Visa Electron">
                    <img src="{{ asset('/img/mastercard.png') }}" alt="MasterCard">
                    <img src="{{ asset('/img/maestro.png') }}" alt="Maestro">
                </div>
            </div>
        </div>
    </div>
@endsection
