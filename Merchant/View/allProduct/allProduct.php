<?php  

session_start();
if(isset($_SESSION["viewProduct"])){
    $detail =$_SESSION["viewProduct"];
   
};

if(!isset( $_SESSION["currentMerchantLogin"]) || $_SESSION["currentMerchantLogin"]==''){
    header("Location: ../../View/Error/error.php" );
}else{

include "../../Controller/allProduct/allProductShowController.php";
include "../../Controller/categoryController.php";
if(isset($_SESSION["passDetailController"]) && ($_SESSION["passDetailController"] == false)){
    $_SESSION["mProductDetailView"] = 0;
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchant All Product</title>
  <link rel="icon" href="../../View/resources/img/headerLogo.svg" type="image/icon type">
    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link rel="stylesheet" href="../resources/css/sideBar/sideBar.css">
    <script src="../resources/lib/jquery3.6.0.js" defer></script>
    <script src="../resources/js/sideBar/sideBar.js" defer></script>
    <script src="../resources/js/allProduct/allProduct.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <script src="../resources/js/wishlist.js" defer></script>
   
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
        <div id="sideBarContainer" class="bg-tertiary w-20 h-screen p-2 z-20">
            <!-- Merchant  -->
            <div class="flex justify-center mb-2 cursor-pointer"><img id="toggleSideBar" class="w-12 h-12 rounded-full shadow-lg border border-slate-200" src="../resources/img/sideBarImg/TH Logo 6.svg" alt=""></div>
            <h1 class="text-lg font-medium text-center hidden sideFull">Merchant's</h1>
            <h2 class="text-xl font-medium text-center hidden text-darkGreenColor sideFull">DASHBOARD</h2>

            <!-- Categories Start-->
            <div class="px-2 mt-5">
                <a href="../allProduct/allProduct.php">
                    <p class="hoverImg py-2 px-2 shadow-md flex justify-center bg-darkGreenColor text-white rounded-md hover:bg-darkGreenColor hover:text-white cursor-pointer">
                        <img id="allProductHover" src="../resources/img/sideBarImg/all product hover.png" alt="">
                        <span class="sideFull hidden ml-2">All Products</span>
                    </p>
                </a>
                <a href="../productSubmission/productSubmission.php">
                    <p class="hoverImg py-2 px-2 mt-4 flex justify-center shadow-md bg-[#FBFBFB] bg-opacity-50 rounded-md cursor-pointer">
                        <img id="productSubmitHover" src="../resources/img/sideBarImg/product submission.png" alt="">
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
        <!-- start of product detail modal box -->
        <?php if(isset($_SESSION["mProductDetailView"]) && ($_SESSION["mProductDetailView"] == 1)){ ?>
            <div class="viewDetailModal fixed w-full h-full pt-12 bg-black bg-opacity-50 z-20">
            <!-- start of container box -->
            <div class="bg-white m-auto overflow-y-auto p-2 border rounded-sm w-[80%] relative">
                <div class="closeViewDetailModal text-4xl font-bold absolute right-8 top-5 cursor-pointer"><ion-icon name="close-outline"></ion-icon></div>
                <h2 class="text-2xl font-bold px-6 py-3">Product Details</h2>
                <form action="../../Controller/allProduct/editProductController.php"  method="post" enctype="multipart/form-data">
                    <!-- start of upper row -->
                    <div class="px-6 py-4 grid grid-cols-2 gap-4">
                    <input type="hidden" name="editID" id="editID" value="<?= $detail[0]['id'] ?>">
                        <!-- start of add product text fields -->
                        <div class="col-span-1">
                            <div class="bg-secondary p-4">
                                <div class="mb-4 relative">
                                    <label for="category" class="z-0 absolute top-0 left-0 pr-16 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Category:</label>
                                    <select id="category" name="category" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor "disabled >
                                    <?php
                                            $categoryId = $detail[0]['category_id'];

                                            foreach ($categories as $category) {
                                            ?>
                                                <option  value="<?= $category["id"] ?>" <?php
                                                                                        if ($category['id'] == $categoryId) {
                                                                                            echo "selected";
                                                                                        }
                                                                                        ?>>
                                                    <?= $category["category_name"] ?>
                                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-4 relative">
                                    <label for="productName" class="z-0 absolute top-0 left-0 pr-6 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Product Name:</label>
                                    <input type="text" id="productName" name="productName" value="<?= $detail[0]['p_name'] ?>" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" readonly>
                                </div>
                                <div class="mb-4 relative">
                                    <label for="brand" class="z-0 absolute top-0 left-0 pr-[86px] bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Brand:</label>
                                    <input type="text" id="brand" name="brand" value="<?= $detail[0]['brand_name'] ?>" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" readonly>
                                </div>
                                <div class="mb-4 relative">
                                    <label for="sellPrice" class="z-0 absolute top-0 left-0 pr-16 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Sell Price:</label>
                                    <input type="number" id="sellPrice" name="sellPrice" value="<?=$detail[0]['sell_price'] ?>" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" required>
                                </div>
                                <div class="mb-4 relative">
                                    <label for="buyPrice" class="z-0 absolute top-0 left-0 pr-16 bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Buy Price:</label>
                                    <input type="number" id="buyPrice" name="buyPrice" value="<?=$detail[0]['buy_price'] ?>" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" required>
                                </div>
                                <div class="relative">
                                    <label for="quantity" class="z-0 absolute top-0 left-0 pr-[68px] bg-white text-darkGreenColor border border-darkGreenColor font-semibold py-2 pl-3 rounded-md">Quantity:</label>
                                    <input type="number" id="quantity" name="quantity" value="<?= $detail[0]['p_stock'] ?>" class="h-[42px] py-2 pl-40 w-full font-semibold rounded-md shadow-md outline-none border border-darkGreenColor" required>
                                </div>
                            </div>
                        </div>
                        <!-- end of add product text fields -->
                        <!-- start of upload photo -->
                        <div class="col-span-1">
                            <div class="h-full flex justify-center items-center rounded-lg border border-dashed border-gray-600 px-6 py-10">
                                <div class="text-center">
                                    <div class="mt-4">
                                        <div class="flex justify-center"><img class="p_Image max-w-xs max-h-60" src="<?= "../../..".$detail[0]['p_path'] ?>" alt=""></div>
                                        <label for="file_upload" class="mt-2 cursor-pointer rounded-md bg-white font-semibold text-darkGreenColor">
                                            <span class="font-bold underline">Upload a file: </span>
                                        </label>
                                        <input id="file_upload" name="fileUpload" type="file" class="hidden mt-2 text-center">
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
                                <textarea id="productDetail" name="productDetail" class="block w-full mt-1 p-2 border border-secondary rounded-md shadow-md outline-none" rows="3" readonly><?= $detail[0]['p_detail'] ?></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="productDescription" class="block font-medium">Product Description:</label>
                                <textarea id="productDescription" name="productDescription" class="block w-full mt-1 p-2 border border-secondary rounded-md shadow-md outline-none" rows="3" readonly><?= $detail[0]['p_description'] ?></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="product_id" value="<?= $detail[0]['id'] ?>">
                        <div class="flex justify-end items-center">
                            <button type="submit" name="deleteProduct" class="closeViewDetailModal py-2 px-4 mt-4 mr-10 bg-white text-darkGreenColor border border-darkGreenColor font-semibold rounded-md shadow-md">Delete Product</button>
                            <button type="submit" name="editProduct" class="closeViewDetailModal py-2 px-4 mt-4 bg-secondary text-white font-semibold rounded-md shadow-md">Edit Product</button>
                        </div>
                    </div>
                    <!-- end of bottom row -->
                </form>
            </div>
            <!-- end of container box -->
        </div>
        <?php  } ?>
        <!-- end of product detail modal box -->

        <!-- Right-side Start -->
        <div class="mainPage h-screen overflow-hidden w-full p-3">
            <h1 class="text-darkGreenColor text-3xl font-bold mb-5">All Products List</h1>
            <!-- start of pie chart -->
            <div class="p-2">
                <div class="p-2 border border-darkGreenColor">
                    <div class="p-2">
                        <p class="text-2xl font-bold text-darkGreenColor">Wishlist</p>
                        <div class="w-[1300px] mx-auto bg-white ">
                        <div class="h-[250px] w-[1000px] flex justify-center">
                            <canvas id="wishlistChart"></canvas>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- end of pie chart -->

              <!-- start sort-->
              <div date-rangepicker class="flex items-center justify-between  relative">
                    <div class="text-secondary text-lg font-bold"><?= $totalCount ?> products found.</div>
                    <div class="">
                        <label class="inline-flex text-secondary" for="">Sort By:</label>
                        <select id="dropdown" class="inline-block mt-1  w-[165px] px-3 py-2 bg-white border border-secondary rounded-md shadow-sm focus:outline-none">
                            <option value="p_name">Product Name</option>
                            <option value="p_stock">Stock</option>
                            <option value="sell_price">Sell Price</option>
                            <option value="buy_price">Buy Price</option>
                        </select>
                    </div>
                </div>
                <!-- end sort -->
            
              

            <!-- Start of product table -->
            <div class="h-[250px] overflow-y-scroll scrollbar-hide mt-4">
            <table class="table-fixed w-full">
                <thead class=" bg-darkGreenColor text-white font-semibold text-lg">
                    <tr>
                        <th class="p-2 w-10">No.</th>
                        <th class="p-2 w-40">Product Name</th>
                        <th class="p-2 w-40">Category</th>
                        <th class="p-2 w-28">Stocks</th>
                        <th class="p-2 w-32">Buy Price</th>
                        <th class="p-2 w-32">Sell Price</th>
                        <th class="p-2 w-32">Action</th>
                    </tr>
                </thead>
                <tbody id="sortResult">
                    <?php
                   if($totalCount >0){
                    $counter = 0;
                    $count = 1;
                    foreach ($allProduct as $product) { 
                        $counter++; 
                        $rowClass = ($counter % 2 === 0) ? 'bg-gray-200' : '';
                        
                        ?>
                        <tr class="productSubmitData <?= $rowClass ?>">
                            <td class="p-2 text-center"><?= $count++ ?></td>
                            <td class="p-2 text-center"><?= $product['p_name']; ?></td>
                            <td class="p-2 text-center"><?= $product['category_name'] ?></td>
                            <td class="p-2 text-center"><?= $product['p_stock'] ?></td>
                            <td class="p-2 text-center"><?=  $product['buy_price']." Ks" ?></td>
                            <td class="p-2 text-center"><?=  $product['sell_price']." Ks" ?></td>
                            <td class=" p-2 text-center font-semibold underline cursor-pointer">
                            <a href="../../Controller/allProduct/productDetailShowController.php?id=<?= $product["pId"] ?>" > 
                            View Detail</a>

                            
                            </td>

                        </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
                    </div>
            <!-- End of product table -->
        </div>
        <!-- Right-side End -->
    </section>
<script>
     let serverData = <?php echo json_encode($wishlist); ?>;
        let productNames = [];
        let noOfWishlists = [];
        for (let index = 0; index < serverData.length; index++) {
            productNames.push(serverData[index].p_name);
            noOfWishlists.push(serverData[index].num);
        }
   
</script>


</body>

</html>
<?php
$_SESSION["passDetailController"] = false;
?>
