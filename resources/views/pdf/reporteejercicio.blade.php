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
        <h2>Registro de ultimos 7 registros de Ejercicios</h2>
    </div>
    <table style="border-collapse:collapse; border: 1px solid #ccc; width:100%">
        <thead>
            <tr>
                <th style="padding: 10px; background: #000; color: #fff; text-transform: uppercase;"> Id </th>
                <th style="padding: 10px; background: #000; color: #fff; text-transform: uppercase;"> Fecha </th>
                <th style="padding: 10px; background: #000; color: #fff; text-transform: uppercase;"> Hora  </th>
                <th style="padding: 10px; background: #000; color: #fff; text-transform: uppercase;"> Tipo</th>
                <th style="padding: 10px; background: #000; color: #fff; text-transform: uppercase;"> Tiempo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ejercicios as $ejercicio)
                <tr>
                    <td style="padding: 10px; text-align: center; border-bottom: 2px solid #111; color: #333; font-size: 18px;"> {{$ejercicio->id}}</td>
                    <td style="padding: 10px; text-align: center; border-bottom: 2px solid #111; color: #333; font-size: 18px;"> {{$ejercicio->fecha}}</td>
                    <td style="padding: 10px; text-align: center; border-bottom: 2px solid #111; color: #333; font-size: 18px;"> {{$ejercicio->hora}}</td>
                    <td style="padding: 10px; text-align: center; border-bottom: 2px solid #111; color: #333; font-size: 18px;"> {{$ejercicio->tipo_ejercicio}}</td>
                    <td style="padding: 10px; text-align: center; border-bottom: 2px solid #111; color: #333;  font-size: 18px;"> {{$ejercicio->tiempo_ejercicio}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>