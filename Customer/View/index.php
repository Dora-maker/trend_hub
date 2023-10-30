<?php

session_start();
if (isset($_SESSION["currentLoginUser"])) {

  $loginId = $_SESSION["currentLoginUser"];
  include "../Controller/homePage/homeWishlistedController.php";
}
$profilePic = (isset($_SESSION["userProfilePic"])) ? $_SESSION["userProfilePic"] : null;
if ($profilePic == null) {
  $setProfile = "../Storage/profiles/noProfile.jpg";
} else {
  $setProfile = ".." . $profilePic;
}


include "../Controller/homePageCategoryController.php";
include "../Controller/uiElement/editInfoControllerIndex.php";
include "../Controller/homePage/homeProductController.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="./resources/img/header/headerLogo.svg" type="image/icon type">
  <title>Home</title>

  <!-- Start Navbar -->
  <!-- google font link -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <!-- font awesome icon css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="./resources/lib/jquery3.6.0.js"></script>
  <!-- end navbar -->

  <!-- tailwind  link -->
  <link rel="stylesheet" href="./resources/lib/tailwind/output.css?id=<?= time() ?>">

  <!-- css link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<style>
  #card:hover {
    margin-top: -8px;
    margin-left: 8px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  }

  .card {
    transition: 200ms linear;
  }

  .imgEffect {
    transition: 500ms linear;
    cursor: pointer;
  }

  .productCard:hover .imgEffect {
    transform: translateY(-40px);
  }

  .cartBtn {
    transition: 500ms linear;
  }

  .cartBtn:hover {
    letter-spacing: 2px;
  }
</style>

<?php

$logo = isset($editInfo[0]["logo"]) && !empty($editInfo[0]["logo"]) ? $editInfo[0]["logo"] : '/Storage/logo/logo.svg';
$mobileLogo = isset($editInfo[0]["mobileLogo"]) && !empty($editInfo[0]["mobileLogo"]) ? $editInfo[0]["mobileLogo"] : '/Storage/logo/mobileLogo.svg';

$primaryColor = isset($editInfo[0]["primary_color"]) && !empty($editInfo[0]["primary_color"]) ? $editInfo[0]["primary_color"] : '#FAFAFA';
$secondaryColor = isset($editInfo[0]["secondary_color"]) && !empty($editInfo[0]["secondary_color"]) ? $editInfo[0]["secondary_color"] : '#E4E4D2';
$tertiaryColor = isset($editInfo[0]["tertiary_color"]) && !empty($editInfo[0]["tertiary_color"]) ? $editInfo[0]["tertiary_color"] : '#F36823';
$priceColor = isset($editInfo[0]["price_text_color"]) && !empty($editInfo[0]["price_text_color"]) ? $editInfo[0]["price_text_color"] : '#000000';
$navColor = isset($editInfo[0]["nav_text_color"]) && !empty($editInfo[0]["nav_text_color"]) ? $editInfo[0]["nav_text_color"] : '#000000';
$titleColor = isset($editInfo[0]["title_color"]) && !empty($editInfo[0]["title_color"]) ? $editInfo[0]["title_color"] : '#000000';
$buttonColor = isset($editInfo[0]["buy_button_color"]) && !empty($editInfo[0]["buy_button_color"]) ? $editInfo[0]["buy_button_color"] : '#F36823';
$buttonText = isset($editInfo[0]["button_text"]) && !empty($editInfo[0]["button_text"]) ? $editInfo[0]["button_text"] : '#FFFFFF';
$cardColor = isset($editInfo[0]["price_card_color"]) && !empty($editInfo[0]["price_card_color"]) ? $editInfo[0]["price_card_color"] : '#ffffff';
$sliderBackgroundColor1 = isset($editInfo[0]["slide_bg1"]) && !empty($editInfo[0]["slide_bg1"]) ? $editInfo[0]["slide_bg1"] : '#2F2E41';
$sliderBackgroundColor2 = isset($editInfo[0]["slide_bg2"]) && !empty($editInfo[0]["slide_bg2"]) ? $editInfo[0]["slide_bg2"] : '#2F2E41';
$sliderBackgroundColor3 = isset($editInfo[0]["slide_bg3"]) && !empty($editInfo[0]["slide_bg3"]) ? $editInfo[0]["slide_bg3"] : '#2F2E41';
$slideTextColor1 = isset($editInfo[0]["slide_text_color1"]) && !empty($editInfo[0]["slide_text_color1"]) ? $editInfo[0]["slide_text_color1"] : 'white';
$slideTextColor2 = isset($editInfo[0]["slide_text_color2"]) && !empty($editInfo[0]["slide_text_color2"]) ? $editInfo[0]["slide_text_color2"] : 'white';
$slideTextColor3 = isset($editInfo[0]["slide_text_color3"]) && !empty($editInfo[0]["slide_text_color3"]) ? $editInfo[0]["slide_text_color3"] : 'white';
$sliderImg1 = isset($editInfo[0]["image_silder1"]) && !empty($editInfo[0]["image_silder1"]) ? $editInfo[0]["image_silder1"] : '/Storage/slider/acer.png';
$sliderImg2 = isset($editInfo[0]["image_silder2"]) && !empty($editInfo[0]["image_silder2"]) ? $editInfo[0]["image_silder2"] : '/Storage/slider/dell.png';
$sliderImg3 = isset($editInfo[0]["image_silder3"]) && !empty($editInfo[0]["image_silder3"]) ? $editInfo[0]["image_silder3"] : '/Storage/slider/msi.svg';
$sliderTitle1 = isset($editInfo[0]["image_silder_title1"]) && !empty($editInfo[0]["image_silder_title1"]) ? $editInfo[0]["image_silder_title1"] : 'Intel® Evo™ Platform The Ultimate Premium Laptop Experience';
$sliderTitle2 = isset($editInfo[0]["image_silder_title2"]) && !empty($editInfo[0]["image_silder_title2"]) ? $editInfo[0]["image_silder_title2"] : 'Intel® Evo™ Platform The Ultimate Premium Laptop Experience';
$sliderTitle3 = isset($editInfo[0]["image_silder_title3"]) && !empty($editInfo[0]["image_silder_title3"]) ? $editInfo[0]["image_silder_title3"] : 'Intel® Evo™ Platform The Ultimate Premium Laptop Experience';
$sliderDsc1 = isset($editInfo[0]["image_silder_dsc1"]) && !empty($editInfo[0]["image_silder_dsc1"]) ? $editInfo[0]["image_silder_dsc1"] : 'Feature the latest 13th Gen. Intel® Core™ i7 processor and certified by the Intel® Evo™ platform, you can now unleash your productivity with outstanding performance, on-the-go portability, and long-lasting battery life.';
$sliderDsc2 = isset($editInfo[0]["image_silder_dsc2"]) && !empty($editInfo[0]["image_silder_dsc2"]) ? $editInfo[0]["image_silder_dsc2"] : 'Feature the latest 13th Gen. Intel® Core™ i7 processor and certified by the Intel® Evo™ platform, you can now unleash your productivity with outstanding performance, on-the-go portability, and long-lasting battery life.';
$sliderDsc3 = isset($editInfo[0]["image_silder_dsc3"]) && !empty($editInfo[0]["image_silder_dsc3"]) ? $editInfo[0]["image_silder_dsc3"] : 'Feature the latest 13th Gen. Intel® Core™ i7 processor and certified by the Intel® Evo™ platform, you can now unleash your productivity with outstanding performance, on-the-go portability, and long-lasting battery life.';
$editEmail = isset($editInfo[0]["email"]) && !empty($editInfo[0]["email"]) ? $editInfo[0]["email"] : 'trendhub2023.shop@gmail.com';
$editPhoneNumber = isset($editInfo[0]["phoneNumber"]) && !empty($editInfo[0]["phoneNumber"]) ? $editInfo[0]["phoneNumber"] : '09 40-355-970';
$editAddress = isset($editInfo[0]["address"]) && !empty($editInfo[0]["address"]) ? $editInfo[0]["address"] : ' No.1200, room(6B), Yadanar Street, South Oakkalapa,Yangon, Myanmar';
$editAddressLink = isset($editInfo[0]["locationLink"]) && !empty($editInfo[0]["locationLink"]) ? $editInfo[0]["locationLink"] : 'https://www.google.com/maps/place/Ex;braiN+Office/@16.8430957,96.1949609,17z/data=!3m1!4b1!4m6!3m5!1s0x30c193f51faa68ff:0x72868c60b69532c4!8m2!3d16.8430906!4d96.1975358!16s%2Fg%2F11scs4qwp8?entry=tts&shorturl=1';
$startTime = isset($editInfo[0]["h1_color"]) && !empty($editInfo[0]["h1_color"]) ? $editInfo[0]["h1_color"] : '00:00';
$endTime = isset($editInfo[0]["h2_color"]) && !empty($editInfo[0]["h2_color"]) ? $editInfo[0]["h2_color"] : '00:00';
$showAnnounce = isset($editInfo[0]["displayAnno"]) && !empty($editInfo[0]["displayAnno"]) ? $editInfo[0]["displayAnno"] : 'hidden';

date_default_timezone_set('Asia/Yangon');
$currentHour = date('H:i');



?>

<style>
  .scrollHide::-webkit-scrollbar {
    display: none;
  }

</style>


<body class=" font-roboto 
bg-[<?php
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
    ?>] scrollHide">
  <!-- start header  -->

  <div id="navbar" class="sticky top-0 w-full shadow-md z-30">


    <!-- start first navbar -->
    <marquee behavior="" class=" marquee text-[<?php
                                                            if ($startTime > $endTime) {
                                                              if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                echo "#ffffff";
                                                              } else {
                                                                echo "#ffffff";
                                                              }
                                                            } else {
                                                              if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                echo "#ffffff";
                                                              } else {
                                                                echo "#ffffff";
                                                              }
                                                            }
                                                            ?>] text-xl py-4 bg-[<?php
                                                                                  if ($startTime > $endTime) {
                                                                                    if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                                      echo "#3d3d3d";
                                                                                    } else {
                                                                                      echo "#000000";
                                                                                    }
                                                                                  } else {
                                                                                    if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                                      echo "#3d3d3d";
                                                                                    } else {
                                                                                      echo "#000000";
                                                                                    }
                                                                                  }
                                                                                  ?>]  <?= $showAnnounce   ?>  " direction="right"><?= $editInfo[0]["textAnno"] ?></marquee>

    <nav class="py-2 px-4 -mt-[6px] bg-[<?php
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
                                        ?>] shadow md:flex md:items-center  md:justify-between">
      <div class="flex justify-between items-center ">

        <!-- desktop logo -->
        <!-- <img class="md:block hidden" src="./resources/img/header/logo.svg" alt=""> -->
        <img class="md:block hidden" src=" ../../<?php
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

                                                  ?>" alt="">


        <!-- mobile logo -->
        <img class="md:hidden mx-auto h-[50px] order-none" src=" ../../<?php
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

                                                                        ?>" alt="">

        <!-- mobile login -->
        <?php if (!isset($loginId)) { ?>
          <a href="./Login/login.php">
            <button class="bg-[<?php
                                if ($startTime > $endTime) {
                                  if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                    echo '#ffffff';
                                  } else {
                                    echo $tertiaryColor;
                                  }
                                } else {
                                  if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                    echo '#ffffff';
                                  } else {
                                    echo $tertiaryColor;
                                  }
                                }
                                ?>] 
        text-[<?php
              if ($startTime > $endTime) {
                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                  echo '#000000';
                } else {
                  echo $primaryColor;
                }
              } else {
                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                  echo '#000000';
                } else {
                  echo $primaryColor;
                }
              }
              ?>] py-2 px-6 rounded md:hidden order-last">
              Login
            </button>
          </a>
        <?php  } else { ?>
          <div class="md:hidden order-last">
            <a href="../View/Profile/user_profile.php">
              <img class="w-12 h-10 rounded-full cursor-pointer" src="<?= $setProfile ?>" alt="">
            </a>
          </div>
        <?php  } ?>

        <!-- mobile menu -->
        <span class=" text-3xl order-first cursor-pointer mx-2 md:hidden block">
          <ion-icon class="  text-[<?php
                                    if ($startTime > $endTime) {
                                      if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                        echo $primaryColor;
                                      } else {
                                        echo "#000000";
                                      }
                                    } else {
                                      if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                        echo $primaryColor;
                                      } else {
                                        echo "#000000";
                                      }
                                    }
                                    ?>]" name="menu" onclick="Menu(this)"></ion-icon>
        </span>
      </div>

      <ul class="md:flex md:items-center z-50 md:mt-0 -mt-[23px]  md:z-auto md:static absolute 
      bg-[<?php
          if ($startTime > $endTime) {
            if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
              echo '#000000';
            } else {
              echo $primaryColor;
            }
          } else {
            if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
              echo '#000000';
            } else {
              echo $primaryColor;
            }
          }

          ?>] w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
        <li class="mx-4 my-6 md:my-0">
          <a href="./index.php" class="text-md 
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
                ?>]  hover:text-[<?php
                if ($startTime > $endTime) {
                  if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                    echo  "#3d3d3d";
                  } else {
                    echo $tertiaryColor;
                  }
                } else {
                  if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                    echo  "#3d3d3d";
                  } else {
                    echo $tertiaryColor;
                  }
                }
                ?>]  duration-300">Home</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
          <a href="./Contact/aboutUs.php" class="text-md 
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
            ?>]  hover:text-[<?php
            if ($startTime > $endTime) {
              if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                echo  "#3d3d3d";
              } else {
                echo $tertiaryColor;
              }
            } else {
              if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                echo  "#3d3d3d";
              } else {
                echo $tertiaryColor;
              }
            }
            ?>]   duration-300">About</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
          <a href="./Contact/services.php" class="text-md 
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
                ?>]  hover:text-[<?php
                if ($startTime > $endTime) {
                  if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                    echo  "#3d3d3d";
                  } else {
                    echo $tertiaryColor;
                  }
                } else {
                  if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                    echo  "#3d3d3d";
                  } else {
                    echo $tertiaryColor;
                  }
                }
                ?>]  duration-300">Service</a>
        </li>
        <li class="mx-4  my-6 md:my-0">
          <a href="./Contact/help.php" class="text-md 
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
                ?>]  hover:text-[<?php
                                  if ($startTime > $endTime) {
                                    if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                      echo  "#3d3d3d";
                                    } else {
                                      echo $tertiaryColor;
                                    }
                                  } else {
                                    if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                      echo  "#3d3d3d";
                                    } else {
                                      echo $tertiaryColor;
                                    }
                                  }
                                  ?>]  duration-300">Help</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
          <a href="./Contact/contact.php" class="text-md 
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
                ?>]  hover:text-[<?php
                                  if ($startTime > $endTime) {
                                    if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                      echo  "#3d3d3d";
                                    } else {
                                      echo $tertiaryColor;
                                    }
                                  } else {
                                    if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                      echo  "#3d3d3d";
                                    } else {
                                      echo $tertiaryColor;
                                    }
                                  }
                                  ?>] duration-300">Contact</a>
        </li>

        <?php if (!isset($loginId)) { ?>
          <a href="./Login/login.php">
            <button class=" 
          bg-[<?php
              if ($startTime > $endTime) {
                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                  echo '#ffffff';
                } else {
                  echo $tertiaryColor;
                }
              } else {
                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                  echo '#ffffff';
                } else {
                  echo $tertiaryColor;
                }
              }
              ?>] 
        text-[<?php
              if ($startTime > $endTime) {
                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                  echo '#000000';
                } else {
                  echo "#ffffff";
                }
              } else {
                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                  echo '#000000';
                } else {
                  echo "#ffffff";
                }
              }
              ?>] duration-500 py-2 px-6 hidden md:block mx-4 hover:bg-tertiary rounded ">
              Login
            </button>
          </a>
        <?php  } else { ?>
          <div class="logged_in">
            <a href="../View/Profile/user_profile.php"><img class="w-10 h-10 rounded-full cursor-pointer hidden md:block mx-4" src="<?= $setProfile ?>" alt=""></a>
          </div>
        <?php  } ?>
        <h2 class=""></h2>
      </ul>
    </nav>
    <!-- end first navbar -->

    <!-- start second navbar -->
    <nav class="
  bg-[<?php
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo '#4f4f4f';
        } else {
          echo $secondaryColor;
        }
      } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
          echo '#4f4f4f';
        } else {
          echo $secondaryColor;
        }
      }
      ?>] py-2 px-3 md:px-7 shadow-md relative">
      <div class="flex justify-between">
        <div class="flex">
          <!-- desktop categories -->
          <div id="dropdownButton" class="relative  md:block hidden px-3 py-2 
    bg-[<?php
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
                    ?>]  rounded-l-md cursor-pointer">
            Categories
            <!-- <ion-icon name="chevron-down-outline"></ion-icon> -->
            <!-- <img class="inline" src="./resources/img/header/down-arrow.png" alt=""> -->
            <ion-icon class="relative top-1" name="caret-down-outline"></ion-icon>

            <ul id="dropdownMenu" class="absolute hidden z-50  mt-5 py-2 w-[300px] bg-[white] rounded-md shadow-lg">
              <?php foreach ($categoriesResult as $category) { ?>
                <a href="../Controller/homePage/redirectCategoryPageController.php?categoryId=<?= $category["id"] ?>" class="block bg:bg-white px-4 py-2 text-gray-800 hover:bg-[<?php
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

          ?>] hover:text-white duration-400">
                  <li><?= $category["category_name"] ?></li>
                </a>
              <?php } ?>
            </ul>
          </div>

          <ion-icon id="menu-toggle" class="text-2xl mt-1 mr-2  md:hidden cursor-pointer     
          text-[<?php
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
                ?>] " name="grid"></ion-icon>

          <form action="../Controller/homePage/searchProductController.php" method="post">
            <input name="searchHome" type="search" placeholder="Search by product name" class="md:text-textBlack px-3 py-2 outline-none md:rounded-l-none md:w-[300px] w-[200px] rounded-md md:rounded-r-md">
          </form>
        </div>

        <ion-icon cartId="homePage" class="cartItems cursor-pointer text-3xl 
        
      text-[<?php
            if ($startTime > $endTime) {
              if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                echo '#ffffff';
              } else {
                echo $tertiaryColor;
              }
            } else {
              if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                echo '#ffffff';
              } else {
                echo $tertiaryColor;
              }
            }
            ?>]" name="cart-outline"></ion-icon>

        <span class="cart_item absolute md:right-5 right-1 md:top-[0px] top-[0px] w-5 h-5 text-sm text-white text-center rounded-full 
        bg-[<?php
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
            ?>]">0</span>
      </div>
    </nav>
    <!-- end second navbar -->
  </div>

  <div id="slide-menu" class="hidden z-40 fixed right-0 top-0 h-full w-80 bg-[<?= $primaryColor ?>] shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out">
    <button id="menu-close">
      <div class="mt-10 flex flex-wrap space-x-2">
        <?php foreach ($categoriesResult as $category) { ?>
          <a href="../Controller/homePage/redirectCategoryPageController.php?categoryId=<?= $category["id"] ?>"><span class="px-2 mt-2 block py-2 hover:bg-tertiary hover:text-white shadow-md rounded-md"><?= $category["category_name"] ?></span></a>
        <?php } ?>
      </div>
    </button>

  </div>
  <!-- end header -->

  <!-- Slider Start -->
  <div class="swiper -mt-[10px]">
    <div class="swiper-wrapper">
      <!-- Slide1 -->
      <div class="swiper-slide">

        <!-- start set default value -->

        <!-- end set default value -->


        <div class="w-full md:h-[320px] h-[220px] md:px-0 px-6 space-x-4 md:space-x-0 items-center 
    bg-[<?php
        if ($startTime > $endTime) {
          if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo '#282828';
          } else {
            echo $sliderBackgroundColor1;
          }
        } else {
          if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo '#282828';
          } else {
            echo $sliderBackgroundColor1;
          }
        }
        ?>] flex justify-around relative">
          <div class="img md:w-[300px] w-[180px]">
            <img src="../../<?= $sliderImg1 ?>" alt="">


          </div>
          <div class="content w-[400px] h-[250px]  ">
            <span class="md:text-xl text-sm 
      text-[<?php
            if ($startTime > $endTime) {
              if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                echo '#ffffff';
              } else {
                echo $slideTextColor1;
              }
            } else {
              if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                echo '#ffffff';
              } else {
                echo $slideTextColor1;
              }
            }
            ?>]  md:mt-0 block mt-[60px] ">
              <?= $sliderTitle1 ?>
            </span>
            <span class="md:text-md text-sm mt-5  
        text-[<?php if ($startTime > $endTime) {
                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                  echo '#ffffff';
                } else {
                  echo $slideTextColor1;
                }
              } else {
                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                  echo '#ffffff';
                } else {
                  echo $slideTextColor1;
                }
              }
              ?>]  hidden md:block">
              <?= $sliderDsc1 ?>
            </span>
          </div>
        </div>
      </div>

      <!-- Slide2 -->
      <div class="swiper-slide">
        <div class="w-full md:h-[320px] h-[220px] md:px-0 px-6 space-x-4 md:space-x-0 items-center 
    bg-[<?php
        if ($startTime > $endTime) {
          if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo '#282828';
          } else {
            echo $sliderBackgroundColor2;
          }
        } else {
          if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo '#282828';
          } else {
            echo $sliderBackgroundColor2;
          }
        }
        ?>] flex justify-around relative">
          <div class="img md:w-[300px] w-[180px]">
            <img src="../../<?= $sliderImg2 ?>" alt="">
          </div>
          <div class="content w-[400px] h-[250px] ">
            <span class="md:text-xl text-sm 
        text-[<?php
              if ($startTime > $endTime) {
                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                  echo '#ffffff';
                } else {
                  echo $slideTextColor2;
                }
              } else {
                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                  echo '#ffffff';
                } else {
                  echo $slideTextColor2;
                }
              }
              ?>]  md:mt-0 block mt-[60px] ">
              <?= $sliderTitle2 ?>
            </span>
            <span class="md:text-md text-sm mt-5 
       text-[<?php if ($startTime > $endTime) {
                if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                  echo '#ffffff';
                } else {
                  echo $slideTextColor2;
                }
              } else {
                if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                  echo '#ffffff';
                } else {
                  echo $slideTextColor2;
                }
              }
              ?>]  hidden md:block">
              <?= $sliderDsc2 ?>
            </span>
          </div>
        </div>
      </div>

      <!-- Slide3 -->
      <div class="swiper-slide">
        <div class="w-full md:h-[320px] h-[220px] md:px-0 px-6 space-x-4 md:space-x-0 items-center
    bg-[<?php
        if ($startTime > $endTime) {
          if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo '#282828';
          } else {
            echo $sliderBackgroundColor3;
          }
        } else {
          if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo '#282828';
          } else {
            echo $sliderBackgroundColor3;
          }
        }
        ?>]                                                                                                     
    flex justify-around relative">
          <div class="img md:w-[300px] w-[180px]">
            <img src="../../<?= $sliderImg3 ?>" alt="">
          </div>
          <div class="content w-[400px] h-[250px] ">
            <span class="md:text-xl text-md 
    text-[<?php
          if ($startTime > $endTime) {
            if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
              echo '#ffffff';
            } else {
              echo $slideTextColor3;
            }
          } else {
            if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
              echo '#ffffff';
            } else {
              echo $slideTextColor3;
            }
          }
          ?>]  md:mt-0 block mt-[60px] ">
              <?= $sliderTitle3 ?>
            </span>
            <span class="text-md mt-5 md:block hidden 
          text-[<?php
                if ($startTime > $endTime) {
                  if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                    echo '#ffffff';
                  } else {
                    echo $slideTextColor3;
                  }
                } else {
                  if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                    echo '#ffffff';
                  } else {
                    echo $slideTextColor3;
                  }
                }
                ?>] ">
              <?= $sliderDsc3 ?>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Slider end -->

  <div class="hidden md:block mt-10">
    <div class=" flex justify-center space-x-4 mt-4">
      <a href="../Controller/homePage/redirectCategoryPageController.php?categoryId=1">
        <div class="relative w-40 h-40 bg-white rounded flex flex-col items-center justify-center space-y-2 cursor-pointer border hover:shadow-md hover:scale-[1.05] transition-all">
          <img class=" w-32" src="./resources/img/category/girlFashion.png" alt="">
          <span class="absolute bottom-1 text-sm">Women & Girls' Fashion</span>
        </div>
      </a>
      <a href="../Controller/homePage/redirectCategoryPageController.php?categoryId=2">
        <div class="relative w-40 h-40 bg-white rounded flex flex-col items-center justify-center space-y-2 cursor-pointer border hover:shadow-md hover:scale-[1.05] transition-all">
          <img class=" w-32" src="./resources/img/category/men.png" alt="">
          <span class="absolute bottom-1 text-sm">Men & Boys' Fashion</span>
        </div>
      </a>
      <a href="../Controller/homePage/redirectCategoryPageController.php?categoryId=3">
        <div class="relative w-40 h-40 bg-white rounded flex flex-col items-center justify-center space-y-2 cursor-pointer border hover:shadow-md hover:scale-[1.05] transition-all">
          <img class=" w-24" src="./resources/img/category/sportWear.png" alt="">
          <span class="absolute bottom-1 text-sm">Sports & Outdoors</span>
        </div>
      </a>
      <a href="../Controller/homePage/redirectCategoryPageController.php?categoryId=4">
        <div class="relative w-40 h-40 bg-white rounded flex flex-col items-center justify-center space-y-2 cursor-pointer border hover:shadow-md hover:scale-[1.05] transition-all">
          <img class=" w-28" src="./resources/img/category/cosmatic.png" alt="">
          <span class="absolute bottom-1 text-sm">Health & Beauty</span>
        </div>
      </a>
      <a href="../Controller/homePage/redirectCategoryPageController.php?categoryId=5">
        <div class="relative w-40 h-40 bg-white rounded flex flex-col items-center justify-center space-y-2 cursor-pointer border hover:shadow-md hover:scale-[1.05] transition-all">
          <img class=" w-32" src="./resources/img/category/jwellery.png" alt="">
          <span class="absolute bottom-1 text-sm">Jewelry</span>
        </div>
      </a>
      <a href="../Controller/homePage/redirectCategoryPageController.php?categoryId=6">
        <div class="relative w-40 h-40 bg-white rounded flex flex-col items-center justify-center space-y-2 cursor-pointer border hover:shadow-md hover:scale-[1.05] transition-all">
          <img class=" w-32" src="./resources/img/category/watch.png" alt="">
          <span class="absolute bottom-1 text-sm">Watches</span>
        </div>
      </a>
    </div>

    <div class=" flex justify-center space-x-4 mt-4">
    <a href="../Controller/homePage/redirectCategoryPageController.php?categoryId=7">
        <div class="relative w-40 h-40 bg-white rounded flex flex-col items-center justify-center space-y-2 cursor-pointer border hover:shadow-md hover:scale-[1.05] transition-all">
          <img class=" w-32 " src="./resources/img/category/lifeStyle.png" alt="">
          <span class="absolute bottom-1 text-sm">Home & Lifestyle</span>
        </div>
      </a>
      <a href="../Controller/homePage/redirectCategoryPageController.php?categoryId=8">
        <div class="relative w-40 h-40 bg-white rounded flex flex-col items-center justify-center space-y-2 cursor-pointer border hover:shadow-md hover:scale-[1.05] transition-all">
          <img class=" w-32" src="./resources/img/category/baby.png" alt="">
          <span class="absolute bottom-1 text-sm">Mother & Baby</span>
        </div>
      </a>
      <a href="../Controller/homePage/redirectCategoryPageController.php?categoryId=9">
        <div class="relative w-40 h-40 bg-white rounded flex flex-col items-center justify-center space-y-2 cursor-pointer border hover:shadow-md hover:scale-[1.05] transition-all">
          <img class=" w-24" src="./resources/img/category/bags (2).png" alt="">
          <span class="absolute bottom-1 text-sm">Bags</span>
        </div>
      </a>
      <a href="../Controller/homePage/redirectCategoryPageController.php?categoryId=10">
        <div class=" w-40 h-40 bg-white relative
         rounded flex flex-col items-center justify-center space-y-2 cursor-pointer border hover:shadow-md hover:scale-[1.05] transition-all">
          <img class=" w-32" src="./resources/img/category/homeAppliance.png" alt="">
          <span class=" text-sm absolute bottom-1
          ">TV & Home Appliances</span>
        </div>
      </a>
      <a href="../Controller/homePage/redirectCategoryPageController.php?categoryId=11">
        <div class=" w-40 h-40 bg-white relative
         rounded flex flex-col items-center justify-center space-y-2 cursor-pointer border hover:shadow-md hover:scale-[1.05] transition-all">
          <img class=" w-32" src="./resources/img/category/electronicDevice.png" alt="">
          <span class=" text-sm absolute bottom-1
          ">Electronic Devices</span>
        </div>
      </a>
      <a href="../Controller/homePage/redirectCategoryPageController.php?categoryId=12">
        <div class=" w-40 h-40 bg-white relative
         rounded flex flex-col items-center justify-center space-y-2 cursor-pointer border hover:shadow-md hover:scale-[1.05] transition-all">
          <img class=" w-32" src="./resources/img/category/grocies.png" alt="">
          <span class=" text-sm absolute bottom-1
          ">Groceries</span>
        </div>
      </a>
    </div>
  </div>
  <!-- box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px; -->

  <!-- start trending products -->
  <div id="trending" class="max-w-[1700px] mx-auto relative">
    <h2 class="md:px-8 mt-[30px] mb-[40px]  md:py-4  ml-[20px] md:ml-[60px] text-xl font-bold  text-[<?php
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
                                                                                                      ?>] ">Trending Products</h2>
    <div class="flex justify-center flex-wrap">
      <?php foreach ($trendingProductsList as $trending) { ?>
        <div style=" box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 3px 3px;" class="productCard mx-4 md:my-0 my-4 w-[280px] h-[360px] bg-[<?= $cardColor ?>] shadow-md rounded-md relative">
          <?php
          $wishlistColor = "#808080"; // Default color
          if (isset($_SESSION["currentLoginUser"])) {
            foreach ($wishlistedProductIdList as $wishlist) {
              if ($wishlist["product_id"] == $trending["id"]) {
                $wishlistColor = "#ff6347";
                break;
              }
            }
          }
          ?>
          <button w_productId="<?= $trending["id"] ?>" class="heartBtn text-[<?= $wishlistColor ?>]">
            <i class="fa fa-heart absolute right-3 top-3 text-lg "></i>
          </button>
          <a href="../Controller/itemDetailController.php?productId=<?= $trending["id"] ?>"><img class="imgEffect w-[160px] max-h-[200px] cursor-pointer mx-auto" src="../..<?= $trending["p_path"] ?>" alt=""></a>
          <div class="pl-[6px] text-lg absolute inset-x-0 bottom-[120px] text-left text-[<?php
                                                                                          if ($startTime > $endTime) {
                                                                                            if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                                              echo '#000000';
                                                                                            } else {
                                                                                              echo $priceColor;
                                                                                            }
                                                                                          } else {
                                                                                            if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                                              echo '#000000';
                                                                                            } else {
                                                                                              echo $priceColor;
                                                                                            }
                                                                                          }
                                                                                          ?>] max-w-[250px] mx-auto break-normal   font-semibold "><?= $trending["p_name"] ?></div>
          <div class="absolute bottom-[92px] text-md pt-8 pl-5 text-[<?php
                                                                      if ($startTime > $endTime) {
                                                                        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                          echo '#000000';
                                                                        } else {
                                                                          echo $priceColor;
                                                                        }
                                                                      } else {
                                                                        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                          echo '#000000';
                                                                        } else {
                                                                          echo $priceColor;
                                                                        }
                                                                      }
                                                                      ?>] ">Ks <?= number_format($trending["sell_price"]) ?></div>
          <div class="absolute bottom-[62px] text-md pt-8 pl-5 text-[<?php
                                                                      if ($startTime > $endTime) {
                                                                        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                          echo '#000000';
                                                                        } else {
                                                                          echo $priceColor;
                                                                        }
                                                                      } else {
                                                                        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                          echo '#000000';
                                                                        } else {
                                                                          echo $priceColor;
                                                                        }
                                                                      }
                                                                      ?>] ">From: <?= $trending["m_name"] ?></div>
          <div id="<?= $trending["id"] ?>" mID=<?= $trending["merchant_id"] ?> class="cartBtn py-[5px]  absolute inset-x-0 bottom-4 w-[200px] mx-auto rounded-md cursor-pointer text-[<?php
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
                                                                                                                                                                                      ?>] bg-[<?php
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
                                                                                                                                                                    ?>] text-center ">Add to Cart</div>
        </div>
      <?php } ?>
    </div>
  </div>
  <!-- end trending products -->

  <!-- start bestsellers products -->
  <div id="best" class="max-w-[1700px] mx-auto relative">
    <h2 class="md:px-8 mt-[80px] mb-[40px]  md:py-4  ml-[20px] md:ml-[60px] text-xl font-bold text-[<?php
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
                                                                                                    ?>] ">Bestseller Products</h2>
    <div class="flex justify-center flex-wrap">
      <?php foreach ($bestSellerProductsList as $bestSeller) { ?>
        <div style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 3px 3px;" class="productCard mx-4 md:my-0 my-4 w-[280px] h-[360px] bg-[<?= $cardColor ?>] shadow-md rounded-md relative">
          <?php
          $wishlistColor = "#808080"; // Default color
          if (isset($_SESSION["currentLoginUser"])) {
            foreach ($wishlistedProductIdList as $wishlist) {
              if ($wishlist["product_id"] == $bestSeller["id"]) {
                $wishlistColor = "#ff6347";
                break;
              }
            }
          }
          ?>
          <button w_productId="<?= $bestSeller["id"] ?>" class="heartBtn text-[<?= $wishlistColor ?>]">
            <i class="fa fa-heart absolute right-3 top-3 text-lg "></i>
          </button>
          <a href="../Controller/itemDetailController.php?productId=<?= $bestSeller["id"] ?>"><img class="imgEffect w-[160px] max-h-[200px] cursor-pointer mx-auto" src="../..<?= $bestSeller["p_path"] ?>" alt=""></a>
          <div class="pl-[6px] text-lg absolute inset-x-0 bottom-[120px] text-left text-[<?php
                                                                                          if ($startTime > $endTime) {
                                                                                            if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                                              echo '#000000';
                                                                                            } else {
                                                                                              echo $priceColor;
                                                                                            }
                                                                                          } else {
                                                                                            if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                                              echo '#000000';
                                                                                            } else {
                                                                                              echo $priceColor;
                                                                                            }
                                                                                          }
                                                                                          ?>] max-w-[250px] mx-auto break-normal   font-semibold "><?= $bestSeller["p_name"] ?></div>
          <div class="absolute bottom-[92px] text-md pt-8 pl-5 text-[<?php if ($startTime > $endTime) {
                                                                        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                          echo '#000000';
                                                                        } else {
                                                                          echo $priceColor;
                                                                        }
                                                                      } else {
                                                                        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                          echo '#000000';
                                                                        } else {
                                                                          echo $priceColor;
                                                                        }
                                                                      }
                                                                      ?>] ">Ks <?= number_format($bestSeller["sell_price"]) ?></div>
          <div class="absolute bottom-[62px] text-md pt-8 pl-5 text-[<?php if ($startTime > $endTime) {
                                                                        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                          echo '#000000';
                                                                        } else {
                                                                          echo $priceColor;
                                                                        }
                                                                      } else {
                                                                        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                          echo '#000000';
                                                                        } else {
                                                                          echo $priceColor;
                                                                        }
                                                                      }
                                                                      ?>] ">From: <?= $bestSeller["m_name"] ?></div>
          <div id="<?= $bestSeller["id"] ?>" mID=<?= $bestSeller["merchant_id"] ?> class="cartBtn py-[5px]  absolute inset-x-0 bottom-4 w-[200px] mx-auto rounded-md cursor-pointer  text-[<?php
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
                                                                                                                                                                                            ?>] bg-[<?php
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
                                                                                                                                                                        ?>] text-center ">
            Add to Cart
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <!-- end bestseller products -->

  <!-- start new products -->
  <div id="new" class="max-w-[1700px] mx-auto relative">
    <h2 class="md:px-8 mt-[80px] mb-[40px]  md:py-4  ml-[20px] md:ml-[60px] text-xl font-bold  text-[<?php
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
                                                                                                      ?>] ">New Products</h2>
    <div class="flex justify-center flex-wrap">
      <?php foreach ($newProductsList as $newProduct) { ?>
        <div style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 3px 3px;" class="productCard mx-4 md:my-0 my-4 w-[280px] h-[360px] bg-[<?= $cardColor ?>] shadow-md rounded-md relative">
          <?php
          $wishlistColor = "#808080"; // Default color
          if (isset($_SESSION["currentLoginUser"])) {
            foreach ($wishlistedProductIdList as $wishlist) {
              if ($wishlist["product_id"] == $newProduct["id"]) {
                $wishlistColor = "#ff6347";
                break;
              }
            }
          }
          ?>
          <button w_productId="<?= $newProduct["id"] ?>" class="heartBtn text-[<?= $wishlistColor ?>]">
            <i class="fa fa-heart absolute right-3 top-3 text-lg "></i>
          </button>
          <a href="../Controller/itemDetailController.php?productId=<?= $newProduct["id"] ?>"><img class="imgEffect w-[160px] max-h-[200px] cursor-pointer mx-auto" src="../..<?= $newProduct["p_path"] ?>" alt=""></a>
          <div class="title pl-[6px] text-lg absolute inset-x-0 bottom-[120px] text-left text-[<?php
                                                                                                if ($startTime > $endTime) {
                                                                                                  if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                                                    echo '#000000';
                                                                                                  } else {
                                                                                                    echo $priceColor;
                                                                                                  }
                                                                                                } else {
                                                                                                  if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                                                    echo '#000000';
                                                                                                  } else {
                                                                                                    echo $priceColor;
                                                                                                  }
                                                                                                }
                                                                                                ?>] max-w-[250px] mx-auto break-normal  ] font-semibold "><?= $newProduct["p_name"] ?></div>
          <div class="price absolute bottom-[92px] text-md pt-8 pl-5 text-[<?php
                                                                            if ($startTime > $endTime) {
                                                                              if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                                echo '#000000';
                                                                              } else {
                                                                                echo $priceColor;
                                                                              }
                                                                            } else {
                                                                              if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                                echo '#000000';
                                                                              } else {
                                                                                echo $priceColor;
                                                                              }
                                                                            }
                                                                            ?>] ">Ks <?= number_format($newProduct["sell_price"]) ?></div>
          <div class="price absolute bottom-[62px] text-md pt-8 pl-5 text-[<?php
                                                                            if ($startTime > $endTime) {
                                                                              if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                                                                                echo '#000000';
                                                                              } else {
                                                                                echo $priceColor;
                                                                              }
                                                                            } else {
                                                                              if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                                                                                echo '#000000';
                                                                              } else {
                                                                                echo $priceColor;
                                                                              }
                                                                            }
                                                                            ?>] ">From: <?= $newProduct["m_name"] ?></div>
          <div id="<?= $newProduct["id"] ?>" mID=<?= $newProduct["merchant_id"] ?> class="cartBtn py-[5px]  absolute inset-x-0 bottom-4 w-[200px] mx-auto rounded-md cursor-pointer text-[<?php
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
                                                                                                                                                                                          ?>] bg-[<?php
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
                                                                                                                                                                        ?>] text-center ">
            Add to Cart
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <!-- end new products -->

  <footer class="bg-[<?php
                      if ($startTime > $endTime) {
                        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                          echo '#4f4f4f';
                        } else {
                          echo $secondaryColor;
                        }
                      } else {
                        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                          echo '#4f4f4f';
                        } else {
                          echo $secondaryColor;
                        }
                      }
                      ?>] w-full h-auto font-roboto mt-[90px]">
    <div class="flex md:flex-row md:justify-around py-8 flex-col md:text-justify text-center ">
      <div class="">
        <span class="block text-[18px] font-semibold py-3 
        
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
          ?>]">Customer Care</span>
        <a href="./Contact/help.php">
          <span class="cursor-pointer 
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
        <a href="./Point/points.php">
          <span class="cursor-pointer 
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
        <a href="./Contact/privacyAndPolicy.php">
          <span class="cursor-pointer 
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

        <a href="../../Merchant/View/Login/login.php">
          <span class="cursor-pointer 
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
        <span class="block text-[18px] 
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
            ?>] font-semibold py-3 md:mt-0 mt-5">Shop</span>
        <a href="./index.php">
          <span class="block cursor-pointer 
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
        <a href="#trending">
          <span class="block cursor-pointer 
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
              ?>] ">Trending Products</span>
        </a>
        <a href="#best">
          <span class="block cursor-pointer 
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
        <a href="#new">
          <span class="block cursor-pointer 
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

      <div class="">
        <span class="block text-[18px] font-semibold py-3 md:mt-0 mt-5 
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
            ?>]">Contact Us</span>
        <span class="block cursor-pointer
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
              ?>]  ">Email : <a href="mailto:<?= $editEmail ?>"><?= $editEmail ?></a></span>
        <span class="block cursor-pointer 
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
        <span class="block cursor-pointer 
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
                            ?>]  w-[400px]">Address : <a target="_blank" href="<?= $editAddressLink ?>"><?= $editAddress ?></a></span>
      </div>

      <div class="">
        <span class="block text-[18px] font-semibold py-3 text-center md:mt-0 mt-5 
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
            ?>]">Follow Us</span>
        <div class="flex justify-center space-x-3">
          <a href="https://web.facebook.com/extbrainedu">
            <ion-icon class="text-2xl 
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
          <ion-icon class="text-2xl 
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
          <ion-icon class="text-2xl 
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
    <span class="text-center text-sm block pb-5 
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
        ?>]">Copyright © 2023 TrendHub | Created by X-Tech</span>
  </footer>
  <!-- start navbar -->
  <script src="./resources/js/homePage/header/navbarMobile.js"></script>
  <script src="./resources/js/homePage/header/categoryDesktop.js"></script>
  <script src="./resources/js/navbar/navbar.js"></script>

  <script src="./resources/js/homePage/header/categoryMobile.js"></script>
  <script src="./resources/js/addItemToCart/addToCart.js"></script>
  <script src="./resources/js/addItemToCart/cartItems.js"></script>
  <script src="./resources/js/homePage/header/wishlistAjax.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- end navbar -->

  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="./resources/js/homePage/header/slider.js"></script>

</body>

</html>