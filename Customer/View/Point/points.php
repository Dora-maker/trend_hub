
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point Page</title>
    <link rel="icon" href="../resources/img/header/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../resources/js/points.js" defer></script>
    <script src="../resources/lib/jquery3.6.0.js"></script>
</head>
<?php

include "../../Controller/uiElement/editInfoController.php";
include "../resources/common/navbar.php";
$primaryColor = isset($editInfo[0]["primary_color"]) && !empty($editInfo[0]["primary_color"]) ? $editInfo[0]["primary_color"] : '#FAFAFA';
$tertiaryColor = isset($editInfo[0]["tertiary_color"]) && !empty($editInfo[0]["tertiary_color"]) ? $editInfo[0]["tertiary_color"] : '#F36823';
$startTime = isset($editInfo[0]["h1_color"]) && !empty($editInfo[0]["h1_color"]) ? $editInfo[0]["h1_color"] : '00:00';
$endTime = isset($editInfo[0]["h2_color"]) && !empty($editInfo[0]["h2_color"]) ? $editInfo[0]["h2_color"] : '00:00';
$cardColor = isset($editInfo[0]["price_card_color"]) && !empty($editInfo[0]["price_card_color"]) ? $editInfo[0]["price_card_color"] : '#ffffff';
$buttonColor = isset($editInfo[0]["buy_button_color"]) && !empty($editInfo[0]["buy_button_color"]) ? $editInfo[0]["buy_button_color"] : '#F36823';
$priceColor = isset($editInfo[0]["price_text_color"]) && !empty($editInfo[0]["price_text_color"]) ? $editInfo[0]["price_text_color"] : '#F36823';
$titleColor = isset($editText[0]["title_color"]) && !empty($editText[0]["title_color"]) ? $editText[0]["title_color"] : '#000000';
date_default_timezone_set('Asia/Yangon');
$currentHour = date('H:i');
?>
<style>
    .scrollHide::-webkit-scrollbar {
        display: none;
    }
</style>
<body class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        }else {
            echo $primaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        } else {
            echo $primaryColor;
        }
    }
    
  

      ?>] font-roboto scrollHide">
    <!-- start of nav bar -->
   
    <!-- end of nav bar -->
    
    <!-- Star of Point History Modal Pop Up -->
    <!-- Modal background -->
    <div id="pointHistoryModal" class="hidden z-1 fixed w-full h-full pt-2 bg-black bg-opacity-50">
        <div class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        }else {
            echo $cardColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        } else {
            echo $cardColor;
        }
    }
    
  

      ?>] m-auto p-5 md:p-10 border rounded-sm md:rounded-md w-[80%] md:w-[60%]">
            <!-- Modal Content -->
            <p class="font-semibold md:text-2xl text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $titleColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $titleColor;
        }
    }
    
  

      ?>]">Point History</p>
            <hr class="border-black mt-4 mb-4">

            <!-- if user has no points or not logged in users -->
            <!-- <div class="noPointHistory flex flex-col justify-center items-center">
                <img src="../resources/img/point/Empty state concept 1.svg" alt="">
                <span class="text-center font-light mb-3">There is no data.</span>
            </div> -->

            <!-- if user has points -->
            <!-- each point history -->
            <div class="pointHistory shadow-md">
                <p class="text-sm font-bold p-2 pb-4 md:p-4 md:pb-7 md:text-xl text-[<?php
      
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
    
  

      ?>]">20,000 phone bill</p>
                <div class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        }else {
            echo $secondaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        } else {
            echo $secondaryColor;
        }
    }
    
  

      ?>] p-2 pb-4 md:p-4 md:pb-7">
                    <div class="flex justify-between items-center">
                        <p class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $tertiaryColor;
        }
    }
    
  

      ?>] text-sm font-bold md:text-xl"><span>50</span> points</p>
                        <p class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $tertiaryColor;
        }
    }
    
  

      ?>] text-sm font-bold md:text-xl">Claimed at <span class="point_claimedDate">2023/07/18</span></p>
                    </div>
                </div>
            </div>
            <!-- each point history -->
            <div class="pointHistory mt-5 shadow-md">
                <p class="text-sm font-bold p-2 pb-4 md:p-4 md:pb-7 md:text-xl text-[<?php
      
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
    
  

      ?>]">20,000 phone bill</p>
                <div class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        }else {
            echo $secondaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        } else {
            echo $secondaryColor;
        }
    }
    
  

      ?>] p-2 pb-4 md:p-4 md:pb-7">
                    <div class="flex justify-between items-center">
                        <p class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $tertiaryColor;
        }
    }
    
  

      ?>] text-sm font-bold md:text-xl"><span>50</span> points</p>
                        <p class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $tertiaryColor;
        }
    }
    
  

      ?>] text-sm font-bold md:text-xl">Claimed at <span class="point_claimedDate">2023/07/18</span></p>
                    </div>
                </div>
            </div>
            <!-- each point history -->
            <div class="pointHistory mt-5 shadow-md">
                <p class="text-sm font-bold p-2 pb-4 md:p-4 md:pb-7 md:text-xl text-[<?php
      
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
    
  

      ?>]">20,000 phone bill</p>
                <div class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        }else {
            echo $secondaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        } else {
            echo $secondaryColor;
        }
    }
    
  

      ?>] p-2 pb-4 md:p-4 md:pb-7">
                    <div class="flex justify-between items-center">
                        <p class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $tertiaryColor;
        }
    }
    
  

      ?>] text-sm font-bold md:text-xl"><span>50</span> points</p>
                        <p class="text-[<?php
      
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
    
  

      ?>] text-sm font-bold md:text-xl">Claimed at <span class="point_claimedDate">2023/07/18</span></p>
                    </div>
                </div>
            </div>

            <!-- Modal Close Button -->
            <div class="flex justify-center md:mt-6">
                <button class="mt-5 bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        }else {
            echo $buttonColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        } else {
            echo $buttonColor;
        }
    }
    
  

      ?>] text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $buttonText;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $buttonText;
        }
    }
    
  

      ?>] text-center px-8 py-1 rounded-md md:px-10 md:text-lg" onclick="closePointHistory()">Close</button>
            </div>
            <!-- End of Modal Content -->
        </div>
    </div>
    <!-- End of Point History Modal Pop Up -->

    <!-- Star of Claim Reward Modal Pop Up -->
    <!-- Modal background -->
    <div id="claimRewardModal" class="hidden z-1 fixed w-full h-full pt-2 bg-black bg-opacity-50">
        <div class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        }else {
            echo $cardColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        } else {
            echo $cardColor;
        }
    }
    
  

      ?>] m-auto p-5 md:p-8 border rounded-sm md:rounded-md w-[80%] md:w-[40%]">
            <!-- Modal Content -->
            <p class="font-semibold md:text-2xl text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $titleColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $titleColor;
        }
    }
    
  

      ?>]">Claim Reward</p>
            <hr class="border-black mt-4 mb-4">

            <div class="md:text-xl">
                <p class="mb-5 text-[<?php
      
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
    
  

      ?>]">Are you sure you want to claim this item?</p>
                <p class="mb-3 font-bold text-[<?php
      
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
    
  

      ?>]">Reward: <span class="pl-6">20,000 phone bill</span></p>
                <p class="font-bold text-[<?php
      
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
    
  

      ?>]">Cost: <span class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $tertiaryColor;
        }
    }
    
  

      ?>] pl-11 md:pl-12"><span>20</span> points</span></p>
            </div>

            <!-- Modal Confirm or Cancel Button -->
            <div class="flex justify-around items-center md:mt-6">
                <button class="mt-5 bg-[#F5F5F5] text-gray-600 text-center px-8 py-1 rounded-md md:text-lg md:px-12" onclick="cancelRewardClaim()">Cancel</button>
                <button class="mt-5 bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        }else {
            echo $buttonColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        } else {
            echo $buttonColor;
        }
    }
    
  

      ?>] text-white text-center px-8 py-1 rounded-md md:text-lg md:px-12" onclick="rewardClaimed()">Confirm</button>
            </div>
            <!-- End of Modal Content -->
        </div>
    </div>
    <!-- End of Claim Reward Modal Pop Up -->

    <!-- Star of Reward Claimed Modal Pop Up -->
    <!-- Modal background -->
    <div id="rewardClaimedModal" class="hidden z-1 fixed w-full h-full pt-2 bg-black bg-opacity-50">
        <div class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        }else {
            echo $cardColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        } else {
            echo $cardColor;
        }
    }
    
  

      ?>] m-auto p-5 md:p-8 border rounded-sm md:rounded-md w-[80%] md:w-[40%]">
            <!-- Modal Content -->
            <p class="font-semibold md:text-2xl text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $titleColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $titleColor;
        }
    }
    
  

      ?>]">Reward Claimed</p>
            <hr class="border-black mt-4 mb-4">

            <div class="md:text-xl text-[<?php
      
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
                <p>Congratulations! You have successfully claimed the reward!</p>
            </div>

            <!-- Modal Close Button -->
            <div class="flex justify-around items-center md:mt-6">
                <button class="mt-5 bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        }else {
            echo $buttonColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        } else {
            echo $buttonColor;
        }
    }
    
  

      ?>] text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $buttonColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $buttonColor;
        }
    }
    
  

      ?>] text-center px-8 py-1 rounded-md md:px-10 md:text-lg" onclick="closeRewardClaimed()">Close</button>
            </div>
            <!-- End of Modal Content -->
        </div>
    </div>
    <!-- End of Reward Claimed Modal Pop Up -->

    <!-- Start of hero-section -->
    <h2 class="mt-32 font-bold text-2xl p-5 text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $titleColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $titleColor;
        }
    }
    
  

      ?>] ">Redeem Points</h2>
    <div class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        }else {
            echo $secondaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        } else {
            echo $secondaryColor;
        }
    }
    
  

      ?>] flex justify-between items-center">
        <div class="pl-5">
            <div>
                <p class="hidden md:mb-10 md:block md:text-4xl text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $titleColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $titleColor;
        }
    }
    
  

      ?>] md:font-bold">Shop for Rewards and Claim them with your points!</p>
                <p class="mb-2 md:hidden">Points</p>
                <p class="mb-4 text-5xl text-tertiary font-bold md:hidden">0</p>
                <p class="hidden md:mb-10 md:block md:font-bold md:text-3xl text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $titleColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $titleColor;
        }
    }
    
  

      ?>]"><span class="text-[<?php
      
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
    
  

      ?>] text-7xl">0</span > points</p>
                <button class="mb-2 bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        }else {
            echo $buttonColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        } else {
            echo $buttonColor;
        }
    }
    
  

      ?>] text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $buttonText;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $buttonText;
        }
    }
    
  

      ?>] text-sm px-2 py-2 rounded-sm md:py-4 md:px-7 md:text-xl" onclick="openPointHistory()">Points History ></button>
            </div>
        </div>
        <img class="w-52 md:w-[45%]" src="../resources/img/point/Redeemable points concept icon 1.svg" alt="">
    </div>
    <!-- End of hero-section -->

<?php
  $moneyAmount= isset($editInfo[0]["money_amout"]) && !empty($editInfo[0]["money_amout"]) ? $editInfo[0]["money_amout"] : '10000';
  $pointAmount= isset($editInfo[0]["point_amount"]) && !empty($editInfo[0]["point_amount"]) ? $editInfo[0]["point_amount"] : '1';
?>


    <!-- Start of point system explanation -->
    <div class="mt-5 mb-5 px-3 md:px-8">
        <p class="text-lg font-semibold mb-3 text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $titleColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $titleColor;
        }
    }
    
  

      ?>]">How to earn points?</p>
        <p class="pl-5 mb-3 font-medium text-[<?php
      
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
            > For each purchase of above
            <span class="point_price font-semibold">
              <?= $moneyAmount ?>
            </span> kyat,
            <span class="point_exchange font-semibold">
            <?= $pointAmount ?>


            </span> point will be given.
        </p>
        <p class="pl-5 mb-3 font-medium text-[<?php
      
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
    
  

      ?>]"> New users will be given 100 points.</p>
    </div>
    <!-- End of point system explanation -->

    <!-- Start of point rewards -->
    <div class="px-4 mb-10 md:mt-8">
        <!-- each row -->
        <div class="flex justify-around items-center">
            <!-- each point reward card -->
            <div class="w-36 shadow-md md:w-56 bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $primaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $primaryColor;
        }
    }
    
  

      ?>]">
                <div class="flex justify-center">
                    <img class="w-20 md:w-44" src="../resources/img/point/Special Discount Offer Vector Design Images, Sales Discount Icon  Special Offer Price  20 Percent   Vector, Sales Icons, Icons Icons, Price Icons PNG Image For Free Download 4.svg" alt="">
                </div>
                <div class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        }else {
            echo $secondaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        } else {
            echo $secondaryColor;
        }
    }
    
  

      ?>] p-2 pb-4 md:p-4 md:pb-7">
                    <p class="mb-4 text-sm text-[<?php
      
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
    
  

      ?>] font-bold md:text-xl"><span class="point_reward">20,000 phone bill</span></p>
                    <div class="flex justify-between items-center">
                        <p class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $tertiaryColor;
        }
    }
    
  

      ?>] text-sm font-bold md:text-xl"><span class="point_needed">50</span> points</p>
                        <button class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        }else {
            echo $buttonColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        } else {
            echo $buttonColor;
        }
    }
    
  

      ?>] text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $buttonText;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $buttonText;
        }
    }
    
  

      ?>] px-2 py-2 text-sm rounded-md md:text-lg" onclick="claimReward()">Claim</button>
                    </div>
                </div>
            </div>
            <!-- each point reward card -->
            <div class="w-36 shadow-md md:w-56 bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $primaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $primaryColor;
        }
    }
    
  

      ?>]">
                <div class="flex justify-center">
                    <img class="w-20 md:w-44" src="../resources/img/point/Special Discount Offer Vector Design Images, Sales Discount Icon  Special Offer Price  20 Percent   Vector, Sales Icons, Icons Icons, Price Icons PNG Image For Free Download 4.svg" alt="">
                </div>
                <div class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        }else {
            echo $secondaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        } else {
            echo $secondaryColor;
        }
    }
    
  

      ?>] p-2 pb-4 md:p-4 md:pb-7">
                    <p class="mb-4 text-sm font-bold text-[<?php
      
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
    
  

      ?>] md:text-xl"><span class="point_reward">20,000 phone bill</span></p>
                    <div class="flex justify-between items-center">
                        <p class=" text-sm font-bold md:text-xl text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $tertiaryColor;
        }
    }
    
  

      ?>]"><span class="point_needed">50</span> points</p>
                        <button class=" bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        }else {
            echo $buttonColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        } else {
            echo $buttonColor;
        }
    }
    
  

      ?>] text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $buttonText;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $buttonText;
        }
    }
    
  

      ?>] px-2 py-2 text-sm rounded-md md:text-lg" onclick="claimReward()">Claim</button>
                    </div>
                </div>
            </div>
            <!-- each point reward card -->
            <div class="w-36 shadow-md hidden md:block md:w-56  bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $primaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $primaryColor;
        }
    }
    
  

      ?>]">
                <div class="flex justify-center">
                    <img class="w-20 md:w-44" src="../resources/img/point/Special Discount Offer Vector Design Images, Sales Discount Icon  Special Offer Price  20 Percent   Vector, Sales Icons, Icons Icons, Price Icons PNG Image For Free Download 4.svg" alt="">
                </div>
                <div class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        }else {
            echo $secondaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        } else {
            echo $secondaryColor;
        }
    }
    
  

      ?>] p-2 pb-4 md:p-4 md:pb-7">
                    <p class="mb-4 text-[<?php
      
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
    
  

      ?>] text-sm font-bold md:text-xl"><span class="point_reward">20,000 phone bill</span></p>
                    <div class="flex justify-between items-center">
                        <p class=" text-sm font-bold md:text-xl text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $tertiaryColor;
        }
    }
    
  

      ?>]"><span class="point_needed">50</span> points</p>
                        <button class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        }else {
            echo $buttonColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        } else {
            echo $buttonColor;
        }
    }
    
  

      ?>] text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $buttonText;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $buttonText;
        }
    }
    
  

      ?>] px-2 py-2 text-sm rounded-md md:text-lg" onclick="claimReward()">Claim</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- each row -->
        <div class="mt-10 flex justify-around items-center">
            <!-- each point reward card -->
            <div class="w-36 shadow-md md:w-56 bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $primaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $primaryColor;
        }
    }
    
  

      ?>]">
                <div class="flex justify-center">
                    <img class="w-20 md:w-44" src="../resources/img/point/Special Discount Offer Vector Design Images, Sales Discount Icon  Special Offer Price  20 Percent   Vector, Sales Icons, Icons Icons, Price Icons PNG Image For Free Download 4.svg" alt="">
                </div>
                <div class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        }else {
            echo $secondaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        } else {
            echo $secondaryColor;
        }
    }
    
  

      ?>] p-2 pb-4 md:p-4 md:pb-7">
                    <p class="mb-4 text-[<?php
      
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
    
  

      ?>] text-sm font-bold md:text-xl"><span class="point_reward">20,000 phone bill</span></p>
                    <div class="flex justify-between items-center">
                        <p class=" text-sm font-bold md:text-xl text-[<?php
      
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
    
  

      ?>]"><span class="point_needed">50</span> points</p>
                        <button class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        }else {
            echo $buttonColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        } else {
            echo $buttonColor;
        }
    }
    
  

      ?>] text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $buttonText;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $buttonText;
        }
    }
    
  

      ?>] px-2 py-2 text-sm rounded-md md:text-lg" onclick="claimReward()">Claim</button>
                    </div>
                </div>
            </div>
            <!-- each point reward card -->
            <div class="w-36 shadow-md md:w-56 bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $primaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $primaryColor;
        }
    }
    
  

      ?>]">
                <div class="flex justify-center">
                    <img class="w-20 md:w-44" src="../resources/img/point/Special Discount Offer Vector Design Images, Sales Discount Icon  Special Offer Price  20 Percent   Vector, Sales Icons, Icons Icons, Price Icons PNG Image For Free Download 4.svg" alt="">
                </div>
                <div class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        }else {
            echo $secondaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        } else {
            echo $secondaryColor;
        }
    }
    
  

      ?>] p-2 pb-4 md:p-4 md:pb-7">
                    <p class="mb-4 text-[<?php
      
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
    
  

      ?>] text-sm font-bold md:text-xl"><span class="point_reward">20,000 phone bill</span></p>
                    <div class="flex justify-between items-center">
                        <p class=" text-sm font-bold md:text-xl text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $tertiaryColor;
        }
    }
    
  

      ?>]"><span class="point_needed">50</span> points</p>
                        <button class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        }else {
            echo $buttonColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        } else {
            echo $buttonColor;
        }
    }
    
  

      ?>] text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $buttonText;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $buttonText;
        }
    }
    
  

      ?>] px-2 py-2 text-sm rounded-md md:text-lg" onclick="claimReward()">Claim</button>
                    </div>
                </div>
            </div>
            <!-- each point reward card -->
            <div class="w-36 shadow-md hidden md:block md:w-56 bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $primaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $primaryColor;
        }
    }
    
  

      ?>]">
                <div class="flex justify-center">
                    <img class="w-20 md:w-44" src="../resources/img/point/Special Discount Offer Vector Design Images, Sales Discount Icon  Special Offer Price  20 Percent   Vector, Sales Icons, Icons Icons, Price Icons PNG Image For Free Download 4.svg" alt="">
                </div>
                <div class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        }else {
            echo $secondaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#4d4d4d";
        } else {
            echo $secondaryColor;
        }
    }
    
  

      ?>] p-2 pb-4 md:p-4 md:pb-7">
                    <p class="mb-4 text-[<?php
      
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
    
  

      ?>] text-sm font-bold md:text-xl"><span class="point_reward">20,000 phone bill</span></p>
                    <div class="flex justify-between items-center">
                        <p class=" text-sm font-bold md:text-xl text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $tertiaryColor;
        }
    }
    
  

      ?>] "><span class="point_needed">50</span> points</p>
                        <button class="bg-[<?php
      
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
    
  

      ?>] text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo $buttonText;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo $buttonText;
        }
    }
    
  

      ?>] px-2 py-2 text-sm rounded-md md:text-lg" onclick="claimReward()">Claim</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of point rewards -->

    <!-- Start of pagination section -->
    <section class="w-full container mx-auto flex md:space-x-2 pt-5">
        <!-- Pagination -->
        <div class="flex mx-auto">
            <a href="" class="border-2 px-3 py-1 border-textGray flex items-center  text-[<?php
      
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
    
  

      ?>]"><ion-icon class="" name="chevron-back-outline"></ion-icon></a>
            <a href="" class="border-2 w-9 py-1 border-textGray text-center text-[<?php
      
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
    
  

      ?>]">1</a>
            <a href="" class="border-2 w-9 py-1 border-textGray text-center text-[<?php
      
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
    
  

      ?>]">2</a>
            <a href="" class="border-2 w-9 py-1 border-textGray text-center text-[<?php
      
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
    
  

      ?>]">3</a>
            <a href="" class="border-2 px-3 py-1 border-textGray flex items-center text-[<?php
      
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
    
  

      ?>]"><ion-icon name="chevron-forward-outline"></ion-icon></a>
        </div>
        <!-- Pagination End-->
    </section>
    <!-- Start of pagination section -->
    <?php
    include "../resources/common/footer.php"
    ?>
</body>

</html>