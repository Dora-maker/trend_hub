<?php
session_start();
$month = $_SESSION["paymentMonth"];
if (!isset($_SESSION["eachMonthHistory"]) && !isset($_SESSION["eachMonthEarning"])) {
    header("Location: ../Error/error.php");
} else {
    $eachMonthResult = $_SESSION["eachMonthHistory"];
    $eachEarningResult = $_SESSION["eachMonthEarning"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment History</title>
  <link rel="icon" href="../resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <script src="../resources/lib/jquery3.6.0.js"></script>
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
        <?php $menu = "financialReview" ?>
        <?php include "../resources/common/adminSideBar.php" ?>

        <!-- Right-side Start -->
        <div class="h-screen overflow-hidden w-full">
            <!-- Search Start-->
            <div class="bg-[#262B3A] flex justify-between items-center py-3 px-10">
                <div class="text-white">
                    <p class="text-2xl font-semibold"><?= $month ?> Payment History</p>
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

            <!-- All Customers Data Start -->
            <div class="px-[53px] py-8 data-output">
                <?php if (count($eachMonthResult) == 0) { ?>
                    <span class="text-white font-lg text-center">There is no payment yet.</span>
                <?php } ?>
                <!-- Table Start  -->
                <div class="flex justify-center min-h-screen">
                    <div class="col-span-12">
                        <div class="h-[420px] overflow-y-scroll scrollbar-hide">
                            <table class="table text-textBlack border-separate space-y-6 text-sm w-[1200px] overflow-y-scroll">
                                <thead class="bg-[#fffafa] text-textBlack ">
                                    <tr>
                                        <th class="px-3 py-6 text-center">No.</th>
                                        <th class="px-3 py-6 text-center">Order Id</th>
                                        <th class="px-3 py-6 text-center">Customer</th>
                                        <th class="px-3 py-6 text-center">Payment Date</th>
                                        <th class="px-3 py-6 text-center">Payment Method</th>
                                        <th class="px-3 py-6 text-center">Amount</th>
                                    </tr>
                                </thead>
                                <tbody class="searchResult">
                                    <?php $num = 1; ?>
                                    <?php foreach ($eachMonthResult as $each) { ?>
                                        <tr class="bg-[#fffafa]">
                                            <td class="p-3 text-center"><?= $num++; ?></td>
                                            <td class="p-3 text-center"><?= $each["id"] ?></td>
                                            <td class="mName p-3 text-center"><?= $each["c_name"] ?></td>
                                            <?php
                                            $paymentDate = "";
                                            if ($each["payment_method_id"] == 3) {
                                                $paymentDate = $each["update_date"];
                                            } else {
                                                $paymentDate = $each["create_date"];
                                            }
                                            ?>
                                            <td class="mEmail p-3 text-center"><?= $paymentDate ?></td>
                                            <td class="p-3 text-center"><?= $each["payment_method"] ?></td>
                                            <td class="p-3 text-center"><?= number_format($each["total_amt"]) ?> Ks</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-white text-xl font-semibold text-right mt-5">
                            <?php foreach ($eachEarningResult as $earning) { ?>
                                <span>Total Earnings<span class="ml-5"><?= number_format($earning["earning"]) ?></span></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- Table End  -->
            </div>
            <!-- All Customers Data End  -->
        </div>
        <!-- Right-side End -->
    </section>
    </div>
</body>

</html>