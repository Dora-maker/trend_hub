<?php
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_SESSION["currentLoginUser"])) {
  $loginId = $_SESSION["currentLoginUser"];
}
$profilePic = (isset($_SESSION["userProfilePic"])) ? $_SESSION["userProfilePic"] : null;
if ($profilePic == null) {
  $setProfile = "../../Storage/profiles/noProfile.jpg";
} else {
  $setProfile = "../.." . $profilePic;
}

if (!isset($view)) {
  include "../../Controller/commonCategoryController.php";
}
include "../../Controller/uiElement/editInfoController.php";

// print_r($editInfo);
$logo = isset($editInfo[0]["logo"]) && !empty($editInfo[0]["logo"]) ? $editInfo[0]["logo"] : '/Storage/logo/logo.svg';
$mobileLogo = isset($editInfo[0]["mobileLogo"]) && !empty($editInfo[0]["mobileLogo"]) ? $editInfo[0]["mobileLogo"] : '/Storage/logo/mobileLogo.svg';

$primaryColor = isset($editInfo[0]["primary_color"]) && !empty($editInfo[0]["primary_color"]) ? $editInfo[0]["primary_color"] : '#FAFAFA';
$secondaryColor = isset($editInfo[0]["secondary_color"]) && !empty($editInfo[0]["secondary_color"]) ? $editInfo[0]["secondary_color"] : '#E4E4D2';
$buttonColor = isset($editInfo[0]["buy_button_color"]) && !empty($editInfo[0]["buy_button_color"]) ? $editInfo[0]["buy_button_color"] : '#F36823';
$buttonText = isset($editInfo[0]["button_text"]) && !empty($editInfo[0]["button_text"]) ? $editInfo[0]["button_text"] : '#FFFFFF';
$navColor = isset($editInfo[0]["nav_text_color"]) && !empty($editInfo[0]["nav_text_color"]) ? $editInfo[0]["nav_text_color"] : '#000000';
$tertiaryColor = isset($editInfo[0]["tertiary_color"]) && !empty($editInfo[0]["tertiary_color"]) ? $editInfo[0]["tertiary_color"] : '#F36823';
$startTime = isset($editInfo[0]["h1_color"]) && !empty($editInfo[0]["h1_color"]) ? $editInfo[0]["h1_color"] : '00';
$endTime = isset($editInfo[0]["h2_color"]) && !empty($editInfo[0]["h2_color"]) ? $editInfo[0]["h2_color"] : '00';


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <script src="../resources/lib/jquery3.6.0.js"></script>
  <!-- tailwind link -->
  <!-- <link href="../lib/tailwind/output.css?id=<?= time() ?>" rel="stylesheet" /> -->

  <!-- google font link -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

</head>


<style>
  /* For Webkit-based browsers (Chrome, Safari and Opera) */
  .scrollbar-hide::-webkit-scrollbar {
    display: none;
    scrollbar-width: none;
  }

  /* For IE, Edge and Firefox */
  .scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }

  #navbar {
    transition: top 0.3s;
  }
</style>


<?php 

date_default_timezone_set('Asia/Yangon'); 
$currentHour = date('H:i');

?>





  <!-- start header  -->
  <div id="navbar" class="fixed top-0 w-full shadow-md z-40">
    <!-- start first navbar -->
    <nav class="py-2 px-4 bg-[<?php
      
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

      ?>]  shadow md:flex md:items-center md:justify-between">
      <div class="flex justify-between items-center ">

        <!-- desktop logo -->
        <img class="md:block hidden" src=" ../../../<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
          echo 'Storage/logo/darkLogo.svg';
        }else {
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
        <img class="md:hidden mx-auto w-[90px] order-none" src=" ../../../<?php
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
         
            <a href="../Login/login.php">
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
              Logins
            </button>
            </a>
         
        <?php  } else { ?>
          <div class="md:hidden order-last">
            <a href="../Profile/user_profile.php"><img class="w-12 h-10 rounded-full cursor-pointer" src="<?=$setProfile?>" alt=""></a>
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

      <ul class="navUL md:flex md:items-center z-50 -mt-[14px]  md:z-auto md:static absolute bg-[<?php
      
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
    
  

      ?>] w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
        <li class="mx-4 my-6 md:my-0">
          <a href="../index.php" class="text-md text-[<?php
      
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
      ?>] duration-300">Home</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
          <a href="../Contact/aboutUs.php" class="text-md text-[<?php
      
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
      ?>] duration-300">About</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
          <a href="../Contact/services.php" class="text-md text-[<?php
      
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
      ?>] duration-300">Service</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
          <a href="../Contact/help.php" class="text-md text-[<?php
      
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
      ?>] duration-300">Help</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
          <a href="../Contact/contact.php" class="text-md text-[<?php
      
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
          <a href="../Login/login.php">
            <button class=" bg-[<?php
      
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
    
  

      ?>] text-[<?php
      
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
    
  

      ?>]  duration-500 py-2 px-6 hidden md:block mx-4 hover:bg-tertiary rounded ">
              Login
            </button>
          </a>
        <?php  } else { ?>
          <div class="logged_in">
            <a href="../Profile/user_profile.php"><img class="w-10 h-10 rounded-full cursor-pointer hidden md:block mx-4" src="<?=$setProfile?>" alt=""></a>
          </div>
        <?php  } ?>
        <h2 class=""></h2>
      </ul>
    </nav>
    <!-- end first navbar -->
    <!-- start second navbar -->
    <?php if (!isset($view)) { ?>
      <nav class="secondNav bg-[<?php
      
      if ($startTime > $endTime) {
        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
            echo "#4f4f4f";
        }else {
          echo $secondaryColor;
      }
    } else {
        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
            echo "#4f4f4f";
        } else {
            echo $secondaryColor;
        }
    }
    
  

      ?>] py-2 px-3 md:px-7">
        <div class="flex justify-between">
          <div class="flex">

            <!-- desktop categories -->
            <div id="dropdownButton" class="relative  md:block hidden px-3 py-2 bg-[<?php
      
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
    
  

      ?>]  text-[<?php
      
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
    
  

      ?>] rounded-l-md cursor-pointer">
              Categories
              <ion-icon class="relative top-1" name="caret-down-outline"></ion-icon>


              <ul id="dropdownMenu" class="absolute hidden z-50  mt-5 py-2 w-[300px] bg-white rounded-md category shadow-lg">
                <?php foreach ($categoriesResult as $category) { ?>
                  <li><a href="../../Controller/homePage/redirectCategoryPageController.php?categoryId=<?= $category["id"] ?>" class="block bg-white px-4 py-2 text-gray-800  hover:bg-[<?php
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

          ?>] hover:text-white duration-400"><?= $category["category_name"] ?></a></li>
                <?php } ?>
              </ul>
            </div>
            <!-- <img id="menu-toggle" class="h-[40px] md:hidden cursor-pointer" src="../resources/img/header/category.svg" alt=""> -->
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
              <form action="../../Controller/commonSearchProductController.php" method="post">
                <input name="searchCommon" type="search" placeholder="Search by product name" class="md:text-textBlack px-3 py-2 outline-none md:rounded-l-none md:w-[300px] w-[200px] rounded-md md:rounded-r-md">
              </form>          
            </div>
          <ion-icon id="cartItems" class="cursor-pointer text-3xl text-[<?php
      
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
    
  

      ?>]" name="cart-outline"></ion-icon>
      <span class="cart_item absolute md:right-5 right-1 md:top-[70px] top-[70px] w-5 h-5 text-sm text-white text-center rounded-full 
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
    <?php  } ?>
    <!-- end second navbar -->
  </div>
  <!-- end header -->

  <div id="slide-menu" class="hidden z-40 fixed right-0 top-0 h-full w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out">
    <button id="menu-close">
      <div class="mt-10 flex flex-wrap space-x-2">
        <?php foreach ($categoriesResult as $category) { ?>
          <a href="../../Controller/homePage/redirectCategoryPageController.php?categoryId=<?= $category["id"] ?>"><span class="px-2 mt-2 block py-2 hover:bg-tertiary hover:text-white shadow-md rounded-md"><?= $category["category_name"] ?></span></a>
        <?php } ?>
      </div>
    </button>
  </div>
  <!-- end header  -->

  <!-- navbar -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script src="../resources/js/homePage/header/navbarMobile.js"></script>
  <?php if (!isset($view)) { ?>
    <script src="../resources/js/homePage/header/categoryDesktop.js"></script>
    <script src="../resources/js/homePage/header/categoryMobile.js"></script>
  <?php } ?>


  <script src="../resources/js/addItemToCart/addToCart.js"></script>
  <script src="../../View/resources/js/navbar/navbar.js"></script>
  <script src="../../View/resources/js/addItemToCart/cartItems.js"></script>
  <script src="../../View/resources/js/homePage/header/searchProduct.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- navbar -->



</html>