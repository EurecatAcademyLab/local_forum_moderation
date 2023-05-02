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

/**
 * Calls the WooCommerce API to activate a user's account for a specified product.
 * @async
 * @param {string} yui - A unique identifier for the implementation.
 * @param {string} apikey - The API key for the WooCommerce store.
 * @param {number} product_id - The ID of the product being activated.
 * @param {string} email - The email address of the user being activated.
 * @returns {Promise<Object>} - A Promise that resolves to the response from the API.
 */
async function woocommerce_api_active(yui, apikey, product_id, email) {
    try {
        var url = 'https://lab.eurecatacademy.org/?wc-api=wc-am-api&wc_am_action=activate';
        

        const urlactual = new URL(window.location.href);
        const host = urlactual.host;
        console.log(host);
        const hash = await hashString(host);

        var params = {
            instance: hash,
            object: email,
            product_id: product_id,
            api_key: apikey
        }

        const queryString = Object.keys(params)
            .map((key) => `${encodeURIComponent(key)}=${encodeURIComponent(params[key])}`)
            .join('&');

        const call_url = url +'&'+ queryString
        console.log(call_url);

        var xhr = new XMLHttpRequest();
        xhr.open('GET', call_url);
        xhr.responseType = 'json';

        xhr.onload = function() {
            if (xhr.status === 200) {
                var data = xhr.response;
                // handle data
                console.log(data);
            } else {
                // handle error
                console.error('Error getting data from API endpoint');
            }
        };

        xhr.send();

        return data;
    } catch (err) {
        console.log(err);
    }
}

/**
 * Calls the WooCommerce API to check the status of a user.
 * @async
 * @param {string} yui - A unique identifier for the implementation.
 * @param {string} apikey - The API key for the WooCommerce store.
 * @param {number} product_id - The ID of the product being checked.
 * @param {string} email - The email address of the user being checked.
 * @returns {Promise<Object>} - A Promise that resolves to the response from the API.
 */
async function woocommerce_api_status(yui, apikey, product_id, email) {
    try {

        var url = 'https://lab.eurecatacademy.org/?wc-api=wc-am-api&wc_am_action=status';
        
        const urlactual = new URL(window.location.href);
        const host = urlactual.host;
        console.log(host);
        const hash = await hashString(host);

        var params = {
            instance: hash,
            object: email,
            product_id: product_id,
            api_key: apikey
        }
        

        const queryString = Object.keys(params)
            .map((key) => `${encodeURIComponent(key)}=${encodeURIComponent(params[key])}`)
            .join('&');

        const call_url = url +'&'+ queryString
        console.log(call_url);

        var xhr = new XMLHttpRequest();
        xhr.open('GET', call_url);
        xhr.responseType = 'json';

        xhr.onload = function() {
            if (xhr.status === 200) {
                var data = xhr.response;
                // handle data
                const oldUrl = window.location.href + 'classes/settings/settings.php';

                if (data.status_check == 'active') {
                    var active = 1;
                    setStatus(active, oldUrl);
                    agregarTextoAlDiv('Active User');
                } else {
                    var active = 0;
                    setStatus(active, oldUrl);
                }
                console.log(data)
            }  else {
                // handle error
                console.error('Error getting data from API endpoint');
            }
        };

        xhr.send();

        return data;
    } catch (err) {
        console.log(err);
    }
}

/**
 * Uses the SHA-256 algorithm to create a hash of the specified string.
 * @param {string} str - The string to be hashed.
 * @returns {Promise<string>} - A Promise that resolves to the hash in hexadecimal format.
 */
async function hashString(str) {
    const encoder = new TextEncoder();
    const data = encoder.encode(str);
    const buffer = await crypto.subtle.digest('SHA-256', data);
    const hashArray = Array.from(new Uint8Array(buffer));
    const hashHex = hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
    return hashHex;
}

/**
 * Adds text to a specified div element and applies styles for a short period of time before removing the text and styles.
 * @param {string} text - The text to be added to the div element.
 * @returns {void}
 */
function agregarTextoAlDiv(text) {
    var divInclude = document.getElementById('statusforum');

    divInclude.classList.add('p-3', 'mb-3', 'rounded', 'bg-light', 'opacity-75');
    text = "<p class='text-info'>"+text+"</p>";
    divInclude.innerHTML = text;

    setTimeout(function() {
        divInclude.innerHTML = '';
        divInclude.classList.remove('bg-light', 'mb-3', 'p-3', 'rounded', 'opacity-75');
    }, 3000);
}

/**
 * Documentation for the setStatus function.
 * This function sends an AJAX request to a specified URL to update the status.
 * @param {boolean} active - A boolean indicating whether the status is active (true) or inactive (false).
 * @param {string} url - A string indicating the URL to send the AJAX request to.
 * @returns {void}
 */
function setStatus(active, url) {
    let baseUrl = url.replace(/(.*\/forum_review\/).*$/, '$1');
    url = baseUrl + 'classes/settings/settings.php'

    require(['jquery'], function($) {
        $(document).ready(function () { 
            $.ajax({
                url: url,
                data: {active},
                success: function(data) {
                    console.log('response ' + data);
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log('Error! ' + errorThrown);
                }
            });
        });
    });
}

