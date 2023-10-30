<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
  <link rel="icon" href="../../View/resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link rel="stylesheet" href="../resources/css/background/background.css">
    <script src="../resources/lib/jquery3.6.0.js"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white w-full sm:w-96 p-6 shadow-lg rounded-md grid grid-cols-2 gap-4">
        <!-- Your content goes here -->

        <div class="col-span-1">
            <button type="button" class="w-full bg-secondary shadow-md text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-secondary" id="logoutBtn">Logout</button>
        </div>
    </div>

    <!-- Logout Confirmation Modal -->
    <div id="logoutModal" class="hidden fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="bg-white w-80 p-6 shadow-lg rounded-md text-start">
            <h2 class="text-xl font-bold mb-4 ">Logout</h2>
            <hr>
            <p class="text-gray-600 mb-10">Are you sure you want to log out?</p>
            <div class="mt-4 flex justify-around space-x-4">
                <button id="confirmLogout" class="bg-secondary text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-red-300">Confirm</button>
                <button id="cancelLogout" class="bg-primary border border-secondary text-secondary font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        const logoutBtn = document.getElementById("logoutBtn");
        const logoutModal = document.getElementById("logoutModal");
        const confirmLogoutBtn = document.getElementById("confirmLogout");
        const cancelLogoutBtn = document.getElementById("cancelLogout");

        logoutBtn.addEventListener("click", () => {
            logoutModal.classList.remove("hidden");
        });

        confirmLogoutBtn.addEventListener("click", () => {
            // Perform logout operation here (e.g., redirect to logout page or clear session)
            console.log("User logged out!");
            logoutModal.classList.add("hidden");
        });

        cancelLogoutBtn.addEventListener("click", () => {
            logoutModal.classList.add("hidden");
        });
    </script>
</body>

</html>
