<?php
include "../../Controller/customersList/customersListController.php";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Orders</title>
  <link rel="icon" href="../resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <!-- google font link -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <script src="../resources/lib/jquery3.6.0.js"></script>
    <script src="../resources/js/dropDown/drop_downCustomer.js" defer></script>
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
    <section class="w-full bg-[#12141B] max-w-[1600px] mx-auto flex">
        <!-- Import side bar  -->
        <?php $menu = "customersList" ?>
        <?php $subMenu = "totalOrders" ?>
        <?php include "../resources/common/adminSideBar.php" ?>

        <!-- Right-side Start -->
        <div class="h-screen overflow-hidden w-full">
            <!-- Search Start-->
            <div class="bg-[#262B3A] flex justify-between items-center py-3 px-10">
                <div class="text-white">
                    <p class="text-2xl font-semibold">Total Orders</p>
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

                <!-- <input type="text" name="" id="searchTotalOrders" class="w-[800px] py-2 px-5 rounded outline-none" placeholder="Search by name"> -->
            </div>
            <!-- Search End-->


            <!-- All Customers Data Start -->
            <div class="px-[53px] py-8">
                <!-- Sort Start  -->
                <div class="flex items-center justify-end space-x-2 mb-2">
                    <span class="text-white">Sort by:</span>
                    <select name="" id="dropDownTotalOrders" class="outline-none rounded py-1 px-3">
                        <option value="Name">Name</option>
                        <option value="Des Name">Des Name</option>
                        <option value="Total Amount">Total Amount</option>
                        <option value="Des Total Amount">Des Total Amount</option>
                        <option value="Order Times">Order Times</option>
                        <option value="Des Order Times">Des Order Times</option>
                    </select>
                </div>
                <!-- Sort END  -->

                <!-- Table Start  -->
                <div class="flex justify-center min-h-screen">
                    <div class="col-span-12">
                        <div class="h-[600px] overflow-y-scroll scrollbar-hide">
                            <table class="table text-textBlack border-separate space-y-6 text-sm w-[1200px] overflow-y-scroll">
                                <thead class="bg-[#fffafa] text-textBlack ">
                                    <tr>
                                        <th class="px-3 py-6 text-center">No.</th>
                                        <th class="px-3 py-6 text-center">Customer Name</th>
                                        <th class="px-3 py-6 text-center">Customer Email</th>
                                        <th class="px-3 py-6 text-center">Total Amount</th>
                                        <th class="px-3 py-6 text-center">Order Times</th>
                                    </tr>
                                </thead>
                                <tbody class="searchResult">
                                    <?php
                                    $num = 1;
                                    $totalAmount = 0;
                                    $name = "";
                                    $email = "";
                                    foreach ($allCustomersList as $all) {
                                        $totalInLoop = 0;
                                        $totalTimes = 0;
                                        foreach ($eachCustomersTotalOrdersList as $each) {
                                            $name = $all["c_name"];
                                            $email = $all["c_email"];
                                            if ($all["id"] == $each["customer_id"]) {
                                                $eachAmount = (int)($each["total_amt"]);
                                                $totalInLoop += $eachAmount;
                                                $totalTimes++;
                                            }
                                        }
                                        $totalAmount = $totalInLoop;
                                    ?>
                                        <tr class="bg-[#fffafa]">
                                            <td class="p-3 text-center"><?= $num++; ?></td>
                                            <td class="p-3 text-center"><?= $name ?></td>
                                            <td class="p-3 text-center"><?= $email ?></td>
                                            <td class="p-3 text-center"><?= $totalAmount ?></td>
                                            <td class="p-3 text-center"><?= $totalTimes ?></td>
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
</body>

</html>