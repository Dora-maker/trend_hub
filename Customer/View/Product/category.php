<?php include "../../Controller/uiElement/editInfoController.php";

$primaryColor = isset($editInfo[0]["primary_color"]) && !empty($editInfo[0]["primary_color"]) ? $editInfo[0]["primary_color"] : '#FAFAFA';
$tertiaryColor = isset($editInfo[0]["tertiary_color"]) && !empty($editInfo[0]["tertiary_color"]) ? $editInfo[0]["tertiary_color"] : '#F36823';
$startTime = isset($editInfo[0]["h1_color"]) && !empty($editInfo[0]["h1_color"]) ? $editInfo[0]["h1_color"] : '00:00';
$endTime = isset($editInfo[0]["h2_color"]) && !empty($editInfo[0]["h2_color"]) ? $editInfo[0]["h2_color"] : '00:00';
$cardColor = isset($editInfo[0]["price_card_color"]) && !empty($editInfo[0]["price_card_color"]) ? $editInfo[0]["price_card_color"] : '#ffffff';
$buttonColor = isset($editInfo[0]["buy_button_color"]) && !empty($editInfo[0]["buy_button_color"]) ? $editInfo[0]["buy_button_color"] : '#F36823';
$priceColor = isset($editInfo[0]["price_text_color"]) && !empty($editInfo[0]["price_text_color"]) ? $editInfo[0]["price_text_color"] : '#F36823';

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["categoryResult"])) {
    header("Location: ../Error/error.php");
} else {
    $categoryProducts = $_SESSION["categoryResult"];
    $pageTotal = $_SESSION["pageTotal"];
    $cId = $_SESSION["cId"];
    $page = $_SESSION["currentPage"];
}

date_default_timezone_set('Asia/Yangon');
$currentHour = date('H:i');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="icon" href="../resources/img/header/headerLogo.svg" type="image/icon type">
    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link rel="stylesheet" href="../resources/css/products.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../resources/lib/jquery3.6.0.js"></script>
</head>
<style>
    .scrollHide::-webkit-scrollbar {
        display: none;
    }
</style>

<body class="bg-[<?php

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


                    ?>] font-roboto scrollHide ">

    <?php
    include "../resources/common/navbar.php";
    ?>

    <section class="w-full container mx-auto md:mt-[130px] mt-[140px]">
        <!-- Nav Path -->
        <div class="text-textGray py-2 text-lg md:text-sm md:px-7 px-5 border-b border-gray-300">
            <span>Home > </span>
            <span><?= $categoryProducts[0]["category_name"] ?></span>
        </div>
    </section>

    <section class="w-full container mx-auto flex justify-center pt-5">
        <!--Left Side Brand, Price and Banner -->
        <div class="hidden md:block w-80 pr-5 pl-7">
            <?php
            $banner3 = isset($editInfo[0]["banner3"]) && !empty($editInfo[0]["banner3"]) ? $editInfo[0]["banner3"] : '/Storage/banner/bannerP2.svg';
            $banner4 = isset($editInfo[0]["banner4"]) && !empty($editInfo[0]["banner4"]) ? $editInfo[0]["banner4"] : '/Storage/banner/bannerP2.svg';
            $banner5 = isset($editInfo[0]["banner5"]) && !empty($editInfo[0]["banner5"]) ? $editInfo[0]["banner5"] : '/Storage/banner/banner2.svg';
            ?>

            <!-- 1st Banner -->
            <div class="mt-5 w-[200px]">
                <img src="../../../<?= $banner3 ?>" alt="banner1">
            </div>

            <!-- 2nd Banner -->
            <div class="mt-2 w-[200px]">
                <img src="../../../<?= $banner4 ?>" alt="banner2">
            </div>

            <!-- 3rd Banner -->
            <div class="mt-2 w-[200px]">
                <img src="../../../<?= $banner4 ?>" alt="banner2">
            </div>

        </div>
        <!--Left Side Brand, Price and Banner End -->

        <!--Right Side Products -->
        <div class="flex flex-col space-y-5 md:pr-7 px-5 md:min-w-[1200px]">
            <!-- Bannner -->
            <div class="rounded overflow-hidden">
            

                <img class="w-full md:h-[170px] object-cover"src="../../../<?= $banner5 ?>" alt="banner5">
               
            </div>

            <?php foreach ($categoryProducts as $cProduct) { ?>
                <!-- product-card -->
                <div class="text-[<?php
                                    if ($startTime > $endTime) {
                                        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                            echo "#ffffff";
                                        } else {
                                            echo $navColor;
                                        }
                                    } else {
                                        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                            echo "#ffffff";
                                        } else {
                                            echo $navColor;
                                        }
                                    }
                                    ?>] bg-[<?php
                                            if ($startTime > $endTime) {
                                                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                    echo "#4d4d4d";
                                                } else {
                                                    echo $cardColor;
                                                }
                                            } else {
                                                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                    echo "#4d4d4d";
                                                } else {
                                                    echo $cardColor;
                                                }
                                            }
                                            ?>] px-7 py-2 rounded shadow-md">
                    <a href="../../Controller/itemDetailController.php?productId=<?= $cProduct["id"] ?>">
                        <div class="flex items-center cursor-pointer">
                            <div class="w-[250px] flex justify-center item-center p-2">
                                <img class="max-h-[150px]" src="../../..<?= $cProduct["p_path"] ?>" alt="">
                            </div>
                            <div class="pl-5">
                                <p class="text-sm md:text-xl"><?= $cProduct["p_name"] ?></p>
                                <p class="text-sm mt-4 md:text-xl">From: <?= $cProduct["m_name"] ?></p>
                                <p class="md:text-xl mt-4 mb-4 text-[<?php
                                                                        if ($startTime > $endTime) {
                                                                            if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                                echo "#ffffff";
                                                                            } else {
                                                                                echo $priceColor;
                                                                            }
                                                                        } else {
                                                                            if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                                echo "#ffffff";
                                                                            } else {
                                                                                echo $priceColor;
                                                                            }
                                                                        }
                                                                        ?>] pb-0">Price: <?= number_format($cProduct["sell_price"]) ?> Ks</p>
                                <?php
                                $text = ($cProduct["p_stock"] <= 5) ? "Only " . $cProduct["p_stock"] . " left in stock!" : $cProduct["p_stock"] . " stocks available!";
                                ?>
                                <div class="">
                                    <span class="text-sm md:text-base text-textRed"><?= $text ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="flex justify-end pb-3">
                        <button id="<?= $cProduct["id"] ?>" mID="<?= $cProduct["merchant_id"]?>" class="cartBtn bg-[<?php
                                            if ($startTime > $endTime) {
                                                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                    echo "#000000";
                                                } else {
                                                    echo $buttonColor;
                                                }
                                            } else {
                                                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                    echo "#000000";
                                                } else {
                                                    echo $buttonColor;
                                                }
                                            }
                                            ?>] text-textWhite px-6 py-1 rounded">Add to Cart</button>
                    </div>
                </div>
                <!-- product-card End-->
            <?php } ?>


            <!-- Pagination -->
            <div class="flex mx-auto">
                <?php $disabledOrNot = ($page <= 1) ? "pointer-events-none" : ""; ?>
                <a href="../../Controller/homePage/redirectCategoryPageController.php?categoryId=<?= $cId ?>&page=<?= $page - 1 ?>" class="<?= $disabledOrNot ?> border-2 px-3 py-1 border-textGray flex items-center text-[<?php
                                                                                                                                                                                                                            if ($startTime > $endTime) {
                                                                                                                                                                                                                                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                                                                                                                                                                                    echo "#ffffff";
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                    echo $navColor;
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                                                                                                                                                                                    echo "#ffffff";
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                    echo $navColor;
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                            ?>]">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
                <?php for ($i = 1; $i <= $pageTotal; $i++) { ?>
                    <?php $shownPage = ($page == $i) ? "bg-tertiary text-white" : ""; ?>
                    <a href="../../Controller/homePage/redirectCategoryPageController.php?categoryId=<?= $cId ?>&page=<?= $i ?>" class="<?= $shownPage ?> border-2 w-9 py-1 border-textGray text-center text-[<?php
                                                                                                                                                                                                                if ($startTime > $endTime) {
                                                                                                                                                                                                                    if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                                                                                                                                                                        echo "#ffffff";
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        echo $navColor;
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                                                                                                                                                                        echo "#ffffff";
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        echo $navColor;
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                }
                                                                                                                                                                                                                ?>]">
                        <?= $i ?>
                    </a>
                <?php } ?>

                <?php $disabledOrNot = ($page >= $pageTotal) ? "pointer-events-none" : ""; ?>
                <a href="../../Controller/homePage/redirectCategoryPageController.php?categoryId=<?= $cId ?>&page=<?= $page + 1 ?>" class="<?= $disabledOrNot ?> border-2 px-3 py-1 border-textGray flex items-center text-[<?php
                                                                                                                                                                                                                            if ($startTime > $endTime) {
                                                                                                                                                                                                                                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                                                                                                                                                                                    echo "#ffffff";
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                    echo $navColor;
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                                                                                                                                                                                    echo "#ffffff";
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                    echo $navColor;
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                            } ?>]">
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                </a>
            </div>
            <!-- Pagination End-->

        </div>
    </section>


    <?php
    include "../resources/common/footer.php"
    ?>

</body>

</html>