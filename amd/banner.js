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



// Create a style
const styleBanner = `
    position: fixed;
    top: 50%;
    left: 20%;
    width: 50%;
    height: 35%
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 9999;
`;

const styleText = `
    background-image: linear-gradient(to bottom left, #465f9b, #755794, #6d76ae);
    color: #fff;
    padding: 10px;
    font-size: 1.5em;
`;

const styleClose = `
    color : #fff;
    cursor : pointer;
    margin-right : 10px;
    margin-top : 10px;
`;

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

    var modal_text = document.createElement("p");
    modal_text.innerHTML = "Get premium";

    // Put it inside.
    close_button.style = styleClose;
    modal_content.appendChild(close_button);
    modal_content.style = styleText;
    modal_content.appendChild(modal_text);
    modal.appendChild(modal_content);
    document.body.appendChild(modal);
    modal.style = styleBanner;

    // Show modal window.
    modal.style.display = "block";

    // Close modal window.
    setTimeout(function() {
        modal.style.display = "none";
    }, 2000);

    //  Onclick event to close window.
    close_button.onclick = function() {
        modal.style.display = "none";
    }
}