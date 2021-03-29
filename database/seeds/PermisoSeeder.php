<?php

use App\Modelos\InformacionUser;
use App\User;
use App\Modelos\Role;
use App\Modelos\Permiso;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate tables
        // DB::statement("SET foreign_key_checks=0");
            DB::table('role_user')->truncate();
            DB::table('permiso_role')->truncate();
            Permiso::truncate();
            Role::truncate();
        // DB::statement("SET foreign_key_checks=1");


        //User admin
        $userAdmin = User::where('email', 'admin@admin.com')->first();
        if($userAdmin){
            $userAdmin->delete();
        }
        $userAdmin = User::create([
            'name'      =>  'admin', 
            'email'     =>  'admin@admin.com',
            'password'  =>  Hash::make('admin'),
        ]);


        //Rol admin
        $rolAdmin = Role::create([
            'nombre' => 'Admin',
            'slug' => 'admin',
            'descripcion' => 'Administrador',
            'acceso' => 'si',
        ]);

        //Rol Paciente
        $rolUser = Role::create([
            'nombre' => 'Pacientes',
            'slug' => 'paciente',
            'descripcion' => 'Registro de paciente',
            'acceso' => 'no',
        ]);

        //User auditor
        $userAuditor = User::where('email', 'auditor@auditor.com')->first();
        if ($userAuditor) {
            $userAuditor->delete();
        }
        $userAuditor = User::create([
            'name'      =>  'auditor',
            'email'     =>  'auditor@auditor.com',
            'password'  =>  Hash::make('auditor'),
        ]);


        //Rol Auditor
        $rolAuditor = Role::create([
            'nombre' => 'Auditoria',
            'slug' => 'auditor',
            'descripcion' => 'Registro de datos y tablas ',
            'acceso' => 'no',
        ]);


        //Tabla role_user
        $userAdmin->roles()->sync([ $rolAdmin->id ]);

        $userAuditor->roles()->sync([ $rolAuditor->id]);

        //Permiso
        $permiso_all = [];

        //Permiso role
        $permiso = Permiso::create([
            'nombre' => 'Listar role',
            'slug' => 'role.index',
            'descripcion' => 'Un usuario puede listar role',
        ]);

        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Mostrar role',
            'slug' => 'role.show',
            'descripcion' => 'Un usuario puede ver role',
        ]);
 
        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Editar role',
            'slug' => 'role.edit',
            'descripcion' => 'Un usuario puede editar role',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Crear role',
            'slug' => 'role.create',
            'descripcion' => 'Un usuario puede crear role',
        ]);


        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Eliminar role',
            'slug' => 'role.destroy',
            'descripcion' => 'Un usuario puede eliminar role',
        ]);

        $permiso_all[] = $permiso->id;

        //Permiso user
        $permiso = Permiso::create([
            'nombre' => 'Listar user',
            'slug' => 'user.index',
            'descripcion' => 'Un usuario puede listar user',
        ]);

        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Mostrar user',
            'slug' => 'user.show',
            'descripcion' => 'Un usuario puede ver user',
        ]);

        $permiso_all[] = $permiso->id;
        // $permiso = Permiso::create([
        //     'nombre' => 'Crear user',
        //     'slug' => 'user.create',
        //     'descripcion' => 'Un usuario puede crear user',
        // ]);

        // $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Editar user',
            'slug' => 'user.edit',
            'descripcion' => 'Un usuario puede editar user',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Eliminar user',
            'slug' => 'user.destroy',
            'descripcion' => 'Un usuario puede eliminar user',
        ]);

        $permiso_all[] = $permiso->id;

        //Creación de permisos
        // $rolAdmin->permisos()->sync($permiso_all);


        ///NUEVO 
        $permiso = Permiso::create([
            'nombre' => 'Mostrar su usuario',
            'slug' => 'userown.show',
            'descripcion' => 'Un usuario puede ver su usuario',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Editar su usuario',
            'slug' => 'userown.edit',
            'descripcion' => 'Un usuario puede editar su usuario',
        ]);
        $permiso_all[] = $permiso->id;

        //Permisos de Diabetes
        $permiso = Permiso::create([
            'nombre' => 'Crear datos de la diabetes',
            'slug' => 'diabetes.create',
            'descripcion' => 'Datos generales de la diabetes vista principal'

        ]);
        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Editar datos de la diabetes',
            'slug' => 'diabetes.edit',
            'descripcion' => 'Editar datos generales de la diabetes vista principal'

        ]);
        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Eliminar datos de la diabetes',
            'slug' => 'diabetes.destroy',
            'descripcion' => 'Eliminar datos generales de la diabetes vista principal'

        ]);
        $permiso_all[] = $permiso->id;

        //Permiso Articulos
        $permiso = Permiso::create([
            'nombre' => 'Listar sus articulos',
            'slug' => 'articulos.index',
            'descripcion' => 'Un usuario puede listar sus articulos',
        ]);

        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Mostrar articulos',
            'slug' => 'articulos.show',
            'descripcion' => 'Un usuario puede ver articulos',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Editar sus articulos',
            'slug' => 'articulos.edit',
            'descripcion' => 'Un usuario puede editar sus articulos',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Crear sus articulos',
            'slug' => 'articulos.create',
            'descripcion' => 'Un usuario puede crear sus articulos',
        ]);


        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Eliminar sus articulos',
            'slug' => 'articulos.destroy',
            'descripcion' => 'Un usuario puede sus eliminar articulos',
        ]);

        $permiso_all[] = $permiso->id;

        //PERMISO MEDICAMENTOS
        $permiso = Permiso::create([
            'nombre' => 'Listar sus medicamentos',
            'slug' => 'medicamentos.index',
            'descripcion' => 'Un usuario puede listar sus medicamentos',
        ]);

        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Mostrar medicamentos',
            'slug' => 'medicamentos.show',
            'descripcion' => 'Un usuario puede ver medicamentos',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Editar sus medicamentos',
            'slug' => 'medicamentos.edit',
            'descripcion' => 'Un usuario puede editar sus medicamentos',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Crear sus medicamentos',
            'slug' => 'medicamentos.create',
            'descripcion' => 'Un usuario puede crear sus medicamentos',
        ]);


        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Eliminar sus medicamentos',
            'slug' => 'medicamentos.destroy',
            'descripcion' => 'Un usuario puede sus eliminar medicamentos',
        ]);

        $permiso_all[] = $permiso->id;

        //PERMISO CALENDARIO
        $permiso = Permiso::create([
            'nombre' => 'Listar sus citas',
            'slug' => 'citas.index',
            'descripcion' => 'Un usuario puede listar sus citas',
        ]);

        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Mostrar citas',
            'slug' => 'citas.show',
            'descripcion' => 'Un usuario puede ver citas',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Editar sus citas',
            'slug' => 'citas.edit',
            'descripcion' => 'Un usuario puede editar sus citas',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Crear sus citas',
            'slug' => 'citas.create',
            'descripcion' => 'Un usuario puede crear sus citas',
        ]);


        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Eliminar sus citas',
            'slug' => 'citas.destroy',
            'descripcion' => 'Un usuario puede sus eliminar citas',
        ]);

        $permiso_all[] = $permiso->id;


        //PERMISO Glucometrias
        $permiso = Permiso::create([
            'nombre' => 'Listar sus glucometrias',
            'slug' => 'glucometrias.index',
            'descripcion' => 'Un usuario puede listar sus glucometrias',
        ]);

        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Mostrar glucometrias',
            'slug' => 'glucometrias.show',
            'descripcion' => 'Un usuario puede ver glucometrias',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Editar sus glucometrias',
            'slug' => 'glucometrias.edit',
            'descripcion' => 'Un usuario puede editar sus glucometrias',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Crear sus glucometrias',
            'slug' => 'glucometrias.create',
            'descripcion' => 'Un usuario puede crear sus glucometrias',
        ]);


        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Eliminar sus glucometrias',
            'slug' => 'glucometrias.destroy',
            'descripcion' => 'Un usuario puede sus eliminar glucometrias',
        ]);

        $permiso_all[] = $permiso->id;

        //PERMISO PESOS
        $permiso = Permiso::create([
            'nombre' => 'Listar sus pesos',
            'slug' => 'pesos.index',
            'descripcion' => 'Un usuario puede listar sus pesos',
        ]);

        $permiso_all[] = $permiso->id;

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Crear sus pesos',
            'slug' => 'pesos.create',
            'descripcion' => 'Un usuario puede crear sus pesos',
        ]);


        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Eliminar sus pesos',
            'slug' => 'pesos.destroy',
            'descripcion' => 'Un usuario puede sus eliminar pesos',
        ]);

        $permiso_all[] = $permiso->id;

        //PERMISO Alimentos
        $permiso = Permiso::create([
            'nombre' => 'Listar sus alimentos',
            'slug' => 'alimentos.index',
            'descripcion' => 'Un usuario puede listar sus alimentos',
        ]);

        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Mostrar alimentos',
            'slug' => 'alimentos.show',
            'descripcion' => 'Un usuario puede ver alimentos',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Editar sus alimentos',
            'slug' => 'alimentos.edit',
            'descripcion' => 'Un usuario puede editar sus alimentos',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Crear sus alimentos',
            'slug' => 'alimentos.create',
            'descripcion' => 'Un usuario puede crear sus alimentos',
        ]);


        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Eliminar sus alimentos',
            'slug' => 'alimentos.destroy',
            'descripcion' => 'Un usuario puede sus eliminar alimentos',
        ]);

        $permiso_all[] = $permiso->id;


        //PERMISO EJERCICIO
        $permiso = Permiso::create([
            'nombre' => 'Listar sus ejercicios',
            'slug' => 'ejercicios.index',
            'descripcion' => 'Un usuario puede listar sus ejercicios',
        ]);

        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Mostrar ejercicios',
            'slug' => 'ejercicios.show',
            'descripcion' => 'Un usuario puede ver ejercicios',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Editar sus ejercicios',
            'slug' => 'ejercicios.edit',
            'descripcion' => 'Un usuario puede editar sus ejercicios',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Crear sus ejercicios',
            'slug' => 'ejercicios.create',
            'descripcion' => 'Un usuario puede crear sus ejercicios',
        ]);


        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Eliminar sus ejercicios',
            'slug' => 'ejercicios.destroy',
            'descripcion' => 'Un usuario puede sus eliminar ejercicios',
        ]);

        $permiso_all[] = $permiso->id;

        //PERMISO antecedentes
        $permiso = Permiso::create([
            'nombre' => 'Listar sus antecedentes',
            'slug' => 'antecedentes.index',
            'descripcion' => 'Un usuario puede listar sus antecedentes',
        ]);

        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Mostrar antecedentes',
            'slug' => 'antecedentes.show',
            'descripcion' => 'Un usuario puede ver antecedentes',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Editar sus antecedentes',
            'slug' => 'antecedentes.edit',
            'descripcion' => 'Un usuario puede editar sus antecedentes',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Crear sus antecedentes',
            'slug' => 'antecedentes.create',
            'descripcion' => 'Un usuario puede crear sus antecedentes',
        ]);


        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Eliminar sus antecedentes',
            'slug' => 'antecedentes.destroy',
            'descripcion' => 'Un usuario puede sus eliminar antecedentes',
        ]);

        $permiso_all[] = $permiso->id;

        //PERMISO insulinas
        $permiso = Permiso::create([
            'nombre' => 'Listar sus insulinas',
            'slug' => 'insulinas.index',
            'descripcion' => 'Un usuario puede listar sus insulinas',
        ]);

        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Mostrar insulinas',
            'slug' => 'insulinas.show',
            'descripcion' => 'Un usuario puede ver insulinas',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Editar sus insulinas',
            'slug' => 'insulinas.edit',
            'descripcion' => 'Un usuario puede editar sus insulinas',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Crear sus insulinas',
            'slug' => 'insulinas.create',
            'descripcion' => 'Un usuario puede crear sus insulinas',
        ]);


        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Eliminar sus insulinas',
            'slug' => 'insulinas.destroy',
            'descripcion' => 'Un usuario puede sus eliminar insulinas',
        ]);

        $permiso_all[] = $permiso->id;

        //PERMISO historial
        $permiso = Permiso::create([
            'nombre' => 'Listar sus historial',
            'slug' => 'historial.index',
            'descripcion' => 'Un usuario puede listar sus historial',
        ]);

        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Mostrar historial',
            'slug' => 'historial.show',
            'descripcion' => 'Un usuario puede ver historial',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Editar sus historial',
            'slug' => 'historial.edit',
            'descripcion' => 'Un usuario puede editar sus historial',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Crear sus historial',
            'slug' => 'historial.create',
            'descripcion' => 'Un usuario puede crear sus historial',
        ]);


        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Eliminar sus historial',
            'slug' => 'historial.destroy',
            'descripcion' => 'Un usuario puede sus eliminar historial',
        ]);

        $permiso_all[] = $permiso->id;

        //PERMISO reportes
        $permiso = Permiso::create([
            'nombre' => 'Listar sus reportes',
            'slug' => 'reportes.index',
            'descripcion' => 'Un usuario puede listar sus reportes',
        ]);

        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Mostrar reportes',
            'slug' => 'reportes.show',
            'descripcion' => 'Un usuario puede ver reportes',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Editar sus reportes',
            'slug' => 'reportes.edit',
            'descripcion' => 'Un usuario puede editar sus reportes',
        ]);

        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Crear sus reportes',
            'slug' => 'reportes.create',
            'descripcion' => 'Un usuario puede crear sus reportes',
        ]);


        $permiso_all[] = $permiso->id;
        $permiso = Permiso::create([
            'nombre' => 'Eliminar sus reportes',
            'slug' => 'reportes.destroy',
            'descripcion' => 'Un usuario puede sus eliminar reportes',
        ]);

        $permiso_all[] = $permiso->id;

        $permiso = Permiso::create([
            'nombre' => 'Auditoria de sistemas',
            'slug' => 'auditoria',
            'descripcion' => 'Solo el usuario auditor tiene este permiso',
        ]);

        $permiso_all[] = $permiso->id;

    }

        
}

