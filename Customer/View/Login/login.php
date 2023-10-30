<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../resources/img/header/headerLogo.svg" type="image/icon type">

    <title>Login Page</title>
    <!-- Include Tailwind CSS -->
    <link href="../resources/lib/tailwind/output.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<?php
include "../../Controller/uiElement/editInfoController.php";
$logo = isset($editInfo[0]["logo"]) && !empty($editInfo[0]["logo"]) ? $editInfo[0]["logo"] : '/Storage/logo/logo.svg';
$mobileLogo = isset($editInfo[0]["mobileLogo"]) && !empty($editInfo[0]["mobileLogo"]) ? $editInfo[0]["mobileLogo"] : '/Storage/logo/mobileLogo.svg';

$primaryColor = isset($editInfo[0]["primary_color"]) && !empty($editInfo[0]["primary_color"]) ? $editInfo[0]["primary_color"] : '#FAFAFA';
$secondaryColor = isset($editInfo[0]["secondary_color"]) && !empty($editInfo[0]["secondary_color"]) ? $editInfo[0]["secondary_color"] : '#E4E4D2';
$tertiaryColor = isset($editInfo[0]["tertiary_color"]) && !empty($editInfo[0]["tertiary_color"]) ? $editInfo[0]["tertiary_color"] : '#F36823';
$startTime = isset($editInfo[0]["h1_color"]) && !empty($editInfo[0]["h1_color"]) ? $editInfo[0]["h1_color"] : '00:00';
$endTime = isset($editInfo[0]["h2_color"]) && !empty($editInfo[0]["h2_color"]) ? $editInfo[0]["h2_color"] : '00:00';
date_default_timezone_set('Asia/Yangon');
$currentHour = date('H:i');
?>

<body class="bg-[<?php

                    if ($startTime > $endTime) {
                        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                            echo "#4f4f4f";
                        } else {
                            echo $secondaryColor;
                        }
                    } else {
                        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                            echo "#4f4f4f";
                        } else {
                            echo $secondaryColor;
                        }
                    }



                    ?>] h-screen relative">
    <div class="bg-[<?php

                    if ($startTime > $endTime) {
                        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                            echo "#000000";
                        } else {
                            echo $primaryColor;
                        }
                    } else {
                        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                            echo "#000000";
                        } else {
                            echo $primaryColor;
                        }
                    }

                    ?>] w-full h-1/3 rounded-br-full flex items-center absolute">
        <div class=" absolute left-5 top-2 mt-4 hidden md:block  ">
            <div class="flex">
                <img src=" ../../../<?php

                                    if ($startTime > $endTime) {
                                        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                            echo 'Storage/logo/darkLogo.svg';
                                        } else {
                                            echo $logo;
                                        }
                                    } else {
                                        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                            echo 'Storage/logo/darkLogo.svg';
                                        } else {
                                            echo $logo;
                                        }
                                    }



                                    ?>" alt="" class="h-12 object-cover">
                <!-- <p class="-ml-2 text-sm font-semibold ">TrendHub</p> -->
            </div>
        </div>
        <div class="block md:hidden absolute left-5 top-2 mt-4 ">
            <!-- <img src="../resources/img/login/backIcon.png" alt="back to home" srcset="" class="w-4"> -->

            <a href="../../View/index.php">
                <ion-icon class=" text-[<?php
                                        if ($startTime > $endTime) {
                                            if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                echo '#ffffff';
                                            } else {
                                                echo $navColor;
                                            }
                                        } else {
                                            if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                echo '#ffffff';
                                            } else {
                                                echo $navColor;
                                            }
                                        }
                                        ?>]" name="chevron-back-outline"></ion-icon>

            </a>
        </div>

        <p class="mt-4 text-xs md:text-base text-center absolute right-5 top-2   
        text-[<?php
                if ($startTime > $endTime) {
                    if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                        echo '#ffffff';
                    } else {
                        echo $navColor;
                    }
                } else {
                    if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                        echo '#ffffff';
                    } else {
                        echo $navColor;
                    }
                }
                ?>]">
            Not a member?
            <a class="  " href="./signup.php"><button class="bg-[<?php

                                                                    if ($startTime > $endTime) {
                                                                        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                            echo "#ffffff";
                                                                        } else {
                                                                            echo $tertiaryColor;
                                                                        }
                                                                    } else {
                                                                        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                            echo "#ffffff";
                                                                        } else {
                                                                            echo $tertiaryColor;
                                                                        }
                                                                    }



                                                                    ?>] px-2 py-1 text-xs md:text-sm md:w-20 p-1 rounded-sm text-[<?php

                                                                                                                                    if ($startTime > $endTime) {
                                                                                                                                        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                                                                                            echo "#000000";
                                                                                                                                        } else {
                                                                                                                                            echo "#ffffff";
                                                                                                                                        }
                                                                                                                                    } else {
                                                                                                                                        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                                                                                            echo "#000000";
                                                                                                                                        } else {
                                                                                                                                            echo "#ffffff";
                                                                                                                                        }
                                                                                                                                    }



                                                                                                                                    ?>]">Sign up</button></a>
        </p>
    </div>
    <div class="flex justify-center items-center flex-col px-5 ">

        <img src="../../../<?php
                            if ($startTime > $endTime) {
                                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                    echo 'Storage/logo/darkMobileLogo.svg';
                                } else {
                                    echo $mobileLogo;
                                }
                            } else {
                                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                    echo 'Storage/logo/darkMobileLogo.svg';
                                } else {
                                    echo $mobileLogo;
                                }
                            }

                            ?>" alt="" class="w-20 md:w-24 object-cover top-2  relative md:mt-8 mt-12">
        <div class="bg-primary relative   mx-10 md:w-1/2 flex justify-center items-center  shadow-2xl md:mt-5 mt-10 ">
            <div class="hidden md:block w-1/2 p-8 mt-10 mb-10">
                <img src="../resources/img/login/login.png" alt="Illustration Photo" class="w-full h-full object-cover">
            </div>
            <div class="p-8 md:w-1/2 text-center">
                <h2 class="text-md md:text-2xl font-bold mb-4 "><span>Welcome to</span>
                    <span class="text-tertiary">TrendHub</span>
                </h2>
                <p class="text-sm md:text-lg font-medium mb-4 ">Login</p>
                <small class="text-textRed"><?php
                                            if (isset($_SESSION["registerd"])) echo $_SESSION["registerd"];
                                            if (isset($_SESSION["wrongEmail"])) echo $_SESSION["wrongEmail"];
                                            if (isset($_SESSION["needVerify"])) echo $_SESSION["needVerify"];
                                            if (isset($_SESSION["bannedEmailLogin"])) echo $_SESSION["bannedEmailLogin"];
                                            ?></small>
                <form action="../../Controller/loginController.php" method="POST">
                    <input type="text" name="email" placeholder="Email" required class="w-full py-1 md:py-2 px-3 rounded border border-[<?php

                                                                                                                                        if ($startTime > $endTime) {
                                                                                                                                            if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                                                                                                echo "#000000";
                                                                                                                                            } else {
                                                                                                                                                echo $tertiaryColor;
                                                                                                                                            }
                                                                                                                                        } else {
                                                                                                                                            if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                                                                                                echo "#000000";
                                                                                                                                            } else {
                                                                                                                                                echo $tertiaryColor;
                                                                                                                                            }
                                                                                                                                        }



                                                                                                                                        ?>] mb-4 focus:outline-none focus:ring-2">
                    <small class="text-textRed"><?php
                                                if (isset($_SESSION["wrongPassword"])) echo $_SESSION["wrongPassword"];
                                                ?></small>
                    <input type="password" name="password" placeholder="Password" required class="w-full py-1 md:py-2 px-3 rounded border border-[<?php

                                                                                                                                                    if ($startTime > $endTime) {
                                                                                                                                                        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                                                                                                            echo "#000000";
                                                                                                                                                        } else {
                                                                                                                                                            echo $tertiaryColor;
                                                                                                                                                        }
                                                                                                                                                    } else {
                                                                                                                                                        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                                                                                                            echo "#000000";
                                                                                                                                                        } else {
                                                                                                                                                            echo $tertiaryColor;
                                                                                                                                                        }
                                                                                                                                                    }



                                                                                                                                                    ?>] mb-4 focus:outline-none focus:ring-2">
                    <button name="login" type="submit" class="w-full py-1 md:py-2 mb-10 mt-4 px-4 text-sm md:text-base bg-[<?php


                                                                                                                            if ($startTime > $endTime) {
                                                                                                                                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                                                                                    echo "#000000";
                                                                                                                                } else {
                                                                                                                                    echo $tertiaryColor;
                                                                                                                                }
                                                                                                                            } else {
                                                                                                                                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                                                                                    echo "#000000";
                                                                                                                                } else {
                                                                                                                                    echo $tertiaryColor;
                                                                                                                                }
                                                                                                                            }

                                                                                                                            ?>] text-white rounded hover:[#FF5500] focus:outline-none focus:ring-2">Login</button>
                    <a href="./forgotPassword.php">
                        <p class="text-xs md:text-sm text-medium py-8">Forget your password?</p>
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>

</html>

<?php
$_SESSION["registerd"] = "";
$_SESSION["wrongEmail"] = "";
$_SESSION["wrongPassword"] = "";
$_SESSION["needVerify"] = "";
?>