<?php

use App\Modelos\Comentario;
use Illuminate\Database\Seeder;

class PublicacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publicacion = Comentario::create([
            'titulo' => '¿Qué es?',
            'categoria' => 'general',
            'slug' => 'uno',
            'descripcion' => 'La diabetes es una enfermedad crónica que produce un aumento en los niveles de azúcar (glucosa)
            en sangre. La diabetes puede ser causa de enfermedad cardíaca, enfermedad vascular (de los vasos
            sanguíneos) y circulación deficiente, ceguera, insuficiencia renal, cicatrización deficiente, accidente
            cerebrovascular y de otras enfermedades neurológicas (que afectan a la conducción de los nervios). 
            ',
            'informacion_user_id' => '1',
        ]);

        $publicacion = Comentario::create([
            'titulo' => '¿Es curable?',
            'categoria' => 'general',
            'slug' => 'dos',

            'descripcion' => 'La diabetes no puede curarse, pero puede tratarse con éxito. Pueden evitarse las complicaciones
                ocasionadas por la diabetes mediante el control del nivel de glucosa en sangre, de la presión arterial
                (tensión arterial) y de los niveles altos de colesterol cuando se presenten.',
            'url' => 'https://www.fesemi.org/sites/default/files/documentos/publicaciones/informacion-diabetes.pdf',
            'informacion_user_id' => '1',
        ]);

        $publicacion = Comentario::create([
            'titulo' => 'Diabetes tipo 1',
            'categoria' => 'general',
            'slug' => 'tres',

            'descripcion' => 'La diabetes tipo 1, llamada también juvenil o insulinodependiente, ocurre cuando el páncreas no
                produce una cantidad suficiente de insulina (la hormona que procesa la glucosa). A menudo la
                diabetes tipo1 se presenta en la infancia o la adolescencia y requiere tratamiento con insulina
                durante toda la vida',
            'url' => 'https://www.fesemi.org/sites/default/files/documentos/publicaciones/informacion-diabetes.pdf',
            'informacion_user_id' => '1',
        ]);


        $publicacion = Comentario::create([
            'titulo' => 'Diabetes tipo 2',
            'categoria' => 'general',
            'slug' => 'cuatro',

            'descripcion' => 'La diabetes tipo 2, llamada también la diabetes del adulto es mucho más frecuente (por cada caso de
                diabetes tipo 1, existen 9 casos de diabetes tipo 2). En el caso de la diabetes tipo 2 existe una
                reducción en la eficacia de la insulina para procesar la glucosa (esta reducción se denomina insulinresistencia) debido a la presencia de obesidad abdominal. Por este motivo se está comenzando a ver
                la aparición de diabetes tipo 2 en adolescentes obesos. Cuando la diabetes tipo 2 está evolucionada
                (al cabo de 10-15 años), existe también una reducción en la producción de insulina por parte del
                páncreas.',
            'url' => 'https://www.fesemi.org/sites/default/files/documentos/publicaciones/informacion-diabetes.pdf',
            'informacion_user_id' => '1',
        ]);

        $publicacion = Comentario::create([
            'titulo' => 'Otros tipos',
            'slug' => 'cinco',
            'categoria' => 'general',
            'descripcion' => 'Existen otros tipos de diabetes más infrecuentes, como por ejemplo los defectos genéticos en la
                producción de insulina, los defectos genéticos en la acción de la insulina o los defectos causados por
                enfermedades del páncreas ya sea inducida por medicamentos (después de un transplante) o por
                una destrucción de las células del páncreas (fibrosis quística o pancreatitis crónica).
                Finalmente, la diabetes gestacional (diabetes que se diagnostica durante el embarazo) no es
                claramente una enfermedad persistente, aunque las mujeres embarazadas requieren un buen
                control de la glucosa para evitar complicaciones durante el embarazo y el parto',
            'url' => 'https://www.fesemi.org/sites/default/files/documentos/publicaciones/informacion-diabetes.pdf',
            'informacion_user_id' => '1',
        ]);

        $publicacion = Comentario::create([
            'titulo' => 'Causas',
            'slug' => 'seis',
            'categoria' => 'general',
            'descripcion' => 'El sobrepeso y la obesidad son los factores de riesgo más importantes y controlables para
                prevenir la diabetes tipo 2. Alcanzar un peso saludable reduce notablemente el riesgo de diabetes.
                Las personas con antecedentes familiares de diabetes también tienen más riesgo de
                desarrollar diabetes.
                Hacer ejercicio (150 min a la semana caminando a paso rápido) y una dieta mediterránea con
                frutas, verduras, pescado y aceite de oliva virgen extra reduce el riesgo de diabetes un 40%.',
            'url' => 'https://www.fesemi.org/sites/default/files/documentos/publicaciones/informacion-diabetes.pdf',
            'informacion_user_id' => '1',
        ]);

        $publicacion = Comentario::create([
            'titulo' => 'Sintomas',
            'slug' => 'siete',
            'categoria' => 'general',
            'descripcion' => 'Los síntomas típicos de la diabetes incluyen sed excesiva, aumento de la frecuencia urinaria,
                cansancio, visión borrosa o pérdida involuntaria de peso. Sin embargo, muchas personas con
                diabetes tipo 2 no presentan síntomas y la enfermedad se descubre después de que el paciente ha
                sufrido algún problema médico como elevación de la presión arterial, haber sufrido un infarto de
                miocardio o una trombosis cerebral. ',
            'url' => 'https://www.fesemi.org/sites/default/files/documentos/publicaciones/informacion-diabetes.pdf',
            'informacion_user_id' => '1',
        ]);

        $publicacion = Comentario::create([
            'titulo' => '¿Cómo se diagnostica?',
            'slug' => 'ocho',
            'categoria' => 'general',
            'descripcion' => 'La diabetes se diagnostica mediante una de estas pruebas:
                1. En personas con los síntomas mencionados la presencia de un valor de glucosa en
                sangre superior a 200 mg/dL.
                2. En personas sin síntomas, un valor de glucosa superior a 126 mg/dL realizados tras 8
                horas de ayuno (generalmente antes del desayuno).
                3. Un valor de hemoglobina A1c superior a 6.5% realizado con un método de referencia
                en un Laboratorio Certificado.
                4. Actualmente ya no se suele realizar (salvo en embarazadas) la pruebas de sobrecarga
                oral con 75 g de glucosa.',
            'url' => 'https://www.fesemi.org/sites/default/files/documentos/publicaciones/informacion-diabetes.pdf',
            'informacion_user_id' => '1',
        ]);

    }
}
