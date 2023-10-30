<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../resources/img/header/headerLogo.svg" type="image/icon type">
    <title>About Us</title>
    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../resources/lib/jquery3.6.0.js"></script>
</head>

<style>
    .scrollHide::-webkit-scrollbar {
        display: none;
    }
    .mobileMenu{
        color: red !important;
        background-color: red;
        width: 400px;

    }
</style>

<?php
include "../resources/common/navbar.php";
include "../../Controller/uiElement/editInfoController.php";
$primaryColor = isset($editInfo[0]["primary_color"]) && !empty($editInfo[0]["primary_color"]) ? $editInfo[0]["primary_color"] : '#FAFAFA';
$lightTertiary = isset($editInfo[0]["light_tertiary"]) && !empty($editInfo[0]["light_tertiary"]) ? $editInfo[0]["light_tertiary"] : '#F5F5F5';
$navColor = isset($editInfo[0]["nav_text_color"]) && !empty($editInfo[0]["nav_text_color"]) ? $editInfo[0]["nav_text_color"] : '#000000';
$titleColor = isset($editInfo[0]["title_color"]) && !empty($editInfo[0]["title_color"]) ? $editInfo[0]["title_color"] : '#000000';
$startTime = isset($editInfo[0]["h1_color"]) && !empty($editInfo[0]["h1_color"]) ? $editInfo[0]["h1_color"] : '00';
$endTime = isset($editInfo[0]["h2_color"]) && !empty($editInfo[0]["h2_color"]) ? $editInfo[0]["h2_color"] : '00';
date_default_timezone_set('Asia/Yangon'); 
$currentHour = date('H:i'); 


?>

<body class="font-roboto bg-[<?php
      
     
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

      ?>] scrollHide">



    <!-- Welcome -->
    <section class="container w-full mx-auto mt-[120px]">
        <div class="flex flex-col space-y-5 items-center bg-[<?php
      
  
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#3d3d3d";
        }else {
            echo $lightTertiary;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#3d3d3d";
        } else {
            echo $lightTertiary;
        }
    }

      ?>] py-11">
            <h1 class="md:text-3xl text-2xl text-[<?php
      
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        }else {
            echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#000000";
        } else {
            echo $navColor;
        }
    }
  
// #FB4949
      ?>] font-semibold">Welcome to <span class="text-2xl md:text-3xl font-semibold italic text-[<?php
     
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        }else {
            echo "#FB4949";
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#ffffff";
        } else {
            echo "#FB4949";
        }
    }


      ?>] md:text-tertiary">Trend Hub!</span></h1>
            <p class="text-sm md:w-[700px] px-10 md:px-0 text-center text-[<?php
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
              ?>]">At [Trend Hub] ,we believe in providing an exceptional online shopping experience. We understand the importance of convenience
                and variety, which is why we have curated a wide rage of high-quality products to cater to your every need.</p>
        </div>
    </section>


    <!-- Our Mission -->
    <section class="container w-full mx-auto">
        <div class="px-8 md:flex md:flex-row-reverse justify-evenly md:px-28 py-11 md:items-center">
            <div>
                <img src="../resources/img/aboutUs/our_mission.svg" alt="mission">
            </div>

            <div>
                <h1 class="font-bold text-xl text-[<?php
              if ($startTime > $endTime) {
                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                  echo '#ffffff';
                } else {
                  echo $titleColor;
                }
              } else {
                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                  echo '#ffffff';
                } else {
                  echo $titleColor;
                }
              }
              ?>] md:text-3xl">Our Mission</h1>
                <p class="text-sm md:text-xl text-[<?php
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
              ?>] md:w-[450px] mt-5">Our mission is to be your go-to destination for all your shopping requirements. We strive to offer an extensive selection of products that not only affordable but also of the highest quality.We aim to simply your online shopping experience
                    by providing user-frendly navigation, secure transaction, and exceptional customer service.</p>
            </div>
        </div>
    </section>

    <!-- What We Offer? -->
    <section class="container w-full mx-auto px-5 md:px-28">
        <div class="text-center py-5 bg-[<?php
    if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#3d3d3d";
        }else {
            echo $lightTertiary;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#3d3d3d";
        } else {
            echo $lightTertiary;
        }
    }
      ?>] rounded drop-shadow-md px-5 md:px-40 md:py-20">
            <h1 class="text-[<?php
      
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

      ?>] font-bold text-xl md:text-3xl">What We Offer?</h1>
            <p class="text-sm md:text-xl text-[<?php
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
              ?>] mt-5">Our mission is to be your go-to destination for all your shopping requirements. We strive to offer an extensive selection of products that not only affordable but also of the highest quality.We aim to simply your online shopping experience by providing user-frendly navigation, secure transaction,
                and exceptional customer service.</p>
        </div>
    </section>


    <!-- Quality Assurance -->
    <section class="container w-full mx-auto md:mt-8">
        <div class="px-8 md:flex justify-evenly md:px-28 py-11 md:items-center">
            <div>
                <img src="../resources/img/aboutUs/quallity_assurance.svg" alt="quality">
            </div>

            <div>
                <h1 class="font-bold text-[<?php
              if ($startTime > $endTime) {
                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                  echo '#ffffff';
                } else {
                  echo $titleColor;
                }
              } else {
                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                  echo '#ffffff';
                } else {
                  echo $titleColor;
                }
              }
              ?>] text-xl md:text-3xl">Quality Assurance</h1>
                <p class="text-sm md:text-xl text-[<?php
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
              ?>] md:w-[450px] mt-5">Our mission is to be your go-to destination for all your shopping requirements. We strive to offer an extensive selection of products that not only affordable but also of the highest quality.We aim to simply your online shopping experience by providing user-frendly navigation,
                    secure transaction, and exceptional customer service.</p>
            </div>
        </div>
    </section>

    <!-- Customer Satisfaction -->
    <section class="container w-full mx-auto">
        <div class="px-8 md:flex md:flex-row-reverse justify-evenly md:px-28 py-11 md:items-center">
            <div>
                <img src="../resources/img/aboutUs/customer_satisfaction.svg" alt="customer">
            </div>

            <div>
                <h1 class="font-bold text-[<?php
      
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
  

      ?>] text-xl md:text-3xl">Customer Satisfaction</h1>
                <p class="text-sm md:text-xl text-[<?php
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
              ?>] md:w-[450px] mt-5">Our mission is to be your go-to destination for all your shopping requirements. We strive to offer an extensive selection of products that not only affordable but also of the highest quality.We aim to simply your online shopping experience by providing user-frendly navigation,
                    secure transaction, and exceptional customer service.</p>
            </div>
        </div>
    </section>

    <section class="container w-full mx-auto px-5 md:px-28">
        <div class="text-center py-5 bg-[<?php
      
       if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#3d3d3d";
        }else {
            echo $lightTertiary;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#3d3d3d";
        } else {
            echo $lightTertiary;
        }
    }
  

      ?>] rounded drop-shadow-md px-5 md:px-30 md:py-20">
            <p class="text-sm md:text-xl text-[<?php
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
              ?>] mt-5 md:px-16">Thank you for choosing [Trend Hub]. We hope you enjoy exploring our extensive product rage and have a delightful shopping experience.If you have any quentions or need assistance ,
                please don’t hesitate to reach out to our delicated customer service team.</p>
        </div>
    </section>


    <?php
    include "../resources/common/footer.php"
    ?>

</body>

</html>