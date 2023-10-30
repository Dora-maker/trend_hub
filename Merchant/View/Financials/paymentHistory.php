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
    <title>Earning Overview</title>
  <link rel="icon" href="../../View/resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link rel="stylesheet" href="../resources/css/sideBar/sideBar.css">
    <script src="../resources/js/sideBar/sideBar.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md  bg-[#FBFBFB] bg-opacity-50 rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
                        <img id="allOrderHover" src="../resources/img/sideBarImg/all order.png" alt="">
                        <span class="sideFull hidden ml-2">All Orders</span>
                    </p>
                </a>
                <a href="">
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
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-darkGreenColor text-white rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
                        <img id="financialHover" src="../resources/img/sideBarImg/financial hover.png" alt="">
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

        <!-- Right-side Start -->
        <div class="mainPage h-screen overflow-hidden w-full p-3">
            <h1 class="text-darkGreenColor text-3xl font-bold mb-5"><span><?= $month ?></span> Payment History</h1>

            <!-- start of search button and select box -->

            <div class="flex justify-between items-center p-2">
                <?php
                $timestamp = time();
                date_default_timezone_set('Asia/Yangon');
                $day = date('D');
                $month = date('F');
                $date = date('j');
                $year = date('Y', $timestamp);
                ?>
                <p class="px-4 py-2 text-white bg-secondary"><?php echo "Date : $day, $month $date, $year" ?></p>
                <!-- start of select box -->
                <!-- <div>
                    <span class="mr-2 font-medium">Sort By</span>
                    <select name="paymentHistoryTable" class="border border-darkGreenColor p-2 font-medium">
                        <option class="p-2" value="paymentDate">Payment Date</option>
                        <option class="p-2" value="paymentType">Payment Type</option>
                    </select>
                </div> -->
                <!-- end of select box -->
            </div>
            <!-- end of search button and select box -->

            <!-- All Customers Data End  -->
            <!-- Start of payment history to customer table -->
            <?php if (count($eachMonthResult) == 0) { ?>
                <span class="text-white font-lg text-center">There is no payment yet.</span>
            <?php } ?>
            <div class="h-[420px] overflow-y-scroll scrollbar-hide">
                <table class="table-fixed mt-10 w-full ">
                    <thead class="bg-darkGreenColor text-white font-semibold text-lg">
                        <tr>
                            <th class="p-2 w-20">No.</th>
                            <th class="p-2 w-20">Payment Id</th>
                            <th class="p-2 w-40">Customer</th>
                            <th class="p-2 w-20">Payment Date</th>
                            <th class="p-2 w-32">Payment Via</th>
                            <th class="p-2 w-32">Payment Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 0;
                        $num = 1;
                        foreach ($eachMonthResult as $each) :
                            $counter++;
                            $rowClass = ($counter % 2 === 0) ? 'bg-gray-200' : '';
                        ?>


                            <tr class=" <?= $rowClass ?>">
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

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <!-- End of payment history to customer table -->
            <div class="text-right font-bold text-xl text-darkGreenColor mt-5 mr-10">
                <?php foreach ($eachEarningResult as $earning) { ?>
                    <span>Total Earnings<span class="ml-5"><?= number_format($earning["earning"]) ?> Ks</span></span>
                <?php } ?>
            </div>

        </div>
        <!-- Right-side End -->
    </section>
    <script>
        $(document).ready(function() {
            $("#logoutBtn").click(function() {
                $("#logoutModal").toggle();
            });

            $("#confirmLogout").click(function() {
                $("#logoutModal").toggle();
            });

            $("#cancelLogout").click(function() {
                $("#logoutModal").toggle();
            });
        });
    </script>
</body>

</html>
