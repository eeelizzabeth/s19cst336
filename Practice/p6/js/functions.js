// JavaScript File

$("document").ready(getRandomProduct);
$("#promocode").on("change", checkPromoCode);


function getRandomProduct() {
    $.ajax({
        type: "GET",
        url: "api/getRandomProduct.php",
        dataType : "json",
        data: {
            
        },
        success: function(data, status) {
          console.log("success");  
            name = data["product"];
            price = data["price"];
            quantity = data["qty"];
            $("#product-name").html(name);
            $("#product-price").html(price);
            $("#product-quantity").val(quantity);
            
            $("#product-total").html("$" + price * quantity);
            console.log(data);
            
            
        },
        complete: function(data, status) {
            
        }
    })
}

function checkPromoCode() {
    promocode = $("#promocode").val();
    
    $.ajax({
        type: "GET",
        url: "api/applyPromoCode.php",
        dataType : "json",
        data: {
            "promocode": promocode
        },
        success: function(data, status) {
            console.log("success");
            console.log(data);
            
            price = $("#total").html();
            price = parseInt(price);
            
            discount = data["promocode"]
            discount = parseFloat(discount);
            
            $("#discount").html(price * discount);
            
        },
        complete: function(data, status) {
            console.log(data);
        }
    })
}