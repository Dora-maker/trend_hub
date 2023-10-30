<?php
include "../../Controller/productRequest/productRequestController.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Requests</title>
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
    <section class=" w-full bg-[#12141B] max-w-[1600px] mx-auto flex">
        <!-- Import side bar  -->
        <?php $menu = "productRequest" ?>
        <?php include "../resources/common/adminSideBar.php" ?>

        <!-- Right-side Start -->
        <div class="h-screen overflow-hidden w-full">
            <!-- Search Start-->
            <div class="bg-[#262B3A] flex justify-between items-center py-3 px-10">
                <div class="text-white">
                    <p class="text-2xl font-semibold">Product Requests</p>
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
            <div class="px-[53px] py-8">
                <!-- Sort Start  -->
                <div class="flex items-center justify-between space-x-2 mb-2">
                    <span class="text-white text-lg"><?= $totalReqs[0]["totalRequest"] ?> Product Submission Request</span>
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
                                        <th class="px-3 py-6 text-center">Business Name</th>
                                        <th class="px-3 py-6 text-center">Merchant Name</th>
                                        <th class="px-3 py-6 text-center">Merchant Email</th>
                                        <th class="px-3 py-6 text-center">Requested Date</th>
                                        <th class="px-3 py-6 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="searchResult">
                                    <?php $num = 1; ?>
                                    <?php foreach ($productRequests as $request) { ?>
                                        <form action="../../Controller/productRequest/productRequestDetailController.php" method="post">
                                            <tr class="bg-[#fffafa]">
                                                <td class="p-3 text-center"><?= $num++; ?></td>
                                                <td class="p-3 text-center"><?= $request["m_bname"] ?></td>
                                                <td class="p-3 text-center"><?= $request["m_name"] ?></td>
                                                <td class="p-3 text-center"><?= $request["m_email"] ?></td>
                                                <td class="p-3 text-center"><?= $request["create_date"] ?></td>
                                                <input type="hidden" name="reqId" value="<?= $request["id"] ?>">
                                                <input type="hidden" name="bname" value="<?= $request["m_bname"] ?>">
                                                <input type="hidden" name="email" value="<?= $request["m_email"] ?>">
                                                <input type="hidden" name="mid" value="<?= $request["merchant_id"] ?>">
                                                <td class="p-3 text-center ">
                                                    <button type="submit" name="allReq" class="font-semibold underline cursor-pointer">View Details</button>
                                                </td>
                                                
                                            </tr>
                                        </form>
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