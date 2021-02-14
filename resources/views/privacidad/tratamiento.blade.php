@extends('layouts.app')

@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active">Politicas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tratamiento de datos</li>
    </ol>
    </nav>
    
    <div class="card">
        <div class="alert alert-info class=card-header" role="alert">
            <h3> Tratamiento de datos</h3>
        </div>

        <div class="card-body">
            <blockquote class="blockquote mb-0">
            <p>
                El presente aviso de privacidad establece los términos y condiciones del sistema con el respectivo cumplimiento de la <strong> Ley 1581 de 2012 </strong>, realizará el tratamiento de sus datos personales.
            </p>
            <p>
                <strong>Finalidad y Tratamiento: </strong> El Tratamiento debe obedecer a una finalidad legítima de acuerdo con la Constitución y la Ley, la cual debe ser informada al Titular. 
            </p>
            <p>
                El Tratamiento y la finalidad de la información de las bases de datos del sistema se encuentran relacionados única y exclusivamente con las siguientes finalidades:
            </p>
                 1. Dar a conocer, transferir y/o trasmitir los datos personales dentro y fuera del país, a terceros a consecuencia de un contrato, ley o vínculo lícito que así lo requiera o para implementar servicios de computación en la nube.<br>
                2. Controlar y prevenir el fraude en cualquiera de sus modalidades   <br>
                3. Soportar procesos de auditoria interna o externa.<br>
                 4. Registrar la información de pacientes/Doctores (Activos e inactivos) en la base de datos<br>
                 5. Autorización otorgada por el usuario en el aviso de privacidad respectivo, según sea el caso.  <br>
            <p>
                 Con base en lo anterior, el titular manifiesta haber sido informado y acepta que la autorización que concede permite tener acceso a sus datos personales para los fines indicados en este aviso de privacidad.
            </p>
                <footer class="blockquote-footer">ADMINISTRADOR <cite title="Source Title">Politica de protección de datos</cite></footer>
            </blockquote>
        </div>
    </div>
</div>
@endsection