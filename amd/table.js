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

require(['jquery'], function($) {

$(document).ready(function() {
    var table0 = $('#tablePost0').DataTable({
        responsive: true,
        buttons: {
            name: 'Download',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text:  '<i class= "fa-solid fa-file-excel"></i>',
                    titleAttr:  'Export to Excel',
                    className:  'btn btn-light'
                }, {
                    extend: 'csv',
                    text:  '<i class= "fa-solid fa-file-csv"></i>',
                    titleAttr:  'Export to Csv',
                    className:  'btn btn-light'
                }, {
                    extend: 'pdfHtml5',
                    text:  '<i class= "fa-solid fa-file-pdf"></i>',
                    titleAttr:  'Export to PDF',
                    className:  'btn btn-light'
                }, {
                    extend: 'print',
                    text:  '<i class= "fa-solid fa-print"></i>',
                    titleAttr:  'Print',
                    className:  'btn btn-light'
                }, {
                    extend: 'copy',
                    text:  '<i class= "fa-solid fa-clipboard"></i>',
                    titleAttr:  'copy to Clipboard',
                    className:  'btn btn-light'
                }
            ]
        },
    });
    table0.buttons().container().insertAfter('#tablePost0');
    $('#tablePost0').addClass('mb-2');
    $('.dataTables_length').addClass('bs-select');


});

$(document).ready(function() {
    var table1 = $('#tablePost1').DataTable({
        responsive: true,
        buttons: {
            name: 'Download',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text:  '<i class= "fa-solid fa-file-excel"></i>',
                    titleAttr:  'Export to Excel',
                    className:  'btn btn-light'
                }, {
                    extend: 'csv',
                    text:  '<i class= "fa-solid fa-file-csv"></i>',
                    titleAttr:  'Export to Csv',
                    className:  'btn btn-light'
                }, {
                    extend: 'pdfHtml5',
                    text:  '<i class= "fa-solid fa-file-pdf"></i>',
                    titleAttr:  'Export to PDF',
                    className:  'btn btn-light'
                }, {
                    extend: 'print',
                    text:  '<i class= "fa-solid fa-print"></i>',
                    titleAttr:  'Print',
                    className:  'btn btn-light'
                }, {
                    extend: 'copy',
                    text:  '<i class= "fa-solid fa-clipboard"></i>',
                    titleAttr:  'copy to Clipboard',
                    className:  'btn btn-light'
                }
            ]
        },
    });
    table1.buttons().container().insertAfter('#tablePost1');
    $('#tablePost1').addClass('mb-2');
    $('.dataTables_length').addClass('bs-select');


});


const styleBannerForum =`position: fixed;top: 0;left: 0;right: 0;bottom: 0;background-color: rgba(255, 255, 255, 0.7);z-index: 9998;`;
const styleContent=`position: relative;top: 40%;left: 40%;    width: 30%;height: 15%;padding: 10px;display: flex;justify-content: center;align-items: center;background-image:linear-gradient(to bottom left, #465f9b, #755794, #6d76ae);z-index: 9999;`;
const styleText =`padding: 10px;`;
const aStyle =`cursor : pointer;font-size: 2em;color: #fff;text-decoration: none;`;
const styleClose=`color : #fff;cursor : pointer;position: absolute;top: 13%;right: 9%;font-size: 2em;`;

function createmodal(){
    var modal=document.createElement("div");
    modal.id="myModal";
    modal.classList.add("modal");
    var modal_content=document.createElement("div");
    modal_content.classList.add("modal-content");
    var close_button=document.createElement("span");
    close_button.classList.add("close");
    close_button.innerHTML="×";
    var modal_text=document.createElement("a");
    modal_text.href="https://lab.eurecatacademy.org";
    modal_text.innerHTML="Get premium";
    close_button.style=styleClose;
    modal_content.style=styleText;
    modal_text.style=aStyle;modal_content.appendChild(close_button);
    modal_content.appendChild(modal_text);
    modal.appendChild(modal_content);
    document.body.appendChild(modal);
    modal_content.style = styleContent;
    modal.style = styleBannerForum ;
    modal.style.display="block";
    close_button.onclick=function(){modal.style.display="none"}
}

// $(".deletebutton_forum_moderation.btn").each(function() {
// $(this).addClass("disabled");
// $(this).addClass("btn-outline-danger");
// $(this).addClass("rounded-lg");
// $(this).removeClass("btn-primary");
// });

// $(".acceptbutton_forum_moderation.btn").each(function() {
// $(this).addClass("disabled");
// $(this).addClass("btn-outline-success");
// $(this).addClass("rounded-lg");
// $(this).removeClass("btn-primary");
// });

});

