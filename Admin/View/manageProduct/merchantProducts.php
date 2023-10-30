<?php

session_start();
if (!isset($_SESSION["totalMerchantProduct"]) || !isset($_SESSION["merchantProducts"])) {
  header("Location: ../Error/error.php");
} else {
  $totalMerchantProduct = isset($_SESSION["totalMerchantProduct"]) ? $_SESSION["totalMerchantProduct"] : false;
  $merchantProducts = isset($_SESSION["merchantProducts"]) ? $_SESSION["merchantProducts"] : false;
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Merchant's Products</title>
  <link rel="icon" href="../resources/img/headerLogo.svg" type="image/icon type">

  <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
  <script src="../resources/lib/jquery3.6.0.js"></script>
  <!-- google font link -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <!-- <link href="../resources/css/all_merchant.css"> -->


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
  <section class="w-full bg-[#12141B] max-w-[1600px] mx-auto flex">
    <!-- Import side bar  -->
    <?php $menu = "manageProducts" ?>
    <?php $subMenu = "merchantProducts" ?>
    <?php include "../resources/common/adminSideBar.php" ?>

    <!-- Right-side Start -->
    <div class="h-screen overflow-hidden w-full">
      <!-- Search Start-->
      <div class="bg-[#262B3A] flex justify-between items-center py-3 px-10">
        <div class="text-white">
          <p class="text-2xl font-semibold tracking-wider">Merchant's Products</p>
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

        <input type="text" name="" id="" class="w-[800px] py-2 px-5 rounded outline-none" placeholder="Search...">
      </div>
      <!-- Search End-->



      <div class="px-20  data-output">



        <!-- start Date -->
        <div date-rangepicker class="flex items-center space-x-5 -ml-[32px] py-[30px] pb-[40px] relative">
          <span class="text-white"><?= $totalMerchantProduct ?> products found.</span>
          <div class="absolute -right-[30px]">
            <label class="inline-flex text-white" for="">Sort By:</label>
            <select id="dropdown" class="inline-block mt-1  w-[165px] px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none">
              <option value="m_name">Merchant Name</option>
              <option value="p_name">Product Name</option>
              <option value="category_name">Category</option>
              <option value="sell_price">Sell Price</option>
            </select>
          </div>
        </div>
        <!-- end Date -->



        <!-- start table -->
        <div class="flex justify-center min-h-screen relative">
          <div class="col-span-12">
            <div class="h-[600px] overflow-y-scroll scrollbar-hide">
              <table class="table text-textBlack border-separate space-y-6 text-sm w-[1200px] overflow-y-scroll">
                <thead class="bg-[#fffafa] text-textBlack ">
                  <tr>
                    <th class="px-3 py-6 text-center">No.</th>
                    <th class="px-3 py-6 text-center">Merchant Name</th>
                    <th class="px-3 py-6 text-center">Brand Name</th>
                    <th class="px-3 py-6 text-center">Prodcut Name</th>
                    <th class="px-3 py-6 text-center">Category</th>
                    <th class="px-3 py-6 text-center">Sell Price</th>

                  </tr>
                </thead>
                <tbody id="sortResult">
                  <?php
                  $count = 1;
                  foreach ($merchantProducts as $product) { ?>
                    <tr class="bg-[#fffafa]">
                      <td class="p-3 text-center">
                        <?= $count++ ?>
                      </td>
                      <td class="p-3 text-center">
                        <?= $product["m_name"] ?>
                      </td>
                      <td class="p-3 text-center">
                        <?= $product["brand_name"] ?>
                      </td>
                      <td class="p-3 text-center">
                        <?= $product["p_name"] ?>
                      </td>
                      <td class="p-3 text-center">
                        <?= $product["category_name"] ?>
                      </td>
                      <td class="p-3 text-center ">
                        <?= $product["sell_price"] ?> Ks
                      </td>
                    </tr>
                  <?php }
                  ?>



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





  <!-- <script src="../resources/js/drop_down.js"></script> -->
  <script src="../resources/js/merchantProducts.js"></script>

</body>

</html>