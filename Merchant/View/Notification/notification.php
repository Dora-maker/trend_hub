<?php

include "../../Controller/notificationController.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchant Notification</title>
  <link rel="icon" href="../../View/resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link rel="stylesheet" href="../resources/css/sideBar/sideBar.css">
    <script src="../resources/js/sideBar/sideBar.js" defer></script>
    <script src="../resources/lib/jquery3.6.0.js"></script>
    <script src="../resources/js/notification.js" defer></script>
    
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
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-[#FBFBFB] bg-opacity-50  hover:bg-darkGreenColor hover:text-white rounded-md cursor-pointer">
                        <img id="allOrderHover" src="../resources/img/sideBarImg/all order.png" alt="">
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
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-darkGreenColor text-white rounded-md  cursor-pointer">
                        <img id="notiHover" src="../resources/img/sideBarImg/notification hover.png" alt="">
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

        <div class="mainPage h-screen overflow-hidden w-full p-6 container ml-10">
        <h1 class="text-darkGreenColor text-3xl font-bold mb-5 ">Notifications</h1>
            <div class="flex flex-row">
                <div id="leftSide" class="mr-4">
        <!-- notify messages -->
        <!-- Left-side start  -->
                    <div id="leftSide" class="h-[600px] overflow-y-scroll scrollbar-hide w-[900px]">
                        <!-- Noti card 1 start  -->
                        <?php
                        foreach ($notifications as $notify) { ?>
                            <?php $notifyDate = ($notify["create_date"] === date("Y-m-d")) ? "Today" :  $notify["create_date"] ?>

                            <div class="noti h-30 bg-white shadow-lg px-4 py-3 mb-3 border hover:bg-pink-100 hover:border-secondary rounded cursor-pointer">
                                <div class="flex justify-between">
                                    <div class="flex items-center">
                                        <img src="../resources/img/profile/notifyProfile.png" alt="">
                                        <p class="px-2">TrendHub Admin</p>
                                    </div>
                                    <p class="ml-56"><?= $notifyDate ?></p>
                                </div>
                                <p class="text-lg font-bold"><?= $notify['title'] ?></p>
                                <div class="px-6 w-[500px] overflow-hidden">
                                    <?php
                                    $message = $notify["message"];
                                    $words = explode(' ', $message);
                                    $shortenedMessage = implode(' ', array_slice($words, 0, 40));

                                    echo '<p class="text-sm truncate">' . $shortenedMessage;
                                    if (count($words) > 40) {
                                        echo '...';  // Add ellipsis if the message was truncated
                                    }
                                    echo '</p>';
                                    ?>
                                </div>
                            </div>
                        <?php    }
                        ?>
                        <!-- Noti card 1 end  -->
                    </div>
                    <!-- Left-side end  -->

                </div>
                <div id="rightSide relative" class="w-1/2">
                    <!-- Notification cards for the right side -->
                    <div class="w-full h-full bg-gray-100 shadow-md border-secondary container px-4 py-4 mt-3 border hover:bg-pink-100 hover:border-secondary">
                        <!-- message 1    -->
                        <!-- Right-side start  -->
                        <div id="rightSide" class="h-[70vh]  ">
                            <!-- message 1    -->
                            <?php
                            $counter = 1;
                            foreach ($notifications as $notifyText) { ?>
                                <div class="message bg-white shadow-lg px-4 py-3 border rounded <?php if ($counter != 1) echo "hidden" ?>">
                                    <div class="flex flex-row">
                                        <div class="flex flex-row justify-start">
                                            <img src="../resources/img/profile/notifyProfile.png" alt="" class="w-6 h-6">
                                            <p class="px-2">TrendHub Admin</p>
                                        </div>
                                        <p class="ml-56"><?= $notifyText['title'] ?></p>
                                    </div>

                                    <div class="px-6 mt-3">
                                        <p class="text-sm whitespace-pre-line">
                                            <?= $notifyText["message"] ?>
                                        </p>
                                    </div>
                                </div>
                            <?php $counter++;
                            }
                            ?>
                            <!-- message 1 end -->
                        </div>
                        <!-- Right-side end  -->



                    </div>
                </div>
            </div>

   

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
    <script>
        $(document).ready(function() {
            $("#messageOne").click(function() {
                // Hide all other screens and show screenOne

                $("#screenOne").removeClass("hidden");
                $("#screenTwo").addClass("hidden");
                $("#screenThree").addClass("hidden");
                $("#screenFour").addClass("hidden");


            });

            $("#messageTwo").click(function() {
                // Hide all other screens and show screenTwo
                $("#screenOne").addClass("hidden");
                $("#screenTwo").removeClass("hidden");
                $("#screenThree").addClass("hidden");
                $("#screenFour").addClass("hidden");

            });

            $("#messageThree").click(function() {
                // Hide all other screens and show screenTwo
                $("#screenOne").addClass("hidden");
                $("#screenTwo").addClass("hidden");
                $("#screenThree").removeClass("hidden");
                $("#screenFour").addClass("hidden");

            });

            $("#messageFour").click(function() {
                // Hide all other screens and show screenTwo
                $("#screenOne").addClass("hidden");
                $("#screenTwo").addClass("hidden");
                $("#screenThree").addClass("hidden");
                $("#screenFour").removeClass("hidden");

            });

            // Add similar click event handling for other message div boxes here
        });
    </script>

</body>

</html>