<?php
include "../../Controller/uiElement/editInfoController.php";
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
if (!isset($_SESSION["homeSearchResult"])) {
    header("Location: ../Error/error.php");
} else {
    $searchProducts = $_SESSION["homeSearchResult"];
    $pageTotal = $_SESSION["homeSearchPageTotal"];
    $page = $_SESSION["homeSearchCurrentPage"];
    $totalProducts = $_SESSION["totalProducts"];
    $searchInput = $_SESSION["searchInput"];
}

date_default_timezone_set('Asia/Yangon');
$currentHour = date('H:i');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="icon" href="../resources/img/header/headerLogo.svg" type="image/icon type">
    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link rel="stylesheet" href="../resources/css/products.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../resources/lib/jquery3.6.0.js"></script>
</head>

<style>
    .scrollHide::-webkit-scrollbar {
        display: none;
    }
</style>

<body class="scrollHide bg-[<?php
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
                            ?>] font-roboto">

    <?php
    include "../resources/common/navbar.php";
    ?>

    <section class="w-full container mx-auto mt-[140px]">
        <!-- Nav Path -->
        <div class="text-textGray py-2 text-xs md:text-sm md:px-7 px-5">
            <span>Home > </span>
            <span>Search Results</span>
        </div>

        <!-- Found Items and Sort -->
        <div class="flex justify-between items-center py-2 border-t-2 border-b-2 border-[#D9D9D9] md:px-7 px-5">
            <div class="text-textGray text-xs md:text-sm">
                <span><?= $totalProducts ?> </span>
                <span>items found for </span>
                <span>"<?= $searchInput ?>"</span>
            </div>

        </div>
    </section>

    <section class="w-full container mx-auto flex justify-center md:space-x-2 pt-5">
        <!--Left Side Brand, Price and Banner -->
        <div class="hidden md:block w-80 px-5 pr-5 pl-7">
            <?php
            $banner1 = isset($editInfo[0]["banner1"]) && !empty($editInfo[0]["banner1"]) ? $editInfo[0]["banner1"] : '/Storage/banner/bannerP1.svg';
            $banner2 = isset($editInfo[0]["banner2"]) && !empty($editInfo[0]["banner2"]) ? $editInfo[0]["banner2"] : '/Storage/banner/bannerP1.svg';
            ?>
            <!-- 1st Banner -->
            <div class="mt-5">
                <img src="../../../<?= $banner1 ?>" alt="banner1">
            </div>

            <!-- 2nd Banner -->
            <div class="mt-2">
                <img src="../../../<?= $banner2 ?>" alt="banner1">
            </div>

            <!-- 3rd Banner -->
            <div class="mt-2">
                <img src="../../../<?= $banner2 ?>" alt="banner1">
            </div>

        </div>
        <!--Left Side Brand, Price and Banner End -->

        <!--Right Side Products -->
        <div class="flex flex-col space-y-5 md:pr-7 px-5 md:min-w-[1200px]">
            <?php foreach ($searchProducts as $searched) { ?>
                <!-- product-card -->
                <div class="shadow-md bg-[<?php
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
                                            ?>] px-7 py-2 rounded">
                    <a href="../../Controller/itemDetailController.php?productId=<?= $searched["id"] ?>">
                        <div class="flex items-center">
                            <div class="w-[250px] flex justify-center item-center p-2">
                                <img class="max-h-[150px]" src="../../..<?= $searched["p_path"] ?>" alt="msi">
                            </div>

                            <div class="pl-5">
                                <p class="text-sm md:text-xl text-[<?php
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
                                                                    ?>]"><?= $searched["p_name"] ?></p>
                                <p class="text-sm md:text-xl text-[<?php
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
                                                                    ?>]">From: <?= $searched["m_name"] ?></p>
                                <p class="mt-3 mb-3 md:text-xl text-[<?php
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
                                                                        ?>] pb-0">Price: <?= number_format($searched["sell_price"]) ?> Ks</p>
                                <div class="flex justify-between items-center">
                                    <?php
                                    $text = ($searched["p_stock"] <= 5) ? "Only " . $searched["p_stock"] . " left in stock!" : $searched["p_stock"] . " stocks available!";
                                    ?>
                                    <span class="text-sm md:text-base text-textRed"><?= $text ?></span>
                                </div>

                            </div>
                        </div>
                    </a>
                    <div class="flex justify-end items-center pb-3">
                        <button id="<?= $searched["id"] ?>" mID="<?= $searched["merchant_id"]?>" class="cartBtn bg-[<?php
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
                <a href="../../Controller/homePage/afterSearchProductController.php?page=<?= $page - 1 ?>" class="<?= $disabledOrNot ?> border-2 text-[<?php
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
                                                                                                                                                    ?>] px-3 py-1 border-textGray flex items-center"><ion-icon name="chevron-back-outline"></ion-icon></a>
                <?php for ($i = 1; $i <= $pageTotal; $i++) { ?>
                    <?php $shownPage = ($page == $i) ? "bg-tertiary text-white" : ""; ?>
                    <a href="../../Controller/homePage/afterSearchProductController.php?page=<?= $i ?>" class="<?= $shownPage ?> border-2 text-[<?php
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
                                                                                                                                                ?>] w-9 py-1 border-textGray text-center"><?= $i ?></a>
                <?php } ?>
                <?php $disabledOrNot = ($page >= $pageTotal) ? "pointer-events-none" : ""; ?>
                <a href="../../Controller/homePage/afterSearchProductController.php?page=<?= $page + 1 ?>" class="<?= $disabledOrNot ?> border-2 text-[<?php
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
                                                                                                                                                    ?>] px-3 py-1 border-textGray flex items-center"><ion-icon name="chevron-forward-outline"></ion-icon></a>
            </div>
            <!-- Pagination End-->

        </div>
    </section>

    <?php
    include "../resources/common/footer.php"
    ?>

</body>

</html>