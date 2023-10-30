<?php

include "../../Controller/uiElement/editInfoController.php";



// print_r($editInfo);
$secondaryColor = isset($editInfo[0]["secondary_color"]) && !empty($editInfo[0]["secondary_color"]) ? $editInfo[0]["secondary_color"] : '#E4E4D2';
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
    <link rel="stylesheet" href="./assets/tailwind/output.css">
  <link rel="icon" href="./resources/img/header/headerLogo.svg" type="image/icon type">
    <title>Document</title>
    
    <!-- tailwind link -->

    <link href="../lib/tailwind/output.css?id=<?= time() ?>" rel="stylesheet" />

    

     <!-- google font link -->
     <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>

</body>

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
<div class="flex md:flex-row md:justify-around py-8 flex-col md:text-justify text-center ">
    <div class="itemDetail">
        <span class="block text-[18px] font-semibold text-[<?php
      
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

        <a href="../Contact/help.php">
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
      ?>] block">FAQs</span>


        </a>
        <a href="../Point/points.php">
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
        <a href="../Contact/privacyAndPolicy.php">
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
        <a href="../../../Merchant/View/Login/login.php">
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
        <span class="block text-[18px] font-semibold py-3 text-[<?php
      
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
        <a href="../index.php">
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
        <a href="../#trending">
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
        <a href="../#best">
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

        <a href="../#new">
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
        <span class="block text-[18px] font-semibold py-3 md:mt-0 mt-5 text-[<?php
      
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
      ?>]">Email : <a href="mailto:<?= $editEmail ?>"><?= $editEmail ?> </a></span>
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
      ?>] ">Phone : <a href="tel:<?= $editPhoneNumber ?>"><?= $editPhoneNumber ?></a></span>
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
    
  

      ?>]  w-[400px] hover:text-[<?php
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
      ?>]" ><a target="_blank" href="<?= $editAddressLink ?>">Address : <?= $editAddress ?></a></span>
        
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


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>

</html>