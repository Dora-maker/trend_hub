<?php

include "../../Controller/profile/showDataProfileController.php";
if (isset($_SESSION["saveChangeController"]) && ($_SESSION["saveChangeController"] == false)) {
    $_SESSION["changeView"] = 0;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchant Profile</title>
  <link rel="icon" href="../../View/resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link rel="stylesheet" href="../resources/css/sideBar/sideBar.css">
    <script src="../resources/js/sideBar/sideBar.js" defer></script>
    <script src="../resources/js/profile.js" defer></script>
    <script src="../resources/lib/jquery3.6.0.js"></script>
</head>

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
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-[#FBFBFB] bg-opacity-50 rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
                        <img id="notiHover" src="../resources/img/sideBarImg/notification.png" alt="">
                        <span class="sideFull hidden ml-2">Notifications</span>
                    </p>
                </a>
                <a href="../ProfileEdit/profile.php">
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md  bg-darkGreenColor text-white rounded-md  cursor-pointer">
                        <img id="editProfileHover" src="../resources/img/sideBarImg/edit profile hover.png" alt="">
                        <span class="sideFull hidden ml-2">Edit Profile</span>
                    </p>
                </a>

                <p id="logoutBtn" class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-[#FBFBFB] bg-opacity-50 rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
                    <img id="logOutHover" src="../resources/img/sideBarImg/logout.png" alt="">
                    <span class="sideFull hidden ml-2">Log Out</span>
                </p>
                </a>
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

        <div class="flex justify-center  items-center flex-col px-5 w-full  h-2/3 ">
            <div class="bg-primary relative w-5/6  h-full flex flex-col mt-12  shadow-2xl ">
                <div id="profile" class="p-8 container w-2/3">
                    <form action="../../Controller/profile/editProfileController.php" method="post" enctype="multipart/form-data">
                        <p class="p-6 text-2xl font-bold">Edit Profile</p>
                        <div class="flex flex-col items-center justify-center"> <!-- Adding a flex container -->
                            <?php

                            if (($merchant[0]["m_logo"]) == null) {
                                $setLogo = "../resources/img/profile/noProfile.png.jpg";
                            } else {
                                $setLogo = "../../.." . $merchant[0]["m_logo"];
                            }

                            ?>

                            <label for="logo">
                                <img src="<?= $setLogo ?>" id="merLogo" alt="Profile Picture" class="w-28 h-28 border shadow-md  border-secondary  rounded-full ">
                            </label>
                            <input type="file" name="merimg" id="logo" accept=".png,.jpeg" class="hidden">
                            <!-- <img src="../resources/img/profile/profile.png" alt="Profile Picture" class="rounded-full w-32 shadow-md"> -->

                        </div>
                        <div class="flex flex-col md:flex-row items-center justify-between mt-8">
                            <div class="md:w-1/2 w-full p-2">
                                <label for="m_name" class="text-md font-semibold">Name:</label>
                                <input type="text" name="m_name" value="<?= $merchant[0]['m_name'] ?>" id="m_name" class="w-full p-2 rounded border border-secondary shadow-md">
                            </div>
                            <div class="md:w-1/2 w-full p-2">
                                <label for="business_name" class="text-md font-semibold">Business Name:</label>
                                <input type="text" name="b_name" value="<?= $merchant[0]['m_bname'] ?>" id="business_name" class="w-full p-2 rounded border border-secondary shadow-md">
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row items-center justify-between mt-4">
                            <div class="md:w-1/2 w-full p-2">
                                <label for="business_license" class="text-md font-semibold">Business License:</label>
                                <input type="number" name="b_licene" value="<?= $merchant[0]['m_licene'] ?>" id="business_license" class="w-full p-2 rounded border border-secondary shadow-md">
                            </div>
                            <div class="md:w-1/2 w-full p-2">
                                <label for="phone" class="text-md font-semibold">Phone Number:</label>
                                <input type="text" name="phone" value="<?= $merchant[0]['m_phone'] ?>" id="phone" class="w-full p-2 rounded border border-secondary shadow-md">
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row items-center justify-between mt-4">
                            <div class="md:w-1/2 w-full p-2">
                                <label for="email" class="text-md font-semibold">Email Address:</label>
                                <input type="email" name="email" value="<?= $merchant[0]['m_email'] ?>" id="email" class="w-full p-2 border border-secondary rounded shadow-md" readonly>
                            </div>
                            <div class="md:w-1/2 w-full p-2">
                                <label for="address" class="text-md font-semibold">Address:</label>
                                <input type="text" name="address" value="<?= $merchant[0]['m_address'] ?>" id="address" class="w-full p-2 border border-secondary rounded shadow-md">
                            </div>
                        </div>


                        <button type="submit" name="profileChange" class="px-14 py-2 mx-auto flex shadow-md text-center align-middle justify-end hover:text-textBlack bg-secondary text-white rounded mt-10" id="save-profile-btn">Save Changes</button>




                </div>
                <div class="w-1/4 absolute right-0  h-full bg-secondary" id="retangle"></div>
                </form>
            </div>

        </div>
        <!-- Modal for save change-->
        <?php if (isset($_SESSION["changeView"]) && ($_SESSION["changeView"] == 1)) { ?>
            <div class="fixed w-full h-full inset-0 z-40 flex items-center justify-center bg-opacity-50" id="modal">
                <div class="bg-white rounded-lg  shadow-2xl py-6 w-1/4 flex flex-col justify-center items-center">
                    <p class="text-center font-bold">Your profile Info is Updated!</p>
                    <button class="px-12 py-1 mt-4 bg-secondary text-white rounded " id="close-modal-btn">
                        Close
                    </button>
                </div>
            </div>
        <?php   } ?>


        </div>

        <!-- Right-side End -->

    </section>
   


</body>
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

</html>
<?php
$_SESSION["saveChangeController"] = false;
?>
