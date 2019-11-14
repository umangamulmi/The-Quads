$(document).ready(function () {

    init();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.product-list .item').click(function () {
        let key = $(this).attr('key');
        let html = '<li class="list-group-item list-group-item-action li-item" key="' + key + '">';
        html += '<div class="name">' + products[key]['name'] + '</div>';
        html += '<div class="price">$' + products[key]['price'] + '</div>';
        html += '<button class="remove"><i class="fa fa-trash" aria-hidden="true"></i></button>';
        html += '</li>';
        $('#add-list-group').append(html);
        added_products.push(
            {id: products[key]['id'], name: products[key]['name'], price: products[key]['price']}
        );
        update_added_cash();
    });

    $('#add-list-group').on('click', '.remove', function () {
        let key = $(this).parents('li').index();
        $(this).parents('li').remove();
        added_products.splice(key, 1);
        update_added_cash();
    });

    $('#added-clear-all').click(function () {
        $('#add-list-group').empty();
        added_products = [];
        update_added_cash();
    });

    $('.cash-btn-group .row button').click(function () {
        let key = $(this).attr('value');
        let cashValue = $('#customer-cash').val();
        if (key === 'CE') {
            cashValue = cashValue.slice(0, -1);
        } else {
            cashValue += key;
        }
        $('#customer-cash').val(cashValue);
    });

    $('#clear-customer-cash').click(function () {
        $('#customer-cash').val('');
        customer_cash = change_due_cash = 0;
    });

    $('#enter-customer-cash').click(function () {
        let val = $('#customer-cash').val();
        if (val === '') val = 0;
        customer_cash = val;
        update_added_cash();
    });

    $('#sale-transaction').click(function () {
        if ($('#customer-name').val() === '') {
            alert('Please input Customer Name');
            $('#customer-name').focus();
            return;
        }
        if (change_due_cash < 0 || added_cash === 0) {
            alert('Error! ');
            return;
        }
        let productIds = added_products.map(function (product) {
            return product.id
        });
        let data = {
            customer_name: $('#customer-name').val(),
            product_ids: productIds.join(),
            total: added_cash
        };
        $.ajax({
            type: 'POST',
            url: '/SalePost',
            data: data,
            success: function (data) {
                if (data.success === 'ok') {
                    alert('Success');
                    init();
                } else {
                    alert('Fail');
                }
            }
        });
    })

    function init() {
        $('#customer-cash').val('');
        $('#customer-name').val('');
        $('#add-list-group').empty();
        added_products = [];
        change_due_cash = added_cash = customer_cash = 0;
        update_added_cash();
    }

    function update_added_cash() {
        added_cash = added_products.reduce((sum, row) => sum + parseFloat(row.price), 0);
        $('#added-cash').empty();
        $('#added-cash').text('$ ' + added_cash.toFixed(2));
        change_due_cash = parseFloat(customer_cash) - parseFloat(added_cash);
        if (change_due_cash < 0) {
            $('#change-due-cash').css('color', 'red');
        } else {
            $('#change-due-cash').css('color', '#636b6f');
        }
        $('#change-due-cash').text('$ ' + change_due_cash.toFixed(2));
    }
})