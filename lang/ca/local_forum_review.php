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

$string['pluginname'] = "Moderador de fòrums";
$string['user'] = 'Usuari: {$a}';
$string['subject'] = 'Tema: {$a}';
$string['discussion'] = 'Discussió: {$a}';
$string['forum'] = 'Fòrum: {$a}';
$string['course'] = 'Curs : {$a}';
$string['rating'] = 'Valoració : {$a}';
$string['forum_review:viewmessages'] = 'Veure tots els missatges de la base de dades';
$string['forum_review:deleteanymessages'] = 'Esborrar qualsevol missatge de la base de dades';
$string['malware'] = 'Treure tots els missatges maliciosos';

$string['select_course'] = 'Seleccioni un curs';
$string['all_courses'] = 'Tots els cursos';
$string['hate_detected'] = '"Hate" detectat';
$string['message'] = 'Missatge';
$string['user'] = 'Usuari';
$string['subject'] = 'Tema';
$string['discussion'] = 'Anar a la discussió';
$string['forum'] = 'Fòrum';
$string['course'] = 'Curs';
$string['advice'] = 'Recomanació';
$string['advice_des'] = "El mòdul va detectar contingut d'odi. Els consells es basen en la detecció del mòdul. Comprovi el context abans d'emprendre qualsevol acció.";
$string['advice_des_history'] = "El mòdul va detectar contingut d'odi. Els consells es basen en la detecció del mòdul.";
$string['action'] = 'Acció';
$string['action_des'] = "Aquest mòdul treu els missatges detectats com <b>Perillós</b>, per a evitar contingut que inciti a l'odi a la plataforma. El contingut detectat com a <b>Avís</b> mantindrà la visibilitat. Si feu un clic en <b>Acceptar</b> estarà acceptant el contingut que es mostrarà en el fòrum. Si feu un clic en <b>Eliminar</b> estarà esborrant el contingut del fòrum";

$string['action_des_history'] = '<b>Acceptat: </b> Estarà acceptant el contingut i es veurà en el fòrum.<br>
                                <b>Eliminat: </b> Estarà esborrant el contingut i apareixerà en el fòrum com a contingut eliminat. El contingut continuarà existint en la base de dades.';

$string['posts'] = 'Missatge';
$string['history'] = 'Historial';
$string['graphs'] = 'Gràfic';

$string['no_action'] = 'Cap acció';
$string['warning'] = 'Avís - Avaluar';
$string['danger'] = 'Perill - Treure';


$string['td'] = 'Detenció confiable';
$string['fd'] = 'Falsa detenció';
$string['cm'] = 'Confusió de la matriu detectada';
$string['cm_des'] = "La matriu de confusió és una representació visual de la precisió del model de detecció de l'odi. En verd es veu la detecció correcta, en vermell la detecció que el revisor va seleccionar com no odi";

$string['taskUpdate'] = 'Actualització dels missatges';

$string['delete'] = 'Eliminar';
$string['accept'] = 'Acceptar';

$string['deleted'] = 'Eliminat';
$string['accepted'] = 'Acceptat';

$string['course_id'] = 'ID del curs';

$string['analytics'] = 'Anàlisi';

$string['alert'] = "Seleccioni una alerta d'avís específica";
$string['all_alerts'] = 'Totes les alertes';
$string['alert_help'] = "Seleccioni l'alerta d'avís que desitja veure per a filtrar els missatges";

$string['printAnalysis'] = 'Captura de pantalla de la pàgina';

$string['messageprovider:revision'] = "El teu missatge està en estat de revisió perquè s'ha detectat algun 'Hate'";
$string['messageprovider:revised'] = 'El seu missatge ha estat revisat.';

$string['action_taked'] = 'Acció empresa';
$string['last_modified'] = 'Darrera modificació';
$string['checked_last_modified'] = 'Revisat en';
$string['hdtable'] = 'Hate detention table';
$string['hdgraph'] = 'Hate detention graph';

// Provider.
$string['privacy:metadata:postid'] = 'Post id from user';
$string['privacy:metadata:message'] = 'Message';
$string['privacy:metadata:userid'] = 'Id user';
$string['privacy:metadata:subject'] = 'Subject on forum';
$string['privacy:metadata:discussionid'] = 'Id discussion';
$string['privacy:metadata:courseid'] = 'Id course';
$string['privacy:metadata:rating'] = 'Rating';
$string['privacy:metadata:advice'] = 'Advice';
$string['privacy:metadata:reject'] = 'Reject';
$string['privacy:metadata:checked'] = 'Checked';
$string['privacy:metadata:hatedetected'] = 'Hate';
$string['privacy:metadata:lastmodified'] = 'Last modified';
$string['privacy:metadata:checkedlastmodified'] = 'check last modified';
$string['privacy:metadata:localforumreview'] = 'Table to save users forum detected';

// Premium.
$string['premium'] = '* Actualitzar a la versió Premium - Anàlisi de Sentiment ';
$string['premiumpage'] = 'Eurecat.Lab';
$string['keepquarentine'] = '* Afegir la possibilitat de mantenir el missatge en quarantena';
$string['removequarentine'] = "Afegir la possibilitat d'eliminar el missatge de la quarantena";
$string['nopubli'] = '* Sense publicitat';
$string['desblockanalytic'] = '* Desbloquejar la pestanya "Analytics"';
$string['desblockhistory'] = '* Desbloquejar la pestanya "Historial"';
$string['exportdata'] = '* Exportar resultats';
$string['rereview'] = '* Possibilitat de revisar continguts ja revisats';

