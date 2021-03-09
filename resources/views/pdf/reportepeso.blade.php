<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .titulo{
            text-align: center;
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <div class="titulo">
        <h2>Registro de ultimos 5 registros de peso</h2>
    </div>
    <table style="border-collapse:collapse; border: 1px solid #ccc; width:100%">
        <thead>
            <tr>
                <th style="padding: 10px; background: #000; color: #fff; text-transform: uppercase;"> Id </th>
                <th style="padding: 10px; background: #000; color: #fff; text-transform: uppercase;"> Fecha </th>
                <th style="padding: 10px; background: #000; color: #fff; text-transform: uppercase;"> Peso  </th>
                <th style="padding: 10px; background: #000; color: #fff; text-transform: uppercase;"> Altura</th>
                <th style="padding: 10px; background: #000; color: #fff; text-transform: uppercase;"> IMC</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesos as $peso)
                <tr>
                    <td style="padding: 10px; text-align: center; border-bottom: 2px solid #111; color: #333; font-size: 18px;"> {{$peso->id}}</td>
                    <td style="padding: 10px; text-align: center; border-bottom: 2px solid #111; color: #333; font-size: 18px;"> {{$peso->fecha}}</td>
                    <td style="padding: 10px; text-align: center; border-bottom: 2px solid #111; color: #333; font-size: 18px;"> {{$peso->peso}}</td>
                    <td style="padding: 10px; text-align: center; border-bottom: 2px solid #111; color: #333; font-size: 18px;"> {{$peso->altura}}</td>
                    <td style="padding: 10px; text-align: center; border-bottom: 2px solid #111; color: #333;  font-size: 18px;"> {{$peso->imc}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>