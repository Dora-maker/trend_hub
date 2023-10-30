<?php

session_start();
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

            <!-- Send Notifications Data Start -->
            <form class="px-10 py-10 flex flex-col space-y-10" action="../../Controller/notification/sendNotiController.php" method="POST">
                <small class="<?php if (isset($_SESSION["noEmail"])) echo "text-red-400" ?>
                <?php if (isset($_SESSION["success"])) echo "text-green-400"?>
                ">
                    <?php
                    if (isset($_SESSION["noEmail"])) echo $_SESSION["noEmail"];
                    if (isset($_SESSION["success"])) echo $_SESSION["success"];
                    ?>
                </small>
                <div class="flex space-x-8 items-center justify-between w-80">
                    <span class="text-white">To :</span>
                    <select name="notiTo" id="notiTo" class="py-[6px] pr-[42px] pl-[53px] rounded outline-none border-black border-2" required>
                        <option value="customer">Customer</option>
                        <option value="allCustomers">All Customers</option>
                        <option value="merchant">Merchant</option>
                        <option value="allMerchants">All Merchants</option>
                    </select>
                </div>

                <div id="emailBox" class="flex space-x-2 items-center justify-between w-80">
                    <span class="text-white">Email :</span>
                    <input type="text" name="email" id="emailInput" class="py-1 px-3 rounded outline-none border-black border" required>
                </div>

                <div class="flex space-x-2 items-center justify-between w-80">
                    <span class="text-white">Title :</span>
                    <input type="text" name="title" id="" class="py-1 px-3 rounded outline-none border-black border" required>
                </div>

                <div class="flex flex-col space-y-5 w-[80%]">
                    <span class="text-white">Message:</span>
                    <textarea name="message" id="" cols="30" rows="10" class="rounded outline-none p-5" required></textarea>
                    <div class="text-right">
                        <button type="submit" name="sendNoti" class="px-10 py-1 bg-[#456265] text-white rounded">Send</button>
                    </div>
                </div>



            </form>





            <!-- Send Notifications Data End  -->

        </div>
        <!-- Right-side End -->

    </section>

    <script src="../resources/js/sendNoti.js"></script>
</body>

</html>


<?php

unset($_SESSION["noEmail"]);
unset($_SESSION["success"]);


?>