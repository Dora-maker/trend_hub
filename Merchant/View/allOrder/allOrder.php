<?php
session_start();
if(!isset( $_SESSION["currentMerchantLogin"]) || $_SESSION["currentMerchantLogin"]==''){
    header("Location: ../../View/Error/error.php" );
}else{
if (isset($_SESSION["selectedOrder"])) {
    $order =  $_SESSION["selectedOrder"];
    $detail =  $_SESSION["orderDetails"];
};
if (isset($_SESSION["change"])) {
    $changes = $_SESSION["change"];
}
include "../../Controller/allOrder/orderDataShowController.php";
include "../../Controller/allOrder/allOrderShowcontroller.php";
if (isset($_SESSION["detailViewController"]) && ($_SESSION["detailViewController"] == false)) {
    $_SESSION["detailView"] = 0;
}
if (isset($_SESSION["changeStatusController"]) && ($_SESSION["changeStatusController"] == false)) {
    $_SESSION["changeStatus"] = 0;
}


}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
  <link rel="icon" href="../../View/resources/img/headerLogo.svg" type="image/icon type">
    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <script src="../resources/lib/jquery3.6.0.js"></script>
    <link rel="stylesheet" href="../resources/css/sideBar/sideBar.css">
    <script src="../resources/js/sideBar/sideBar.js" defer></script>
    <script src="../resources/js/allOrder/allOrder.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" ></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" ></script>
   
</head>
<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }


    .scrollbar-hide {
        -ms-overflow-style: none;
       
        scrollbar-width: none;
    }
</style>

<body>
    <section class="sectionContainer w-full flex relative">
        <!-- space for the main page to not move -->
        <div id="space" class="hidden w-20 h-screen p-2"></div>
        <!-- Left-side Categories Start-->
        <div id="sideBarContainer" class="bg-tertiary w-20 h-screen p-2 z-20">
            <!-- Merchant  -->
            <div class="flex justify-center mb-2 cursor-pointer"><img id="toggleSideBar" class="w-12 h-12 rounded-full shadow-lg border border-slate-200" src="../resources/img/sideBarImg/TH Logo 6.svg" alt=""></div>
            <h1 class="text-lg font-medium text-center hidden sideFull">Merchant's</h1>
            <h2 class="text-xl font-medium text-center hidden text-darkGreenColor sideFull">DASHBOARD</h2>

            <!-- Categories Start-->
            <div class="px-2 mt-5">
                <a href="../allProduct/allProduct.php">
                    <p class="hoverImg py-2 px-2 shadow-md flex justify-center bg-[#FBFBFB] bg-opacity-50 rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
                        <img id="allProductHover" src="../resources/img/sideBarImg/all product.png" alt="">
                        <span class="sideFull hidden ml-2">All Products</span>
                    </p>
                </a>
                <a href="../productSubmission/productSubmission.php">
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-[#FBFBFB] bg-opacity-50 rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
                        <img id="productSubmitHover" src="../resources/img/sideBarImg/product submission.png" alt="">
                        <span class="sideFull hidden ml-2">Product Submission</span>
                    </p>
                </a>
                <a href="../allOrder/allOrder.php">
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-darkGreenColor text-white rounded-md cursor-pointer">
                        <img id="allOrderHover" src="../resources/img/sideBarImg/all order hover.png" alt="">
                        <span class="sideFull hidden ml-2">All Orders</span>
                    </p>
                </a>
                <a href="../review/productReview.php">
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-[#FBFBFB] bg-opacity-50 rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
                        <img id="reviewHover" src="../resources/img/sideBarImg/review.png" alt="">
                        <span class="sideFull hidden ml-2">Customer Reviews</span>
                    </p>
                </a>
                <a href="../contactAdmin/contactAdmin.php">
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-[#FBFBFB] bg-opacity-50 rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
                        <img id="contactHover" src="../resources/img/sideBarImg/contact.png" alt="">
                        <span class="sideFull hidden ml-2">Contact Admin</span>
                    </p>
                </a>
                <a href="../Financials/earningOverview.php">
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-[#FBFBFB] bg-opacity-50 rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
                        <img id="financialHover" src="../resources/img/sideBarImg/financial.png" alt="">
                        <span class="sideFull hidden ml-2">Financials & Payment</span>
                    </p>
                </a>
                <a href="../Notification/notification.php">
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-[#FBFBFB] bg-opacity-50 rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
                        <img id="notiHover" src="../resources/img/sideBarImg/notification.png" alt="">
                        <span class="sideFull hidden ml-2">Notifications</span>
                    </p>
                </a>
                <a href="../ProfileEdit/profile.php">
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-[#FBFBFB] bg-opacity-50 rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
                        <img id="editProfileHover" src="../resources/img/sideBarImg/edit profile.png" alt="">
                        <span class="sideFull hidden ml-2">Edit Profile</span>
                    </p>
                </a>
                <p id="logoutBtn" class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-[#FBFBFB] bg-opacity-50 rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
                    <img id="logOutHover" src="../resources/img/sideBarImg/logout.png" alt="">
                    <span class="sideFull hidden ml-2">Log Out</span>
                </p>
            </div>
            <!-- Categories End-->
        </div>
        <!-- Left-side Categories End-->
        <!-- Logout Confirmation Modal -->
        <div id="logoutModal" class="hidden fixed w-full h-full pt-64 bg-black bg-opacity-50 z-20">
            <div class="bg-white m-auto p-2 border rounded-sm w-[30%]">
                <h2 class="text-xl font-bold mb-4 ">Logout</h2>
                <hr>
                <div class="p-3">
                    <p class="mb-10">Are you sure you want to log out?</p>
                    <div class="mt-4 flex justify-around space-x-4">
                    <a href="../../Controller/logOutController.php">
                            <button id="confirmLogout" class="bg-secondary text-white font-semibold py-2 px-6 rounded focus:outline-none focus:ring focus:ring-red-300"> Confirm </button></a>
                        <button id="cancelLogout" class="bg-primary border border-secondary text-secondary font-semibold py-2 px-6 rounded focus:outline-none focus:ring focus:ring-blue-300">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- start of order detail modal box -->
        <?php if (isset($_SESSION["detailView"]) && ($_SESSION["detailView"] == 1)) { ?>

            <div class="viewOrderDetailModal fixed w-full h-full pt-12 bg-black bg-opacity-50 z-20 ">
                <!-- start of container box -->

                <div class="bg-white m-auto p-2 border rounded-sm w-[80%] relative">
                    <div class="closeViewOrderDetailModal text-4xl font-bold absolute right-8 top-5 cursor-pointer"><ion-icon name="close-outline"></ion-icon></div>
                    <h2 class="text-2xl font-bold px-6 py-3">Order Details</h2>
                    <!-- start of all details -->
                    <div class="flex justify-between items-center px-5 py-6">
                        <!-- start of order detail texts -->
                        <div>
                            <p class="mb-2 text-lg font-medium">Order Id: <span><?= $order[0]["id"] ?></span></p>
                            <p class="mb-2 text-lg font-medium">Order Date: <span><?php

                                                                                    $dateString = $order[0]["create_date"];
                                                                                    $timestamp = strtotime($dateString);
                                                                                    $formattedDate = date("Y/m/d", $timestamp);

                                                                                    echo $formattedDate;
                                                                                    ?></span></p>
                            <p class="mb-2 text-lg font-medium">Order From: <span><?= $order[0]["c_name"] ?></span></p>
                            <p class="mb-2 text-lg font-medium">Order Status: <span><?php

                                                                                    if ($order[0]['order_status'] == 0) {
                                                                                        echo "Pending";
                                                                                    } elseif ($order[0]['order_status'] == 1) {
                                                                                        echo "Delivered";
                                                                                    } else {
                                                                                        // Handle other cases if needed
                                                                                        echo "Unknown";
                                                                                    }
                                                                                    ?></span></p>
                            <p class="mb-2 text-lg font-medium">Payment Type: <span><?= $order[0]["payment_method"] ?></span></p>
                            <p class="mb-2 text-lg font-medium">Payment Status: <span>
                                    <?php

                                    $paymentMethodId = $order[0]["payment_method_id"];
                                    $paymentStatus = '';

                                    if ($paymentMethodId == 1 || $paymentMethodId == 2) {
                                        $paymentStatus = "Completed";
                                    } elseif ($paymentMethodId == 3) {
                                        $paymentStatus = "Delivered";
                                    }
                                    echo $paymentStatus;
                                    ?>
                                </span></p>
                            <p class="mb-2 text-lg font-medium">Delivery Address: <span><?= $order[0]["address"] ?></span></p>
                            <p class="text-lg font-medium">Customer Contact Info: <span><?= $order[0]["c_phone"] ?></span></p>
                        </div>
                        <!-- end of order detail texts -->
                        <!-- start of order summary -->
                        <div class="w-[40%] h-60 overflow-y-scroll py-5 px-3 bg-[#E4E4D2]">
                            <p class="font-medium mb-5 text-lg">Order Summary</p>
                            <!-- start of products -->
                            <div class="flex justify-between items-center mb-5 text-lg">



                                <div>
                                    <?php
                                    $totalItems = ""; // Initialize a variable to store the total product items
                                    foreach ($detail as $detailItem) {
                                        if ($detailItem['order_id'] === $order[0]['id']) {
                                            // Append each product name to the $totalItems variable
                                            $totalItems .= "<p class='mb-3'>" . $detailItem['p_name'] . "</p>";
                                        }
                                    }
                                    echo $totalItems;
                                    ?>

                                </div>
                                <div>
                                    <?php
                                    $totalItemsQty = ""; // Initialize a variable to store the total product items
                                    foreach ($detail as $detailItem) {
                                        if ($detailItem['order_id'] === $order[0]['id']) {
                                            // Append each product name to the $totalItems variable
                                            $totalItemsQty .= "<p class='mb-3'>" . $detailItem['qty'] . "</p>";
                                        }
                                    }
                                    echo $totalItemsQty;
                                    ?>


                                </div>
                                <div>
                                    <?php
                                    $subTotal = 0;
                                    $itemsPrice = ""; // Initialize a variable to store the total product items
                                    foreach ($detail as $detailItem) {
                                        if ($detailItem['order_id'] === $order[0]['id']) {
                                            // Append each product name to the $totalItems variable
                                            $itemsPrice .= "<p class='mb-3'>" . number_format($detailItem['sell_price'], 2) . " Ks" . "</p>";
                                            $subTotal += $detailItem['sell_price'];
                                        }
                                    }
                                    echo $itemsPrice;
                                    ?>

                                </div>
                            </div>
                            <hr class="border border-dashed mb-3 border-gray-400">
                            <!-- end of products -->
                            <!-- start of prices -->
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="mb-3">Sub-total</p>
                                    <p>Delivery</p>
                                </div>
                                <div>
                                    <p class="mb-3"><?= number_format($subTotal, 2) . " Ks"   ?></p>
                                    <p><?= number_format($order[0]["delivery_fee"], 2) . " Ks"  ?></p>
                                </div>
                            </div>
                            <hr class="border border-dashed mb-3 mt-3 border-gray-400">
                            <div class="flex justify-between items-center mt-5">
                                <p>Grand Total</p>
                                <?php
                                $grandTotal = number_format(($order[0]["delivery_fee"] + $subTotal), 2) . " Ks";
                                ?>

                                <p><?= $grandTotal ?></p>
                            </div>
                            <!-- end of prices -->
                        </div>
                        <!-- end of order summary -->
                    </div>
                    <!-- end of all details -->
                </div>
                <!-- end of container box -->
            </div>
            </div>
        <?php  } ?>
        <!-- end of order detail modal box -->

        <!-- start of order status change modal box -->
        <?php if (isset($_SESSION["changeStatus"]) && ($_SESSION["changeStatus"] == 1)) { ?>
            <div class="changeStatusModal fixed w-full h-full pt-12 bg-black bg-opacity-50 z-20">
                <form action="../../Controller/allOrder/updateChangeController.php" method="post">
                    <!-- start of container box -->
                    <div class="bg-white m-auto p-2 border rounded-sm w-[40%] relative">
                        <div class="closeChangeStatusModal text-4xl font-bold absolute right-8 top-5 cursor-pointer"><ion-icon name="close-outline"></ion-icon></div>
                        <h2 class="text-2xl font-bold px-6 py-3">Change Order Status</h2>
                        <div class="px-8 py-3">
                            <p class="mb-2 text-lg font-medium">Order Id: <span name=""><?= $changes[0]["id"] ?></span></p>
                            <h1 class="font-semibold mt-5 hidden"><input id="" name="order_id" value="<?= $changes[0]["id"] ?>" class="w-[240px] font-normal ml-[13px] outline-none" readonly></input></h1>
                            <p class="mb-2 text-lg font-medium">Order Date: <span>
                                    <?php

                                    $dateString = $changes[0]["create_date"];
                                    $timestamp = strtotime($dateString);
                                    $formattedDate = date("Y/m/d", $timestamp);

                                    echo $formattedDate;
                                    ?>
                                </span></p>
                            <p class="mb-2 text-lg font-medium">Order From: <span><?= $changes[0]["c_name"] ?></span></p>
                            <span class="mr-2 font-bold text-xl">Order Status: </span>

                            <select id="order" class="border border-darkGreenColor p-2 font-medium" <?php if ($changes[0]['order_status'] == 1) echo 'disabled'; ?>>
                                <option value="Pending" <?php if ($changes[0]['order_status'] == 0) echo 'selected'; ?>>Pending</option>
                                <option value="Completed" <?php if ($changes[0]['order_status'] == 1) echo 'selected'; ?>>Completed</option>

                            </select>
                            <?php
                            $status = "";
                            if ($changes[0]['order_status'] == 0) {
                                $status = "Pending";
                            } else {
                                $status = "Completed";
                            }

                            ?>
                            <h1 class="font-semibold mt-5 hidden"><input id="orderInput" name="orderStatus" value="<?= $status ?>" class="w-[240px] font-normal ml-[13px] outline-none" readonly></input></h1>

                            <?php if ($changes[0]['payment_method_id'] == 3) { ?>
                                <div class="py-5">
                                    <span class="mr-2 font-bold text-xl">Payment Status: </span>
                                    <select id="payment" class="border border-darkGreenColor p-2 font-medium" <?php if ($changes[0]['payment_status'] == 1) echo 'disabled'; ?>>
                                        <option value="Pending" <?php if ($changes[0]['payment_status'] == 0) echo 'selected'; ?>>Pending</option>
                                        <option value="Completed" <?php if ($changes[0]['payment_status'] == 1) echo 'selected'; ?>>Completed</option>
                                    </select>
                                    <?php
                                    $payStatus = "";
                                    if ($changes[0]['payment_status'] == 0) {
                                        $payStatus = "Pending";
                                    } else {
                                        $payStatus = "Completed";
                                    }

                                    ?>
                                    <h1 class="font-semibold mt-5 hidden"><input id="pay" name="paymentStatus" value="<?= $payStatus ?>" class="w-[240px] font-normal ml-[13px] outline-none" readonly></input></h1>
                                </div>
                            <?php } ?>

                        </div>
                        <div class="flex justify-center items-center mb-10">
                            <?php if ($changes[0]['order_status'] == 0) { ?>
                                <button type="submit" name="changeStatus" class="closeChangeStatusModal py-2 px-4 mt-4 bg-secondary text-white font-semibold rounded-md shadow-md">Confirm Change</button>
                            <?php }  ?>
                        </div>
                    </div>
                </form>
                <!-- end of container box -->
            </div>
        <?php  }  ?>
        <!-- end of order status change modal box -->

        <!-- Right-side Start -->
        <div class="mainPage h-screen overflow-hidden w-full p-3">
            <h1 class="text-darkGreenColor text-3xl font-bold mb-5">All Orders List</h1>
            <!-- Total Display -->
            <div class="text-white flex justify-between p-5 mb-5">
                <div class="bg-secondary w-40 h-20 py-2 text-center rounded flex flex-col justify-between">
                    <p>Total Orders</p>
                    <p class="text-xl"><?= $totalOrders[0]['total_order'] ?></p>
                </div>

                <div class="bg-secondary w-40 h-20 py-2 text-center rounded flex flex-col justify-between">
                    <p>Total Revenue</p>
                    <p class="text-xl"><?= $earningFromCustomer[0]['earning']?> Ks</p>
                </div>

                <div class="bg-secondary w-40 h-20 py-2 text-center rounded flex flex-col justify-between">
                    <p>Total Pending</p>
                    <p class="text-xl"><?=$totalPending[0]['total_pending']?> </p>
                </div>

                <div class="bg-secondary w-40 h-20 py-2 text-center rounded flex flex-col justify-between">
                    <p>Total Completed</p>
                    <p class="text-xl"><?= $totalComplete[0]['total_complete']?></p>
                </div>
            </div>

            <!-- start of search button and select box -->
            <div class="flex justify-between items-center p-2">

                <!-- end of search button -->
              
                <!-- start of select box -->
                <!-- <div  date-rangepicker>
                    <label class="mr-2 font-medium">Sort By:</label>
                    <select  id="orderDropdown" name="allOrderTableSort" class="border border-darkGreenColor p-2 font-medium">
                        <option class="p-2" value="pending">Pending</option>
                        <option class="p-2" value="completed">Completed</option>
                    </select>
                </div> -->
                <!-- end of select box -->
            
            </div>
            <!-- end of search button and select box -->

            <!-- Start of order table -->
            <table class="table-fixed overflow-y-scroll scrollbar-hide  mt-10 w-full">

                <thead class="bg-darkGreenColor text-white font-semibold text-lg">
                    <tr>
                        <th class="p-2 w-20">Order Id</th>
                        <th class="p-2 w-40">Customer</th>
                        <th class="p-2 w-20">Total Items</th>
                        <th class="p-2 w-32">Total Amount</th>
                        <th class="p-2 w-32">Payment Type</th>
                        <th class="p-2 w-32">Order Date</th>
                        <th class="p-2 w-32">Order Status</th>
                        <th class="p-2 w-32">Action</th>
                    </tr>
                </thead>
                <tbody id="sortResult">
                    <?php
                    $counter = 0;
                    foreach ($orderPaymentInfo as $order) :
                        $counter++;
                        $rowClass = ($counter % 2 === 0) ? 'bg-gray-200' : '';
                    ?>
                        <tr class="orderList <?= $rowClass ?>">
                            <td class="viewOrderDetailBtn p-2 text-xl  text-center underline font-bold cursor-pointer"><a href="../../Controller/allOrder/detailViewController.php?id=<?= $order['id'] ?>">
                                    <?= $order['id']; ?></a></td>
                            <td class="p-2 text-center"><?= $order['c_name']; ?></td>
                            <td class="p-2 text-center">
                                <?php
                                $totalQuantity = 0; // Initialize a variable to store the total quantity
                                foreach ($orderDetailsInfo as $detail) {
                                    if ($detail['order_id'] === $order['id']) {
                                        $qtyAsNumber = (int)$detail['qty'];

                                        $totalQuantity += $qtyAsNumber; // Add the quantity to the total
                                    }
                                }
                                echo $totalQuantity;
                                ?>
                            </td>
                            
                            <td class="p-2 text-center"><?= $order['total_amt']; ?> Ks</td>
                            <td class="p-2 text-center"><?= $order['payment_method']; ?></td>
                            <td class="p-2 text-center">
                                <?= date('Y/m/d', strtotime($order['create_date'])); ?>
                            </td>
                            <td class="p-2 text-center">
                                <?php

                                if ($order['order_status'] == 0) {
                                    echo "Pending";
                                } elseif ($order['order_status'] == 1) {
                                    echo "Completed";
                                } else {
                                    // Handle other cases if needed
                                    echo "Unknown";
                                }
                                ?>
                            </td>
                            <td class="changeStatusBtn p-2 text-center underline font-semibold cursor-pointer">
                                <a href="../../Controller/allOrder/changeStatusController.php?id=<?= $order["id"] ?>">
                                    Change Status
                                </a>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>

            </table>
            <!-- End of order table -->
        </div>
        <!-- Right-side End -->
    </section>
    

<script>

$(document).ready(function () {
    
    $("#logoutBtn").click(function () {
    $("#logoutModal").toggle();
  });

  $("#confirmLogout").click(function () {
    $("#logoutModal").toggle();
  });
   
  $("#cancelLogout").click(function () {
    $("#logoutModal").toggle();
  });

  $("#order").change(function () {
    $("#orderInput").val($("#order").val());
    $("#payment").val($("#order").val());
    $("#pay").val($("#payment").val());
  });
  $("#payment").change(function () {
    $("#pay").val($("#payment").val());
    $("#order").val($("#payment").val());
    $("#orderInput").val($("#order").val());
  });
});



//      $("#orderDropdown").change(function () {
   
//     $.ajax({
//       url: "../../Controller/allOrder/sortOrderController.php",
//       type: "POST",
//       data: {
//         sortText: $(this).val(),
//       },
//       success: function (result) {

//         let arrays = JSON.parse(result);

//         $("#sortResult").empty();
//         let orderPaymentInfo= arrays[0];
//         let orderDetailsInfo = arrays[1];
//         let counter = 0;
//         let count = 1;
//         for (const order of  orderPaymentInfo) {
//           let paymentStatus = (order.payment_status == 0) ? "Pending" : "Completed";
//           let orderStatus = order.order_status == 0 ? "Pending" : "Completed";
//           let orderDate = moment(order.create_date).format('YYYY/MM/DD');
         
//           counter ++;
//           let rowClass = (counter % 2 === 0) ? 'bg-gray-200' : 'bg-white';
//           let totalQuantity = 0; // Initialize a variable to store the total quantity
//           for (const detail of orderDetailsInfo) {
//             if (detail.order_id === order.id) {
//               let qtyAsNumber = detail.qty;
//               totalQuantity += qtyAsNumber; // Add the quantity to the total
//             }
//         }
       
//         $("#sortResult").append(
//             `<tr class="orderList ${rowClass}">
//                             <td class="viewOrderDetailBtn p-2 text-xl  text-center underline font-bold cursor-pointer"><a href="../../Controller/allOrder/detailViewController.php?id=${order.id}">
//                             ${count++}</a></td>
//                             <td class="p-2 text-center">${order.c_name}</td>
//                             <td class="p-2 text-center">${totalQuantity}</td>
//                             <td class="p-2 text-center">${order.total_amt} Ks</td>
//                             <td class="p-2 text-center">${order.payment_method}</td>
//                             <td class="p-2 text-center">${orderDate}</td>
                            
//                             <td class="p-2 text-center">${paymentStatus}</td>
//                             <td class="changeStatusBtn p-2 text-center underline font-semibold cursor-pointer">
//                                 <a href="../../Controller/allOrder/changeStatusController.php?id=${order.id}">
//                                     Change Status
//                                 </a>

//                             </td>
//                         </tr>`
//           );
//         }
//       },
//       error: function (error) {
//         console.log(error);
//       },
//     });
//   });
  
</script>

</body>

</html>
<?php
$_SESSION["detailViewController"] = false;
$_SESSION["changeStatusController"] = false;
$_SESSION["changedropDownController"] = false;

?>
