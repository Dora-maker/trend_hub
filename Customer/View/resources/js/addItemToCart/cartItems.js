$(document).ready(function (){

    $(".cartItems").on("click", function(){
        const cartItems = localStorage.getItem("cartItems");
        const encodedCartItems = encodeURIComponent(cartItems);
        window.location.href = "../Controller/shoppingCartController.php?cartItems=" + encodedCartItems;
    })

    $("#cartItems").on("click", function(){
        const cartItems = localStorage.getItem("cartItems");
        const encodedCartItems = encodeURIComponent(cartItems);
        window.location.href = "../../Controller/shoppingCartController.php?cartItems=" + encodedCartItems;
    })

    
})
