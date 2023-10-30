<?php

session_start();

if (!isset($_SESSION["totalCount"]) || !isset($_SESSION["adminProducts"]) || !isset($_SESSION["allCategories"])) {
    header("Location: ../Error/error.php");
} else {
    $totalCount  = $_SESSION["totalCount"];
    $adminProducts = $_SESSION["adminProducts"];
    $allCategories = $_SESSION["allCategories"];
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin's Product</title>
  <link rel="icon" href="../resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <!-- google font link -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- flowBite link -->
    <!-- <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script> -->

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="../resources/css/pending_merchant.css">
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

    .starColor {
        color: #F36823;
    }
</style>

<body class="font-roboto ">
    <section class=" w-full bg-[#12141B] max-w-[1600px] mx-auto flex">
        <!-- Import side bar  -->
        <?php $menu = "manageProducts" ?>
        <?php $subMenu = "adminProducts" ?>
        <?php include "../resources/common/adminSideBar.php" ?>

        <!-- Right-side Start -->
        <div class="h-screen overflow-hidden w-full">
            <!-- Search Start-->
            <div class="bg-[#262B3A] flex justify-between items-center py-3 px-10">
                <div class="text-white">
                    <p class="text-2xl font-semibold  tracking-wider">Admin's Product</p>
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


            <!-- Analytics Data Start -->
            <div class="px-20 data-output">


                <!-- start Date -->
                <div date-rangepicker class="flex items-center space-x-5 -ml-[32px] py-[30px] pb-[40px] relative">
                    <span class="text-white"><?= $totalCount ?> products found.</span>
                    <div class="absolute -right-[30px]">
                        <label class="inline-flex text-white" for="">Sort By:</label>
                        <select id="dropdown" class="inline-block mt-1  w-[165px] px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none">
                            <option value="p_name">Product Name</option>
                            <option value="p_stock">Stock</option>
                            <option value="sell_price">Sell Price</option>
                            <option value="buy_price">Buy Price</option>
                        </select>
                    </div>
                </div>
                <!-- end Date -->





                <div class="flex justify-center min-h-screen relative">
                    <div class="col-span-12">
                        <div class="h-[500px] overflow-y-scroll scrollbar-hide">
                            <table class="table text-textBlack border-separate space-y-6 text-sm w-[1200px] overflow-y-scroll">
                                <thead class="bg-[#fffafa] text-textBlack ">
                                    <tr>
                                        <th class="px-3 py-6 text-center">No.</th>
                                        <th class="px-3 py-6 text-center">Product Name</th>
                                        <th class="px-3 py-6 text-center">Category</th>
                                        <th class="px-3 py-6 text-center">Stock</th>
                                        <th class="px-3 py-6 text-center">Buy Price</th>
                                        <th class="px-3 py-6 text-center">Sell Price</th>
                                        <th class="px-3 py-6 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="sortResult">

                                    <?php
                                    if ($totalCount > 0) {
                                        $count = 1;
                                        foreach ($adminProducts as $product) {
                                    ?>
                                            <tr class="bg-[#fffafa] group hover:scale-[0.99] transition-transform">
                                                <td class="p-3 text-center cursor-pointer showDetail" detailID="<?= $product["id"] ?>">
                                                    <?= $count++ ?>
                                                </td>
                                                <td class="p-3 text-center cursor-pointer showDetail" detailID="<?= $product["id"] ?>">
                                                    <?= $product["p_name"] ?>

                                                </td>
                                                <td class="p-3 text-center cursor-pointer showDetail" detailID="<?= $product["id"] ?>">
                                                    <?= $product["category_name"] ?>
                                                </td>

                                                <td class="p-3 text-center cursor-pointer showDetail" detailID="<?= $product["id"] ?>">
                                                    <?= $product["p_stock"] ?>

                                                </td>
                                                <td class="p-3 text-center cursor-pointer showDetail" detailID="<?= $product["id"] ?>">
                                                    <?= number_format($product["buy_price"]) ?> Ks
                                                </td>
                                                <td class="p-3 text-center cursor-pointer showDetail" detailID="<?= $product["id"] ?>">
                                                    <?= number_format($product["sell_price"]) ?> Ks
                                                </td>
                                                <td class="p-3 text-center  space-x-2 ">
                                                    <span id="<?= $product["id"] ?>" class="editProduct px-4 py-2 cursor-pointer bg-[#396C21] text-white rounded-md">EDIT</span>
                                                    <span deleteID="<?= $product["id"] ?>" class="deleteProduct px-4 py-2 cursor-pointer bg-[#AC2E2E] text-white rounded-md">DELETE</span>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                        <span id="openModalButton" class="text-white py-2 px-7 bg-[#456265] rounded-md absolute right-0 mt-4 cursor-pointer -mr-5 ">Add New Product</span>
                    </div>






                </div>

            </div>
            <!-- Analytics Data End  -->

        </div>
        <!-- Right-side End -->

    </section>




    <!-- Start modal box for delete-->
    <div id="modals-container">
        <div id="modal1" class="hidden fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <!-- Start Modal Content -->
                <div class="relative w-[400px]  mx-auto mt-[120px]  bg-primary rounded-lg text-left overflow-hidden shadow-xl transform transition-all ">
                    <div class="bg-white px-4 pt-5 pb-4">
                        <div class="">
                            <div class="mx-auto  h-12 w-12 absolute right-0 top-4 ">
                                <!-- Cross Sign -->
                                <svg id="closeModal1" class="h-6 w-6 text-[#F36823]  cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                            <div class="mt-3  ml-4 text-left">
                                <span class="text-center block pb-4 mt-7">You are about to Delete the following item:</span>
                                <h1 id="deleteProductName" class=" font-semibold mt-2  text-center "> MSI Summit E13 Flip Evo</h1>
                                <img src="" id="deleteProductImg" class=" h-[100px] mx-auto mt-4 mb-4" alt="">


                            </div>
                        </div>
                        <div class="flex justify-center space-x-4 mt-6">
                            <input type="hidden" name="" id="deleteProductID">
                            <button id="cancelDeleteProduct" class="rounded-[5px] px-3 py-1 text-white   bg-[#AC2E2E]">Cancel</button>
                            <button id="confirmDeleteProduct" class="bg-[#456265] rounded-[5px] px-3 py-1 text-white">Confirm</button>

                        </div>
                    </div>

                </div>
                <!-- End Modal Content -->

            </div>
        </div>
    </div>
    <!-- end modal box  delete-->






    <!-- Start Modal box to create product-->
    <div id="myModal" class="modal hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <!-- start of container box -->
        <div class="bg-white m-auto p-2 border rounded-sm w-[80%] relative">
            <div class="text-4xl font-bold absolute right-8 top-5 cursor-pointer"><ion-icon id="closeModalButton" name="close-outline"></ion-icon></div>
            <h2 class="text-2xl font-bold px-6 py-3">Add New Product</h2>
            <form action="../../Controller/manageProducts/adminAddProductController.php" method="post" enctype="multipart/form-data">
                <!-- start of upper row -->
                <div class="px-6 py-4 grid grid-cols-2 gap-4">
                    <!-- start of add product text fields -->
                    <div class="col-span-1">
                        <div class="bg-[#456265] p-4">
                            <div class="mb-4 relative">
                                <label for="category" class="z-0 absolute top-0 left-0 pr-16 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Category:</label>
                                <select id="category" name="category" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor">
                                    <!-- Add options for categories here -->
                                    <?php
                                    foreach ($allCategories as $category) { ?>
                                        <option value="<?= $category["id"] ?>"><?= $category["category_name"] ?></option>
                                    <?php }
                                    ?>
                                    <!-- Add more options if needed -->
                                </select>
                            </div>
                            <div class="mb-4 relative">
                                <label for="productName" class="z-0 absolute top-0 left-0 pr-6 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Product Name:</label>
                                <input type="text" id="productName" name="productName" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" required>
                            </div>
                            <div class="mb-4 relative">
                                <label for="brand" class="z-0 absolute top-0 left-0 pr-[86px] bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Brand:</label>
                                <input type="text" id="brand" name="brand" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor">
                            </div>
                            <div class="mb-4 relative">
                                <label for="sellPrice" class="z-0 absolute top-0 left-0 pr-16 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Sell Price:</label>
                                <input type="text" id="sellPrice" name="sellPrice" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" required>
                            </div>
                            <div class="mb-4 relative">
                                <label for="buyPrice" class="z-0 absolute top-0 left-0 pr-16 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Buy Price:</label>
                                <input type="text" id="buyPrice" name="buyPrice" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" required>
                            </div>
                            <div class="relative">
                                <label for="quantity" class="z-0 absolute top-0 left-0 pr-[68px] bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Quantity:</label>
                                <input type="number" id="quantity" name="quantity" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" required>
                            </div>
                        </div>
                    </div>
                    <!-- end of add product text fields -->
                    <!-- start of upload photo -->
                    <div class="col-span-1">
                        <div class="h-full flex justify-center items-center rounded-lg border border-dashed border-gray-600 px-6 py-10">
                            <div class="text-center">
                                <div class="mt-4">
                                    <div class="flex justify-center"><img class="p_Image max-w-xs max-h-60" id="photoimg" src="" alt=""></div>
                                    <label for="file_upload" class="mt-2 cursor-pointer rounded-md bg-white font-semibold text-darkGreenColor">
                                        <span class="font-bold underline">Upload a file: </span>
                                    </label>
                                    <input id="file_upload" name="productImg" type="file" class="hidden mt-2 text-center" accept=".png, .jpg" required>
                                </div>
                                <!-- <p>PNG, JPG up to 10MB</p> -->
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
                            <textarea id="productDetail" name="productDetail" class="block w-full mt-1 p-2 border border-secondary rounded-md shadow-md outline-none" rows="3" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="productDescription" class="block font-medium">Product Description:</label>
                            <textarea id="productDescription" name="productDescription" class="block w-full mt-1 p-2 border border-secondary rounded-md shadow-md outline-none" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="flex justify-end items-center">
                        <button onclick="hideEdit()" type="submit" name="addProduct" class="closeViewDetailModal py-2 px-10 mt-4 bg-[#456265] text-white font-semibold rounded-md shadow-md">Add</button>
                    </div>
                </div>
                <!-- end of bottom row -->
            </form>
        </div>
        <!-- end of container box -->
    </div>
    <!-- End Modal box to create product-->




    <!-- Start Product Details -->
    <div id="modalDetail" class="modal hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="modal-content bg-[#FEFEFE] w-[1000px] h-[650px] rounded shadow-md relative">
            <span class=" font-semibold text-lg px-5 block mt-3 ">Item's Details</span>
            <button id="hideDetail" class="absolute top-4 right-4 text-gray-700 hover:text-gray-900">
                <svg class="h-6 w-6 text-[#F36823] " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <div class="w-[950px] h-[600px] mt-[25px] mx-auto">

                <div class="w-[950px] h-[250px] bg-[#E4E4D2]">
                    <div class=" flex">

                        <div class="w-[300px]">
                            <img class="w-[200px] max-h-[200px] mx-auto pt-[40px] object-cover" id="detailImg" src="" alt="">
                        </div>

                        <div class="w-[650px] h-[150px] p-5" id="detailTxt">
                            MSI Summit E13 Flip Evo 13.4" FHD+ 120hz Touch 2 in 1 Business Laptop: Intel Core i7-1260P Iris Xe 32GB LPDDR5 1TB NVMe SSD, 360-Degree Flip, Thunderbolt 4, MSI Pen, Win 11
                        </div>
                        <input type="hidden" id="reviewID" name="">

                    </div>
                    <div class="flex -mt-[53px]">
                        <div class="w-[300px]"></div>
                        <div class="w-[650px] h-[100px] flex justify-between">
                            <div class="p-5"><span class=" font-semibold text-lg ">Brand:</span> <span class="font-semibold text-[#F36823]" id="detailBrand"></span></div>
                            <div class="p-5"><span class=" font-semibold text-lg ">From:</span> <span class="font-semibold text-[#F36823]" id="detailMBrand"></span></div>

                        </div>
                    </div>

                </div>

                <div class="">
                    <h1 class="underline font-semibold text-lg p-5">Product Description</h1>
                    <span class="w-[820px] mx-auto block" id="detailDesc">Engineered to deliver devastation in and out of the arena, the Legion 5 Pro deploys Intel Core processing and NVIDIA GeForce RTX graphics to dish out high-resolution gaming. The world’s first 16" QHD gaming laptop with up to 165Hz refresh sets up a “winning zone” that gives you an extra edge and ups your peripheral vision. Combined with Nahimic 3D audio that pinpoints footsteps in space.</span>

                </div>

                <button id="showReview" class="rounded-md shadow-md font-semibold block px-4 py-1 bg-[#456265] mx-auto text-white mt-[90px]">View Customer's Review</button>

            </div>


        </div>
    </div>

    <!-- End Product Details -->



    <!-- start review -->
    <div id="modalReview" class="modal hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="modal-content bg-[#FEFEFE] w-[1000px] h-[650px] rounded shadow-md relative">
            <span class=" font-semibold text-lg px-5 block mt-3 ">Item's Reviews and Ratings</span>
            <button id="hideReview" class="absolute top-4 right-4 text-gray-700 hover:text-gray-900">
                <svg class="h-6 w-6 text-[#F36823] " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <div class="w-[950px] h-[180px] mt-[25px] mx-auto flex justify-between">
                <div class="flex">
                    <div>
                        <img id="reviewImg" class="w-[100px]" src="" alt="">
                    </div>
                    <div class="text-md font-semibold ml-2 ">
                        <span>Name : <span id="reviewProductName"></span></span><br>
                    </div>
                </div>
            </div>

            <div id="customerReviews" class=" h-[300px] overflow-y-scroll">
                <!-- 1st -->
                <!-- <div class="w-[900px] h-[100px] mx-auto bg-[#F7F7F7] p-2">
                    <div class="w-[900px] h-[30px] relative">
                        <div class="profile flex ">
                            <div class="w-[30px] h-[30px] rounded-full mt-1">
                                <img class="leading-[30px] -mt-1" src="../resources/img/profile/default_pic" alt="">
                                <div class="rating text flex">
                                    <span class="starColor">&#9733;</span>
                                    <span class="starColor">&#9733;</span>
                                    <span class="starColor">&#9733;</span>
                                    <span class="starColor">&#9733;</span>
                                    <span class="">&#9733;</span>
                                </div>
                            </div>
                            <p class=" font-semibold text-lg ml-2">User A</p>
                            <div>
                                <span class="absolute right-4">2023/07/12</span>
                            </div>
                        </div>
                        <span class="mt-3 block">Lorem ipsum dolor sit amet consectetur. Eu dictumst orci egestas vitae donec. </span>
                    </div>
                </div> -->

                <!-- reply -->
                <!-- <div class="w-[850px] h-[100px]  ml-[100px] bg-[#F7F7F7] mt-2">

                    <div>
                        <span class="text-md font-semibold">
                            <img class="inline" src="../resources/img/Admin Product/arrow.svg" alt="">
                            Reply to UserA</span>
                    </div>
                    <form class="mt-1" action="../../Controller/manageProducts/replyReviewController.php" method="post">
                        <input type="hidden" name="replyCustomerID">
                        <input type="hidden" name="productDetailID">
                        <input type="text" placeholder="Message" class="w-[320px] h-[40px] border border-black rounded-sm ml-5 pl-4">
                        <button type="submit" class="px-5 rounded-sm py-1 bg-[#304547] text-white">Reply</button>
                    </form>

                </div> -->
            </div>




        </div>
    </div>


    <!-- end review -->

    <!-- Start Modal box to Edit product-->
    <div id="modalEdit" class="modal hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <!-- start of container box -->
        <div class="bg-white m-auto p-2 border rounded-sm w-[80%] relative">
            <div class="text-4xl font-bold absolute right-8 top-5 cursor-pointer"><ion-icon id="save" name="close-outline"></ion-icon></div>
            <h2 class="text-2xl font-bold px-6 py-3">Product Details</h2>
            <form action="../../Controller/manageProducts/adminEditProductController.php" method="POST" enctype="multipart/form-data">
                <!-- start of upper row -->
                <input type="hidden" name="editID" id="editID">
                <div class="px-6 py-4 grid grid-cols-2 gap-4">
                    <!-- start of add product text fields -->
                    <div class="col-span-1">
                        <div class="bg-[#456265] p-4">
                            <div class="mb-4 relative">
                                <label for="editCategory" class="z-0 absolute top-0 left-0 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 pr-[60px] rounded-md">Category:</label>
                                <input type="text" id="editCategory" name="editCategory" value="" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" disabled>
                            </div>
                            <div class="mb-4 relative">
                                <label for="editProductName" class="z-0 absolute top-0 left-0 pr-6 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Product Name:</label>
                                <input type="text" id="editProductName" name="editProductName" value="" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" disabled>
                            </div>
                            <div class="mb-4 relative">
                                <label for="editBrand" class="z-0 absolute top-0 left-0 pr-[86px] bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Brand:</label>
                                <input type="text" id="editBrand" name="editBrand" value="" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" disabled>
                            </div>
                            <div class="mb-4 relative">
                                <label for="editSellPrice" class="z-0 absolute top-0 left-0 pr-16 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Sell Price:</label>
                                <input type="text" id="editSellPrice" name="editSellPrice" value="" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" required>
                            </div>
                            <div class="mb-4 relative">
                                <label for="editBuyPrice" class="z-0 absolute top-0 left-0 pr-16 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Buy Price:</label>
                                <input type="text" id="editBuyPrice" name="editBuyPrice" value="" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" required>
                            </div>
                            <div class="relative">
                                <label for="editQuantity" class="z-0 absolute top-0 left-0 pr-[68px] bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Quantity:</label>
                                <input type="number" id="editQuantity" name="editQuantity" value="" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" required>
                            </div>
                        </div>
                    </div>
                    <!-- end of add product text fields -->
                    <!-- start of upload photo -->
                    <div class="col-span-1">
                        <div class="h-full flex justify-center items-center rounded-lg border border-dashed border-gray-600 px-6 py-10">
                            <div class="text-center">
                                <div class="mt-4">
                                    <input type="hidden" id="previousPath" name="previousPath">
                                    <div class="flex justify-center"><img id="editImage" class="p_Image max-w-xs max-h-60" src="" alt=""></div>
                                    <label for="editFile_upload" class="mt-2 cursor-pointer rounded-md bg-white font-semibold text-darkGreenColor">
                                        <span class="font-bold underline">Upload a file: </span>
                                    </label>
                                    <input id="editFile_upload" name="editProductImg" type="file" class="hidden mt-2 text-center">
                                </div>
                                <!-- <p>PNG, JPG up to 10MB</p> -->
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
                            <label for="editProductDetail" class="block font-medium">Product Detail:</label>
                            <textarea id="editProductDetail" name="editProductDetail" class="block w-full mt-1 p-2 border border-secondary rounded-md shadow-md outline-none" rows="3" required>Engineered to deliver devastation in and out of the arena, the Legion 5 Pro deploys Intel Core processing and NVIDIA GeForce RTX graphics to dish out high-resolution gaming. The world’s first 16" QHD gaming laptop with up to 165Hz refresh sets up a “winning zone” that gives you an extra edge and ups your peripheral vision. Combined with Nahimic 3D audio that pinpoints footsteps in space.</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="editProductDescription" class="block font-medium">Product Description:</label>
                            <textarea id="editProductDescription" name="editProductDescription" class="block w-full mt-1 p-2 border border-secondary rounded-md shadow-md outline-none" rows="3" required>MSI Summit E13 Flip Evo 13.4" FHD+ 120hz Touch 2 in 1 Business Laptop: Intel Core i7-1260P Iris Xe 32GB LPDDR5 1TB NVMe SSD, 360-Degree Flip, Thunderbolt 4, MSI Pen, Win 11</textarea>
                        </div>
                    </div>
                    <div class="flex justify-end items-center">
                        <button type="submit" name="saveEdit" class="closeViewDetailModal py-2 px-10 mt-4 bg-[#456265] text-white font-semibold rounded-md shadow-md">Save</button>
                    </div>
                </div>
                <!-- end of bottom row -->
            </form>
        </div>
        <!-- end of container box -->
    </div>

    <!-- End Modal box to Edit product-->


    <script src="../resources/lib/jquery3.6.0.js"></script>
    <script src="../resources/js/adminProducts.js"></script>
    <script src="../resources//js/review.js"></script>

</body>

</html>