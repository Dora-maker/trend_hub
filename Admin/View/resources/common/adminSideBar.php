<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <script src="../resources/lib/jquery3.6.0.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- Left-side Categories Start-->
    <aside class="bg-[#191C25] text-white w-[270px]">
        <!-- Admin  -->
        <h1 class="text-[32px] font-medium text-center">Admin</h1>

        <!-- Categories Start-->
        <div class="px-3 mt-5">
            <a href="../Analytics/analytics.php">
                <p class="py-1 px-2 rounded hover:bg-red-400 cursor-pointer categories <?= ($menu == "analytics") ? "bg-red-400" : false ?>">Analytics</p>
            </a>

            <div id="customers-list" class="flex items-center py-1 px-2 space-x-2 mt-2 cursor-pointer rounded hover:bg-red-400  categories <?= ($menu == "customersList") ? "bg-red-400" : false ?>">
                <p>Customers List</p>
                <img src="../resources/img/drop_down_arrow.svg" alt="drop_down">
            </div>

            <!-- Customers List Sub Menu  Start-->
            <div id="customers-list-sub-menu" class="cursor-pointer rounded text-sm <?php echo ($menu == "customersList") ? "block" : "hidden"  ?> ">
                <a href="../customersList/allCustomers.php">
                    <p class="pl-5 py-1 rounded hover:bg-[#31374A] sub-menu <?= ($subMenu == "allCustomers") ? "bg-[#31374A]" : false ?>">All Customers</p>
                </a>
                <a href="../customersList/newCustomers.php">
                    <p class="pl-5 py-1 rounded hover:bg-[#31374A] sub-menu <?= ($subMenu == "newCustomers") ? "bg-[#31374A]" : false ?>">New Customers</p>
                </a>
                <a href="../customersList/totalOrders.php">
                    <p class="pl-5 py-1 rounded hover:bg-[#31374A] sub-menu <?= ($subMenu == "totalOrders") ? "bg-[#31374A]" : false ?>">Total Orders</p>
                </a>
                <a href="../customersList/bannedCustomers.php">
                    <p class="pl-5 py-1 rounded hover:bg-[#31374A] sub-menu <?= ($subMenu == "bannedCustomers") ? "bg-[#31374A]" : false ?>">Banned Customers</p>
                </a>
            </div>
            <!-- Customers List Sub Menu  End-->

            <div id="merchant-list" class="flex items-center py-1 px-2 space-x-2 mt-2 cursor-pointer rounded hover:bg-red-400 categories <?= ($menu == "merchantList") ? "bg-red-400" : false ?>">
                <p>Merchant List</p>
                <img src="../resources/img/drop_down_arrow.svg" alt="drop_down">
            </div>

            <!-- Merchant List Sub Menu  Start-->
            <div id="merchant-list-sub-menu" class="cursor-pointer rounded text-sm <?php echo ($menu == "merchantList") ? "block" : "hidden"  ?>">
                <a href="../merchantList/allMerchant.php">
                    <p class="all_merchant pl-5 py-1 rounded hover:bg-[#31374A] sub-menu <?= ($subMenu == "allMerchants") ? "bg-[#31374A]" : false ?>">All Merchants</p>
                </a>
                <a href="../merchantList/newMerchant.php">
                    <p class="new_merchant pl-5 py-1 rounded hover:bg-[#31374A] sub-menu <?= ($subMenu == "newMerchants") ? "bg-[#31374A]" : false ?>">New Merchants</p>
                </a>
                <a href="../merchantList/pendingMerchant.php">
                    <p class="pen_merchant pl-5 py-1 rounded hover:bg-[#31374A] sub-menu <?= ($subMenu == "pendingMerchants") ? "bg-[#31374A]" : false ?>">Pending Merchants</p>
                </a>
                <a href="../merchantList/bannedMerchant.php">
                    <p class="ban_merchant pl-5 py-1 rounded hover:bg-[#31374A] sub-menu <?= ($subMenu == "bannedMerchants") ? "bg-[#31374A]" : false ?>">Banned Merchants</p>
                </a>

            </div>
            <!-- Merchant List Sub Menu  End-->

            <div id="manage-products" class="flex items-center py-1 px-2 space-x-2 mt-2 cursor-pointer rounded hover:bg-red-400 categories <?= ($menu == "manageProducts") ? "bg-red-400" : false ?>">
                <p>Manage Products</p>
                <img src="../resources/img/drop_down_arrow.svg" alt="drop_down">
            </div>

            <!-- Manage Products Sub Menu  Start-->
            <div id="manage-products-sub-menu" class="cursor-pointer rounded text-sm <?php echo ($menu == "manageProducts") ? "block" : "hidden"  ?>">
                <a href="../../Controller/manageProducts/merchantProductController.php">
                    <p class="pl-5 py-1 rounded hover:bg-[#31374A] sub-menu <?= ($subMenu == "merchantProducts") ? "bg-[#31374A]" : false ?>">Merchant”s Products</p>
                </a>
                <a href="../../Controller/manageProducts/adminProductController.php">
                    <p class="pl-5 py-1 rounded hover:bg-[#31374A] sub-menu <?= ($subMenu == "adminProducts") ? "bg-[#31374A]" : false ?>">Admin’s Products</p>
                </a>
            </div>
            <!-- Manage Products Sub Menu  End-->

            <a href="../productRequest/productRequest.php">
                <p class="py-1 px-2 mt-2 cursor-pointer rounded hover:bg-red-400 categories <?= ($menu == "productRequest") ? "bg-red-400" : false ?>">Products Request</p>
            </a>

            <div id="order-list" class="flex items-center py-1 px-2 space-x-2 mt-2 cursor-pointer rounded hover:bg-red-400 categories <?= ($menu == "orderList") ? "bg-red-400" : false ?>">
                <p>Order List</p>
                <img src="../resources/img/drop_down_arrow.svg" alt="drop_down">
            </div>

            <!-- Order List Sub Menu  Start-->
            <div id="order-list-sub-menu" class="cursor-pointer rounded text-sm <?php echo ($menu == "orderList") ? "block" : "hidden"  ?>">
                <a href="../orderList/adminOrder.php">
                    <p class="pl-5 py-1 rounded hover:bg-[#31374A] sub-menu <?= ($subMenu == "adminOrder") ? "bg-[#31374A]" : false ?>">Admin Order</p>
                </a>
                <a href="../orderList/merchantOrder.php">
                    <p class="pl-5 py-1 rounded hover:bg-[#31374A] sub-menu <?= ($subMenu == "merchantOrder") ? "bg-[#31374A]" : false ?>">Merchant Order</p>
                </a>
            </div>
            <!-- Order List Sub Menu  End-->

            <a href="../financialReview/financial.php">
                <p class="py-1 px-2 mt-2 cursor-pointer rounded hover:bg-red-400 categories <?= ($menu == "financialReview") ? "bg-red-400" : false ?>">Financial Reviews</p>
            </a>

            <a href="../uiElements/ui.php">
                <p class="py-1 px-2 mt-2 cursor-pointer rounded hover:bg-red-400 categories <?= ($menu == "uiElement") ? "bg-red-400" : false ?>">UI Elements</p>
            </a>

            <a href="../../Controller/notification/viewNotiController.php?to=">
                <p class="py-1 px-2 mt-2 cursor-pointer rounded hover:bg-red-400 categories <?= ($menu == "notifications") ? "bg-red-400" : false ?>">Notifications</p>
            </a>

            <p onclick="showLogout()" class="py-1 px-2 mt-2 cursor-pointer rounded hover:bg-red-400 categories">Logout</p>

        </div>
        <!-- Categories End-->
    </aside>
    <!-- Left-side Categories End-->








    <!-- logOut Modal Start-->
    <div id="modalLogout" class="modal hidden fixed inset-0 z-50 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="modal-content bg-[#FEFEFE] w-[340px] h-[300px] rounded shadow-md relative">
            <button onclick="hideLogout()" class="absolute top-4 right-4 text-gray-700 hover:text-gray-900">
                <svg class="h-6 w-6 text-[grey] " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <div class=" mt-[50px]">
                <span class="block text-center text-xl font-semibold">Oh no! You’re leaving...</span>
                <span class="block text-center text-xl font-semibold mt-3">Are you sure?</span>
            </div>

            <button onclick="hideLogout()" class="block px-4 py-3 rounded-md bg-[#12141B] text-white mx-auto w-[200px] mt-4">Just Kidding</button>
            <a href="../../Controller/adminLogin/logOutController.php">
            <button onclick="hideLogout()" class="block px-4 py-3 rounded-md border border-black text-black mx-auto w-[200px] mt-4">Yes, Log Me Out</button>
            </a>
        </div>

    </div>

    <!-- logOut Modal End-->

    </div>











    <script>
        $(document).ready(function() {

            $("#customers-list").click(function() {
                $("#customers-list-sub-menu").toggle();
            })

            $("#merchant-list").click(function() {
                $("#merchant-list-sub-menu").toggle();
            })

            $("#manage-products").click(function() {
                $("#manage-products-sub-menu").toggle();
            })

            $("#order-list").click(function() {
                $("#order-list-sub-menu").toggle();
            })
        })






        function showLogout() {
            document.getElementById('modalLogout').classList.remove('hidden');
        }


        function hideLogout() {
            document.getElementById('modalLogout').classList.add('hidden');
        }
    </script>
</body>
<script src="../resources/lib/jquery3.6.0.js"></script>

</html>