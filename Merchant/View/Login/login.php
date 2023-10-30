<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchant Login</title>
  <link rel="icon" href="../../View/resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link rel="stylesheet" href="../resources/css/background/background.css">
    <script src="../resources/lib/jquery3.6.0.js"></script>
</head>

<body class="merchantBg w-screen h-screen overflow-hidden">
    <div class="flex justify-center items-center mt-24 p-6">
        <div class="bg-white w-96 p-6 shadow-lg rounded-md ">
            <h1 class="text-2xl font-bold mb-6 text-center"><span>Welcome to </span><span class="text-orange-500">TrendHub</span></h1>
            <h1 class="text-xl font-semibold mb-6 text-center">Login</h1>
            <small class="text-red-600"><?php
                                        if (isset($_SESSION["registerd"])) echo $_SESSION["registerd"];
                                        if (isset($_SESSION["wrongEmail"])) echo $_SESSION["wrongEmail"];
                                        if (isset($_SESSION["needVerify"])) echo $_SESSION["needVerify"];
                                        if (isset($_SESSION["needApproval"])) echo $_SESSION["needApproval"];
                                        if (isset($_SESSION["bannedMerchant"])) echo $_SESSION["bannedMerchant"];
                                        ?></small>
            <form action="../../Controller/loginController.php" method="POST">
                <div class="mb-4">

                    <input type="email" id="email" name="email" class="w-full shadow-lg border border-black rounded py-2 px-3 mt-1 focus:outline-none focus:ring focus:ring-secondary" placeholder="Email">
                </div>
                <div class="mb-4">
                    <small class="text-red-600"><?php
                                                if (isset($_SESSION["wrongPassword"])) echo $_SESSION["wrongPassword"];
                                                ?></small>
                    <input type="password" id="password" name="password" class="w-full shadow-lg border border-black rounded py-2 px-3 mt-1 focus:outline-none focus:ring focus:ring-secondary" placeholder="Password">
                </div>
                <button name="login" type="submit" class="w-full bg-secondary mt-4  shadow-lg text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-secondary">Login</button>
            </form>
            <div class="mt-4 text-center ">
                <a href="../registration/registration.php" class="text-black text-sm underline">
                    <p>Not yet registered?</p>
                </a>

                <a href="./forgot.php" class="text-black text-sm underline">
                    <p class="mt-3">Forgot Password?</p>
                </a>
            </div>
        </div>
    </div>
</body>

</html>

<?php
$_SESSION["registerd"] = "";
$_SESSION["wrongEmail"] = "";
$_SESSION["wrongPassword"] = "";
$_SESSION["needVerify"] = "";
$_SESSION["needApproval"] = "";
?>