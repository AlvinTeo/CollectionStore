$(document).ready(function () {
    $(".removebutton").click(function (e) {
        e.preventDefault();
        var product_id = $(this).prev().val();
        $.ajax({
            url: "./delete_product.php",
            type: "post",
            data: {
                product_id: product_id
            },
            success: function (data) {
//                window.location.href='./shoppingbag.php';
                $("#messageDisplay").html("Item deleted successfully");
                $("#table").html(data);
            },
            error: function () {
                $("#messageDisplay").html("Error with ajax");
            }
        });
    });
});
