@extends('layouts.app')
   <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active">Tablas</a></li>
    </ol>
    </nav>
        <div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> tablas </strong> </h3>
    </div>

    @can('haveaccess', 'auditoria')

        @include('personalizar.mensaje')
        <div class="table-responsive">
            <table id="tablas" style="text-align:center"  class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Función</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> Acudientes</td>
                        <td> La tabla hace referencia a la información de los acudientes de los pacientes, esta tabla es de forma informativa</td>
                    </tr>
                    <tr>
                        <td> Antecedentes_personales</td>
                        <td> La tabla hace referencia a todos los antecedentes del paciente identificado con el campo tipo si es antecedente personal, familiar, alergia, etc.</td>
                    </tr>
                    <tr>
                        <td> Citas_medicas</td>
                        <td> La tabla hace referencia al espacio de las citas médicas, en el apartado de calendario permite agendar todos los eventos que necesita la persona</td>
                    </tr>
                    <tr>
                        <td> Comentarios</td>
                        <td> La tabla hace referencia a los artículos que publican las personas, donde comparten su opinión respecto a los temas relevantes de la enfermedad como son glucometría, medicamentos u otras cosas</td>
                    </tr>
                    <tr>
                        <td> Control_cambios</td>
                        <td> Esta tabla se usa para auditoria, donde todos los cambios realizados en el sistema se lleva un registro del usuario que realizo la acción, añadido en al descripcion la acción + registro + nombre de la tabla</td>
                    </tr>
                    <tr>
                        <td> Información_users</td>
                        <td> En esta tabla se agrega toda la información del paciente, de tal forma que sea opcional si el usuario agrega los registros o no, el sistema genera esta información en nulo automáticamente</td>
                    </tr>
                    <tr>
                        <td> Insulinas</td>
                        <td> La tabla hace referencia a las insulinas que se la administran al paciente, con datos relevantes que el paciente puede ajustar a su gusto como la duracion, pico, inicio o la concentración</td>
                    </tr>
                    <tr>
                        <td> Medicamentos</td>
                        <td> En esta tabla el paciente escribe todos los medicamentos que consume con su debida características.</td>
                    </tr>
                    <tr>
                        <td> Permiso_role</td>
                        <td> Esta es la tabla compuesta entre permisos y roles, donde se definen los permisos que posee cada rol</td>
                    </tr>
                    <tr>
                        <td> Permisos</td>
                        <td> En esta tabla se define cada uno de los permisos definidos en el sistema por el administrador </td>
                    </tr>
                    <tr>
                        <td> Peso_pacientes</td>
                        <td> En esta tabla está definido para el peso, altura y calcular el índice de masa corporal del paciente  </td>
                    </tr>
                    <tr>
                        <td> Resumen_cegs</td>
                        <td> Esta es una tabla compuesta por comidas, ejercicio y glucometrias, por eso ceg donde se comparte información, pero se diferencia por uno o dos campos, por ende, esta tabla sirve para registrar dichos elementos   </td>
                    </tr>
                    <tr>
                        <td> Role_user</td>
                        <td> Tabla compuesta por roles y usuarios, donde se define los roles que puede tener el usuario  </td>
                    </tr>
                    <tr>
                        <td> Roles</td>
                        <td> Esta tabla hace referencia a la creación de los roles del sistema  </td>
                    </tr>
                    <tr>
                        <td> Users</td>
                        <td> Tabla de usuarios que crea directamente laravel con el sistema de logueo  </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        @endcan
        @endsection
        <script>
            $(document).ready(function() {
                $('#tablas').DataTable({
                    "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }
                });
            });
        </script>
