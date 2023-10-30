<?php
session_start();
if(!isset( $_SESSION["currentMerchantLogin"]) || $_SESSION["currentMerchantLogin"]==''){
    header("Location: ../Error/error.php" );
}else{
    include "../../Controller/financialAndPayment/financialReviewDataController.php";
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
        <div class="mainPage h-screen overflow-hidden w-full px-10 py-4">

            <h1 class="text-darkGreenColor text-3xl font-bold mb-5">Earning Overview</h1>
            <!-- Total Display -->

            <div class="text-white flex justify-between p-5 mb-5">
                <div class="bg-secondary w-60 h-20 py-2 text-center rounded flex flex-col justify-between">
                    <p>Total Earning</p>
                    <p class="mt-2 text-xl"><?= number_format($earningFromCustomer[0]["earning"]) ?> Ks</p>
                </div>

                <div class="bg-secondary w-40 h-20 py-2 text-center rounded flex flex-col justify-between">
                    <p>Total Orders</p>
                    <p class="mt-2 text-xl"><?= number_format($totalOrders[0]["total_order"]) ?></p>
                </div>

                <div class="bg-secondary w-60 h-20 py-2 text-center rounded flex flex-col justify-between">
                    <p>Most Sold Category</p>
                    <p class="mt-2 text-xl"><?= isset($mostSoldCategory[0]["category_name"]) ? $mostSoldCategory[0]["category_name"] : "Nothing" ?></p>

                </div>

                <div class="bg-secondary w-60 h-20 py-2 text-center rounded flex flex-col justify-between">
                    <p>Most Sold Product </p>
                    <p class="mt-2 text-xl"><?= isset($mostSoldProduct[0]["p_name"]) ? $mostSoldProduct[0]["p_name"] : "Nothing" ?></p>

                </div>


            </div>
        
            
            

            <div class=" data-output">
                <div class="w-[1300px] bg-[#FFFFFF] mx-auto mt-8 ">
                <div class="bg-secondary text-white  py-3 px-10">
                
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
            
                    <div class="w-[1300px] mx-auto border border-black bg-white ">
                        <div class="h-[250px] w-[1000px] flex justify-center">
                            <canvas id="paymentHistoryChart"></canvas>
                        </div>
                    </div><br>
                    <span class="text-center font-semibold flex justify-center items-center ">
                        Choose month to check particular month payment history:
                        <form action="../../Controller/financialAndPayment/customerPaymentHistoryController.php" method="post">
                            <select class="ml-4 outline-none rounded py-1 px-3 border border-secondary" name="paymentMonth" id="paymentMonth">
                                <?php foreach ($totalPaymentMonth as $month) { ?>
                                    <option value="<?= $month["month"] ?>"><?= $month["month"] ?></option>
                                <?php } ?>
                            </select>
                            <button name="chooseMonth" type="submit" class="ml-4 px-4 py-2 cursor-pointer bg-secondary text-white rounded-md">Go</button>
                        </form>
                    </span>
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
