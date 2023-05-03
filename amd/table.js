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


$(document).ready(function () {
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

$(document).ready(function () {
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


$(".deletebutton_forum_moderation.btn").each(function () {
$(this).addClass("disabled");
$(this).addClass("btn-outline-danger");
$(this).addClass("rounded-lg");
$(this).removeClass("btn-primary");
});

$(".acceptbutton_forum_moderation.btn").each(function () {
$(this).addClass("disabled");
$(this).addClass("btn-outline-success");
$(this).addClass("rounded-lg");
$(this).removeClass("btn-primary");
});

