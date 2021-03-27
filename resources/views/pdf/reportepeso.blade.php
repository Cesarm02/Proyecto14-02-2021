<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>

    <div class="container">

        <div style=" text-align: center;">
            <img src="{{ public_path('storage/logo/Logo_1.png')}}" alt="Logo">

            <h2 >Registro de datos de peso</h2>
            <h5>Nombres: {{$nombre}}  Apellidos: {{$apellido}}, Documento: {{$documento}}</h5>
            <small >Fecha desde {{$fechaI}} --- Hasta {{$fechaF}}</small>
        </div>
        <hr>
        <br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th > Id </th>
                    <th > Fecha </th>
                    <th > Peso  </th>
                    <th > Altura</th>
                    <th > IMC</th>
                </tr>
            </thead>
            <tbody>
            @foreach($pesos as $peso)
                <tr>
                    <td > {{$peso->id}}</td>
                    <td > {{$peso->fecha}}</td>
                    <td > {{$peso->peso}}</td>
                    <td > {{$peso->altura}}</td>
                    <td> {{$peso->imc}}</td>
                </tr>
            @endforeach
                </tr>
            </tbody>
        </table>

    </div>


    	<script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 780, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
	</script>
</body>
</html>