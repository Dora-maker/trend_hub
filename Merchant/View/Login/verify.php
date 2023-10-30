<?php
session_start();
//if user tried to assess the page with direct link
if (!isset($_SESSION["m_verifyPwToken"])) {
    header("Location: ../Error/error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Password Page</title>
  <link rel="icon" href="../../View/resources/img/headerLogo.svg" type="image/icon type">


    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link rel="stylesheet" href="../resources/css/background/background.css">
    <script src="../resources/lib/jquery3.6.0.js"></script>
</head>

<body class="merchantBg w-screen h-screen overflow-hidden">
    <div class="flex justify-center items-center mt-24 p-6">
        <div class="bg-white w-full sm:w-96 p-6 shadow-lg rounded-md">
            <h1 class="text-2xl font-bold mb-6 text-center"><span>Welcome to </span><span class="text-orange-500">TrendHub</span></h1>
            <h1 class="text-xl font-semibold mb-6 text-center">Verify Password</h1>
            <h1 class="text-sm  mb-6 text-center">
                Please enter the 4 digit code that send to your email address.
            </h1>
            <form action="../../Controller/pwVerifyTokenController.php" method="post">
                <div class="mb-4">
                    <input type="text" name="mVerify_code" maxlength="4" class="w-full border shadow-lg border-secondary rounded-md py-2 px-3 mt-1 tracking-[1.2em] text-center focus:outline-none focus:ring focus:ring-secondary" placeholder="____">
                </div>
                <small class="text-textRed">
                    <?php
                    if (isset($_SESSION["m_verifyCodeError"])) echo $_SESSION["m_verifyCodeError"]
                    ?>
                </small>
                <button type="submit" name="mVerifyBtn" class="w-full shadow-lg bg-secondary text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-secondary">Verify</button>
            </form>
            <form action="../../Controller/pwVerifyTokenController.php" method="post">
                If you dont receive code <button type="submit" name="m_resendToken" class="text-xs md:text-sm text-medium mt-2 ml-2 font-bold underline text-tertiary">Resend</button>

            </form>
            <small class="text-textRed">
                <?php
                if (isset($_SESSION["m_resendStatus"])) echo $_SESSION["m_resendStatus"]
                ?>
            </small>
            <p class="mt-4 text-center">
                <a href="./login.php" class="text-black text-sm underline">Back to Login</a>
            </p>
        </div>
    </div>
</body>

</html>
<?php
$_SESSION["m_verifyCodeError"] = "";
$_SESSION["m_resendStatus"] = "";
?>