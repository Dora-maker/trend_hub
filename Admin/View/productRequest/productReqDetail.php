<?php
session_start();
if (!isset($_SESSION["reqDetails"]) || ($_SESSION["passReqDetailController"] == false)) {
    header("Location: ../../View/Error/error.php");
} else {
    $submitId = $_SESSION["id"];
    $bname = $_SESSION["bname"];
    $id = $_SESSION["mid"];
    $email = $_SESSION["m_email"];
    $reqDetails = $_SESSION["reqDetails"];
    $total = $_SESSION["total"];
    //print_r($reqDetails);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Requests</title>
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

    <section class="w-full bg-[#12141B] max-w-[1600px] mx-auto flex">
        <!-- Import side bar  -->
        <?php $menu = "productRequest" ?>
        <?php include "../resources/common/adminSideBar.php" ?>

        <!-- Right-side Start -->
        <div class="h-screen overflow-hidden w-full">
            <!-- Search Start-->
            <div class="bg-[#262B3A] flex justify-between items-center py-3 px-10">
                <div class="text-white">
                    <p class="text-2xl font-semibold">Product Requests</p>
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
            <div class="px-[53px] py-8">
                <!-- Sort Start  -->
                <div class="flex items-center justify-between space-x-2 mb-2">
                    <div class="text-white">
                        <h1 class="font-semibold text-3xl"><?= $bname ?></h1>
                        <span><?= $total[0]["total"]; ?> Product Requests</span>
                    </div>
                </div>
                <!-- Sort END  -->
                <?php if ((isset($_SESSION["allFinished"])) && ($_SESSION["allFinished"] == true)) { ?>
                    <div class="text-center">
                        <span class="text-white text-lg">You have finished approving/ rejecting these request.</span>
                        <a href="../productRequest/productRequest.php"><button class="py-2 px-10 mt-4 bg-[#456265] text-white font-semibold rounded-md shadow-md">Go Back to Main Product Request</button></a>
                    </div>
                <?php } ?>

                <!-- Table Start  -->
                <div class="flex justify-center min-h-screen">
                    <div class="col-span-12">
                        <div class="h-[500px] overflow-y-scroll scrollbar-hide">
                            <table class="table text-textBlack border-separate space-y-6 text-sm w-[1200px] overflow-y-scroll">
                                <thead class="bg-[#fffafa] text-textBlack ">
                                    <tr>
                                        <th class="px-3 py-6 text-center">No.</th>
                                        <th class="px-3 py-6 text-center">Category</th>
                                        <th class="px-3 py-6 text-center">Name</th>
                                        <th class="px-3 py-6 text-center">Qty</th>
                                        <th class="px-3 py-6 text-center">Sell Price</th>
                                        <th class="px-3 py-6 text-center">Approval Status</th>
                                        <th class="px-3 py-6 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num = 1; ?>
                                    <?php foreach ($reqDetails as $detail) { ?>
                                        <tr class="bg-[#fffafa]">
                                            <td class="p-3 text-center"><?= $num++; ?></td>
                                            <td class="p-3 text-center"><?= $detail["category_name"] ?></td>
                                            <td class="p-3 text-center"><?= $detail["p_name"] ?></td>
                                            <td class="p-3 text-center"><?= $detail["p_stock"] ?></td>
                                            <td class="p-3 text-center"><?= $detail["sell_price"] ?></td>
                                            <?php
                                            if ($detail["approved"] == 0 && $detail["rejected"] == 0) {
                                                $status = "Pending";
                                            } else if ($detail["approved"] == 1) {
                                                $status = "Approved";
                                            } else if ($detail["rejected"] == 1) {
                                                $status = "Rejected";
                                            }
                                            ?>
                                            <td class="p-3 text-center"><?= $status ?></td>
                                            <td class="p-3 text-center ">
                                                <span id="<?= $detail["id"] ?>" class="checkDetail underline font-semibold cursor-pointer">Check</span>
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

    <!-- Start Modal box to create product-->
    <div id="showDetailModal" class="modal hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <!-- start of container box -->
        <div class="bg-white m-auto p-2 border rounded-sm w-[80%] relative">
            <button id="closeModalButton" class="absolute top-4 right-4 text-gray-700 hover:text-gray-900">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <h2 class="text-2xl font-bold px-6 py-3">Product Details</h2>
            <form action="../../Controller/productRequest/approveOrRejectRequestController.php" method="post">
                <input type="hidden" id="p_request_detail_id" name="productReqDetailId">
                <input type="hidden" name="p_submit_id" value="<?= $submitId ?>">
                <input type="hidden" name="merchantId" value="<?= $id ?>">
                <input type="hidden" id="buyPrice" name="buyPrice">
                <input type="hidden" name="merchantEmail" value="<?= $email ?>">
                <!-- start of upper row -->
                <div class="px-6 py-4 grid grid-cols-2 gap-4">
                    <!-- start of add product text fields -->
                    <div class="col-span-1">
                        <div class="bg-[#456265] p-4">
                            <div class="mb-4 relative">
                                <label for="category" class="z-0 absolute top-0 left-0 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 pr-[60px] rounded-md">Category:</label>
                                <input type="text" id="category" name="category" value="" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" readonly>
                            </div>
                            <div class="mb-4 relative">
                                <label for="productName" class="z-0 absolute top-0 left-0 pr-6 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Product Name:</label>
                                <input type="text" id="productName" name="productName" value="" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" readonly>
                            </div>
                            <div class="mb-4 relative">
                                <label for="brand" class="z-0 absolute top-0 left-0 pr-[86px] bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Brand:</label>
                                <input type="text" id="brand" name="brandName" value="" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" readonly>
                            </div>
                            <div class="mb-4 relative">
                                <label for="sellPrice" class="z-0 absolute top-0 left-0 pr-16 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Sell Price:</label>
                                <input type="text" id="sellPrice" name="sellPrice" value="" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" readonly>
                            </div>
                            <div class="relative">
                                <label for="quantity" class="z-0 absolute top-0 left-0 pr-[68px] bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Quantity:</label>
                                <input type="number" id="quantity" name="quantity" value="" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- end of product text fields -->
                    <!-- start of upload photo -->
                    <div class="col-span-1">
                        <div class="h-full flex justify-center items-center rounded-lg border border-dashed border-gray-600 px-6 py-10">
                            <div class="text-center">
                                <div class="mt-4">
                                    <div class="flex justify-center"><img class="p_Image max-w-xs max-h-60" id="productImage" src="" alt=""></div>
                                    <input type="hidden" id="pImage" name="pImage">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of upload photo -->
                </div>
                <!-- end of upper row -->

                <!-- start of bottom row -->
                <div class="px-6 py-2">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="productDetail" class="block font-medium">Product Detail:</label>
                            <textarea id="productDetail" name="productDetail" class="block w-full mt-1 p-2 border border-secondary rounded-md shadow-md outline-none" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="productDescription" class="block font-medium">Product Description:</label>
                            <textarea id="productDescription" name="productDescription" class="block w-full mt-1 p-2 border border-secondary rounded-md shadow-md outline-none" rows="3" readonly></textarea>
                        </div>
                    </div>
                    <div class="submitBtn flex justify-end items-center">
                        <button type="submit" name="reject" class="px-8 mr-10 mt-7 shadow-md block py-2 bg-[#AC2E2E] text-white rounded-md outline-none ">Reject</button>
                        <button type="submit" name="approve" class="px-5 mt-7 shadow-md block py-2 bg-[#456265] text-white rounded-md outline-none ">Approve</button>
                    </div>
                </div>
                <!-- end of bottom row -->
            </form>
        </div>
        <!-- end of container box -->
    </div>
    <!-- End Modal box to create product-->

    <script>
        //Admin Product Edit Model Box
        $(document).on("click", ".checkDetail", function() {
            $("#showDetailModal").removeClass("hidden");
            $.ajax({
                url: "../../Controller/productRequest/productReqDetailCheckController.php",
                type: "POST",
                data: {
                    id: this.id,
                },
                success: function(result) {
                    let products = JSON.parse(result);
                    (products[0].approved == 1) ? $(".submitBtn").addClass("hidden"): $(".submitBtn").removeClass("hidden");
                    $("#p_request_detail_id").val(products[0].id);
                    $("#category").val(products[0].category_name);
                    $("#productName").val(products[0].p_name);
                    $("#brand").val(products[0].brand_name);
                    $("#sellPrice").val(products[0].sell_price);
                    $("#buyPrice").val(products[0].buy_price);
                    $("#quantity").val(products[0].p_stock);
                    $("#productImage").attr("src", "../../.." + products[0].p_path);
                    $("#pImage").val(products[0].p_path);
                    $("#productDetail").val(products[0].p_detail);
                    $("#productDescription").val(products[0].p_description);
                },
                error: function(error) {
                    console.log(error);
                },
            });

            $("#closeModalButton").click(function() {
                $("#showDetailModal").addClass("hidden");
            })
        });
    </script>
</body>

</html>
<?php
$_SESSION["passReqDetailController"] = false;
$_SESSION["allFinished"] = false;
?>