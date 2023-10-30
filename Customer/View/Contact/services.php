<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="icon" href="../resources/img/header/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="../resources/lib/jquery3.6.0.js"></script>
</head>
<style>
.scrollHide::-webkit-scrollbar{
display: none;
  }
</style>
<?php
    include "../resources/common/navbar.php";
    include "../../Controller/uiElement/editInfoController.php";
    $primaryColor = isset($editInfo[0]["primary_color"]) && !empty($editInfo[0]["primary_color"]) ? $editInfo[0]["primary_color"] : '#FFFAFA';
    $lightTertiary = isset($editInfo[0]["light_tertiary"]) && !empty($editInfo[0]["light_tertiary"]) ? $editInfo[0]["light_tertiary"] : '#F5F5F5';
    $navColor = isset($editInfo[0]["nav_text_color"]) && !empty($editInfo[0]["nav_text_color"]) ? $editInfo[0]["nav_text_color"] : '#000000';
    $titleColor = isset($editInfo[0]["title_color"]) && !empty($editInfo[0]["title_color"]) ? $editInfo[0]["title_color"] : '#000000';
    $startTime = isset($editInfo[0]["h1_color"]) && !empty($editInfo[0]["h1_color"]) ? $editInfo[0]["h1_color"] : '00';
$endTime = isset($editInfo[0]["h2_color"]) && !empty($editInfo[0]["h2_color"]) ? $editInfo[0]["h2_color"] : '00';
    
date_default_timezone_set('Asia/Yangon'); 
$currentHour = date('H:i');


    
    ?>
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

      ?>] font-roboto scrollHide">

   

    <section class="container w-full mx-auto py-10 mt-[120px] px-10 md:px-20  bg-[<?php
      
     
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
  

      ?>]">

        <h1 class="text-center text-[<?php
      
    
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

      ?>] text-lg md:text-3xl font-bold">What We Offer</h1>

        <!-- card1 -->
        <div class="px-8 md:flex bg-[<?php
      
    
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
  

      ?>] justify-evenly py-11  mt-10 drop-shadow md:space-x-20 md:px-20">
            <div>
                <img src="../resources/img/service_page/vast_selection.svg" alt="vast_selection">
            </div>

            <div class="mt-5 md:w-[70%] ">
                <p class="font-bold md:text-2xl text-[<?php
      
    
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
  

      ?>]">Vast Selection, Wish-list and Exclusive Deals</p>
                <p class="text-xs md:text-xl mt-5 text-[<?php
      
    
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#fafafa";
        } else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#fafafa";
        } else {
            echo $navColor;
        }
    }
  

      ?>]">Our e-commerce platform offers an extensive range of products across
                    various categories, providing users with a diverse selection to meet their needs and preferences.
                    Users can easily browse and add items to their wishlist, allowing them to save and track products
                    they are interested in for future reference. Additionally, we regularly feature exciting deals and
                    discounts, enabling users to take advantage of exclusive offers
                    and cost-saving opportunities while enjoying a seamless shopping experience.</p>
            </div>
        </div>

        <!-- card2 -->
        <div class="px-8 md:flex justify-evenly py-11 bg-[<?php
      
     
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
  

      ?>] mt-10 drop-shadow md:space-x-20 md:px-20 md:my-20 md:py-20">
            <div class="md:w-[300px]">
                <img src="../resources/img/service_page/effortless.svg" alt="effortless">
            </div>

            <div class="mt-5 md:w-[70%]">
                <p class="font-bold md:text-2xl text-[<?php
    
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
  

      ?>]">Effortless Checkout, Flexible Payments, Instant Updates</p>
                <p class="text-xs md:text-xl mt-5 text-[<?php
   
   if ($startTime > $endTime) {
    if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
        echo "#fafafa";
    } else {
        echo $navColor;
    }
} else {
    if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
        echo "#fafafa";
    } else {
        echo $navColor;
    }
}
  

      ?>]">Experience a seamless checkout process that ensures a hassle-free
                    buying experience. With flexible payment options to suit your preferences, you can easily complete
                    your purchase with confidence. Stay informed every step of the way with instant order notifications,
                    keeping you updated on the status of your purchase in real-time.
                    Enjoy a convenient and stress-free shopping journey from start to finish.</p>
            </div>
        </div>

        <!-- card3 -->
        <div class="px-8 md:flex justify-evenly py-10 bg-[<?php
      
    
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
  

      ?>] mt-10 drop-shadow md:space-x-20 md:px-20 md:py-5">
            <div>
                <img src="../resources/img/service_page/earn_and_redeem.svg" alt="earn_and_redeem">
            </div>

            <div class="mt-5 md:w-[70%]">
                <p class="font-bold md:text-2xl text-[<?php
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
  

      ?>]">Earn and Redeem: Rewarding Loyalty, Limitless Benefits</p>
                <p class="text-xs md:text-xl mt-5 text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#fafafa";
        } else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#fafafa";
        } else {
            echo $navColor;
        }
    }
  

      ?>]">Unlock a world of rewards with our exclusive point system that
                    acknowledges your loyalty. Earn points after each purchase, and watch them accumulate for exciting
                    benefits. With our easy-to-use exchange system, you can effortlessly redeem your points for special
                    items. Experience the joy of being rewarded for your loyalty and enjoy limitless benefits that
                    enhance your shopping experience.</p>
            </div>
        </div>

    </section>

    <?php
    include "../resources/common/footer.php"
    ?>
</body>

</html>