<?php
include "../../Controller/orderList/merchantOrders/merchantOrderListController.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchant Orders</title>
  <link rel="icon" href="../resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <script src="../resources/lib/jquery3.6.0.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../resources/js/orderList/merchantOrder.js" defer></script>
    <script src="../resources/js/search/searchMerchantOrder.js" defer></script>
</head>
<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    /* For IE, Edge and Firefox */
    .scrollbar-hide {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    .table {
        border-spacing: 0 10px;
    }
</style>

<body class="font-roboto">
    <section class=" w-full bg-[#12141B] max-w-[1600px] mx-auto flex">
        <!-- Import side bar  -->
        <?php $menu = "orderList" ?>
        <?php $subMenu = "merchantOrder" ?>
        <?php include "../resources/common/adminSideBar.php" ?>

        <!-- Right-side Start -->
        <div class="h-screen overflow-hidden w-full">
            <!-- Search Start-->
            <div class="bg-[#262B3A] flex justify-between items-center py-3 px-10">
                <div class="text-white">
                    <p class="text-2xl font-semibold">Merchant Orders</p>
                    <?php
                    $timestamp = time();
                    date_default_timezone_set('Asia/Yangon');
                    $day = date('D');
                    $month = date('F');
                    $date = date('j');
                    $year = date('Y', $timestamp);
                    ?>
                    <p><?php echo "Date : $day, $month $date, $year" ?></p>
                </div>
                <input type="text" name="" id="searchMerchantOrder" class="w-[800px] py-2 px-5 rounded outline-none" placeholder="Search by merchant name">
            </div>
            <!-- Search End-->

            <!-- All Customers Data Start -->
            <div class="px-[53px] py-8 data-output">
                <!-- Table Start  -->
                <div class="flex justify-center min-h-screen relative">
                    <div class="col-span-12">
                        <div class="h-[600px] overflow-y-scroll scrollbar-hide">
                            <table class="table text-textBlack border-separate space-y-6 text-sm w-[1200px] overflow-y-scroll">
                                <thead class="bg-[#fffafa] text-textBlack ">
                                    <tr>
                                        <th class="px-3 py-6 text-center">Order ID</th>
                                        <th class="px-3 py-6 text-center">Merchant Name</th>
                                        <th class="px-3 py-6 text-center">Total Items</th>
                                        <th class="px-3 py-6 text-center">Total Amount</th>
                                        <th class="px-3 py-6 text-center">Payment Method</th>
                                        <th class="px-3 py-6 text-center">Payment Status</th>
                                        <th class="px-3 py-6 text-center">Order Date</th>
                                        <th class="px-3 py-6 text-center">Order Status</th>
                                        <th class="px-3 py-6 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="searchResult">
                                    <?php foreach ($merchantsOrderList as $order) { ?>
                                        <tr class="bg-[#fffafa]">
                                            <td class="p-3 text-center">
                                                <?= $order["id"] ?>
                                            </td>
                                            <td class="p-3 text-center">
                                                <?= $order["m_name"] ?>
                                            </td>
                                            <td class="p-3 text-center">
                                                <?php
                                                $totalQuantity = 0;
                                                foreach ($merchantsOrderDetail as $detail) {
                                                    if ($detail["order_id"] == $order["id"]) {
                                                        $qtyAsNumber = (int)$detail["qty"];
                                                        $totalQuantity += $qtyAsNumber;
                                                    }
                                                }
                                                echo $totalQuantity;
                                                ?>
                                            </td>
                                            <td class="p-3 text-center">
                                                <?= number_format($order["total_amt"]) ?> Ks
                                            </td>
                                            <td class="p-3 text-center">
                                                <?= $order["payment_method"] ?>
                                            </td>
                                            <td class="p-3 text-center">
                                                <?php
                                                if ($order["payment_status"] == 1) {
                                                    echo "Completed";
                                                } else if ($order["payment_status"] == 0) {
                                                    echo "Pending";
                                                }
                                                ?>
                                            </td>
                                            <td class="p-3 text-center">
                                                <?= $order["create_date"] ?>
                                            </td>
                                            <td class="p-3 text-center font-semibold">
                                                <?php
                                                if ($order["order_status"] == 0) {
                                                    echo "Pending";
                                                } else if ($order["order_status"] == 1) {
                                                    echo "Completed";
                                                }
                                                ?>
                                            </td>
                                            <td class="p-3 text-center space-x-2">
                                                <span id="<?= $order["id"] ?>" class="viewMerchantOrderDetail px-4 py-2 cursor-pointer bg-[#396C21] text-white rounded-md">View Detail</span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Table End  -->
            </div>
            <!-- All Customers Data End  -->
        </div>
        <!-- Right-side End -->
    </section>

    <!-- start of order detail modal box -->
    <div class="viewMerchantOrderDetailModal hidden fixed w-full h-full pt-12 bg-black bg-opacity-50 top-0">
        <!-- start of container box -->
        <div class="h-[80vh] flex justify-center items-center">
            <div class="bg-white m-auto p-2 border rounded-sm w-[80%] relative">
                <h2 class="text-2xl font-bold px-6 py-3 underline">Order Details</h2>
                <!-- start of all details -->
                <div class="flex justify-between items-start px-6 py-5">
                    <!-- start of order detail texts -->
                    <div>
                        <p class="mb-2 text-lg font-medium">Order Id: <span id="detailOrderId"></span></p>
                        <p class="mb-2 text-lg font-medium">Order Date: <span id="detailOrderDate"></span></p>
                        <p class="mb-2 text-lg font-medium">Order From: <span id="detailCustomerName"></span></p>
                        <p class="mb-2 text-lg font-medium">Order Status: <span id="detailOrderStatus"></span></p>
                        <p class="mb-2 text-lg font-medium">Payment Type: <span id="detailPaymentType"></span></p>
                        <p class="mb-2 text-lg font-medium">Payment Status: <span id="detailPaymentStatus"></span></p>
                        <p class="mb-2 text-lg font-medium">Delivery Address: <span id="detailCustomerAddress"></span></p>
                        <p class="text-lg font-medium">Customer Contact Info: <span id="detailCustomerPhone"></span></p>
                    </div>
                    <!-- end of order detail texts -->
                    <!-- start of order summary -->
                    <div class="w-[40%] h-[350px] overflow-y-scroll scrollbar-hide py-5 px-3 bg-[#E4E4D2]">
                        <p class="font-medium mb-5 text-lg">Order Summary</p>
                        <!-- start of products -->
                        <div class="flex justify-between items-center mb-5 text-lg">
                            <div id="productNameList">
                                
                            </div>
                            <div id="productItemList">
                                
                            </div>
                            <div id="productPriceList">
                                
                            </div>
                        </div>
                        <hr class="border border-dashed mb-3 border-gray-400">
                        <!-- end of products -->
                        <!-- start of prices -->
                        <div class="flex justify-between items-center text-lg">
                            <div>
                                <p class="mb-3">Sub-total</p>
                                <p>Delivery</p>
                            </div>
                            <div>
                                <p id="subTotal" class="mb-3"></p>
                                <p id="deliveryAmt"></p>
                            </div>
                        </div>
                        <hr class="border border-dashed mb-3 mt-3 border-gray-400">
                        <div class="flex justify-between items-center mt-5 text-lg">
                            <p>Grand Total</p>
                            <p id="totalPrice"></p>
                        </div>
                        <!-- end of prices -->
                    </div>
                    <!-- end of order summary -->
                </div>
                <!-- end of all details -->
                <div class="flex justify-center text-white mt-7">
                    <button type="button" id="closeDetailModal" class="bg-[#AC2E2E] px-6 py-1 rounded">Close</button>
                </div>
            </div>
        </div>
        <!-- end of container box -->
    </div>
    <!-- end of order detail modal box -->
</body>

</html>