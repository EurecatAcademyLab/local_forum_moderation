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
 * Plugin strings are defined here - Catala.
 *
 * @package     local_forum_moderation
 * @category    string
 * @author      2022 Aina Palacios
 * @copyright   2022 Aina Palacios & Eurecat.dev
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = "Moderador de fòrums";
$string['pluginnameextra'] = '(Versió gratuïta)';
$string['developed'] = 'Desenvolupat per:';
$string['eurecat'] = 'Eurecat Academy';
$string['eurecatorg'] = 'Eurecat.org';
$string['moderation'] = 'Moderació del Fòrum';
$string['forum_review:getpremium'] = 'Vista Premium';

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
$string['action_des'] = "Aquest mòdul treu els missatges detectats com <b>Perillós</b>, per a evitar contingut que inciti a l'odi a la plataforma.
            El contingut detectat com a <b>Avís</b> mantindrà la visibilitat. Si feu un clic en <b>Acceptar</b> estarà acceptant el contingut
            que es mostrarà en el fòrum. Si feu un clic en <b>Eliminar</b> estarà esborrant el contingut del fòrum";
$string['action_des_history'] = '<b>Acceptat: </b> Estarà acceptant el contingut i es veurà en el fòrum.<br>
                                <b>Eliminat: </b> Estarà esborrant el contingut i apareixerà en el fòrum com a contingut eliminat. El contingut continuarà existint en la base de dades.';

// Tabs.
$string['posts'] = 'Missatge';
$string['history'] = 'Historial';
$string['graphs'] = 'Gràfic';
$string['about'] = 'Sobre nosaltres';

$string['no_action'] = 'Cap acció';
$string['warning'] = 'Avís - Avaluar';
$string['danger'] = 'Perill - Treure';

$string['td'] = 'Detenció confiable';
$string['fd'] = 'Falsa detenció';
$string['cm'] = 'Confusió de la matriu detectada';
$string['cm_des'] = "La matriu de confusió és una representació visual de la precisió del model de detecció de l'odi. En verd es veu la detecció correcta, en vermell
            la detecció que el revisor va seleccionar com no odi";

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

// Table.
$string['action_taked'] = 'Acció empresa';
$string['last_modified'] = 'Darrera modificació';
$string['checked_last_modified'] = 'Revisat en';
$string['count'] = 'Comptador de missatge';
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
$string['privacy:metadata:localforummoderation'] = 'Table to save users forum detected';

// Premium.
$string['premium'] = '* Actualitzar a la versió Premium - Anàlisi de Sentiment ';
$string['premiumpage'] = 'Eurecat Academy Lab';
$string['keepquarentine'] = '* Afegir la possibilitat de mantenir el missatge en quarantena';
$string['removequarentine'] = "Afegir la possibilitat d'eliminar el missatge de la quarantena";
$string['nopubli'] = '* Sense publicitat';
$string['desblockanalytic'] = '* Desbloquejar la pestanya "Analytics" i la de "Historial"';
$string['desblockhistory'] = '* Desbloquejar la pestanya "Historial"';
$string['exportdata'] = '* Exportar resultats';
$string['rereview'] = '* Possibilitat de revisar continguts ja revisats';
$string['phrase'] = 'Aquesta funcionalitat només està disponible en la versió Premium';

// Settings.
$string['email'] = 'Correu electrònic';
$string['email_des'] = 'Ingressi el seu correu';
$string['manage'] = 'Moderador de fòrums';
$string['showinnavigation'] = 'Mostrar en el navegador';
$string['showinnavigation_desc'] = "Quan estigui activada, la navegació del lloc mostrarà un enllaç a l'Anàlisi de Sentiment";
$string['apikey'] = 'APIKey';
$string['apikey_des'] = 'Ingressi la seva APIKey';
$string['name'] = 'Nom';
$string['name_des'] = 'Ingressi el seu nom';
$string['time'] = 'Temps';
$string['time_des'] = 'Temps';
$string['url'] = 'Url';
$string['url_des'] = 'Url - Actual';
$string['productid'] = 'Identificador de producte';
$string['productid_des'] = 'El seu producte actual';
$string['privacy'] = 'Accepto termes i condicions';
$string['privacy_des'] = 'Acceptar condicions';
$string['privacy_policy'] = 'Política de privacitat';
$string['email_cannot_be_empty'] = 'El camp Email no pot estar buit';
$string['activate'] = 'Activar';
$string['error_empty_field'] = 'Aquest camp no pot estar buit';
$string['placeholder_text'] = '123456789';
$string['title'] = 'Una vegada instal·lat el plugin, trigarà uns minuts a llegir la base de dades i comprovar tots els missatges del fòrum disponibles en la plataforma';

// Description.
$string['Describ'] = "Sobre aquest plugin";
$string['Describtion'] = "El plugin multillenguatge està dissenyat per a ajudar els moderadors de fòrums a identificar contingut potencialment inapropiat o nociu i prevenir el seu mal ús automatitzant unes certes decisions.

El mòdul ofereix una moderació automatitzada molt precisa dels fòrums, i pot posar en quarantena els missatges més problemàtics fins que siguin revisats per un moderador. El plugin també proporciona una varietat de regles i accions per a simplificar el procés de moderació.";

$string['more'] = "Com funciona";
$string['moreinfo'] = "Quan un usuari publica un missatge en qualsevol fòrum, el plugin llegirà el contingut, guardarà el resultat i depenent del nivell detectat realitzarà una de les següents accions:";

$string['moreinfo1'] = "Si el nivell detectat és 1 - 'Advertiment', considerarà que el contingut ha de ser revisat per una autoritat subjectiva. Per tant mostrarà el plugin local per a una revisió";

$string['moreinfo2'] = "Si el nivell detectat és 2 - 'Perill', considerarà que aquest contingut no ha d'estar en la plataforma i per tant es posarà en quarantena. Aquesta quarantena consisteix a eliminar el missatge fins que un revisor determini si és necessària una eliminació definitiva o si, per context, es pot determinar que el missatge detectat és una excepció.";

$string['moreinfo3'] = "S'impedirà l'accés al missatge i es marcarà com no disponible.

Serà necessari que l'usuari autoritzat certifiqui aquests missatges i doni la seva aprovació per a cadascun, tenint la possibilitat d'acceptar o rebutjar el suggeriment del mòdul. Com els missatges depenen del seu context, el revisor té la possibilitat de veure el missatge dins de la discussió per a decidir si és apropiat.";
$string['moreinfo4'] = 'El módulo ofrece información importante a los moderadores del foro. Esto incluye el usuario que publicó el mensaje, el curso en el que fue publicado, las razones por las que el mensaje ha sido puesto en cuarentena, un enlace a la discusión para el contexto, y una sugerencia sobre cómo proceder. Por ejemplo, si el mensaje se considera de nivel "Peligro", la sugerencia podría ser borrarlo, mientras que si es de nivel "Advertencia", la sugerencia podría ser revisarlo.

El complemento ofrece controles de personalización para adaptar su funcionalidad y puede configurarse para que funcione con distintos niveles de precisión en función del acuerdo de nivel de servicio seleccionado';

// Regarding.
$string['regard'] = "Respecte a l'enfocament de la IA";
$string['regarding'] = "Aquesta eina utilitza models de IA per a detectar discurs d'odi, com a models de llenguatge com Moderació per OpenAI (";
$string['moderation'] = 'Moderació';
$string['guides'] = 'Guies - Visió general';
$string['regarding1'] = ") i obertes. Està dissenyat per a ser el més ètic i responsable possible. Les eines que utilitzen aquests models es desenvolupen amb un fort èmfasi en la privacitat i la protecció de dades, i estan dissenyades per a garantir que les dades dels usuaris es manegen amb la màxima cura i respecte.";
$string['regarding2'] = "L'equip de desenvolupament del complement es compromet a millorar contínuament els estàndards ètics del seu producte. Per a aconseguir-ho, estan treballant activament en l'aplicació de noves eines i directrius ètiques al seu procés de desenvolupament. Aquestes eines i directrius estan dissenyades per a ajudar l'equip a identificar i abordar les preocupacions i consideracions ètiques al llarg de tot el cicle de vida del producte, des de la seva concepció fins a la seva implementació.";
$string['regarding3'] = "Els models de IA seleccionats per al seu ús solen entrenar-se en grans conjunts de dades que han estat acuradament seleccionats per a garantir la seva representativitat i diversitat. Això significa que els models no estan esbiaixats cap a cap grup o ideologia en particular, i que són capaces d'identificar el discurs d'odi en totes les seves formes, independentment de qui parla o què diu. Més informació aquí:";
$string['regarding4'] = "És important tenir en compte que les eines amb funcions millorades proporcionades per models de IA mai són perfectes i han d'utilitzar-se juntament amb moderació i supervisió humanes. Això ajuda a garantir que qualsevol error o biaix potencial sigui detectat i corregit abans que tingui l'oportunitat de causar mal. El disseny general i la interfície d'usuari d'aquesta eina estan pensats per a ajudar als moderadors humans dels fòrums, deixant les decisions finals al criteri humà";

// Academy.
$string['academytitle'] = "Sobre Eurecat Academy";
$string['academy'] = "Eurecat és un centre de recerca i tecnologia amb seu a Barcelona, Espanya, que proporciona serveis de tecnologia avançada, innovació i formació a més de 1.500 empreses i organitzacions. Eurecat és considerat un dels principals centres europeus de recerca i tecnologia, sent la segona organització privada sense ànim de lucre del sud d'Europa. Eurecat Academy col·labora amb organitzacions públiques i privades en un espectre empresarial molt ampli i compta amb un grup d'innovació especialitzat que se centra en la millora dels processos de transferència i avaluació del coneixement a través d'analítiques d'aprenentatge, interfícies TIC innovadores, metodologies adaptatives i motivacionals, i entorns de formació personal. El grup d'innovació de Eurecat Academy també aporta entorns d'aprenentatge professional configurables, un laboratori de cognició i percepció, i un grup d'analítica de l'aprenentatge. L'equip de Eurecat Academy combina coneixements i experiència tecnològica i pedagògica per a crear eines i recursos formatius d'alt rendiment i desenvolupar plans educatius i itineraris formatius. Apareixerà com";
$string['userprivate'] = 'Política de privacitat:';
$string['userprivate1'] = 'FUNDACIÓ EURECAT considera que les seves dades personals són molt importants. Per això, la tractem de manera confidencial i segura. Ens comprometem a garantir la privacitat de les dades personals en tot moment i a no recopilar informació innecessària.';
$string['userprivate2'] = "No és necessari que es registri prèviament per a accedir al nostre lloc web. Si desitja més informació, pot posar-se en contacte amb nosaltres a través del formulari disponible en la nostra web, sempre que estigui d'acord amb la nostra política de privacitat, que haurà d'acceptar per a deixar constància del seu consentiment exprés al tractament de les dades per a les finalitats indicades.";
$string['userprivate3'] = "En compliment del Reglament (UE) 2016/679, de 27 d'abril de 2016, relatiu a la protecció de les persones físiques pel que fa al tractament de dades personals i a la lliure circulació d'aquestes dades i de la Llei 3/2018, de 5 de desembre, de protecció de dades personals i garantia dels drets digitals, t'informem sobre el tractament de les teves dades a través d'aquesta Política de Privacitat.";
$string['information'] = 'Más información';
$string['adminprivate'] = "Encara que aquest plugin és una versió gratuïta, la nostra empresa emmagatzemarà algunes dades per al correcte funcionament i manteniment del plugin. Aquestes dades seran nom d'usuari, email i url de la plataforma on es desplegarà el plugin.

La permanència del plugin té una durada temporal, i en acceptar la configuració de privacitat estaràs donant l'oportunitat que se t'enviï informació sobre la durada del plugin, així com d'altres productes de l'empresa. En cap cas la informació serà destinada a tercers o fins que no siguin informatius sobre aquest plugin o altres plugins de l'empresa.

Si té alguna pregunta, dubte o suggeriment no dubti a posar-se en contacte amb nosaltres.";

// About us.
$string['aboutus'] = "En Eurecat Academy, reunim un equip multidisciplinari d'experts apassionats per millorar les competències de les persones. L'experiència del nostre equip abasta des del disseny instruccional fins al desenvolupament tècnic per a oferir solucions que optimitzin les activitats formatives dels nostres socis. Eurecat Academy és el departament de formació de Eurecat Technology Centre";
$string['aboutus1'] = "Eurecat és un centre de recerca i tecnologia amb seu a Barcelona, Espanya, que proporciona serveis de tecnologia avançada, innovació i formació a més de 1.500 empreses i organitzacions. Eurecat és considerat com un dels principals centres europeus de recerca i tecnologia, sent la segona organització privada sense ànim de lucre més gran del sud d'Europa.";
$string['aboutus2'] = "Eurecat Academy col·labora amb organitzacions laborals i de formació públiques i privades en un espectre empresarial molt ampli com a proveïdor integral de serveis de formació, creació de continguts i consultoria educativa. Eurecat Academy compta amb un grup d'innovació especialitzat que se centra en la millora dels processos de transferència i avaluació del coneixement a través d'interfícies TIC innovadores, metodologies adaptatives i motivacionals, analítica de l'aprenentatge i entorns personals de formació. Combinem coneixements tecnològics i pedagògics i experiència professional per a crear activitats, eines i recursos formatius d'alt rendiment, i per a desenvolupar plans educatius i itineraris formatius.";
$string['aboutus3'] = "El nostre propòsit general és oferir solucions amb capacitat per a generar un impacte positiu en persones i entitats, proporcionant-los eines eficaces per a optimitzar les seves activitats formatives. Aspirem al fet que cada persona alliberi el seu màxim potencial i contribueixi al seu progrés personal i professional, per al seu propi benestar i la seva contribució al desenvolupament social.";

// No active.
$string['noactive'] = 'Gràcies per haver-nos triats i usar els nostres productes. Vostè ha superat el temps de la versió gratuïta, si desitja aconseguir el producte en la seva versió premium poseu-vos en contacte amb nosaltres.';
