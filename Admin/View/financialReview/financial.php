<?php
include "../../Controller/financialReview/financialReviewDataController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Review</title>
  <link rel="icon" href="../resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <script src="../resources/lib/jquery3.6.0.js"></script>
    <!-- google font link -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <script src="../resources/js/financial.js" defer></script>
</head>
<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .table {
        border-spacing: 0 10px;
    }
</style>

<body class="font-roboto">
    <section class="w-full bg-[#12141B] max-w-[1600px] mx-auto flex">
        <!-- Import side bar  -->
        <?php $menu = "financialReview" ?>
        <?php include "../resources/common/adminSideBar.php" ?>

        <!-- Right-side Start -->
        <div class="h-screen overflow-hidden w-full">
            <!-- Search Start-->
            <div class="bg-[#262B3A] flex justify-between items-center py-3 px-10">
                <div class="text-white">
                    <p class="text-2xl font-semibold tracking-wider">Earning Per Year</p>
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
            </div>
            <!-- Search End-->

            <div class=" data-output">
                <div class="w-[1200px] bg-[#FFFFFF] mx-auto mt-8 p-4">
                    <div class="w-[1100px] mx-auto border border-black">
                        <div class="h-[300px] w-[1000px] flex justify-center">
                            <canvas id="paymentHistoryChart"></canvas>
                        </div>
                    </div><br>
                    <span class="text-center font-semibold block">
                        Choose month to check particular month payment history:
                        <form action="../../Controller/financialReview/customerPaymentHistoryController.php" method="post">
                            <select class="ml-4 outline-none rounded py-1 px-3 border border-green-950" name="paymentMonth" id="paymentMonth">
                                <?php foreach ($totalPaymentMonth as $month) { ?>
                                    <option value="<?= $month["month"] ?>"><?= $month["month"] ?></option>
                                <?php } ?>
                            </select>
                            <button name="chooseMonth" type="submit" class="ml-4 px-4 py-2 cursor-pointer bg-[#396C21] text-white rounded-md">Go</button>
                        </form>
                    </span>
                </div>
                <div class="mt-10">
                    <span class="text-xl font-semibold pl-12 text-white">In this year:</span>
                    <div class="w-[1200px] mt-5 mx-auto">
                        <div class="flex justify-evenly items-center">
                            <div class="bg-[#F36823] p-5  mt-5  rounded-sm">
                                <span class="text-center font-semibold block text-lg text-white">Total Earning From Customer</span>
                                <span class="text-center font-semibold block text-2xl text-white mt-2"><?= number_format($earningFromCustomer[0]["earning"]) ?> Ks</span>
                            </div>
                            <div class="bg-[#F36823] p-5 mt-5 rounded-sm">
                                <span class="text-center font-semibold block text-lg text-white">Most Sold Category</span>
                                <span class="text-center font-semibold block text-2xl text-white mt-2"><?= $mostSoldCategory[0]["category_name"] ?></span>
                            </div>
                            <div class="bg-[#F36823] p-5 mt-5 rounded-sm">
                                <span class="text-center font-semibold block text-lg text-white">Most Sold Product</span>
                                <span class="text-center font-semibold block text-2xl text-white mt-2"><?= $mostSoldProduct[0]["p_name"] ?></span>
                            </div>
                            <div class="bg-[#F36823] p-5 mt-5 rounded-sm">
                                <span class="text-center font-semibold block text-lg text-white">Total Orders</span>
                                <span class="text-center font-semibold block text-2xl text-white mt-2"><?= number_format($totalOrders[0]["total_order"]) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Analytics Data End  -->
        </div>
        <!-- Right-side End -->
    </section>
    <script>
        let serverData = <?php echo json_encode($eachMonthTotalOrder); ?>;
        let months = [];
        let noOfOrders = [];
        for (let index = 0; index < serverData.length; index++) {
            months.push(serverData[index].month);
            noOfOrders.push(serverData[index].order_count);
        }
    </script>
</body>

</html>