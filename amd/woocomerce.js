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
 * @package     local_forum_moderation
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */



// Create a style
const styleBanner = `position: fixed;top: 0;left: 0;right: 0;bottom: 0;background-color: rgba(255, 255, 255, 0.7);z-index: 9998;`;const styleContent = `position: relative;top: 40%;left: 40%;    width: 30%;height: 15%;padding: 10px;display: flex;justify-content: center;align-items: center;background-image:linear-gradient(to bottom left, #465f9b, #755794, #6d76ae);z-index: 9999;`;const styleText = `padding: 10px;`;const aStyle = `cursor : pointer;font-size: 2em;color: #fff;text-decoration: none;`;const styleClose = `color : #fff;cursor : pointer;position: absolute;top: 13%;right: 9%;font-size: 2em;`;

/**
 * To create a modal window.
 */
function createmodal() {

    // Create HTML elements.
    var modal = document.createElement("div");
    modal.id = "myModal";
    modal.classList.add("modal");

    var modal_content = document.createElement("div");
    modal_content.classList.add("modal-content");

    var close_button = document.createElement("span");
    close_button.classList.add("close");
    close_button.innerHTML = "×";

    var modal_text = document.createElement("a");
    modal_text.href = "https://lab.eurecatacademy.org";
    modal_text.innerHTML = "Get premium";

    // Put it inside.
    close_button.style = styleClose;
    modal_content.style = styleText;
    modal_text.style = aStyle;
    modal_content.appendChild(close_button);
    modal_content.appendChild(modal_text);
    modal.appendChild(modal_content);
    document.body.appendChild(modal);
    modal_content.style = styleContent;
    modal.style = styleBanner;

    // Show modal window.
    modal.style.display = "block";

    //  Onclick event to close window.
    close_button.onclick = function() {
        modal.style.display = "none";
    }
}
const urlbase = 'https://lab.eurecatacademy.org/'
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
        const actionActivate = 'activate' 
    
        var url = urlbase + '?wc-api=wc-am-api&wc_am_action=' + actionActivate;

        const urlactual = new URL(window.location.href);
        const host = urlactual.host;
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

        var xhr = new XMLHttpRequest();
        xhr.open('GET', call_url);
        xhr.responseType = 'json';

        xhr.onload = function() {
            if (xhr.status === 200) {
                var data = xhr.response;
                // handle data
                console.log(data.sucess);
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

        const actionStatus = 'status' 
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
        

        var url = urlbase + '?wc-api=wc-am-api&wc_am_action=' + actionStatus;
        const queryString = Object.keys(params)
            .map((key) => `${encodeURIComponent(key)}=${encodeURIComponent(params[key])}`)
            .join('&');

        const call_url = url +'&'+ queryString

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
                    // agregarTextoAlDiv('Active User');
                } else {
                    var active = 0;
                    setStatus(active, oldUrl);
                }
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
 * Documentation for the setStatus function.
 * This function sends an AJAX request to a specified URL to update the status.
 * @param {boolean} active - A boolean indicating whether the status is active (true) or inactive (false).
 * @param {string} url - A string indicating the URL to send the AJAX request to.
 * @returns {void}
 */
function setStatus(active, url) {
    let baseUrl = url.replace(/(.*\/forum_moderation\/).*$/, '$1');
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

