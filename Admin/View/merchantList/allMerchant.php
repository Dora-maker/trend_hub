<?php
include "../../Controller/merchantList/merchantListController.php";
session_start();
if(isset($_SESSION["banControllerPassed"]) && ($_SESSION["banControllerPassed"] == false)){ 
    $_SESSION["view"] = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Merchants</title>
  <link rel="icon" href="../resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <!-- google font link -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <script src="../resources/lib/jquery3.6.0.js"></script>
    <script src="../resources/js/dropDown/drop_downMerchant.js" defer></script>
    <script src="../resources/js/search/searchMerchant.js" defer></script>
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
    <section class=" w-full bg-[#12141B] max-w-[1600px] mx-auto flex">
        <!-- Import side bar  -->
        <?php $menu = "merchantList" ?>
        <?php $subMenu = "allMerchants" ?>
        <?php include "../resources/common/adminSideBar.php" ?>

        <!-- Right-side Start -->
        <div class="h-screen overflow-hidden w-full">
            <!-- Search Start-->
            <div class="bg-[#262B3A] flex justify-between items-center py-3 px-10">
                <div class="text-white">
                    <p class="text-2xl font-semibold tracking-wider">All Merchants</p>
                    <?php
                    $timestamp = time();

                    date_default_timezone_set('Asia/Yangon');
                    $day = date('D');
                    $month = date('F');
                    $date = date('j');
                    $year = date('Y', $timestamp); 

                    
                    ?>
                    <p><?php  echo "Date : $day, $month $date, $year"?></p>
                </div>
                <input type="text" name="" id="searchAllMerchant" class="w-[800px] py-2 px-5 rounded outline-none" placeholder="Search by name">
            </div>
            <!-- Search End-->

            <div class="px-10">
                <!-- start sort -->
                <div class="w-full py-[20px] pb-[30px]">
                    <div class="text-right">
                        <label class="text-white" for="dropdownAllMerchant">Sort By:</label>
                        <select id="dropdownAllMerchant" class=" mt-1  w-[160px] px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none">
                            <option selected value="m_name">Personal Name</option>
                            <option value="m_bname">Business Name</option>
                            <option value="m_address">Address</option>
                            <option value="create_date">Date</option>
                        </select>
                    </div>
                </div>
                <!-- end sort -->

                <!-- start table -->
                <div class="flex justify-center min-h-screen">
                    <div class="col-span-12">
                        <div class="h-[600px] overflow-y-scroll scrollbar-hide">
                            <table class="table text-textBlack border-separate space-y-6 text-sm w-[1200px] overflow-y-scroll">
                                <thead class="bg-[#fffafa] text-textBlack ">
                                    <tr>
                                        <th class="px-3 py-6 text-center">No.</th>
                                        <th class="px-3 py-6 text-center">Business Name</th>
                                        <th class="px-3 py-6 text-center">Personal Name</th>
                                        <th class="px-3 py-6 text-center">Email</th>
                                        <th class="px-3 py-6 text-center">Phone Number</th>
                                        <th class="px-3 py-6 text-center">Address</th>
                                        <th class="px-3 py-6 text-center">License</th>
                                        <th class="px-3 py-6 text-center">Date</th>
                                        <th class="px-3 py-6 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="searchResult">
                                    <?php $num = 1; ?>
                                    <?php foreach ($allMerchantList as $allMerchant) { ?>
                                        <tr class="bg-[#fffafa]">
                                            <td class="p-3 text-center"><?= $num++; ?></td>
                                            <td class="p-3 text-center"><?= $allMerchant["m_bname"] ?></td>
                                            <td class="mName p-3 text-center"><?= $allMerchant["m_name"] ?></td>
                                            <td class="mEmail p-3 text-center"><?= $allMerchant["m_email"] ?></td>
                                            <td class="p-3 text-center"><?= $allMerchant["m_phone"] ?></td>
                                            <td class="p-3 text-center"><?= $allMerchant["m_address"] ?></td>
                                            <?php $license = ($allMerchant["m_licene"] == null) ? "-" : $allMerchant["m_licene"]; ?>
                                            <td class="p-3 text-center"><?= $license ?></td>
                                            <td class="p-3 text-center"><?= $allMerchant["create_date"] ?></td>
                                            <td class="p-3 text-center ">
                                                <?php $mName = $allMerchant["m_name"] ?>
                                                <?php $mEmail = $allMerchant["m_email"] ?>
                                                <span class="banModal px-4 py-1 cursor-pointer bg-[#AC2E2E] text-white rounded-md" onclick="banMerchant('<?= $mName ?>','<?= $mEmail ?>')">BAN</span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end table -->
            </div>
            <!-- Analytics Data End  -->
        </div>
        <!-- Right-side End -->
    </section>

    <div id="modals-container">
        <div id="modal1" class="hidden fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <!-- Start Modal Content -->
                <div class="relative w-[400px]  mx-auto mt-[120px]  bg-primary rounded-lg text-left overflow-hidden shadow-xl transform transition-all ">
                    <div class="bg-white px-4 pt-5 pb-4">
                        <div class="mx-auto  h-12 w-12 absolute right-0 top-4 ">
                            <!-- Cross Sign -->
                            <svg class="closeBanModal h-6 w-6 text-black cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <form action="../../Controller/merchantList/banMerchantController.php" method="post">
                            <div class="mt-3 ml-4 text-left">
                                <span class="text-center block pb-4 mt-7">You are about to ban the following user:</span>
                                <h1 class=" font-semibold mt-5">Name: <input id="banName" name="m_Name" class="w-[200px] ml-[9px] font-normal outline-none" readonly></input></h1>
                                <h1 class="font-semibold mt-5"> Email: <input id="banMail" name="m_Email" class="w-[200px] font-normal ml-[13px] outline-none" readonly></input></h1>
                                <h1 class="font-semibold mt-5">Reason: <input  name="banReason" class="font-normal drop-shadow-lg pl-2" placeholder="Reason" type="text"></h1>

                                <div class="flex justify-center space-x-4 mt-6">
                                    <button class="closeBanModal rounded-[5px] px-3 py-1 text-white bg-[#AC2E2E]">Cancel</button>
                                    <button type="submit" name="allMerchant" class="closeBanModal bg-[#396C21] rounded-[5px] px-3 py-1 text-white">Confirm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Modal Content -->
            </div>
        </div>
    </div>

    <!-- banned or not -->
    <?php if(isset($_SESSION["view"]) && ($_SESSION["view"] == 1)){ ?>
        <div id="modals-container">
        <div id="modal2" class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <!-- Start Modal Content -->
                <div class="relative w-[400px]  mx-auto mt-[120px]  bg-primary rounded-lg text-left overflow-hidden shadow-xl transform transition-all ">
                    <div class="bg-white px-4 pt-5 pb-4">
                        <div class="mx-auto  h-12 w-12 absolute right-0 top-4 ">
                            <!-- Cross Sign -->
                            <svg class="closeBanModal2 h-6 w-6 text-black cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>

                        <div class="mt-5 ml-4 text-center">
                            <span class="text-center block pb-4 mt-7">Sorry, this merchant still has pending orders for customers.</span>
                        </div>
                    </div>
                </div>
                <!-- End Modal Content -->
            </div>
        </div>
    </div>
    <?php } ?>

    <script>
        function banMerchant(name, email) {
            document.getElementById("modal1").classList.remove("hidden");
            document.getElementById("banName").value = name;
            document.getElementById("banMail").value = email;
        }
        $(document).ready(function() {
            $(".closeBanModal").click(function() {
                $("#modal1").addClass("hidden");
            });
            $(".closeBanModal2").click(function() {
                $("#modal2").addClass("hidden");
            });
        });
    </script>
</body>

</html>
<?php
$_SESSION["banControllerPassed"] = false;
?>