$(document).ready(() => {
    $(".wishlistAdd").click(() => {
        //if logged in can do wishlist
        if ($(".logged_in").length > 0) {
            var productId = $(".wishlistAdd").attr("w_pId");
            console.log(productId);
            const encodedId = encodeURIComponent(productId);
            //var $heartBtn = $(".wishlistAdd[w_productId='" + productId + "']");
            if ($("#heartIcon").hasClass("text-textOrange") && $("#wishListText").text("Added to Wishlist")) {
                //remove wishlist
                $.ajax({
                    url: "../../Controller/homePage/wishlistRemoveController.php",
                    type: "POST",
                    data: {
                        productID: productId
                    },
                    success: function (result) {
                        console.log(result);
                        $("#heartIcon").addClass("text-gray-400");
                        $("#heartIcon").removeClass("text-textOrange");
                        $("#wishListText").text("Add to Wishlist");
                        $("#wishListText").removeClass("text-textOrange");
                        window.location.href = "../../Controller/itemDetailController.php?productId=" + encodedId;
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
            } else {
                // //add wishlist
                $.ajax({
                    url: "../../Controller/homePage/wishlistAddController.php",
                    type: "POST",
                    data: {
                        productID: productId
                    },
                    success: function (result) {
                        console.log(result);
                        $("#heartIcon").removeClass("text-gray-400");
                        $("#heartIcon").addClass("text-textOrange");
                        $("#wishListText").text("Added to Wishlist");
                        $("#wishListText").addClass("text-textOrange");
                        window.location.href = "../../Controller/itemDetailController.php?productId=" + encodedId;
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
            }
        } else {
            //window alert on log in
            window.alert("You must log in to add");
        }
    });
});

