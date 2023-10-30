<?php   
session_start();
if(!isset( $_SESSION["currentMerchantLogin"]) || $_SESSION["currentMerchantLogin"]==''){
        header("Location: ../Error/error.php" );
}
include "../../../Customer/Controller/uiElement/editInfoController.php";
$editEmail = isset($editInfo[0]["email"]) && !empty($editInfo[0]["email"]) ? $editInfo[0]["email"] : 'trendhub2023.shop@gmail.com';
$editPhoneNumber = isset($editInfo[0]["phoneNumber"]) && !empty($editInfo[0]["phoneNumber"]) ? $editInfo[0]["phoneNumber"] : '09 40-355-970';
$editAddress = isset($editInfo[0]["address"]) && !empty($editInfo[0]["address"]) ? $editInfo[0]["address"] : ' No.1200, room(6B), Yadanar Street, South Oakkalapa,Yangon, Myanmar';
$editAddressLink = isset($editInfo[0]["locationLink"]) && !empty($editInfo[0]["locationLink"]) ? $editInfo[0]["locationLink"] : 'https://www.google.com/maps/place/Ex;braiN+Office/@16.8430957,96.1949609,17z/data=!3m1!4b1!4m6!3m5!1s0x30c193f51faa68ff:0x72868c60b69532c4!8m2!3d16.8430906!4d96.1975358!16s%2Fg%2F11scs4qwp8?entry=tts&shorturl=1';
$editTime = isset($editInfo[0]["time"]) && !empty($editInfo[0]["time"]) ? $editInfo[0]["time"] : '08:00 am - 08:00 pm';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Admin</title>
  <link rel="icon" href="../../View/resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link rel="stylesheet" href="../resources/css/sideBar/sideBar.css">
    <script src="../resources/js/sideBar/sideBar.js" defer></script>
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
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md  bg-darkGreenColor text-white rounded-md  cursor-pointer">
                        <img id="contactHover" src="../resources/img/sideBarImg/contact hover.png" alt="">
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
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-[#FBFBFB] bg-opacity-50 rounded-md hover:bg-darkGreenColor hover:text-white   cursor-pointer">
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
        <!-- start of contact complete  modal box -->
        <div class="contactAdminFinishModal hidden fixed w-full h-full  bg-black bg-opacity-50 z-20 justify-center pt-60">
            <div class="bg-white m-auto p-5 border rounded-sm w-[40%]">
                <h2 class="text-xl font-bold mb-4 text-center">Message to Admin is Complete!</h2>
                <hr>
                <p class="mt-6 text-center">Thank you for contacting us. We appreciate your message and will respond to your inquiry as soon as possible. Your patience is greatly appreciated.</p>
                <div class="flex mt-5 justify-center">
                    <button id="closeContactCompleteModal" class="mt-4 bg-secondary text-white font-semibold py-2 px-4 rounded">Close</button>
                </div>
            </div>
        </div>
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
        <div class="flex justify-center items-center flex-col  w-full  h-3/4  ">
            <div class="bg-primary relative w-2/3  h-full flex flex-col mt-12  shadow-2xl ">

                <!-- contact container -->
                <div class="bg-white md:bg-[url('../resources/img/contact/contact_bg.svg')] bg-cover bg-center py-5 rounded-md drop-shadow-xl md:flex md:items-center md:drop-shadow-none md:pl-20 md:space-x-28">
                    <!-- left side -->
                    <div class="text-center md:text-start px-5 py-5">
                        <h1 class="text-xl font-bold md:text-4xl">Contact Admin</h1>
                        <p class="text-sm pt-5 pb-10 md:text-xl md:w-[350px]">Feel free to contact us any time. We will get back to you as soon as we can!</p>
                        <form id="contactForm" action="">
                            <textarea name="message" id="messageInput" cols="30" rows="10" class="resize-none shadow-md border-2 border-secondary rounded py-2 px-2 outline-none bg-white md:bg-[#F7F7F7] w-full" placeholder="Message"></textarea>
                            <button type="submit" id="sendMessage" class="w-full bg-secondary shadow-md py-2 rounded text-white mt-5 md:w-[277px]">Send</button>
                        </form>

                    </div>
                    <div class="w-1/4 absolute right-0  h-full bg-secondary" id="retangle"></div>
                    <!-- right side  -->
                    <div class="absolute right-12 shadow-xl ">
                        <div class="px-10 py-10 bg-[#E4E4D2] leading-10 pr-18">
                            <p class="text-3xl font-medium">Info</p>
                            <div class="flex items-center space-x-5 mt-2">
                                <img class="w-[20px] h-[20px]" src="../resources/img/contact/black_message.svg" alt="message">
                                <span class="md:text-sm"><a href="mailto:<?= $editEmail ?>"><?= $editEmail ?> </a></span>
                            </div>
                            <div class="flex items-center space-x-5">
                                <img class="w-[20px] h-[20px]" src="../resources/img/contact/black_phone.svg" alt="phone">
                                <span><a href="tel:<?= $editPhoneNumber ?>"><?= $editPhoneNumber ?></a></span>
                            </div>
                            <div class="flex items-start space-x-5">
                                <img class="w-[20px] h-[20px]" src="../resources/img/contact/black_address.svg" alt="address">
                                <span class="w-[190px] md:text-sm"><a target="_blank" href="<?= $editAddressLink ?>"><?= $editAddress ?></a></span>
                            </div>
                            <div class="flex items-center space-x-5">
                                <img class="w-[20px] h-[20px]" src="../resources/img/contact/black_time.svg" alt="time">
                                <span><?= $editTime ?></span>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#sendMessage").click(function() {
                $(".contactAdminFinishModal").toggle();
            });

            $("#closeContactCompleteModal").click(function() {
                $(".contactAdminFinishModal").toggle();
                document.getElementById("messageInput").value = "";
            });

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
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission
        
        // Get user input from textarea
        var message = document.getElementById("messageInput").value;
        
        // Prepare data to send to the server
        var formData = new FormData();
        formData.append("message", message);
        
        // Send data using AJAX
        fetch("../../Controller/contactAdminController.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server (if needed)
            console.log(data);
        })
        .catch(error => {
            // Handle any errors
            console.error("Error:", error);
        });
    });
</script>




</body>

</html>
message.txt
13 KB