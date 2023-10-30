<?php
include "../../Controller/merchantList/merchantListController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ban Merchant</title>
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

<body class="font-roboto ">
    <section class=" w-full bg-[#12141B] max-w-[1600px] mx-auto flex">
        <!-- Import side bar  -->
        <?php $menu = "merchantList" ?>
        <?php $subMenu = "bannedMerchants" ?>
        <?php include "../resources/common/adminSideBar.php" ?>

        <!-- Right-side Start -->
        <div class="h-screen overflow-hidden w-full">
            <!-- Search Start-->
            <div class="bg-[#262B3A] flex justify-between items-center py-3 px-10">
                <div class="text-white">
                    <p class="text-2xl font-semibold tracking-wider">Banned Merchant</p>
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
                <input type="text" name="" id="searchBannedMerchant" class="w-[800px] py-2 px-5 rounded outline-none" placeholder="Search by name">
            </div>
            <!-- Search End-->

            <div class="px-20">
                <!-- start sort -->
                <div class="w-full py-[20px] pb-[30px]">
                    <div class="text-right">
                        <label class="text-white" for="dropdownBannedMerchant">Sort By:</label>
                        <select id="dropdownBannedMerchant" class=" mt-1  w-[160px] px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none">
                            <option selected value="m_name">Personal Name</option>
                            <option value="m_bname">Business Name</option>
                            <option value="m_address">Address</option>
                            <option value="create_date">Date</option>
                        </select>
                    </div>
                </div>
                <!-- end sort -->

                <!-- Start Table -->
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
                                    <?php foreach ($bannedMerchantList as $bannedMerchant) { ?>
                                        <tr class="bg-[#fffafa]">
                                            <td class="p-3 text-center"><?= $num++; ?></td>
                                            <td class="p-3 text-center"><?= $bannedMerchant["m_bname"] ?></td>
                                            <td class="mName p-3 text-center"><?= $bannedMerchant["m_name"] ?></td>
                                            <td class="mEmail p-3 text-center"><?= $bannedMerchant["m_email"] ?></td>
                                            <td class="p-3 text-center"><?= $bannedMerchant["m_phone"] ?></td>
                                            <td class="p-3 text-center"><?= $bannedMerchant["m_address"] ?></td>
                                            <?php $license = ($bannedMerchant["m_licene"] == null) ? "-" : $bannedMerchant["m_licene"]; ?>
                                            <td class="p-3 text-center"><?= $license ?></td>
                                            <td class="p-3 text-center"><?= $bannedMerchant["create_date"] ?></td>
                                            <td class="p-3 text-center ">
                                                <?php $mName = $bannedMerchant["m_name"] ?>
                                                <?php $mEmail = $bannedMerchant["m_email"] ?>
                                                <span class="banModal px-4 py-1 cursor-pointer bg-[#396C21] text-white rounded-md" onclick="permitMerchant('<?= $mName ?>','<?= $mEmail ?>')">PERMIT</span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Table -->
            </div>
        </div>
        <!-- Right-side End -->
    </section>

    <!-- Start Modal Box -->
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
                        <form action="../../Controller/merchantList/permitMerchantController.php" method="post">
                            <div class="mt-3 ml-4 text-left">
                                <span class="text-center block pb-4 mt-7">You are about to permit the following user:</span>
                                <h1 class=" font-semibold mt-5">Name: <input id="permitName" name="m_Name" class="w-[200px] ml-[9px] font-normal outline-none" readonly></input></h1>
                                <h1 class="font-semibold mt-5"> Email: <input id="permitMail" name="m_Email" class="w-[240px] font-normal ml-[13px] outline-none" readonly></input></h1>
                                <div class="flex justify-center space-x-4 mt-6">
                                    <button class="closeBanModal rounded-[5px] px-3 py-1 text-white bg-[#AC2E2E]">Cancel</button>
                                    <button type="submit" class="closeBanModal bg-[#396C21] rounded-[5px] px-3 py-1 text-white">Confirm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Modal Content -->
            </div>
        </div>
    </div>
    <!-- End Modal Box -->
    <script>
        function permitMerchant(name, email) {
            document.getElementById("modal1").classList.remove("hidden");
            document.getElementById("permitName").value = name;
            document.getElementById("permitMail").value = email;
        }
        $(document).ready(function() {
            $(".closeBanModal").click(function() {
                $("#modal1").addClass("hidden");
            });
        });
    </script>
</body>

</html>