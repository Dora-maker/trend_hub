<?php
include "../../Controller/analytics/analyticsController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
  <link rel="icon" href="../resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <script src="../resources/lib/jquery3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <script src="../resources/js/analytics.js" defer></script>
</head>

<body class="font-roboto">
    <section class="w-full bg-[#12141B] max-w-[1600px] mx-auto flex">

        <!-- Import side bar  -->
        <?php $menu = "analytics" ?>
        <?php include "../resources/common/adminSideBar.php" ?>

        <!-- Right-side Start -->
        <div class="h-screen overflow-hidden w-full">
            <!-- Search Start-->
            <div class="bg-[#262B3A] flex justify-between items-center py-3 px-10">
                <div class="text-white">
                    <p class="text-2xl font-semibold">Analytics</p>
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
            <!-- Analytics Data Start -->
            <div class="px-20 py-16  flex justify-between flex-wrap">
                <!-- Total Display -->
                <div class="text-white flex flex-col justify-center items-center">
                    <div class="bg-[#FF5500] w-[150px] h-[135px] py-5 text-center rounded flex flex-col justify-between">
                        <p>Total Users</p>
                        <p class="text-4xl"><?= $totalCustomers[0]["total_customers"] ?></p>
                    </div>

                    <div class="mt-10 bg-[#2F3D40] w-[150px] h-[135px] py-5 text-center rounded flex flex-col justify-between">
                        <p>Total Merchants</p>
                        <p class="text-4xl"><?= $totalMerchants[0]["total_merchants"] ?></p>
                    </div>
                </div>
                <div class="text-white bg-white p-2">
                    <div class="h-[500px] w-[900px] flex justify-center">
                        <canvas id="totalAnalyticsChart"></canvas>
                    </div>
                </div>
            </div>
            <!-- Analytics Data End  -->
        </div>
        <!-- Right-side End -->
    </section>
    <script>
        let customerData =  <?php echo json_encode($customerCountsEachMonth); ?>;
        let customerMonths = [];
        let numOfCustomers = [];
        for (let index = 0; index < customerData.length; index++) {
            customerMonths.push(customerData[index].month);
            numOfCustomers.push(customerData[index].customer_count);
        }

        let merchantData =  <?php echo json_encode($merchantCountsEachMonth); ?>;
        let merchantMonths = [];
        let numOfMerchants = [];
        for (let index = 0; index < merchantData.length; index++) {
            merchantMonths.push(merchantData[index].month);
            numOfMerchants.push(merchantData[index].merchant_count);
        }
    </script>
</body>

</html>