$(document).ready(function () {
    $(".removebutton").click(function (e) {
        e.preventDefault();
        var product_id = $(this).siblings("#product_id").val();
        var member_id = $(this).prev().val();
        
        $.ajax({
            url: "./delete_product2.php",
            type: "post",
            data: {
                product_id: product_id,
                member_id: member_id
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
