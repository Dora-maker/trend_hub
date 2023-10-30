<?php
include "../../Controller/customersList/customersListController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Customers</title>
  <link rel="icon" href="../resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <!-- google font link -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <script src="../resources/lib/jquery3.6.0.js"></script>
    <script src="../resources/js/dropDown/drop_downCustomer.js" defer></script>
    <script src="../resources/js/search/searchCustomer.js" defer></script>
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
        <?php $menu = "customersList" ?>
        <?php $subMenu = "newCustomers" ?>
        <?php include "../resources/common/adminSideBar.php" ?>

        <!-- Right-side Start -->
        <div class="h-screen overflow-hidden w-full">
            <!-- Search Start-->
            <div class="bg-[#262B3A] flex justify-between items-center py-3 px-10">
                <div class="text-white">
                    <p class="text-2xl font-semibold">New Customers</p>
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
                <input type="text" name="" id="searchNewCustomers" class="w-[800px] py-2 px-5 rounded outline-none" placeholder="Search by name">
            </div>
            <!-- Search End-->

            <!-- All Customers Data Start -->
            <div class="px-[53px] py-8">
                <!-- Sort Start  -->
                <div class="flex items-center justify-end space-x-2 mb-2">
                    <span class="text-white">Sort by:</span>
                    <select name="" id="dropDownNewCustomer" class="outline-none rounded py-1 px-3">
                        <option value="c_name">Name</option>
                        <option value="c_address">Address</option>
                        <option value="create_date">Date</option>
                    </select>
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
                                        <th class="px-3 py-6 text-center">Name</th>
                                        <th class="px-3 py-6 text-center">Email</th>
                                        <th class="px-3 py-6 text-center">Phone Number</th>
                                        <th class="px-3 py-6 text-center">Address</th>
                                        <th class="px-3 py-6 text-center">Date</th>
                                        <th class="px-3 py-6 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="searchResult">
                                    <?php $num = 1; ?>
                                    <?php foreach ($newCustomersList as $newCustomer) { ?>
                                        <tr class="bg-[#fffafa]">
                                            <td class="p-3 text-center"><?= $num++; ?></td>
                                            <td class="p-3 text-center"><?= $newCustomer["c_name"] ?></td>
                                            <td class="p-3 text-center"><?= $newCustomer["c_email"] ?></td>
                                            <td class="p-3 text-center"><?= $newCustomer["c_phone"] ?></td>
                                            <td class="p-3 text-center"><?= $newCustomer["c_address"] ?></td>
                                            <td class="p-3 text-center"><?= $newCustomer["create_date"] ?></td>
                                            <td class="p-3 text-center ">
                                                <?php $cName = $newCustomer["c_name"] ?>
                                                <?php $cEmail = $newCustomer["c_email"] ?>
                                                <span class="banModal px-4 py-1 cursor-pointer bg-[#AC2E2E] text-white rounded-md" onclick="banCustomer('<?= $cName ?>','<?= $cEmail ?>')">BAN</span>
                                            </td>
                                        </tr>
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
                        <form action="../../Controller/customersList/banCustomerController.php" method="post">
                            <div class="mt-3 ml-4 text-left">
                                <span class="text-center block pb-4 mt-7">You are about to ban the following user:</span>
                                <h1 class=" font-semibold mt-5">Name: <input id="banName" name="c_Name" class="w-[200px] ml-[9px] font-normal outline-none" readonly></input></h1>
                                <h1 class="font-semibold mt-5"> Email: <input id="banMail" name="c_Email" class="w-[200px] font-normal ml-[13px] outline-none" readonly></input></h1>
                                <h1 class="font-semibold mt-5">Reason: <input name="banReason" class="font-normal drop-shadow-lg pl-2" placeholder="Reason" type="text"></h1>
                                <div class="flex justify-center space-x-4 mt-6">
                                    <button class="closeBanModal rounded-[5px] px-3 py-1 text-white bg-[#AC2E2E]">Cancel</button>
                                    <button type="submit" name="newCustomer" class="closeBanModal bg-[#396C21] rounded-[5px] px-3 py-1 text-white">Confirm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Modal Content -->
            </div>
        </div>
    </div>

    <script>
        function banCustomer(name, email) {
            document.getElementById("modal1").classList.remove("hidden");
            document.getElementById("banName").value = name;
            document.getElementById("banMail").value = email;
        }
        $(document).ready(function() {
            $(".closeBanModal").click(function() {
                $("#modal1").addClass("hidden");
            });
        });
    </script>
</body>

</html>