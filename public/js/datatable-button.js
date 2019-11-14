$(function () {
    let printButtonTrans = 'print'

    let languages = {
        'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
    };

    $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {className: 'btn'})
    $.extend(true, $.fn.dataTable.defaults, {
        language: {
            url: languages.en
        },
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox',
            targets: 0
        }, {
            orderable: false,
            searchable: false,
            targets: -1
        }],
        select: {
            style: 'multi+shift',
            selector: 'td:first-child'
        },
        order: [],
        scrollX: true,
        pageLength: 10,
        dom: 'lBfrtip<"actions">',
        buttons: [
            {
                extend: 'print',
                className: 'btn-default datatable-btn-print',
                text: printButtonTrans,
                exportOptions: {
                    columns: ':visible'
                }
            }
        ]
    });

    $.fn.dataTable.ext.classes.sPageButton = '';
});