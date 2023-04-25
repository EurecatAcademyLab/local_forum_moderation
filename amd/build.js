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
 * Javascript & jquery file
 * @package     local_forum_review
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


var timestamp;
$(document).ready(function () { 

    $.ajax({
        url: 'classes/setting/query.php',
        success: function(data) {
            console.log('data type ' + typeof(data));
            console.log('data len ' + data.length);
            if (data && typeof data === "string" || data.length != 0) {
                const forumConfig = JSON.decode(data);
                validate(forumConfig.time);
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log('Error! ' + errorThrown);
        }
    });
});


function validate(time){
    timestamp = time * 1000;
    var fecha = new Date(timestamp);
    var hoy = new Date();
    var diferencia = hoy - fecha;
    var dias = Math.floor(diferencia / (1000 * 60 * 60 * 24)); // calcular la diferencia en días
    
    if (dias > 30) {
        console.log("Han pasado más de 30 días");
        return false;
    } else {
        console.log("No han pasado más de 30 días");
        return true;
    }
}




function conected() {

    // Config credencials API WooCommerce.
    const api = new WooCommerceAPI({
      url: 'https://tusitio.com', // Cambiar por la URL de tu sitio.
      consumerKey: 'ck_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', // Cambiar por tu Consumer Key.
      consumerSecret: 'cs_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', // Cambiar por tu Consumer Secret.
        wpAPI: true,
        version: 'wc/v3'
    });

}

function getProduct() {

    // Cambiar el estado de un producto a 'activo'.
    api.put(`products/${productId}`, {
        status: 'publish'
    })
    .then(response => {
      console.log(response.data); // El estado del producto ha sido cambiado.
    })
    .catch(error => {
      console.log(error.response.data); // Ocurrió un error al cambiar el estado del producto.
    });
}
