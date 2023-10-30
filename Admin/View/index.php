<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./resources/lib/tailwind/output.css">
  <script src="https://cdn.tailwindcss.com"></script>


</head>

<?php
session_start();
$error = ""; // Initialize the $error variable

if(isset($_SESSION["loginError"])){
  $error = $_SESSION["loginError"];
}

?>

<body class="bg-[#12141B] flex justify-center items-center h-screen">
  <div class="w-[350px] h-[400px]  bg-[#FEFEFE] rounded-sm">
    <form action="../Controller/adminLogin/loginController.php" method="post">
      <span class="block text-center mt-6  font-semibold tracking-wider   text-2xl">Admin</span>
      <small class=" text-lg text-red-600 rounded-sm block mx-auto text-center mt-3">
        <?=  $error ?>

      </small>

      <div class="flex relative w-[270px] mx-auto" style="margin-top: 30px;">
        <img style="margin-top: 12px;" class="absolute left-0" src="./resources/img/Admin/admin.svg" alt="">
        <input required name="username" type="text" class=" border-none outline-none input-line block mx-auto " placeholder="Admin">
      </div>
      <div class="flex relative w-[270px] mx-auto mt-4">
        <img style="margin-top: 12px;" class="w-[30px] absolute left-0" src="./resources/img/Admin/password.svg" alt="">
        <input required name="password" type="password" class=" border-none outline-none input-line block mx-auto" placeholder="Password">


      </div>


      <button type="submit" name="login" style="margin-top: 80px;" class="px-20 py-1  bg-[#456265] mx-auto rounded-sm block text-white">Login</button>

    </form>
  </div>

</body>

</html>








</div>



<style>
  .input-line {
    background: none;
    margin-bottom: 10px;
    line-height: 2.4em;
    color: black;
    border-bottom: 1px solid black;
  }
</style>

<?php $_SESSION["loginError"] = "" ?>