<?php
session_start();
$currentDetailProductID = $_SESSION["currentDetailPrdocutID"];
$currentLoginUserID = (isset($_SESSION["currentLoginUser"])) ? $_SESSION["currentLoginUser"] : false; //session
(isset($_SESSION["productDetail"])) ? $productDetail = $_SESSION["productDetail"] : header("Location: ../Error/error.php");
if (isset($_SESSION["averageRating"])) $averageRating = $_SESSION["averageRating"];
if (isset($_SESSION["totalRatedCustomer"])) $totalRatedCustomer = $_SESSION["totalRatedCustomer"];
if (isset($_SESSION["totalFivestarRating"])) $totalFivestarRating = $_SESSION["totalFivestarRating"];
if (isset($_SESSION["totalFourstarRating"])) $totalFourstarRating = $_SESSION["totalFourstarRating"];
if (isset($_SESSION["totalThreestarRating"])) $totalThreestarRating = $_SESSION["totalThreestarRating"];
if (isset($_SESSION["totalTwostarRating"])) $totalTwostarRating = $_SESSION["totalTwostarRating"];
if (isset($_SESSION["totalOnestarRating"])) $totalOnestarRating = $_SESSION["totalOnestarRating"];
if (isset($_SESSION["reviews"])) $totalReviews =  $_SESSION["reviews"];
if (isset($_SESSION["isWishlisted"])) $isWishlisted =  $_SESSION["isWishlisted"];
include "../../Controller/uiElement/editInfoController.php";
$primaryColor = isset($editInfo[0]["primary_color"]) && !empty($editInfo[0]["primary_color"]) ? $editInfo[0]["primary_color"] : '#FAFAFA';
$lightTertiary = isset($editInfo[0]["light_tertiary"]) && !empty($editInfo[0]["light_tertiary"]) ? $editInfo[0]["light_tertiary"] : '#F5F5F5';
$navColor = isset($editInfo[0]["nav_text_color"]) && !empty($editInfo[0]["nav_text_color"]) ? $editInfo[0]["nav_text_color"] : '#000000';
$startTime = isset($editInfo[0]["h1_color"]) && !empty($editInfo[0]["h1_color"]) ? $editInfo[0]["h1_color"] : '00';
$endTime = isset($editInfo[0]["h2_color"]) && !empty($editInfo[0]["h2_color"]) ? $editInfo[0]["h2_color"] : '00';
date_default_timezone_set('Asia/Yangon'); 
$currentHour = date('H:i'); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Detail</title>
    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../resources/lib/jquery3.6.0.js"></script>
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4.5.1/css/metro-all.min.css">
    <style>
        #rating-events+ul li {
            width: 50px;
            height: 50px;
            font-size: 50px;
        }

        .navUL {
            display: flex !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .navUL li {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
            scrollbar-width: none;
        }

        .cart_item {
            top: -2px !important;
            right: -8px !important;
        }

        .secondNav {
            padding-left: 28px !important;
            padding-right: 28px !important;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
      


    </style>
</head>

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
    ?>] font-roboto scrollbar-hide">
    <?php include "../resources/common/navbar.php" ?>

    <div class="mt-36 text-textGray py-2 text-lg md:text-sm md:px-7 px-5">
        <span>Home > </span>
        <span>Search Results ></span>
        <span>Item Details</span>
    </div>

    <!--Start of detail card-->
    <div class="px-5 md:px-28 py-10 md:py-6">
        <div class="bg-[<?php
    if ($startTime > $endTime) {
      if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
        echo "#3d3d3d";
      } else {
        echo $lightTertiary;
      }
    } else {
      if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
        echo "#3d3d3d";
      } else {
        echo $lightTertiary;
      }
    }
    ?>] flex flex-col justify-evenly items-center shadow-md md:flex-row md:w-99 md:py-5">
            <!-- image half -->
            <img class="p_detail_img w-[80%] md:max-w-[250px]" src="../../../<?= $productDetail[0]["p_path"] ?>" alt="">

            <!-- detail info -->
            <div class="p-5 bg-[<?php
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
    ?>]">
                <!-- product detail text -->
                <p class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>] font-semibold mb-5"><?= $productDetail[0]["p_detail"] ?></p>

                <!-- brand and seller -->
                <div class="md:flex md:justify-between md:items-center">
                    <p class="font-semibold text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>]">Brand: <span class="brand text-tertiary"><?= $productDetail[0]["brand_name"] ?></span></p>
                    <p class="font-semibold text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>] ">From: <span class="seller text-tertiary"><?= $productDetail[0]["m_name"] ?></span></p>
                </div>
                <hr class="mt-4 mb-4 border-black border-opacity-50">

                <!-- price and (quantity increase button or stars) -->
                <div class="flex justify-between items-center">
                    <p class="font-bold text-xl text-tertiary">Ks <span class="price"><?= number_format($productDetail[0]["sell_price"]) ?></span></p>
                    <!-- <img class="hidden md:block w-24" src="../resources/img/item_detail/4stars.svg" alt=""> -->
                    <input id="" data-role="rating" data-stared-color="#F36823" data-static="true" data-value="<?= $averageRating ?>">
                    <p class="font-semibold md:hidden">
                        <?php
                        $wishlistColor = ($isWishlisted == true) ? "text-textOrange" : "text-gray-400";
                        ?>
                        <ion-icon id="heartIcon" w_pId=<?= $productDetail[0]["id"] ?> name="heart-circle" class="wishlistAdd cursor-pointer text-4xl <?=$wishlistColor?>"></ion-icon>
                    </p>
                </div>

                <!-- icons or button for wishlist and add to cart -->
                <div class="mt-6 flex justify-between items-center md:flex-col">
                    <?php
                        $wishlistBtnTextColor = ($isWishlisted == true) ? "text-textOrange" : "";
                        $wishlistBtnText = ($isWishlisted == true) ? "Added to Wishlist" : "Add to Wishlist";
                    ?>
                    <button w_pId=<?= $productDetail[0]["id"] ?> id="wishListText" class="wishlistAdd md:block md:mb-5 md:w-72 hidden cursor-pointer font-bold text-lg px-5 py-2 rounded-md bg-white border border-borderOrange <?= $wishlistBtnTextColor ?>"><?= $wishlistBtnText ?></button>
                    <button id="<?= $productDetail[0]["id"]?>" mID="<?= $productDetail[0]["merchant_id"]?>" class="cartBtn cursor-pointer font-bold text-lg px-5 py-2 rounded-md  bg-[<?php
        if ($startTime > $endTime) {
          if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo '#000000';
          } else {
            echo $buttonColor;
          }
        } else {
          if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo '#000000';
          } else {
            echo $buttonColor;
          }
        }
        ?>]  text-[<?php
                    if ($startTime > $endTime) {
                      if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                        echo '#ffffff';
                      } else {
                        echo $buttonText;
                      }
                    } else {
                      if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                        echo '#ffffff';
                      } else {
                        echo $buttonText;
                      }
                    }
                    ?>] md:w-72">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <!--End of detail card-->

    <!-- Start of product description -->
    <div class="px-5 md:px-28 ">
        <div class="bg-[<?php
    if ($startTime > $endTime) {
      if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
        echo "#3d3d3d";
      } else {
        echo $lightTertiary;
      }
    } else {
      if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
        echo "#3d3d3d";
      } else {
        echo $lightTertiary;
      }
    }
    ?>] py-5 px-5 shadow-md">
            <p class="text-xl font-bold underline mb-5 text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>]">Product Description</p>
            <p class="p_descript md:pl-8 text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>]"><?= $productDetail[0]["p_description"] ?></p>
        </div>
    </div>
    <!-- End of product description -->

    <!-- Start of reviews summary -->
    <div class="px-5 md:px-28 mt-8">
        <div class="bg-[<?php
    if ($startTime > $endTime) {
      if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
        echo "#3d3d3d";
      } else {
        echo $lightTertiary;
      }
    } else {
      if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
        echo "#3d3d3d";
      } else {
        echo $lightTertiary;
      }
    }
    ?>] py-5 px-5 shadow-md">


            <div class="flex justify-evenly space-x-[200px] items-center">
                <div class="">
                    <p class="text-xl font-bold underline text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>]">Rating & Reviews</p>
                    <p class="mt-3 text-gray-500"><?= $totalRatedCustomer ?> Global Ratings</p>
                    <div class="mt-3">
                        <div class="flex space-x-3">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">5 star</span>
                            <div class="flex items-center mb-3">
                                <div class="w-64 bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                    <?php
                                    $width = ($totalRatedCustomer == "none") ? 0 : (100 * $totalFivestarRating) / $totalRatedCustomer;
                                    ?>
                                    <div class="bg-tertiary h-2.5 rounded dark:bg-blue-500" style="width: <?= $width ?>%"></div>
                                </div>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?= round($width) ?>%</span>
                            </div>
                        </div>

                        <div class="flex space-x-3">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">4 star</span>
                            <div class="flex items-center mb-3">
                                <div class="w-64 bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                    <?php
                                    $width = ($totalRatedCustomer == "none") ? 0 : (100 * $totalFourstarRating) / $totalRatedCustomer;
                                    ?>
                                    <div class="bg-tertiary h-2.5 rounded dark:bg-blue-500" style="width: <?= $width ?>%"></div>
                                </div>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?= round($width) ?>%</span>
                            </div>
                        </div>

                        <div class="flex space-x-3">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">3 star</span>
                            <div class="flex items-center mb-3">
                                <div class="w-64 bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                    <?php
                                    $width = ($totalRatedCustomer == "none") ? 0 : (100 * $totalThreestarRating) / $totalRatedCustomer;
                                    ?>
                                    <div class="bg-tertiary h-2.5 rounded dark:bg-blue-500" style="width: <?= $width ?>%"></div>
                                </div>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?= round($width) ?>%</span>
                            </div>
                        </div>

                        <div class="flex space-x-3">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">2 star</span>
                            <div class="flex items-center mb-3">
                                <div class="w-64 bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                    <?php
                                    $width = ($totalRatedCustomer == "none") ? 0 : (100 * $totalTwostarRating) / $totalRatedCustomer;
                                    ?>
                                    <div class="bg-tertiary h-2.5 rounded dark:bg-blue-500" style="width: <?= $width ?>%"></div>
                                </div>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?= round($width) ?>%</span>
                            </div>
                        </div>

                        <div class="flex space-x-3">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">1 star</span>
                            <div class="flex items-center mb-3">
                                <div class="w-64 bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                    <?php
                                    $width = ($totalRatedCustomer == "none") ? 0 : (100 * $totalOnestarRating) / $totalRatedCustomer;
                                    ?>
                                    <div class="bg-tertiary h-2.5 rounded dark:bg-blue-500" style="width: <?= $width ?>%"></div>
                                </div>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?= round($width) ?>%</span>
                            </div>
                        </div>

                    </div>

                </div>


                <!-- desktop view -->
                <div class="hidden text-center md:block md:ml-5 md:flex-none text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
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
                    <p class="font-semibold text-lg ">Review this product after buying</p>
                    <p>Share your thoughts with other customers!</p>
                    <small class="text-red-400"><?php
                                                if (isset($_SESSION["cannotReview"])) echo $_SESSION["cannotReview"];
                                                if (isset($_SESSION["alreadyReview"])) echo $_SESSION["alreadyReview"]
                                                ?></small>
                    <div>
                        <button class=" bg-[<?php
        if ($startTime > $endTime) {
          if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo '#000000';
          } else {
            echo $buttonColor;
          }
        } else {
          if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo '#000000';
          } else {
            echo $buttonColor;
          }
        }
        ?>]  text-[<?php
                    if ($startTime > $endTime) {
                      if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                        echo '#ffffff';
                      } else {
                        echo $buttonText;
                      }
                    } else {
                      if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                        echo '#ffffff';
                      } else {
                        echo $buttonText;
                      }
                    }
                    ?>] px-4 py-1 rounded mt-3 reviewNow">Review Now</button>
                    </div>
                </div>
            </div>

            <!-- mobile view -->
            <div class="mt-6 text-center block md:hidden">
                <p class="font-semibold text-lg">Review this product after buying</p>
                <p>Share your thoughts with other customers!</p>
                <button class="bg-tertiary text-white px-4 py-1 rounded mt-3 reviewNow">Review Now</button>
            </div>
        </div>
    </div>
    <!-- End of reviews summary -->

    <!-- Start of user reviews -->
    <div class="mt-5 px-5 md:px-28">
        <?php
        foreach ($totalReviews as $review) {
            $firstLetterOfName =  substr($review["c_name"], 0, 1);
        ?>
            <div class="bg-productCardBgColor py-5 px-5 shadow-md mt-5">
                <div class="flex justify-between items-center">
                    <!-- user img and rating star img -->
                    <div class="flex justify-start items-center">
                        <div class="rounded-[50%] bg-tertiary w-10 h-10 flex justify-center items-center text-xl text-white"><?= $firstLetterOfName ?></div>
                        <input class="ml-2" data-role="rating" data-stared-color="#F36823" data-static="true" data-value="<?= $review["rating"] ?>">
                    </div>
                    <!-- Date review written -->
                    <div>
                        <p class="review_createDate text-lg"><?= $review["create_date"] ?></p>
                    </div>
                </div>
                <p class="review_title font-bold text-lg pl-12"><?= $review["review_title"] ?></p>
                <p class="review_text mt-3 pl-12"><?= $review["review_text"] ?></p>
            </div>

            <?php
            if ($review["reply_text"] != null) {
                $repliedMerchant = ($review["m_bname"] != null) ? $review["m_bname"] : $review["m_name"];
            ?>
                <div class="replies mt-2 pl-10">
                    <div class="bg-productCardBgColor py-5 px-5 shadow-md">
                        <div class="font-bold text-lg mb-3"><ion-icon class="mr-2" name="arrow-undo-sharp"></ion-icon>Replied</div>

                        <!-- Date review written -->
                        <div class="flex justify-between items-center">
                            <p class="font-bold text-lg pl-6">From: <span class="text-tertiary"><?= $repliedMerchant ?></span></p>
                            <p class="review_createDate text-lg"><?= $review["update_date"] ?></p>
                        </div>

                        <p class="review_text mt-3 pl-12"><?= $review["reply_text"] ?></p>
                    </div>
                </div>

            <?php } ?>

        <?php } ?>
    </div>
    <!-- Start of Modal Pop Up -->

    <!-- Modal background -->
    <div id="reviewPopup" class="hidden">
        <div class="z-10 fixed top-0 w-full h-screen pt-2 bg-[rgba(0,0,0,0.5)] flex justify-center items-center">
            <div class="bg-white m-auto p-5 md:p-10 border rounded-sm md:rounded-md w-[80%] md:w-[60%]">
                <form class="container mx-auto px-4 py-8" action="../../Controller/reviewController.php" method="post">
                    <input type="hidden" name="reviewProductID" value="<?= $currentDetailProductID ?>">
                    <input type="hidden" name="reviewCustomerID" value="<?= $currentLoginUserID ?>">
                    <h1 class="text-3xl font-semibold mb-4">Create Review</h1>
                    <p class="text-lg font-semibold">Overall Rating</p>
                    <input name="rating" id="rating-events" data-role="rating" data-star-color="#F36823" data-stared-color="#F36823" class="mt-3" required>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2" for="message">Review Title</label>
                        <textarea name="reviewTitle" class="w-1/2 px-3 py-3 h-16 resize-none border border-tertiary rounded focus:outline-none " id="message" placeholder="Add a headline review" required></textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2" for="message">Add a written review:</label>
                        <textarea name="reviewText" class="w-full px-3 py-3 h-24 resize-none border border-tertiary rounded focus:outline-none " id="message" placeholder="What do you like or dislike?" required></textarea>

                    </div>
                    <div class="flex justify-end items-center space-x-5 mt-3">
                        <button type="button" id="cancelReview" class="px-4 py-[6px] border-2 border-tertiary text-tertiary rounded">Cancel</button>
                        <button type="submit" name="submitReview" class="bg-[#F36823] text-white font-semibold px-4 py-2 rounded">
                            Submit Review
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- End of Modal Pop Up -->

    <!-- End of user reviews -->

    <footer class="bg-[<?php
      
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
    
  

      ?>] w-full h-auto font-roboto mt-[90px]">
<div class="flex md:flex-row md:justify-around py-8 flex-col md:text-left text-center ">
    <div class="itemDetail">
        <span class="block text-[18px] mt-[16px] font-semibold text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>] py-3">Customer Care</span>

        <a class="no-underline text-center md:text-left" href="../Contact/help.php">
        <span class="cursor-pointer text-[<?php
      
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
    
  

      ?>] hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>]  block">FAQs</span>


        </a>
        <a class="no-underline sm:text-center md:text-center" href="../Point/points.php">
        <span class="cursor-pointer text-[<?php
      
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
    
  

      ?>] hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>] block">Exchange Points</span>

        </a>
        <a class="no-underline text-center md:text-left" href="../Contact/privacyAndPolicy.php">
        <span class="cursor-pointer text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>] hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>] block">Privacy & Policy</span>

        </a>
        <a class="no-underline  md:text-center sm:text-center" href="../../../Merchant/View/Login/login.php">
        <span class="cursor-pointer text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>] hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>] block">Sell on Shop</span>

        </a>
    </div>

    <div class="">
        <span class="block text-[18px] font-semibold py-3 text-center md:text-left text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>] md:mt-0 mt-5">Shop</span>
        <a class="no-underline text-center md:text-left" href="../index.php">
        <span class="block cursor-pointer text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>] hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>]">Shop</span>

        </a>
        <a class="no-underline text-center md:text-left" href="../#trending">
        <span class="block cursor-pointer text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>] hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>]">Trending Products</span>

        </a>
        <a class="no-underline" href="../#best">
        <span class="block cursor-pointer text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>] hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>]">Bestsellers Product</span>

        </a>

        <a class="no-underline text-center md:text-left" href="../#new">
        <span class="block cursor-pointer text-[<?php
      
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
    
  

      ?>] hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>]">New Products</span>

        </a>

    </div>
<?php
        $editEmail= isset($editInfo[0]["email"]) && !empty($editInfo[0]["email"]) ? $editInfo[0]["email"] : 'trendhub2023.shop@gmail.com';
        $editPhoneNumber= isset($editInfo[0]["phoneNumber"]) && !empty($editInfo[0]["phoneNumber"]) ? $editInfo[0]["phoneNumber"] : '09 40-355-970';
        $editAddress= isset($editInfo[0]["address"]) && !empty($editInfo[0]["address"]) ? $editInfo[0]["address"] : ' No.1200, room(6B), Yadanar Street, South Oakkalapa,Yangon, Myanmar';
        $editAddressLink = isset($editInfo[0]["locationLink"]) && !empty($editInfo[0]["locationLink"]) ? $editInfo[0]["locationLink"] : 'https://www.google.com/maps/place/Ex;braiN+Office/@16.8430957,96.1949609,17z/data=!3m1!4b1!4m6!3m5!1s0x30c193f51faa68ff:0x72868c60b69532c4!8m2!3d16.8430906!4d96.1975358!16s%2Fg%2F11scs4qwp8?entry=tts&shorturl=1';



?>
    <div class="">
        <span class="block text-[18px] font-semibold py-3 md:mt-0 mt-5 text-center md:text-left text-[<?php
      
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
    
  

      ?>] ">Contact Us</span>
        <span class="block cursor-pointer text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>] text-center md:text-left hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>]   ">Email : <a class="" href="mailto:<?= $editEmail ?>"><?= $editEmail ?> </a></span>
        <span class="block cursor-pointer text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>] text-center md:text-left hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>] ">Phone : <a class="" href="tel:<?= $editPhoneNumber ?>"><?= $editPhoneNumber ?></a></span>
        <span class="block cursor-pointer text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>]  w-[400px] text-center md:text-left hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>]" ><a class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>]  hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>]" target="_blank" href="<?= $editAddressLink ?>">Address : <?= $editAddress ?></a></span>
        
    </div>

    <div class="">
        <span class="block text-[18px] font-semibold py-3 text-center md:mt-0 mt-5 text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>]">Follow Us</span>
      <div class="flex justify-center space-x-3">
        <a href="https://web.facebook.com/extbrainedu">
      <ion-icon class="text-2xl text-[<?php
      
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
    
  

      ?>] hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>]" name="logo-facebook"></ion-icon>

        </a>
      <ion-icon class="text-2xl text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>] hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>] cursor-pointer" name="logo-instagram"></ion-icon>
      <ion-icon class="text-2xl text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>] hover:text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo $tertiaryColor;
        }
      }
      ?>] cursor-pointer" name="logo-twitter"></ion-icon>
      </div>
    </div>

  
</div>
<span class="text-center text-sm block pb-5 text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $navColor;
        }
    }
    
  

      ?>]">Copyright © 2023 TrendHub  | Created by X-Tech</span>
</footer>



    <script src="https://cdn.korzh.com/metroui/v4.5.1/js/metro.min.js"></script>
    <script src="../resources/js/product/itemDetail.js"></script>
    <script>
        $(document).ready(function() {
            $('.reviewNow').click(function() {
                $('#reviewPopup').removeClass("hidden");
            })

            $('#cancelReview').click(function() {
                $('#reviewPopup').addClass("hidden");
            })



        })
    </script>
</body>

</html>

<?php

unset($_SESSION["cannotReview"]);
unset($_SESSION["alreadyReview"]);
?>