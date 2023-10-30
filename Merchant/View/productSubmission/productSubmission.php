<?php
session_start();

if (!isset($_SESSION["currentMerchantLogin"]) || $_SESSION["currentMerchantLogin"] == '') {
    header("Location: ../../View/Error/error.php");
} else {

    include "../../Controller/productSubmission/merchantInfoShowController.php";
    include "../../Controller/productSubmission/merchantProductController.php";

    include "../../Controller/categoryController.php";
    // print_r($merchantProducts);

    if (isset($_SESSION["productSubmitController"]) && ($_SESSION["productSubmitController"] == false)) {
        $_SESSION["productSubmitView"] = 0;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchant Product Submission</title>
    <link rel="icon" href="../../View/resources/img/headerLogo.svg" type="image/icon type">
  
    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link rel="stylesheet" href="../resources/css/sideBar/sideBar.css">
    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../resources/lib/jquery3.6.0.js"></script>
    <script src="../resources/js/sideBar/sideBar.js" defer></script>
    <script src="../resources/js/productSubmission/productSubmission.js" defer></script>
    <script src="../resources/js/productSubmission/productSubmit.js" defer></script>
</head>
<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }


    .scrollbar-hide {
        -ms-overflow-style: none;

        scrollbar-width: none;
    }
</style>

<body>
    <section class="sectionContainer w-full flex relative">
        <!-- space for the main page to not move -->
        <div id="space" class="hidden w-20 h-screen p-2"></div>
        <!-- Left-side Categories Start-->
        <div id="sideBarContainer" class="bg-tertiary h-screen p-2 z-20">
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
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-darkGreenColor text-white rounded-md cursor-pointer">
                        <img id="productSubmitHover" src="../resources/img/sideBarImg/product submission hover.png" alt="">
                        <span class="sideFull hidden ml-2">Product Submission</span>
                    </p>
                </a>
                <a href="../allOrder/allOrder.php">
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-[#FBFBFB] bg-opacity-50 rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
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
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-[#FBFBFB] bg-opacity-50 rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
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



        <!-- start of product submit finish modal box -->
        <?php if (isset($_SESSION["productSubmitView"]) && ($_SESSION["productSubmitView"] == 1)) { ?>
            <div class="productSubmitFinishModal fixed w-full h-full pt-16 bg-black bg-opacity-50 z-20">
                <div class="bg-white m-auto p-5 border rounded-sm w-[50%]">
                    <h2 class="text-xl font-bold mb-4">Product Submission is complete.</h2>
                    <hr>
                    <p class="mt-6 text-center">Your Product Submission is complete. We will verify the information details and notify you about your products approval. Check your notifications for any updates.</p>
                    <div class="flex mt-5 justify-center">
                        <button id="closeProductSubmitFinishModal" class="mt-4 bg-secondary text-white font-semibold py-2 px-4 rounded">Close</button>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- end of product submit finish modal box -->

        <!-- start of add product modal box -->

        <!-- Start Modal box to create product-->
        <div id="myModal" class="addProductModal hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center z-20">
            <!-- start of container box -->
            <div class="bg-white m-auto p-2 border rounded-sm w-[80%] relative">
                <div class="closeAddProductModal text-4xl font-bold absolute right-8 top-5 cursor-pointer"><ion-icon id="closeModalButton" name="close-outline"></ion-icon></div>
                <h2 class="text-2xl font-bold px-6 py-3">Add New Product</h2>
                <form action="../../Controller/productSubmission/productAddController.php" method="post" enctype="multipart/form-data">
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
                                        foreach ($categories as $category) { ?>
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
                            <button onclick="hideEdit()" type="submit" name="addProduct" class="closeAddProductModal py-2 px-10 mt-4 bg-secondary text-white font-semibold rounded-md shadow-md">Add</button>
                        </div>
                    </div>
                    <!-- end of bottom row -->
                </form>
            </div>
            <!-- end of container box -->
        </div>
        <!-- End Modal box to create product-->



        <!-- Start modal box for delete-->
        <div id="modals-container">
            <div id="deleteModal" class="deleteModal hidden fixed z-10 inset-0 overflow-y-auto">
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
                                    <h1 id="deleteProductName" class=" font-semibold mt-2  text-center "></h1>
                                    <img src="" id="deleteProductImg" class=" h-[100px] mx-auto mt-4 mb-4" alt="">


                                </div>
                            </div>
                            <div class="flex justify-center space-x-4 mb-6">
                                <input type="hidden" name="" id="deleteProductID">
                                <button id="cancelDeleteProduct" class="rounded-[5px] px-3 py-1 shadow-md border-2 border-secondary bg-tertiary">Cancel</button>
                                <button id="confirmDeleteProduct" class="bg-secondary text-white rounded-[5px] px-3 py-1 shadow-md border-2 ">Confirm</button>

                            </div>
                        </div>

                    </div>
                    <!-- End Modal Content -->

                </div>
            </div>
        </div>
        <!-- end modal box  delete-->

        <!-- Right-side Start -->
        <div class="mainPage h-screen overflow-hidden w-full p-3">
            <h1 class="text-darkGreenColor text-3xl font-bold mb-5">Product Submission</h1>
            <div class="flex flex-row">
                <?php

                if (($merchantInfo[0]["m_logo"]) == null) {
                    $setLogo = "../resources/img/profile/noProfile.png.jpg";
                } else {
                    $setLogo = "../../.." . $merchantInfo[0]["m_logo"];
                }

                ?>

                <label for="logo">
                    <img src="<?= $setLogo ?>" id="merLogo" alt="Profile Picture" class="w-28  h-28 border shadow-md mx-28 border-secondary  rounded-full ">
                </label>

            </div>


            <!-- Start of input text fields and add product button -->
            <div class="mt-8 flex justify-around items-center z-0">
                <div>
                    <div class="mb-4 relative">
                        <label for="name" class="z-0 absolute top-0 left-0 pr-16 text-white bg-darkGreenColor font-semibold py-2 pl-3 rounded-md">Name</label>
                        <input id="name" type="text" value="<?= $merchantInfo[0]['m_name'] ?>" class="h-10 py-2 pl-32 font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" name="name" required>
                    </div>
                    <div class="mb-4 relative">
                        <label for="storeName" class="z-0 absolute top-0 left-0 pr-5 text-white bg-darkGreenColor font-semibold py-2 pl-3 rounded-md">Store Name</label>
                        <input id="storeName" type="text" value="<?= $merchantInfo[0]['m_bname'] ?>" class="h-10 py-2 pl-32 font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" name="storeName" required>
                    </div>
                    <div class="relative">
                        <label for="license" class="z-0 absolute top-0 left-0 pr-[52px] text-white bg-darkGreenColor font-semibold py-2 pl-3 rounded-md">License</label>
                        <input id="license" type="text" value="<?= $merchantInfo[0]['m_licene'] ?>" class="h-10 py-2 pl-32 font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" name="license">
                    </div>
                </div>
                <div>
                    <div class="mb-4 relative">
                        <label for="email" class="absolute top-0 left-0 pr-16 text-white bg-darkGreenColor font-semibold py-2 pl-3 rounded-md">Email</label>
                        <input id="email" type="email" value="<?= $merchantInfo[0]['m_email'] ?>" class="h-10 py-2 pl-32 font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" name="email" required>
                    </div>
                    <div class="mb-4 relative">
                        <label for="phone" class="absolute top-0 left-0 pr-[58px] text-white bg-darkGreenColor font-semibold py-2 pl-3 rounded-md">Phone</label>
                        <input id="phone" type="text" value="<?= $merchantInfo[0]['m_phone'] ?>" class="h-10 py-2 pl-32 font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" name="phone" required>
                    </div>
                    <div class="relative">
                        <label for="address" class="absolute top-0 left-0 pr-[46px] text-white bg-darkGreenColor font-semibold py-2 pl-3 rounded-md">Address</label>
                        <input id="address" type="text" value="<?= $merchantInfo[0]['m_address'] ?>" class="h-10 py-2 pl-32 font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" name="address" required>
                    </div>
                </div>
                <div>
                    <button id="addProductBtn" class="px-3 py-5 text-xl bg-darkGreenColor text-white rounded-lg h-32 ">Add Your Product Here</button>
                </div>
            </div>
            <!-- End of input text fields and add product button -->

            <!-- Start of product table -->
            <div class="h-[250px] overflow-y-scroll scrollbar-hide mt-10">

                <table class="table-fixed w-full">
                    <thead class="bg-darkGreenColor  w-full text-white font-semibold text-lg ">
                        <tr>
                            <th class="p-2 w-10">No.</th>
                            <th class="p-2 w-40">Category</th>
                            <th class="p-2 w-40">Product Name</th>
                            <th class="p-2 w-28">Quantity</th>
                            <th class="p-2 w-32">Buy Price</th>
                            <th class="p-2 w-32">Sell Price</th>
                            <th class="p-2 w-32">Total Sell Price</th>
                            <th class="p-2 w-32">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableElement">
                        <?php
                        $idCount = 1;

                         if ($totalCount > 0) {
                            $count = 1;
                            foreach ($merchantProducts as $product) {
                        ?>

                                <tr class="productSubmitData">
                                    <td class="p-2 text-center"><?= $idCount++ ?></td>
                                    <td class="p-2 text-center"><?= $product['category_name'] ?></td>
                                    <td class="p-2 text-center"><?= $product['p_name'] ?></td>
                                    <td class="p-2 text-center"><?= $product['p_stock'] ?></td>
                                    <td class="p-2 text-center"><?= number_format($product['buy_price']) ?> ks</td>
                                    <td class="p-2 text-center"><?= number_format($product['sell_price']) ?> ks</td>
                                    <!-- Calculate total value -->
                                    <td class="p-2 text-center"><?= number_format($product['p_stock'] * $product['sell_price']) ?> ks</td>
                                    <td deleteId="<?= $product["id"] ?>" class="delete p-2 text-center underline cursor-pointer">Delete</td>
                                </tr>
                        <?php }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <?php if ($idCount > 1) {  ?>


                <!-- End of product table -->
                <div class="mt-5 mr-2 text-right">
                    <button type="submit" id="submitProductBtn" class="px-3 py-2 bg-darkGreenColor text-white rounded-md">
                        <a href="../../Controller/productSubmission/submitToAdminController.php">
                            Submit Products </a></button>
                </div>
            <?php } ?>
        </div>
        <!-- Right-side End -->
    </section>
</body>

</html>
<?php
$_SESSION["productSubmitController"] = false;
?>
