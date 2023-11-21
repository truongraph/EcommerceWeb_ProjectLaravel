$(document).ready(function() {
    $('.add-to-cart').click(function(e) {
        e.preventDefault();

        var productid = $(this).data('product-id');
        var quantity = $('#quantity').val(); // Nếu bạn có trường input số lượng

        $.ajax({
            type: 'POST',
            url: '/cart/add',
            data: {
                product_id: productid,
                quantity: quantity
            },
            success: function(response) {
                alert(response.message); // Hoặc thực hiện các hành động khác như cập nhật giỏ hàng trên giao diện người dùng
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});


$(document).ready(function() {
    $('.remove-from-cart').click(function(e) {
        e.preventDefault();

        var rowId = $(this).data('row-id');

        $.ajax({
            type: 'DELETE',
            url: '/cart/remove',
            data: {
                row_id: rowId
            },
            success: function(response) {
                alert(response.message); // Hoặc thực hiện các hành động khác như cập nhật giỏ hàng trên giao diện người dùng
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});



$(document).ready(function() {
    $('.update-cart').click(function(e) {
        e.preventDefault();

        var rowId = $(this).data('row-id');
        var quantity = $(this).closest('tr').find('.quantity').val();

        $.ajax({
            type: 'PATCH',
            url: '/cart/update',
            data: {
                row_id: rowId,
                quantity: quantity
            },
            success: function(response) {
                alert(response.message); // Hoặc thực hiện các hành động khác như cập nhật giỏ hàng trên giao diện người dùng
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});
