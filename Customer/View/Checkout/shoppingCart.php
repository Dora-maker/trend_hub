<?php

session_start();

if (isset($_SESSION["cartItemsDetails"])) $cartItemsDetails = $_SESSION["cartItemsDetails"];
if (isset($_SESSION["cartItems"])) $cartItems = $_SESSION["cartItems"];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="icon" href="../resources/img/header/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../resources/lib/jquery3.6.0.js"></script>
    <script>
        // Detect page refresh
        if (performance.navigation.type === 1) {
            // Redirect to controller.php
            const cartItems = localStorage.getItem("cartItems");
            const encodedCartItems = encodeURIComponent(cartItems);
            window.location.href = "../../Controller/shoppingCartController.php?cartItems=" + encodedCartItems;

        }
    </script>
    <style>
        .cart_item {
            display: none;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<?php
include "../../Controller/uiElement/editInfoController.php";
$primaryColor = isset($editInfo[0]["primary_color"]) && !empty($editInfo[0]["primary_color"]) ? $editInfo[0]["primary_color"] : '#FAFAFA';
$tertiaryColor = isset($editInfo[0]["tertiary_color"]) && !empty($editInfo[0]["tertiary_color"]) ? $editInfo[0]["tertiary_color"] : '#F36823';
$startTime = isset($editInfo[0]["h1_color"]) && !empty($editInfo[0]["h1_color"]) ? $editInfo[0]["h1_color"] : '00:00';
$endTime = isset($editInfo[0]["h2_color"]) && !empty($editInfo[0]["h2_color"]) ? $editInfo[0]["h2_color"] : '00:00';
$cardColor = isset($editInfo[0]["price_card_color"]) && !empty($editInfo[0]["price_card_color"]) ? $editInfo[0]["price_card_color"] : '#ffffff';
$buttonColor = isset($editInfo[0]["buy_button_color"]) && !empty($editInfo[0]["buy_button_color"]) ? $editInfo[0]["buy_button_color"] : '#F36823';
$priceColor = isset($editInfo[0]["price_text_color"]) && !empty($editInfo[0]["price_text_color"]) ? $editInfo[0]["price_text_color"] : '#F36823';
$titleColor = isset($editText[0]["title_color"]) && !empty($editText[0]["title_color"]) ? $editText[0]["title_color"] : '#000000';
date_default_timezone_set('Asia/Yangon');
$currentHour = date('H:i');
?>
<style>
    .scrollHide::-webkit-scrollbar {
        display: none;
    }
</style>

<?php
include "../resources/common/navbar.php";

?>

<body class="
    bg-[<?php

        if ($startTime > $endTime) {
            if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                echo "#000000";
            } else {
                echo $primaryColor;
            }
        } else {
            if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                echo "#000000";
            } else {
                echo $primaryColor;
            }
        }



        ?>] font-roboto scrollHide">


    <p class="px-5 py-4 mt-32 md:px-10 md:pt-8 font-bold text-xl 
    text-[<?php

            if ($startTime > $endTime) {
                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                    echo "#ffffff";
                } else {
                    echo "#c0c0c0";
                }
            } else {
                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                    echo "#ffffff";
                } else {
                    echo "#c0c0c0";
                }
            }



            ?>]">Items in cart</p>
    <div class="md:p-10 min-h-[250px]">
        <!--start of container -->
        <div class="px-4 py-4 
    bg-[<?php

        if ($startTime > $endTime) {
            if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                echo "#3d3d3d";
            } else {
                echo $primaryColor;
            }
        } else {
            if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                echo "#3d3d3d";
            } else {
                echo $primaryColor;
            }
        }



        ?>] shadow-md">
            <div id="noItem" class="<?= (count($_SESSION["cartItemsDetails"]) == 0) ? "block" : "hidden" ?> text-2xl text-center font-bold
    text-[<?php if ($startTime > $endTime) {
                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                    echo "#ffffff";
                } else {
                    echo $navColor;
                }
            } else {
                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                    echo "#ffffff";
                } else {
                    echo $navColor;
                }
            } ?>]

            ">No items yet!</div>
            <!-- start of product and summary container -->
            <div class="md:flex md:justify-between">
                <!--start of products card container -->
                <div class="md:w-[70%]">
                    <!-- start of cards -->
                    <?php if (isset($_SESSION["cartItemsDetails"])) {
                        foreach ($cartItemsDetails as $itemDetail) { ?>
                            <?php 
                            if (isset($_SESSION["noStock".$itemDetail["id"]])) { ?>
                                <small class=" text-red-400"><?= $_SESSION["noStock".$itemDetail["id"]] ?></small>
                            <?php unset($_SESSION["noStock".$itemDetail["id"]]);}
                            ?>
                            <div class="itemCard relative bg-white shadow-md mb-5 mt-0 p-4 flex justify-evenly">
                                <div class="flex items-center">
                                    <img class=" w-16" src="../../..<?= $itemDetail["p_path"] ?>" alt="">
                                </div>
                                <div class="ml-5 md:flex md:items-center">
                                    <p class="pName pb-3 w-48 break-words md:ml-3"><?= $itemDetail["p_name"] ?></p>
                                    <?php
                                    foreach ($cartItems as $cartItem) {
                                        if ($cartItem["productID"] == $itemDetail["id"]) $price =  $cartItem["qty"] * $itemDetail["sell_price"];
                                    }
                                    ?>
                                    <p class="pPrice mobilePrice pt-3 pb-3 w-48 break-words md:hidden"><?= number_format($price) ?>Ks</p>
                                    <div class="font-semibold pt-1 md:ml-3">
                                        <?php
                                        foreach ($cartItems as $cartItem) {
                                            if ($cartItem["productID"] == $itemDetail["id"]) $value =  $cartItem["qty"];
                                        }
                                        ?>
                                        <button pricePerItem="<?= $itemDetail["sell_price"] ?>" productId="<?= $itemDetail["id"] ?>" class="minusBtn cursor-pointer mr-1 px-1 bg-productCardBgColor font-semibold rounded-md bg-opacity-50">-</button>
                                        <input type="number" name="qty" value="<?= $value ?>" class="quantityInput text-xl text-center w-10 py-1 rounded-md bg-productCardBgColor" readonly>
                                        <button pricePerItem="<?= $itemDetail["sell_price"] ?>" productId="<?= $itemDetail["id"] ?>" class="plusBtn cursor-pointer ml-1 px-1 font-semibold text-center bg-productCardBgColor rounded-md">+</button>
                                    </div>
                                    <p id="desktopPrice" class="desktopPrice pt-3 pb-3 w-48 break-words hidden md:block md:ml-16"><?= number_format($price) ?> Ks</p>
                                    <div><img id="<?= $itemDetail["id"] ?>" class="dTrashImg hidden md:block w-7 cursor-pointer" src="../resources/img/shoppingCart/Trash.svg" alt=""></div>
                                </div>
                                <img class="mTrashImg md:hidden w-7 absolute right-3 bottom-3 cursor-pointer" src="../resources/img/shoppingCart/Trash.svg" alt="">
                            </div>
                    <?php }
                    } ?>

                    <!-- end of cards -->

                </div>
                <!--end of products card container -->

                <!-- start of order summary container -->
                <div id="orderCard" class="md:w-[28%] <?= (count($_SESSION["cartItemsDetails"]) == 0) ? "hidden" : "block" ?>">
                    <!-- start of order summary card -->
                    <div class="p-4 m-5 
    bg-[<?php

        if ($startTime > $endTime) {
            if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                echo "#4f4f4f";
            } else {
                echo $secondaryColor;
            }
        } else {
            if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                echo "#4f4f4f";
            } else {
                echo $secondaryColor;
            }
        }



        ?>] text-lg md:text-xl">
                        <p class="hidden font-medium 
    text-[<?php

            if ($startTime > $endTime) {
                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                    echo "#ffffff";
                } else {
                    echo $navColor;
                }
            } else {
                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                    echo "#ffffff";
                } else {
                    echo $navColor;
                }
            }



            ?>] mb-5 text-lg md:block">Order Summary</p>
                        <!-- start of prices -->
                        <div class="flex justify-between items-center mb-5 
    text-[<?php

            if ($startTime > $endTime) {
                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                    echo "#ffffff";
                } else {
                    echo $navColor;
                }
            } else {
                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                    echo "#ffffff";
                } else {
                    echo $navColor;
                }
            }



            ?>]">
                            <div>
                                <p class="mb-3">Sub-total</p>
                            </div>
                            <div>
                                <p class="mb-3 subTotal"></p>
                            </div>
                        </div>
                        <input id="hiddenSubTotal" type="hidden" name="subTotal">
                        <p class=" text-base">Delivery fee will be added in the checkout.</p>
                        <hr class="border border-dashed border-gray-400 mt-2">
                        <div class="flex justify-between items-center mt-5 
    text-[<?php

            if ($startTime > $endTime) {
                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                    echo "#ffffff";
                } else {
                    echo $navColor;
                }
            } else {
                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                    echo "#ffffff";
                } else {
                    echo $navColor;
                }
            }



            ?>] ">
                            <p>Grand Total</p>
                            <p class="totalPrice">$880</p>
                        </div>
                        <!-- end of prices -->
                        <div class="flex justify-center mt-6 mb-4">
                            <button class="proceedCheckout
    bg-[<?php

        if ($startTime > $endTime) {
            if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                echo "#000000";
            } else {
                echo $buttonColor;
            }
        } else {
            if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                echo "#000000";
            } else {
                echo $buttonColor;
            }
        }



        ?>] rounded-md px-8 py-2 
    text-[<?php

            if ($startTime > $endTime) {
                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                    echo "#ffffff";
                } else {
                    echo $buttonText;
                }
            } else {
                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                    echo "#ffffff";
                } else {
                    echo $buttonText;
                }
            }



            ?>]" name="checkout">Proceed to Checkout</button>
                        </div>
                    </div>
                    <!-- end of order summary card -->
                </div>
                <!-- end of order summary container -->
            </div>
            <!-- end of product and summary container -->
            <div id="totalItem" class="md:<?= (count($_SESSION["cartItemsDetails"]) == 0) ? "hidden" : "block" ?> md:font-bold text-[#c0c0c0] md:p-4 md:text-lg md:w-[70%] md:text-right ">
                Total: <span class="itemAmount"><?=
                                                (isset($_SESSION["cartItems"])) ? count($_SESSION["cartItems"]) : 0;
                                                ?></span> items
            </div>
        </div>
        <!--end of container -->
    </div>

    <script src="../resources/js/addItemToCart/removeFromCart.js"></script>
    <script>
        $(".proceedCheckout").on("click", function() {
            const cartItems = localStorage.getItem("cartItems");
            const encodedCartItems = encodeURIComponent(cartItems);
            const subTotal = $(".subTotal").text();
            window.location.href = "../../Controller/checkProductQtyController.php?cartItems=" + encodedCartItems + "&subTotal=" + subTotal;
        })
    </script>
</body>
<?php include "../resources/common/footer.php"
?>

</html>