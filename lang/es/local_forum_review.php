<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin strings are defined here.
 *
 * @package     local_forum_review
 * @category    string
 * @author      2022 Aina Palacios
 * @copyright   2022 Aina Palacios & Eurecat.dev
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = "Moderador de foros";
$string['user'] = 'Usuario: {$a}';
$string['subject'] = 'Tema: {$a}';
$string['discussion'] = 'Discusión: {$a}';
$string['forum'] = 'Foro: {$a}';
$string['course'] = 'Curso : {$a}';
$string['rating'] = 'Valoración : {$a}';
$string['forum_review:viewmessages'] = 'Ver todos los mensajes de la base de datos';
$string['forum_review:deleteanymessages'] = 'Borrar cualquier mensaje de la base de datos';
$string['malware'] = 'Quitar todos los mensajes maliciosos';

$string['select_course'] = 'Seleccione un curso';
$string['all_courses'] = 'Todos los cursos';
$string['hate_detected'] = '"Hate" detectado';
$string['message'] = 'Mensaje';
$string['user'] = 'Usuario';
$string['subject'] = 'Tema';
$string['discussion'] = 'Ir a la discusión';
$string['forum'] = 'Foro';
$string['course'] = 'Curso';
$string['advice'] = 'Recomendación';
$string['advice_des'] = 'El módulo detectó contenido de odio. Los consejos se basan en la detección del módulo. Compruebe el contexto antes de emprender cualquier acción.';
$string['advice_des_history'] = 'El módulo detectó contenido de odio. Los consejos se basan en la detección del módulo.';
$string['action'] = 'Acción';
$string['action_des'] = 'Este módulo quita los mensajes detectados como <b>Peligro</b>, para evitar contenido que incite al odio en la plataforma.
                El contenido detectado como <b>Advertencia</b> mantendrá la visibilidad. Si clica en <b>Aceptar</b> estará aceptando el contenido que se mostrará en el foro. Si clica en <b>Eliminar</b> estará borrando el contenido del foro';

$string['action_des_history'] = '<b>Aceptado: </b> Esta aceptando el contenido y se verá en el foro.<br>
                                <b>Eliminado: </b> Estará borrando el contenido y aparecerá en el foro como contenido eliminado. El contenido seguirá existiendo en la base de datos.';

$string['posts'] = 'Mensaje';
$string['history'] = 'Historial';
$string['graphs'] = 'Gráfico';

$string['no_action'] = 'Ninguna acción';
$string['warning'] = 'Advertencia - Evaluar';
$string['danger'] = 'Peligro - Quitar';


$string['td'] = 'Verdadera detención';
$string['fd'] = 'Falsa detención ';
$string['cm'] = 'Confusión de la matriz detectada';
$string['cm_des'] = 'La matriz de confusión es una representación visual de la precisión del modelo de detección del odio. En verde se ve la detección correcta, en rojo la detección que el revisor seleccionó como no odio';

$string['taskUpdate'] = 'Actualización de los mensajes';

$string['delete'] = 'Eliminar';
$string['accept'] = 'Aceptar';

$string['deleted'] = 'Eliminado';
$string['accepted'] = 'Aceptado';

$string['course_id'] = 'ID del curso';

$string['analytics'] = 'Análisis';

$string['alert'] = 'Seleccione una alerta de aviso específica';
$string['all_alerts'] = 'Todas las alertas';
$string['alert_help'] = 'Seleccione la alerta de aviso que desea ver para filtrar los mensajes';

$string['printAnalysis'] = 'Captura de pantalla de la página';

$string['messageprovider:revision'] = 'Tu mensaje está en estado de revisión porque se ha detectado algún "Hate"';
$string['messageprovider:revised'] = 'Su mensaje ha sido revisado.';

$string['action_taked'] = 'Acción emprendida';
$string['last_modified'] = 'Última modificación';
$string['checked_last_modified'] = 'Revisado en';
$string['hdtable'] = 'Tabla de detenciones por odio';
$string['hdgraph'] = 'Gráfico de detenciones por odio';

// Provider.
$string['privacy:metadata:postid'] = 'Id del post del usuario';
$string['privacy:metadata:message'] = 'Mesaje';
$string['privacy:metadata:userid'] = 'Id de usuario';
$string['privacy:metadata:subject'] = 'Tema del foro';
$string['privacy:metadata:discussionid'] = 'Id discusión';
$string['privacy:metadata:courseid'] = 'Id curso';
$string['privacy:metadata:rating'] = 'Valoración';
$string['privacy:metadata:advice'] = 'Consejo';
$string['privacy:metadata:reject'] = 'Rechazar';
$string['privacy:metadata:checked'] = 'Comprobado';
$string['privacy:metadata:hatedetected'] = 'Odio';
$string['privacy:metadata:lastmodified'] = 'Last modified';
$string['privacy:metadata:checkedlastmodified'] = 'Última modificación';
$string['privacy:metadata:localforumreview'] = 'Tabla para guardar usuarios foro detectado';

// Premium.
$string['premium'] = '* Actualizar a la versión Premium -  Análisis de Sentimiento';
$string['premiumpage'] = 'Eurecat.Lab';
$string['keepquarentine'] = '* Añadir la posibilidad de mantener el mensaje en cuarentena';
$string['removequarentine'] = '* Añadir la posibilidad de eliminar el mensaje de la cuarentena';
$string['nopubli'] = '* Sin publicidad';
$string['desblockanalytic'] = '* Desbloquear la pestaña "Analytics"';
$string['desblockhistory'] = '* Desbloquear la pestaña "Historial"';
$string['exportdata'] = '* Exportar resultados';
$string['rereview'] = '* Posibilidad de revisar contenidos ya revisados';

