


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


$(".deletebutton_forum_review.btn").each(function () {
$(this).addClass("btn-outline-danger");
$(this).addClass("rounded-lg");
$(this).removeClass("btn-primary");
});

$(".acceptbutton_forum_review.btn").each(function () {
$(this).addClass("btn-outline-success");
$(this).addClass("rounded-lg");
$(this).removeClass("btn-primary");
});