<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
    <link rel="icon" href="../resources/img/header/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
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
<?php
include "../resources/common/navbar.php";
include "../../Controller/uiElement/editInfoController.php";

$navColor = isset($editInfo[0]["nav_text_color"]) && !empty($editInfo[0]["nav_text_color"]) ? $editInfo[0]["nav_text_color"] : '#000000';

$tertiaryColor = isset($editInfo[0]["tertiary_color"]) && !empty($editInfo[0]["tertiary_color"]) ? $editInfo[0]["tertiary_color"] : '#F36823';
$buttonColor = isset($editInfo[0]["buy_button_color"]) && !empty($editInfo[0]["buy_button_color"]) ? $editInfo[0]["buy_button_color"] : '#F36823';
$buttonText = isset($editInfo[0]["button_text"]) && !empty($editInfo[0]["button_text"]) ? $editInfo[0]["button_text"] : '#FFFFFF';
$titleColor = isset($editInfo[0]["title_color"]) && !empty($editInfo[0]["title_color"]) ? $editInfo[0]["title_color"] : '#000000';
$startTime = isset($editInfo[0]["h1_color"]) && !empty($editInfo[0]["h1_color"]) ? $editInfo[0]["h1_color"] : '00';
$endTime = isset($editInfo[0]["h2_color"]) && !empty($editInfo[0]["h2_color"]) ? $editInfo[0]["h2_color"] : '00';
$currentHour = date('H:i'); 
date_default_timezone_set('Asia/Yangon'); 
$profile = "/Storage/general/my_profile.svg";
$point = "/Storage/general/my_points.svg";
$order = "/Storage/general/my_orders.svg";


?>

<body class="bg- font-roboto bg-[<?php
      
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



    <!-- Question about order -->
    <section class="container w-full mx-auto mt-[120px] ">
        <div class="text-center py-5">
            <p class="text-sm md:text-2xl font-semibold py-5 text-[<?php
      
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
  

      ?>]">Hello, What can we help you with?</p>
            
        </div>
    </section>

    <!-- Common Topics -->
    <section class="container w-full mx-auto px-7 md:px-[200px]">
        <div>
            <p class="text-sm font-semibold md:text-2xl text-[<?php
      
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
  

      ?>]">Common Topics</p>
            <div class="flex justify-evenly mt-5 md:mt-10 flex-wrap">
                <div class="bg-[#FEFEFE] rounded drop-shadow-xl px-5 py-5 flex flex-col items-center space-y-3 md:w-[170px]">
                    <img class="md:w-20 md:h-20 " src="../../../<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo 'Storage/general/darkProfile.svg';
        }else {
          echo $profile ;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo 'Storage/general/darkProfile.svg';
        } else {
          echo $profile ;
        }
    }


 ?>" alt="profile">
                    <p class="text-xs md:text-xl">My Profile</p>
                </div>

                <div class="bg-[#FEFEFE] rounded drop-shadow-xl px-5 py-5 flex flex-col items-center space-y-3 md:w-[170px]">
                    <img class="md:w-20 md:h-20" src="../../../<?php
           if ($startTime > $endTime) {
            if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
              echo 'Storage/general/darkOrder.svg';
            }else {
              echo $order;
            }
        } else {
            if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
              echo 'Storage/general/darkOrder.svg';
            } else {
              echo $order;
            }
        }


 ?>" alt="order">
                    <p class="text-xs md:text-xl">My Orders</p>
                </div>


                <div class="bg-[#FEFEFE] rounded drop-shadow-xl px-5 py-5 flex flex-col items-center space-y-3 md:w-[170px]">
                    <img class="md:w-20 md:h-20" src="../../../<?php
             if ($startTime > $endTime) {
              if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                echo 'Storage/general/darkCoin.svg';
              }else {
                echo $point ;
              }
          } else {
              if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                echo 'Storage/general/darkCoin.svg';
              } else {
                echo $point ;
              }
          }


 ?>" alt="point">
                    <p class="text-xs md:text-xl">My Points</p>
                </div>
            </div>
        </div>
    </section>

    <?php
    $question1 = isset($editInfo[0]["question1"]) && !empty($editInfo[0]["question1"]) ? $editInfo[0]["question1"] : 'How to use my points?';
    $question2 = isset($editInfo[0]["question2"]) && !empty($editInfo[0]["question2"]) ? $editInfo[0]["question2"] : 'Where to check my orders?';
    $question3 = isset($editInfo[0]["question3"]) && !empty($editInfo[0]["question3"]) ? $editInfo[0]["question3"] : 'What payment options are available?';
    $answer1 = isset($editInfo[0]["answer1"]) && !empty($editInfo[0]["answer1"]) ? $editInfo[0]["answer1"] : 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora soluta ipsa quibusdam laudantium dolor placeat repudiandae, sunt et nostrum voluptatem architecto eius vel modi porro perspiciatis dicta harum similique! Quas, ab sit! Consectetur num ';
    $answer2 = isset($editInfo[0]["answer2"]) && !empty($editInfo[0]["answer2"]) ? $editInfo[0]["answer2"] : 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora soluta ipsa quibusdam laudantium dolor placeat repudiandae, sunt et nostrum voluptatem architecto eius vel modi porro perspiciatis dicta harum similique! Quas, ab sit! Consectetur num ';
    $answer3 = isset($editInfo[0]["answer3"]) && !empty($editInfo[0]["answer3"]) ? $editInfo[0]["answer3"] : 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora soluta ipsa quibusdam laudantium dolor placeat repudiandae, sunt et nostrum voluptatem architecto eius vel modi porro perspiciatis dicta harum similique! Quas, ab sit! Consectetur num ';


    ?>

    <!-- Frequently Asked Questions -->
    <section class="container w-full mx-auto px-7 md:px-[200px]">
        <div class="mt-10 md:mt-20">
            <p class="text-sm font-semibold md:text-2xl text-[<?php
      
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

  

      ?>]">Frequently Asked Questions</p>
            <div class="text-xs md:text-2xl px-5 leading-6 md:leading-10 mt-3">

                <div class="flex items-center space-x-1 cursor-pointer" id="points">
                    <ion-icon class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        }else {
          echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        } else {
          echo $tertiaryColor;
        }
    }

  

      ?>]" name="chevron-forward-outline"></ion-icon>
                    <p class="text-[<?php
        if ($startTime > $endTime) {
          if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo '#ffffff';
          }else {
            echo $navColor;
          }
      } else {
          if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo '#ffffff';
          } else {
            echo $navColor;
          }
      }
  
  

      ?>]"><?= $question1 ?></p>
                </div>
                <div class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        }else {
          echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        } else {
          echo $navColor;
        }
    }

      ?>] pl-4 md:pl-7 md:text-lg leading-2 pb-3 hidden" id="points-answer">
                    <?= $answer1  ?>
                </div>

                <div class="flex items-center space-x-1 cursor-pointer" id="orders">
                    <ion-icon class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        }else {
          echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        } else {
          echo $tertiaryColor;
        }
    }
  

      ?>]" name="chevron-forward-outline"></ion-icon>
                    <p class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        }else {
          echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        } else {
          echo $navColor;
        }
    }
  

      ?>]"><?= $question2 ?></p>
                </div>
                <div class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        }else {
          echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        } else {
          echo $navColor;
        }
    }
  

      ?>] pl-4 md:pl-7 md:text-lg leading-2 pb-3 hidden" id="orders-answer">
                    <?= $answer2  ?>
                </div>

                <div class="flex items-center space-x-1 cursor-pointer" id="payments">
                    <ion-icon class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        }else {
          echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        } else {
          echo $tertiaryColor;
        }
    }

      ?>]" name="chevron-forward-outline"></ion-icon>
                    <p class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        }else {
          echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        } else {
          echo $navColor;
        }
    }
  

      ?>]"><?= $question3 ?></p>
                </div>
                <div class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        }else {
          echo $navColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        } else {
          echo $navColor;
        }
    }

      ?>] pl-4 md:pl-7 md:text-lg leading-2 pb-3 hidden" id="payments-answer">
                    <?= $answer3   ?>
                </div>

            </div>
        </div>
    </section>

    <!-- Contact Admin -->
    <section class="container w-full mx-auto md:px-[200px]">
        <div class="text-center md:flex md:items-center md:space-x-32 md:mt-10 md:flex-wrap">
            <div class="text-sm md:text-2xl font-semibold py-5 md:flex md:flex-wrap">
                <p class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        }else {
          echo $titleColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        } else {
          echo $titleColor;
        }
    }
  

      ?>]">Still have some questions?</p>
                <p class="text-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        }else {
          echo $titleColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        } else {
          echo $titleColor;
        }
    }
  

      ?>]">To contact our customer services:</p>
            </div>
            <a href="./contact.php"><button class="bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        }else {
          echo $tertiaryColor;
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#ffffff';
        } else {
          echo $tertiaryColor;
        }
    }
  

      ?>] text-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        }else {
          echo "#ffffff";
        }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#000000';
        } else {
          echo "#ffffff";
        }
    }
  

      ?>] px-9 py-2 rounded">Contact Admin</button></a>
        </div>
    </section>

    <?php
    include "../resources/common/footer.php"
    ?>

    <script src="../resources/js/help/help.js"></script>
</body>

</html>

