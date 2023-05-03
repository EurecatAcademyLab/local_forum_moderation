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
 * Plugin strings are defined here - Spanish.
 *
 * @package     local_forum_review
 * @category    string
 * @author      2022 Aina Palacios
 * @copyright   2022 Aina Palacios & Eurecat.dev
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = "Moderador de foros";
$string['pluginnameextra'] = '(Versión gratuita / Beta)';
$string['developed'] = 'Desarrollado por :';
$string['eurecat'] = 'Eurecat Academy';
$string['eurecatorg'] = 'Eurecat.org';
$string['moderation'] = 'Moderación del Foro';
$string['forum_review:getpremium'] = 'Vista Premium';

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
                El contenido detectado como <b>Advertencia</b> mantendrá la visibilidad. Si clica en <b>Aceptar</b> estará aceptando el contenido
                que se mostrará en el foro. Si clica en <b>Eliminar</b> estará borrando el contenido del foro';
$string['action_des_history'] = '<b>Aceptado: </b> Esta aceptando el contenido y se verá en el foro.<br>
                                <b>Eliminado: </b> Estará borrando el contenido y aparecerá en el foro como contenido eliminado. El contenido seguirá existiendo en la base de datos.';

// Tabs.
$string['posts'] = 'Mensaje';
$string['history'] = 'Historial';
$string['graphs'] = 'Gráfico';
$string['about'] = 'Sobre nosotros';

$string['no_action'] = 'Ninguna acción';
$string['warning'] = 'Advertencia - Evaluar';
$string['danger'] = 'Peligro - Quitar';

$string['td'] = 'Verdadera detención';
$string['fd'] = 'Falsa detención ';
$string['cm'] = 'Confusión de la matriz detectada';
$string['cm_des'] = 'La matriz de confusión es una representación visual de la precisión del modelo de detección del odio. En verde se ve la detección correcta, en rojo
            la detección que el revisor seleccionó como no odio';

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

// Table.
$string['action_taked'] = 'Acción emprendida';
$string['last_modified'] = 'Última modificación';
$string['checked_last_modified'] = 'Revisado en';
$string['count'] = 'Contador de mensajes';
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
$string['premiumpage'] = 'Eurecat Academy Lab';
$string['keepquarentine'] = '* Añadir la posibilidad de mantener el mensaje en cuarentena';
$string['removequarentine'] = '* Añadir la posibilidad de eliminar el mensaje de la cuarentena';
$string['nopubli'] = '* Sin publicidad';
$string['desblockanalytic'] = '* Desbloquear la pestaña "Analytics" y la pestaña "Historial"';
$string['desblockhistory'] = '* Desbloquear la pestaña "Historial"';
$string['exportdata'] = '* Exportar resultados';
$string['rereview'] = '* Posibilidad de revisar contenidos ya revisados';
$string['phrase'] = 'Esta funcionalidad sólo está disponible en la versión Premium';

// Settings.
$string['email'] = 'Correo electrónico';
$string['email_des'] = 'Ingrese su correo';
$string['manage'] = 'Gestionar el Moderador de foros';
$string['showinnavigation'] = 'Mostrar en el navegador';
$string['showinnavigation_desc'] = 'Cuando esté activada, la navegación del sitio mostrará un enlace al Análisis de Sentimiento';
$string['apikey'] = 'APIKey';
$string['apikey_des'] = 'Ingrese su APIKey';
$string['name'] = 'Nombre';
$string['name_des'] = 'Ingrese su nombre';
$string['time'] = 'Tiempo';
$string['time_des'] = 'tiempo';
$string['url'] = 'Url';
$string['url_des'] = 'Url - Actual';
$string['productid'] = 'Identificador de producto';
$string['productid_des'] = 'Su producto actual';
$string['privacy'] = 'Acepto términos y condiciones';
$string['privacy_des'] = 'Aceptar condiciones';
$string['privacy_policy'] = 'Política de privacidad';
$string['email_cannot_be_empty'] = 'El campo Email no puede estar vacío';
$string['activate'] = 'Activar';
$string['error_empty_field'] = 'Este campo no puede estar vacío';
$string['placeholder_text'] = '123456789';
$string['title'] = 'Una vez instalado el plugin, tardará unos minutos en leer la base de datos y comprobar todos los mensajes del foro disponibles en la plataforma';

// Description.
$string['Describ'] = "Sobre este plugin";
$string['Describtion'] = "El plugin multilenguaje está diseñado para ayudar a los moderadores de foros a identificar contenido potencialmente inapropiado o dañino y prevenir su mal uso automatizando ciertas decisiones.

El módulo ofrece una moderación automatizada muy precisa de los foros, y puede poner en cuarentena los mensajes más problemáticos hasta que sean revisados por un moderador. El plugin también proporciona una variedad de reglas y acciones para simplificar el proceso de moderación.";

$string['more'] = 'Cómo funciona';
$string['moreinfo'] = 'Cuando un usuario publica un mensaje en cualquier foro, el plugin leerá el contenido, guardará el resultado y dependiendo del nivel detectado realizará una de las siguientes acciones:';

$string['moreinfo1'] = "Si el nivel detectado es 1 - 'Advertencia', considerará que el contenido debe ser revisado por una autoridad subjetiva. Por lo tanto mostrará el plugin local para una revisión";

$string['moreinfo2'] = "Si el nivel detectado es 2 - 'Peligro', considerará que este contenido no debe estar en la plataforma y por tanto se pondrá en cuarentena. Esta cuarentena consiste en eliminar el mensaje hasta que un revisor determine si es necesaria una eliminación definitiva o si, por contexto, se puede determinar que el mensaje detectado es una excepción.";

$string['moreinfo3'] = 'Se impedirá el acceso al mensaje y se marcará como no disponible.

Será necesario que el usuario autorizado certifique estos mensajes y dé su aprobación para cada uno, teniendo la posibilidad de aceptar o rechazar la sugerencia del módulo. Como los mensajes dependen de su contexto, el revisor tiene la posibilidad de ver el mensaje dentro de la discusión para decidir si es apropiado.';
$string['moreinfo4'] = 'El módulo ofrece información importante a los moderadores del foro. Esto incluye el usuario que publicó el mensaje, el curso en el que fue publicado, las razones por las que el mensaje ha sido puesto en cuarentena, un enlace a la discusión para el contexto, y una sugerencia sobre cómo proceder. Por ejemplo, si el mensaje se considera de nivel "Peligro", la sugerencia podría ser borrarlo, mientras que si es de nivel "Advertencia", la sugerencia podría ser revisarlo.

El complemento ofrece controles de personalización para adaptar su funcionalidad y puede configurarse para que funcione con distintos niveles de precisión en función del acuerdo de nivel de servicio seleccionado';

// Regarding.
$string['regard'] = "Con respecto al enfoque de la IA";
$string['regarding'] = "Esta herramienta utiliza modelos de IA para detectar discurso de odio, como modelos de lenguaje como Moderación por OpenAI (";
$string['moderation'] = 'Moderación';
$string['guides'] = 'Guías - Visión general';
$string['regarding1'] = ") y abiertas. Está diseñado para ser lo más ético y responsable posible. Las herramientas que utilizan estos modelos se desarrollan con un fuerte énfasis en la privacidad y la protección de datos, y están diseñadas para garantizar que los datos de los usuarios se manejan con el máximo cuidado y respeto.";
$string['regarding2'] = "El equipo de desarrollo del complemento se compromete a mejorar continuamente los estándares éticos de su producto. Para lograrlo, están trabajando activamente en la aplicación de nuevas herramientas y directrices éticas a su proceso de desarrollo. Estas herramientas y directrices están diseñadas para ayudar al equipo a identificar y abordar las preocupaciones y consideraciones éticas a lo largo de todo el ciclo de vida del producto, desde su concepción hasta su implementación.";
$string['regarding3'] = "Los modelos de IA seleccionados para su uso suelen entrenarse en grandes conjuntos de datos que han sido cuidadosamente seleccionados para garantizar su representatividad y diversidad. Esto significa que los modelos no están sesgados hacia ningún grupo o ideología en particular, y que son capaces de identificar el discurso de odio en todas sus formas, independientemente de quién habla o qué dice. Más información aquí: ";
$string['regarding4'] = "Es importante tener en cuenta que las herramientas con funciones mejoradas proporcionadas por modelos de IA nunca son perfectas y deben utilizarse junto con moderación y supervisión humanas. Esto ayuda a garantizar que cualquier error o sesgo potencial sea detectado y corregido antes de que tenga la oportunidad de causar daño. El diseño general y la interfaz de usuario de esta herramienta están pensados para ayudar a los moderadores humanos de los foros, dejando las decisiones finales al criterio humano";

// Academy.
$string['academytitle'] = "Sobre Eurecat Academy";
$string['academy'] = "Eurecat es un centro de investigación y tecnología con sede en Barcelona, España, que proporciona servicios de tecnología avanzada, innovación y formación a más de 1.500 empresas y organizaciones. Eurecat está considerado uno de los principales centros europeos de investigación y tecnología, siendo la segunda organización privada sin ánimo de lucro del sur de Europa. Eurecat Academy colabora con organizaciones públicas y privadas en un espectro empresarial muy amplio y cuenta con un grupo de innovación especializado que se centra en la mejora de los procesos de transferencia y evaluación del conocimiento a través de analíticas de aprendizaje, interfaces TIC innovadoras, metodologías adaptativas y motivacionales, y entornos de formación personal. El grupo de innovación de Eurecat Academy también aporta entornos de aprendizaje profesional configurables, un laboratorio de cognición y percepción, y un grupo de analítica del aprendizaje. El equipo de Eurecat Academy combina conocimientos y experiencia tecnológica y pedagógica para crear herramientas y recursos formativos de alto rendimiento y desarrollar planes educativos e itinerarios formativos. Aparecerá como";
$string['userprivate'] = 'Política de privacidad:';
$string['userprivate1'] = 'FUNDACIÓ EURECAT considera que sus datos personales son muy importantes. Por ello, la tratamos de forma confidencial y segura. Nos comprometemos a garantizar la privacidad de los datos personales en todo momento y a no recopilar información innecesaria.';
$string['userprivate2'] = 'No es necesario que se registre previamente para acceder a nuestro sitio web. Si desea más información, puede ponerse en contacto con nosotros a través del formulario disponible en nuestra web, siempre que esté de acuerdo con nuestra política de privacidad, que deberá aceptar para dejar constancia de su consentimiento expreso al tratamiento de los datos para las finalidades indicadas.';
$string['userprivate3'] = 'En cumplimiento del Reglamento (UE) 2016/679, de 27 de abril de 2016, relativo a la protección de las personas físicas en lo que respecta al tratamiento de datos personales y a la libre circulación de estos datos y de la Ley 3/2018, de 5 de diciembre, de protección de datos personales y garantía de los derechos digitales, te informamos sobre el tratamiento de tus datos a través de esta Política de Privacidad.';
$string['information'] = 'Més informació';
$string['adminprivate'] = "Aunque este plugin es una versión gratuita, nuestra empresa almacenará algunos datos para el correcto funcionamiento y mantenimiento del plugin. Estos datos serán nombre de usuario, email y url de la plataforma donde se desplegará el plugin.

La permanencia del plugin tiene una duración temporal, y al aceptar la configuración de privacidad estarás dando la oportunidad de que se te envíe información sobre la duración del plugin, así como de otros productos de la empresa.  En ningún caso la información será destinada a terceros o fines que no sean informativos sobre este plugin u otros plugins de la empresa.

Si tiene alguna pregunta, duda o sugerencia no dude en ponerse en contacto con nosotros.";

// About us.
$string['aboutus'] = "En Eurecat Academy, reunimos a un equipo multidisciplinar de expertos apasionados por mejorar las competencias de las personas. La experiencia de nuestro equipo abarca desde el diseño instruccional hasta el desarrollo técnico para ofrecer soluciones que optimicen las actividades formativas de nuestros socios. Eurecat Academy es el departamento de formación de Eurecat Technology Centre";
$string['aboutus1'] = "Eurecat es un centro de investigación y tecnología con sede en Barcelona, España, que proporciona servicios de tecnología avanzada, innovación y formación a más de 1.500 empresas y organizaciones. Eurecat está considerado como uno de los principales centros europeos de investigación y tecnología, siendo la segunda organización privada sin ánimo de lucro más grande del sur de Europa.";
$string['aboutus2'] = "Eurecat Academy colabora con organizaciones laborales y de formación públicas y privadas en un espectro empresarial muy amplio como proveedor integral de servicios de formación, creación de contenidos y consultoría educativa. Eurecat Academy cuenta con un grupo de innovación especializado que se centra en la mejora de los procesos de transferencia y evaluación del conocimiento a través de interfaces TIC innovadoras, metodologías adaptativas y motivacionales, analítica del aprendizaje y entornos personales de formación. Combinamos conocimientos tecnológicos y pedagógicos y experiencia profesional para crear actividades, herramientas y recursos formativos de alto rendimiento, y para desarrollar planes educativos e itinerarios formativos.";
$string['aboutus3'] = "Nuestro propósito general es ofrecer soluciones con capacidad para generar un impacto positivo en personas y entidades, proporcionándoles herramientas eficaces para optimizar sus actividades formativas. Aspiramos a que cada persona libere su máximo potencial y contribuya a su progreso personal y profesional, para su propio bienestar y su contribución al desarrollo social.";

// No active.
$string['noactive'] = 'Gracias por habernos elegido y usar nuestros productos. Usted ha superado el tiempo de la versión gratuita, si desea conseguir el producto en su versión premium póngase en contacto con nosotros.';
