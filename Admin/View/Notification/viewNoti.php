<?php
session_start();
// $customersContact = $_SESSION["customersContact"];
// $merchantsContact = $_SESSION["merchantsContact"];
$totalContact = $_SESSION["totalContact"];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
  <link rel="icon" href="../resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <script src="../resources/lib/jquery3.6.0.js"></script>

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
</head>

<body class="font-roboto">
    <section class=" w-full bg-[#12141B] max-w-[1600px] mx-auto flex">
        <!-- Import side bar  -->
        <?php $menu = "notifications" ?>
        <?php include "../resources/common/adminSideBar.php" ?>

        <!-- Right-side Start -->
        <div class="h-screen w-full overflow-hidden">
            <!-- Search Start-->
            <div class="bg-[#262B3A] flex justify-between items-center py-3 px-10">
                <div class="text-white">
                    <p class="text-2xl font-semibold">Notifications</p>
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
                <!-- Sort Start  -->
                <div class="flex items-center justify-end space-x-2 mb-2">
                    <span class="text-white">Sort by:</span>
                    <select name="" id="notiSort" class="outline-none rounded py-1 px-3">
                        <option value="all">All</option>
                        <option value="customer">Customer</option>
                        <option value="merchant">Merchant</option>
                    </select>
                </div>
                <!-- Sort END  -->

                <!-- Noti Start  -->
                <div class="flex space-x-5 mt-3">
                    <!-- Left-side start  -->
                    <div id="leftSide" class="h-[70vh] overflow-y-scroll scrollbar-hide w-[900px]">
                        <!-- Noti card 1 start  -->
                        <?php
                        foreach ($totalContact as $contact) { ?>
                            <?php $contactDate = ($contact["create_date"] === date("Y-m-d")) ? "Today" :  $contact["create_date"] ?>
                            <?php $name = (isset($contact["c_name"])) ? $contact["c_name"] . "(Customer)" : $contact["m_name"] . "(Merchant)" ?>
                            <div class="noti h-30 bg-white shadow-lg px-4 py-3 mb-3 border hover:bg-pink-100 hover:border-secondary rounded cursor-pointer">
                                <div class="flex justify-between">
                                    <div class="flex items-center">
                                        <img src="../resources/img/profile/notifyProfile.png" alt="">
                                        <p class="px-2 text-sm"><?= $name ?></p>
                                    </div>
                                    <p><?= $contactDate ?></p>
                                </div>
                                <div class="px-6 w-[500px] overflow-hidden">
                                    <p class="text-sm truncate"><?= $contact["msg_text"] ?></p>
                                </div>
                            </div>
                        <?php    }
                        ?>
                        <!-- Noti card 1 end  -->
                    </div>
                    <!-- Left-side end  -->

                    <!-- Right-side start  -->
                    <div id="rightSide" class="h-[70vh] overflow-y-scroll scrollbar-hide w-[900px]">
                        <!-- message 1    -->
                        <?php
                        $counter = 1;
                        foreach ($totalContact as $text) { ?>
                            <div class="message bg-white shadow-lg px-4 py-3 border rounded <?php if ($counter != 1) echo "hidden" ?>">
                                <div class="flex flex-row">
                                    <div class="flex flex-row justify-start">
                                        <img src="../resources/img/profile/notifyProfile.png" alt="">
                                        <p class="px-2">To Admin</p>
                                    </div>
                                </div>
                                <div class="px-6 mt-3">
                                    <p class="text-sm whitespace-pre-line">
                                        <?= $text["msg_text"] ?>
                                    </p>
                                </div>
                            </div>
                        <?php $counter++; }
                        ?>
                        <!-- message 1 end -->
                    </div>
                    <!-- Right-side end  -->
                </div>
                <!-- Noti End  -->

                <div class="text-right mt-5">
                    <a href="./sendNoti.php"><button class="py-1 bg-[#456265] text-white px-5 rounded">Send New Noti</button></a>
                </div>

            </div>
            <!-- All Customers Data End  -->

        </div>
        <!-- Right-side End -->

    </section>




    <script src="../resources/js/notification.js"></script>
</body>

</html>




