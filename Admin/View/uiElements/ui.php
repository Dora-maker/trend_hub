<?php


include "../../Controller/uiElements/logo/viewLogoController.php";
include "../../Controller/uiElements/announcement/viewController.php";
include "../../Controller/uiElements/Information/viewController.php";
include "../../Controller/uiElements/pointEdit/viewPointControllerl.php";
include "../../Controller/uiElements/imgSlider1/viewController.php";
include "../../Controller/uiElements/imgSlider1/viewTextController.php";
include "../../Controller/uiElements/imgSlider2/viewController.php";
include "../../Controller/uiElements/imgSlider2/viewTextController.php";
include "../../Controller/uiElements/imgSlider3/viewController.php";
include "../../Controller/uiElements/imgSlider3/viewTextController.php";
include "../../Controller/uiElements/faq1/viewfaqControllerl.php";
include "../../Controller/uiElements/faq2/viewfaq2Controller.php";
include "../../Controller/uiElements/faq3/viewfaq3Controllerl.php";
include "../../Controller/uiElements/banner1/viewBannerController.php";
include "../../Controller/uiElements/banner2/viewBannerController.php";
include "../../Controller/uiElements/banner3/viewBannerController.php";
include "../../Controller/uiElements/banner4/viewBannerController.php";
include "../../Controller/uiElements/banner5/viewBannerController.php";
include "../../Controller/uiElements/backgroundColor/viewBackgroundController.php";
include "../../Controller/uiElements/textColor/viewTextController.php";
include "../../Controller/uiElements/cardColor/viewCardController.php";
include "../../Controller/uiElements/darkMode/viewDarkMode.php";
include "../../Controller/uiElements/buttonColor/viewButtonColorController.php";
include ".././../Controller/uiElements/terms/viewtermsController.php";


$logo = isset($editLogo[0]["logo"]) && !empty($editLogo[0]["logo"]) ? $editLogo[0]["logo"] : '/Storage/logo/logo.svg';
$mobileLogo = isset($editMobileLogo[0]["mobileLogo"]) && !empty($editMobileLogo[0]["mobileLogo"]) ? $editMobileLogo[0]["mobileLogo"] : '/Storage/logo/mobileLogo.svg';



$primaryColor = isset($editBacground[0]["primary_color"]) && !empty($editBacground[0]["primary_color"]) ? $editBacground[0]["primary_color"] : '#FAFAFA';
$secondaryColor = isset($editBacground[0]["secondary_color"]) && !empty($editBacground[0]["secondary_color"]) ? $editBacground[0]["secondary_color"] : '#E4E4D2';
$tertiaryColor = isset($editBacground[0]["tertiary_color"]) && !empty($editBacground[0]["tertiary_color"]) ? $editBacground[0]["tertiary_color"] : '#F36823';
$lightTertiary = isset($editBacground[0]["light_tertiary"]) && !empty($editBacground[0]["light_tertiary"]) ? $editBacground[0]["light_tertiary"] : '#F5F5F5';
$priceColor = isset($editText[0]["price_text_color"]) && !empty($editText[0]["price_text_color"]) ? $editText[0]["price_text_color"] : '#000000';
$cardColor = isset($editCardColor[0]["price_card_color"]) && !empty($editCardColor[0]["price_card_color"]) ? $editCardColor[0]["price_card_color"] : '#ffffff';
$navColor = isset($editText[0]["nav_text_color"]) && !empty($editText[0]["nav_text_color"]) ? $editText[0]["nav_text_color"] : '#000000';
$titleColor = isset($editText[0]["title_color"]) && !empty($editText[0]["title_color"]) ? $editText[0]["title_color"] : '#000000';
$buttonColor = isset($editButtonColor[0]["buy_button_color"]) && !empty($editButtonColor[0]["buy_button_color"]) ? $editButtonColor[0]["buy_button_color"] : '#F36823';
$buttonText = isset($editButtonColor[0]["button_text"]) && !empty($editButtonColor[0]["button_text"]) ? $editButtonColor[0]["button_text"] : '#FFFFFF';
$phoneNumber = isset($editInfo[0]["phoneNumber"]) && !empty($editInfo[0]["phoneNumber"]) ? $editInfo[0]["phoneNumber"] : '09 40-355-970';
$email = isset($editInfo[0]["email"]) && !empty($editInfo[0]["email"]) ? $editInfo[0]["email"] : 'trendhub2023.shop@gmail.com';
$address = isset($editInfo[0]["address"]) && !empty($editInfo[0]["address"]) ? $editInfo[0]["address"] : 'No.1200, room(6B), Yadanar Street, South Oakkalapa,Yangon, Myanmar';
$addressLink = isset($editInfo[0]["locationLink"]) && !empty($editInfo[0]["locationLink"]) ? $editInfo[0]["locationLink"] : 'https://www.google.com/maps/place/Ex;braiN+Office/@16.8430957,96.1949609,17z/data=!3m1!4b1!4m6!3m5!1s0x30c193f51faa68ff:0x72868c60b69532c4!8m2!3d16.8430906!4d96.1975358!16s%2Fg%2F11scs4qwp8?entry=tts&shorturl=1';
$time = isset($editInfo[0]["time"]) && !empty($editInfo[0]["time"]) ? $editInfo[0]["time"] : '08:00 am - 08:00 pm';
$bannerImg1 = isset($editbanner1[0]["banner1"]) && !empty($editbanner1[0]["banner1"]) ? $editbanner1[0]["banner1"] : '/Storage/banner/bannerP1.svg';
$bannerImg2 = isset($editbanner2[0]["banner2"]) && !empty($editbanner2[0]["banner2"]) ? $editbanner2[0]["banner2"] : '/Storage/banner/bannerP1.svg';
$bannerImg3 = isset($editbanner3[0]["banner3"]) && !empty($editbanner3[0]["banner3"]) ? $editbanner3[0]["banner3"] : '/Storage/banner/bannerP2.svg';
$bannerImg4 = isset($editbanner4[0]["banner4"]) && !empty($editbanner4[0]["banner4"]) ? $editbanner4[0]["banner4"] : '/Storage/banner/bannerP2.svg';
$bannerImg5 = isset($editbanner5[0]["banner5"]) && !empty($editbanner5[0]["banner5"]) ? $editbanner5[0]["banner5"] : '/Storage/banner/banner2.svg';
$moneyAmount = isset($editPoint[0]["money_amout"]) && !empty($editPoint[0]["money_amout"]) ? $editPoint[0]["money_amout"] : '10000';
$pointAmount = isset($editPoint[0]["point_amount"]) && !empty($editPoint[0]["point_amount"]) ? $editPoint[0]["point_amount"] : '1';
$slideImg1 = isset($editSlide1[0]["image_silder1"]) && !empty($editSlide1[0]["image_silder1"]) ? $editSlide1[0]["image_silder1"] : '/Storage/slider/acer.png';
$slideImg2 = isset($editSlide1[0]["image_silder2"]) && !empty($editSlide1[0]["image_silder2"]) ? $editSlide1[0]["image_silder2"] : '/Storage/slider/dell.png';
$slideImg3 = isset($editSlide1[0]["image_silder3"]) && !empty($editSlide1[0]["image_silder3"]) ? $editSlide1[0]["image_silder3"] : '/Storage/slider/msi.svg';
$sliderTitle1 = isset($editInfo[0]["image_silder_title1"]) && !empty($editInfo[0]["image_silder_title1"]) ? $editInfo[0]["image_silder_title1"] : 'Intel® Evo™ Platform The Ultimate Premium Laptop Experience';
$sliderTitle2 = isset($editInfo[0]["image_silder_title2"]) && !empty($editInfo[0]["image_silder_title2"]) ? $editInfo[0]["image_silder_title2"] : 'Intel® Evo™ Platform The Ultimate Premium Laptop Experience';
$sliderTitle3 = isset($editInfo[0]["image_silder_title3"]) && !empty($editInfo[0]["image_silder_title3"]) ? $editInfo[0]["image_silder_title3"] : 'Intel® Evo™ Platform The Ultimate Premium Laptop Experience';
$sliderDsc1 = isset($editInfo[0]["image_silder_dsc1"]) && !empty($editInfo[0]["image_silder_dsc1"]) ? $editInfo[0]["image_silder_dsc1"] : 'Feature the latest 13th Gen. Intel® Core™ i7 processor and certified by the Intel® Evo™ platform, you can now unleash your productivity with outstanding performance, on-the-go portability, and long-lasting battery life.';
$sliderDsc2 = isset($editInfo[0]["image_silder_dsc2"]) && !empty($editInfo[0]["image_silder_dsc2"]) ? $editInfo[0]["image_silder_dsc2"] : 'Feature the latest 13th Gen. Intel® Core™ i7 processor and certified by the Intel® Evo™ platform, you can now unleash your productivity with outstanding performance, on-the-go portability, and long-lasting battery life.';
$sliderDsc3 = isset($editInfo[0]["image_silder_dsc3"]) && !empty($editInfo[0]["image_silder_dsc3"]) ? $editInfo[0]["image_silder_dsc3"] : 'Feature the latest 13th Gen. Intel® Core™ i7 processor and certified by the Intel® Evo™ platform, you can now unleash your productivity with outstanding performance, on-the-go portability, and long-lasting battery life.';
$sliderBackgroundColor1 = isset($editInfo[0]["slide_bg1"]) && !empty($editInfo[0]["slide_bg1"]) ? $editInfo[0]["slide_bg1"] : '#2F2E41';
$sliderBackgroundColor2 = isset($editInfo[0]["slide_bg2"]) && !empty($editInfo[0]["slide_bg2"]) ? $editInfo[0]["slide_bg2"] : '#2F2E41';
$sliderBackgroundColor3 = isset($editInfo[0]["slide_bg3"]) && !empty($editInfo[0]["slide_bg3"]) ? $editInfo[0]["slide_bg3"] : '#2F2E41';
$slideTextColor1 = isset($editInfo[0]["slide_text_color1"]) && !empty($editInfo[0]["slide_text_color1"]) ? $editInfo[0]["slide_text_color1"] : '#ffffff';
$slideTextColor2 = isset($editInfo[0]["slide_text_color2"]) && !empty($editInfo[0]["slide_text_color2"]) ? $editInfo[0]["slide_text_color2"] : '#ffffff';
$slideTextColor3 = isset($editInfo[0]["slide_text_color3"]) && !empty($editInfo[0]["slide_text_color3"]) ? $editInfo[0]["slide_text_color3"] : '#ffffff';
$question1 = isset($editInfo[0]["question1"]) && !empty($editInfo[0]["question1"]) ? $editInfo[0]["question1"] : 'How to use my points?';
$question2 = isset($editInfo[0]["question2"]) && !empty($editInfo[0]["question2"]) ? $editInfo[0]["question2"] : 'Where to check my orders?';
$question3 = isset($editInfo[0]["question3"]) && !empty($editInfo[0]["question3"]) ? $editInfo[0]["question3"] : 'What payment options are available?';
$answer1 = isset($editInfo[0]["answer1"]) && !empty($editInfo[0]["answer1"]) ? $editInfo[0]["answer1"] : 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora soluta ipsa quibusdam laudantium dolor placeat repudiandae, sunt et nostrum voluptatem architecto eius vel modi porro perspiciatis dicta harum similique! Quas, ab sit! Consectetur num ';
$answer2 = isset($editInfo[0]["answer2"]) && !empty($editInfo[0]["answer2"]) ? $editInfo[0]["answer2"] : 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora soluta ipsa quibusdam laudantium dolor placeat repudiandae, sunt et nostrum voluptatem architecto eius vel modi porro perspiciatis dicta harum similique! Quas, ab sit! Consectetur num ';
$answer3 = isset($editInfo[0]["answer3"]) && !empty($editInfo[0]["answer3"]) ? $editInfo[0]["answer3"] : 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora soluta ipsa quibusdam laudantium dolor placeat repudiandae, sunt et nostrum voluptatem architecto eius vel modi porro perspiciatis dicta harum similique! Quas, ab sit! Consectetur num ';
$startTime = isset($editDark[0]["h1_color"]) && !empty($editDark[0]["h1_color"]) ? $editDark[0]["h1_color"] : '00:00';
$endTime = isset($editDark[0]["h2_color"]) && !empty($editDark[0]["h2_color"]) ? $editDark[0]["h2_color"] : '00:00';
$showAnnounce = isset($editAnnouncement[0]["displayAnno"]) && !empty($editAnnouncement[0]["displayAnno"]) ? $editAnnouncement[0]["displayAnno"] : 'hidden';








?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UI Elements</title>
  <link rel="icon" href="../resources/img/headerLogo.svg" type="image/icon type">
    
    <link rel="stylesheet" href="./resources/lib/tailwind/output.css?id=<?= time() ?>">
    <script src="../resources/lib/jquery3.6.0.js"></script>
    <link rel="stylesheet" href="../resources/css/faq.css">


    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .table {
            border-spacing: 0 10px;
        }

        .custom-file-upload {
            display: inline-block;
            padding: 0px 20px;
            color: black;
            background-color: white;
            color: #fff;
            cursor: pointer;
            border-radius: 2px;
        }

        input[type="file"] {
            display: none;
        }

        /* width */
        .scroll::-webkit-scrollbar {
            width: 5px;
        }


        .scroll::-webkit-scrollbar-track {
            background: #ffffff;
        }

        .scroll::-webkit-scrollbar-thumb {
            background: #3d3d3d;
            border-radius: 5px;
        }
    </style>
    <script>
        function updateLiveTime() {
            var date = new Date();
            var options = {
                hour12: true,
                hour: 'numeric',
                minute: '2-digit',
                second: '2-digit'
            };
            var formattedTime = date.toLocaleTimeString('en-US', options);
            document.getElementById('liveTime').innerHTML = 'Current Time: ' + formattedTime;
        }
        setInterval(updateLiveTime, 1000);
        updateLiveTime();
    </script>
</head>

<body class="font-roboto">
    <section class=" w-full bg-[#12141B] max-w-[1600px] mx-auto flex">
        <!-- Import side bar  -->
        <?php $menu = "uiElement" ?>
        <?php include "../resources/common/adminSideBar.php" ?>

        <!-- Right-side Start -->
        <div class="h-screen overflow-hidden w-full">
            <!-- Search Start-->
            <div class="bg-[#262B3A] flex justify-between items-center py-3 px-10">
                <div class="text-white">
                    <p class="text-2xl font-semibold">UI Elements</p>
                    <?php
                    $timestamp = time();
                    $time12HourSeconds = date('h:i:s A');

                    date_default_timezone_set('Asia/Yangon');
                    $day = date('D');
                    $month = date('F');
                    $date = date('j');
                    $year = date('Y', $timestamp);


                    ?>
                    <p><?php echo "Date : $day, $month $date, $year" ?></p>

                </div>

            </div>
            <!-- Search End-->


            <!-- start data -->
            <div class="px-[53px] py-8 data-output  overflow-y-scroll h-[750px] scrollbar-hide">


                <div class="flex justify-center space-x-[200px]">

                    <!-- start deskotop logo -->
                    <div>
                        <form action="../../Controller/uiElements/logo/updateLogoController.php" method="post" enctype="multipart/form-data">
                            <label class="mx-auto text-center flex justify-center" for="">
                                <div class="bg-[white]  rounded-lg">
                                    <a target="_blank" href="../../../<?= $logo ?>">
                                        <img id="saveLogo" src="../../..<?= $logo ?>" class="px-[5px] max-h-[100px] py-[5px] " alt="">
                                    </a>
                                </div>

                            </label>
                            <span class="block mx-auto text-center text-white text-2xl font-semibold mt-2 ">Desktop Logo</span>
                            <div class="text-white mx-auto text-center mt-5">
                                <label for=""> Logo</label>
                                <label for="logo" class="custom-file-upload text-black ml-2">
                                    Choose File
                                </label>
                                <input accept=".png,.jpg,.svg" name="logoImg" type="file" id="logo" class="bg-[black] w-[270px] h-[27px] rounded-sm" />

                                <button type="submit" class="px-[15px] rounded-sm text-[black] ml-2 bg-[white]">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- end desktop logo -->



                    <!-- start mobile logo -->
                    <div>
                        <form action="../../Controller/uiElements/logo/updateMobileLogoController.php" method="post" enctype="multipart/form-data">
                            <label class="mx-auto text-center flex justify-center" for="">
                                <div class="bg-[white]  rounded-lg">
                                   
                                        <a target="_blank" href="../../../<?= $mobileLogo ?>">
                                        <img id="smlogo" src="../../..<?= $mobileLogo ?>" class="px-[5px] max-h-[100px] py-[5px] " alt="">
                                    </a>
                                </div>

                            </label>
                            <span class="block mx-auto text-center text-white text-2xl font-semibold mt-2 ">Mobile Logo</span>
                            <div class="text-white mx-auto text-center mt-5">
                                <label for=""> Logo</label>
                                <label for="mlogo" class="custom-file-upload text-black ml-2">
                                    Choose File
                                </label>
                                <input accept=".png,.jpg,.svg" name="mobileLogoImg" type="file" id="mlogo" class="bg-[black] w-[270px] h-[27px] rounded-sm" />

                                <button type="submit" class="px-[15px] rounded-sm text-[black] ml-2 bg-[white]">Save</button>
                            </div>
                        </form>
                    </div>




                    <!-- end mobile logo -->


                </div>
                <!-- end logo -->

                <hr class="mt-10 h-[2px] mx-auto">



                <!-- start color -->
                <div class="text-white flex justify-between mt-10">

                    <!-- start background color -->
                    <div>
                        <span class="text-xl">Background Color</span>
                        <form action="../../Controller/uiElements/backgroundColor/updateBacgroundController.php" method="post">
                            <div class="flex justify-between mt-4">
                                <span>Primay</span>
                                <input name="bgPrimary" value="<?= $primaryColor  ?>" class="rounded-sm" type="color">
                            </div>

                            <div class="flex justify-between mt-4">
                                <span>Secondary</span>
                                <input name="bgSecondary" value="<?= $secondaryColor ?>" class="rounded-sm" type="color">
                            </div>

                            <div class="flex justify-between mt-4">
                                <span>Tertiary </span>
                                <input name="bgTertiary" value="<?= $tertiaryColor ?>" class="rounded-sm" type="color">
                            </div>

                            <div class="flex justify-between mt-4">
                                <span>Light Tertiary </span>
                                <input name="lightTertiary" value="<?= $lightTertiary ?>" class="rounded-sm" type="color">
                            </div>



                            <button class="px-[15px] mt-4 rounded-sm text-[black] ml-[105px] bg-[white]">Save</button>
                        </form>
                    </div>
                    <!-- end background color -->

                    <!-- start text color -->
                    <div>
                        <span class="text-xl">Text Color</span>
                        <form action="../../Controller/uiElements/textColor/updateTextController.php" method="post">
                            <div class="flex justify-between mt-4">
                                <span>Price Text</span>
                                <input name="priceColor" value="<?= $priceColor ?>" class="rounded-sm" type="color">
                            </div>

                            <div class="flex justify-between mt-4">
                                <span>Nav Text</span>
                                <input name="navColor" value="<?= $navColor ?>" class="rounded-sm" type="color">
                            </div>

                            <div class="flex justify-between mt-4">
                                <span>Title </span>
                                <input name="titleColor" value="<?= $titleColor ?>" class="rounded-sm" type="color">
                            </div>
                            <button class="px-[15px] mt-4 rounded-sm text-[black] ml-[105px] bg-[white]">Save</button>
                        </form>
                    </div>
                    <!-- end text color -->

                    <!-- start card color -->
                    <div>
                        <span class="text-xl"> Card Color</span>
                        <form action="../../Controller/uiElements/cardColor/updateCardController.php" method="post">
                            <div class="flex justify-between mt-4">
                                <span>Price Card</span>
                                <input name="cardColor" value="<?= $cardColor ?>" class="rounded-sm" type="color">
                            </div>


                            <button class="px-[15px] mt-4 rounded-sm text-[black] ml-[105px] bg-[white]">Save</button>
                        </form>
                    </div>
                    <!-- end card color -->

                    <!-- start button color -->
                    <div>
                        <span class="text-xl">Button Color</span>
                        <form action="../../Controller/uiElements/buttonColor/updateButtonColorController.php" method="post">
                            <div class="flex justify-between mt-4">
                                <span>Button</span>
                                <input name="buttonColor" value="<?= $buttonColor ?>" class="rounded-sm" type="color">
                            </div>
                            <div class="flex justify-between mt-4">
                                <span>Text</span>
                                <input name="buttonText" value="<?= $buttonText ?>" class="rounded-sm" type="color">
                            </div>


                            <button class="px-[15px] mt-4 rounded-sm text-[black] ml-[105px] bg-[white]">Save</button>
                        </form>
                    </div>
                    <!-- end button color -->

                    <!-- start darkmode -->
                    <div>
                        <span class="text-xl">Set Time(Dark Mode)</span>
                        <form action="../../Controller/uiElements/darkMode/updateDarkMode.php" method="post">

                            <div class="flex justify-between mt-4">

                                <p class="" id="liveTime"></p>
                            </div>

                            <div class="flex justify-between mt-4">
                                <span>Start Time</span>
                                <input value="<?= $startTime ?>" name="startTime" type="time" class="pl-2 w-[115px] text-black rounded-sm focus:outline-none">
                            </div>

                            <div class="flex justify-between mt-4">
                                <span>End Time</span>
                                <input value="<?= $endTime ?>" name="endTime" type="time" class="pl-2 w-[115px] text-black rounded-sm focus:outline-none">

                            </div>

                            <button class="px-[15px] mt-4 rounded-sm text-[black] ml-[125px] bg-[white]">Save</button>
                        </form>
                    </div>
                    <!-- end darkmode -->


                </div>
                <!-- end color -->


                <hr class="mt-10 h-[2px] mx-auto">

                <!-- start announcements -->

                <div class="text-white flex  justify-between mt-10 mb-[100px]">


                    <div class="mx-auto">
                        <h1 class="text-2xl text-center">Announcement</h1>
                        <form action="../../Controller/uiElements/announcement/updateController.php" method="post">

                            <div class="flex justify-center mx-auto  mt-4">

                                <textarea class="resize-none scroll text-black outline-none rounded-sm   " name="textAnno" id="" cols="123" rows="5"><?= $editAnnouncement[0]["textAnno"] ?></textarea>

                            </div>

                            <div class="float-right">
                                <select class="text-black focus:outline-none rounded-sm px-2" name="displayAnno" id="">
                                    <option value="hidden" <?= $showAnnounce === "hidden" ? 'selected' : '' ?>>Hide</option>

                                    <option value="block" <?= $showAnnounce === "block" ? 'selected' : '' ?>>Display</option>
                                </select>

                                <button class="px-[15px] py-[2px] mt-4 rounded-sm text-[black]  bg-[white]">Save</button>
                            </div>
                        </form>

                    </div>

                </div>


                <!-- end announcements -->


                <hr class="mt-10 h-[2px] mx-auto">

                <!-- start information & banner -->
                <div class="text-white flex  justify-between mt-10">

                    <!-- start information -->
                    <div>
                        <span class="text-xl">Information</span>
                        <form action="../../Controller/uiElements/Information/updateController.php " method="post">
                            <div class="flex justify-between space-x-4 mt-4">
                                <span>Phone No</span>
                                <input name="phoneNumber" value="<?= $phoneNumber ?>" class="pl-2 rounded-sm   text-black w-[300px] ml-[100px]  " type="text" placeholder="09 xxx xxxx xxx">
                            </div>

                            <div class="flex justify-between mt-4">
                                <span>Email</span>
                                <input value="<?= $email  ?>" name="gmail" class="pl-2 w-[300px] ml-[100px] rounded-sm text-black" type="email" placeholder="trend@gmail.com">
                            </div>

                            <div class="flex justify-between mt-4">
                                <span>Address </span>
                                <input value="<?= $address ?>" name="address" class="pl-2 rounded-sm text-black w-[300px] ml-[100px] " type="text" placeholder="Yangon">
                            </div>
                            <div class="flex justify-between mt-4">
                                <span>Location Link </span>
                                <input value="<?= $addressLink ?>" name="location" class="pl-2 rounded-sm text-black w-[300px] ml-[100px] " type="text" placeholder="Location Link">
                            </div>

                            <div class="flex justify-between mt-4">
                                <span>Time </span>
                                <input value="<?= $time ?>" name="time" class="pl-2 rounded-sm text-black w-[300px] ml-[100px] " type="text" placeholder="08:00 am - 08:00pm">
                            </div>
                            <button type="submit" class="px-[15px] mt-4 rounded-sm text-[black] ml-[440px] bg-[white]">Save</button>
                        </form>
                    </div>
                    <!-- end information -->


                    <!-- start banner -->
                    <div>
                        <span class="text-xl">Banner</span>
                        <form class="relative" action="../../Controller/uiElements/banner1/updateBannerController.php" method="post" enctype="multipart/form-data">
                            <div class="flex  mt-4">
                                <label for="banner1">
                                    <a target="_blank" href="../../../<?= $bannerImg1 ?>">
                                        <img id="saveBanner1" src="../../../<?= $bannerImg1 ?>" class=" h-[30px] w-[40px] mr-2" alt="">
                                    </a>
                                </label>

                                <span>Banner 1 from Product Page</span>
                                <label for="banner1" class="custom-file-upload text-black ml-[17px]  h-[25px]">
                                    Choose File
                                </label>
                                <input value="" name="banner1" accept=".png,.jpg,.svg" type="file" id="banner1" class="bg-[black] w-[270px] h-[27px] rounded-sm" />
                            </div>
                            <button type="submit" class="px-[15px] h-6  absolute top-0 inline rounded-sm text-[black] right-0 bg-[white]">Save</button>
                        </form>

                        <form class="relative" action="../../Controller/uiElements/banner2/updateBannerController.php" method="post" enctype="multipart/form-data">
                            <div class="flex  mt-4">
                                <label for="banner2">
                                    <a target="_blank" href="../../../<?= $bannerImg2 ?>">
                                        <img id="saveBanner2" src="../../../<?= $bannerImg2 ?>" class=" h-[30px] w-[40px] mr-2" alt="">
                                    </a>
                                </label>
                                <span>Banner 2 from Product Page</span>
                                <label for="banner2" class="custom-file-upload text-black ml-[17px]  h-[25px]">
                                    Choose File
                                </label>
                                <input value="" name="banner2" accept=".png,.jpg,.svg" type="file" id="banner2" class="bg-[black] w-[270px] h-[27px] rounded-sm" />
                            </div>
                            <button type="submit" class="px-[15px] h-6  absolute top-0 inline rounded-sm text-[black] right-0 bg-[white]">Save</button>
                        </form>


                        <form class="relative" action="../../Controller/uiElements/banner3/updateBannerController.php" method="post" enctype="multipart/form-data">
                            <div class="flex  mt-4">
                                <label for="banner3">
                                    <a target="_blank" href="../../../<?= $bannerImg3 ?>">
                                        <img id="saveBanner3" src="../../../<?= $bannerImg3 ?>" class=" h-[30px] w-[40px] mr-2" alt="">
                                    </a>
                                </label>
                                <span>Banner 1 from Category Page</span>
                                <label for="banner3" class="custom-file-upload text-black ml-2 h-[25px]">
                                    Choose File
                                </label>
                                <input value="" name="banner3" accept=".png,.jpg,.svg" type="file" id="banner3" class="bg-[black] w-[270px] h-[27px] rounded-sm" />
                            </div>
                            <button type="submit" class="px-[15px] h-6  absolute top-0 inline rounded-sm text-[black] right-0 bg-[white]">Save</button>
                        </form>

                        <form class="relative" action="../../Controller/uiElements/banner4/updateBannerController.php" method="post" enctype="multipart/form-data">
                            <div class="flex  mt-4">
                                <label for="banner4">
                                    <a target="_blank" href="../../../<?= $bannerImg4 ?>">
                                        <img id="saveBanner4" src="../../../<?= $bannerImg4 ?>" class=" h-[30px] w-[40px] mr-2" alt="">
                                    </a>
                                </label>
                                <span>Banner 2 from Category Page</span>
                                <label for="banner4" class="custom-file-upload text-black ml-[80px] relative right-[72px] h-[25px]">
                                    Choose File
                                </label>
                                <input value="" name="banner4" accept=".png,.jpg,.svg" type="file" id="banner4" class="bg-[black] w-[270px] h-[27px] rounded-sm" />
                            </div>
                            <button type="submit" class="px-[15px] h-6  absolute top-0 inline rounded-sm text-[black] right-0 bg-[white]">Save</button>

                        </form>

                        <form class="relative" action="../../Controller/uiElements/banner5/updateBannerController.php" method="post" enctype="multipart/form-data">
                            <div class="flex  mt-4">
                                <label for="banner5">
                                    <a target="_blank" href="../../../<?= $bannerImg5 ?>">
                                        <img id="saveBanner5" src="../../../<?= $bannerImg5 ?>" class=" h-[30px] w-[40px] mr-2" alt="">
                                    </a>
                                </label>

                                <span>Banner 3 from Category Page</span>
                                <label for="banner5" class="custom-file-upload text-black ml-[80px] relative right-[72px] h-[25px]">
                                    Choose File
                                </label>

                                <input value="" name="banner5" accept=".png,.jpg,.svg" type="file" id="banner5" class="bg-[black] w-[270px] h-[27px] rounded-sm" />
                            </div>
                            <button type="submit" class="px-[15px] h-6  absolute top-0 inline rounded-sm text-[black] right-0 bg-[white]">Save</button>
                        </form>

                    </div>
                    <!-- end banner -->
                </div>
                <!-- end information & banner -->


                <hr class="mt-10 h-[2px] mx-auto">

                <!-- start exchange point -->
                <div class="text-white flex  justify-between mt-10">
                    <div>
                        <span class="text-xl">Point Exchange Rate</span>
                        <span class="text-md mt-4 block">Current point : <?= $moneyAmount ?> Kyats to <?= $pointAmount ?> Points.</span>
                        <form action="../../Controller/uiElements/pointEdit/updatePointController.php" method="post">
                            <div class="flex space-x-32 ">
                                <div class="flex space-x-5 mt-4">
                                    <span>Money Amount:</span>
                                    <input placeholder="Money Amount" name="moneyAmt" value="<?= $moneyAmount ?>" class=" w-[120px] rounded-sm text-black text-center" type="text">
                                </div>

                                <span class="block mt-4">TO</span>

                                <div class="flex space-x-5 mt-4">
                                    <span>Point Amount:</span>
                                    <input placeholder="Point Amount" name="pointAmt" value="<?= $pointAmount ?>" class=" w-[120px] rounded-sm text-black text-center" type="text">
                                </div>
                                <button type="submit" class="px-[15px] mt-4 rounded-sm text-[black]   bg-[white]">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end exchange point -->



                <hr class="mt-10 h-[2px] mx-auto">

                <!-- start slider -->
                <div class="text-white flex  justify-between mt-10 shadow-lg">
                    <!-- start slider 1 -->
                    <div class="">
                        <span class="text-xl">Image Slider1</span>
                        <form action="../../Controller/uiElements/imgSlider1/updateController.php" method="post" class="mt-[40px]" enctype="multipart/form-data">
                            <div class="flex mt-4  w-[330px]  relative">
                                <span>Image</span>


                                <label for="" class="ml-5">
                                    <a target="_blank" href="../../../<?= $slideImg1 ?>">

                                        <img id="saveSlide1" src="../../../<?= $slideImg1 ?>" class=" h-[30px] w-[40px] mr-2" alt="slider1">

                                    </a>
                                </label>
                                <label for="slide1" class="custom-file-upload text-black ml-3 h-[25px]">
                                    Choose File
                                </label>
                                <button class="px-[15px] ml-[240px] rounded-sm text-[black] absolute right-0  bg-[white]">Save</button>


                                <input name="slide1" type="file" id="slide1" class="bg-[black] w-[270px] h-[27px] rounded-sm" />
                            </div>
                        </form>
                        <form action="../../Controller/uiElements/imgSlider1/updateTextController.php" method="post">

                            <div class="flex  mt-4">
                                <span>Title</span>
                                <textarea placeholder="Enter Title" class="scroll resize-none text-black outline-none rounded-sm ml-[22px]" name="imgTitleOne" id="" cols="37" rows="3"> <?= $sliderTitle1 ?> </textarea>

                            </div>

                            <div class="flex  mt-4">
                                <span>Des</span>
                                <textarea placeholder="Enter Description" class="resize-none scroll text-black outline-none rounded-sm ml-[27px]  " name="imgDscOne" id="" cols="37" rows="5"> <?= $sliderDsc1 ?></textarea>

                            </div>
                            <div class="flex justify-between mt-4">
                                <span>Background Color</span>
                                <input name="slideBg1" value="<?= $sliderBackgroundColor1  ?>" class="rounded-sm w-[60px]" type="color">
                            </div>
                            <div class="flex justify-between mt-4">
                                <span>Text Color</span>
                                <input name="slide_text_color1" value="<?= $slideTextColor1 ?>" class="rounded-sm w-[60px]" type="color">
                            </div>



                            <button class="px-[15px] mt-4 rounded-sm text-[black] ml-[274px] bg-[white]">Save</button>
                        </form>


                    </div>
                    <!-- end slider 1 -->


                    <!-- start slider 2 -->
                    <div>
                        <span class="text-xl">Image Slider2</span>
                        <form class="mt-[40px]" action="../../Controller/uiElements/imgSlider2/updateController.php" method="post" enctype="multipart/form-data">
                            <div class="flex mt-4  w-[330px]  relative">
                                <span>Image</span>


                                <label for="" class="ml-5">
                                    <a target="_blank" href="../../../<?= $slideImg2 ?>">

                                        <img id="saveSlide2" src="../../../<?= $slideImg2 ?>" class=" h-[30px] w-[40px] mr-2" alt="slider2">

                                    </a>
                                </label>
                                <label for="slide2" class="custom-file-upload text-black ml-3 h-[25px]">
                                    Choose File
                                </label>
                                <button class="px-[15px] ml-[240px] rounded-sm text-[black] absolute right-0  bg-[white]">Save</button>


                                <input name="slide2" type="file" id="slide2" class="bg-[black] w-[270px] h-[27px] rounded-sm" />
                            </div>
                        </form>

                        <form action="../../Controller/uiElements/imgSlider2/updateTextController.php" method="post">
                            <div class="flex  mt-4">
                                <span>Title</span>
                                <textarea class="scroll resize-none text-black outline-none rounded-sm ml-[22px]" name="imgTitleTwo" id="" cols="37" rows="3"><?= $sliderTitle2 ?></textarea>

                            </div>

                            <div class="flex  mt-4">
                                <span>Des</span>
                                <textarea class=" scroll resize-none text-black outline-none rounded-sm ml-[27px]" name="imgDscTwo" id="" cols="37" rows="5"><?= $sliderDsc2 ?></textarea>

                            </div>


                            <div class="flex justify-between mt-4">
                                <span>Background Color</span>
                                <input name="slideBg2" value="<?= $sliderBackgroundColor2  ?>" class="rounded-sm w-[60px]" type="color">


                            </div>
                            <div class="flex justify-between mt-4">
                                <span>Text Color</span>
                                <input name="slide_text_color2" value="<?= $slideTextColor2 ?>" class="rounded-sm w-[60px]" type="color">
                            </div>


                            <button class="px-[15px] mt-4 rounded-sm text-[black] ml-[274px] bg-[white]">Save</button>
                        </form>


                    </div>
                    <!-- end slider 2 -->


                    <!-- start slider 3 -->
                    <div>
                        <span class="text-xl">Image Slider3</span>
                        <form class="mt-[40px]" action="../../Controller/uiElements/imgSlider3/updateController.php" method="post" enctype="multipart/form-data">
                            <div class="flex mt-4  w-[330px]  relative">
                                <span>Image</span>


                                <label for="" class="ml-5">
                                    <a target="_blank" href="../../../<?= $slideImg3 ?>">

                                        <img id="saveSlide3" src="../../../<?= $slideImg3 ?>" class=" h-[30px] w-[40px] mr-2" alt="slider3">

                                    </a>
                                </label>
                                <label for="slide3" class="custom-file-upload text-black ml-3 h-[25px]">
                                    Choose File
                                </label>
                                <button class="px-[15px] ml-[240px] rounded-sm text-[black] absolute right-0  bg-[white]">Save</button>


                                <input name="slide3" type="file" id="slide3" class="bg-[black] w-[270px] h-[27px] rounded-sm" />
                            </div>
                        </form>

                        <form action="../../Controller/uiElements/imgSlider3/updateTextController.php" method="post">
                            <div class="flex  mt-4">
                                <span>Title</span>
                                <textarea class="resize-none scroll text-black outline-none rounded-sm ml-[22px]" name="imgTitleThree" id="" cols="37" rows="3"> <?= $sliderTitle3 ?></textarea>

                            </div>

                            <div class="flex  mt-4">
                                <span>Des</span>
                                <textarea class="scroll resize-none text-black outline-none rounded-sm ml-[27px]" name="imgDscThree" id="" cols="37" rows="5"><?= $sliderDsc3 ?></textarea>

                            </div>


                            <div class="flex justify-between mt-4">
                                <span>Background Color</span>
                                <input name="slideBg3" value="<?= $sliderBackgroundColor3 ?>" class="rounded-sm w-[60px]" type="color">

                            </div>
                            <div class="flex justify-between mt-4">
                                <span>Text Color</span>
                                <input name="slide_text_color3" value="<?= $slideTextColor3 ?>" class="rounded-sm w-[60px]" type="color">
                            </div>

                            <button class="px-[15px] mt-4 rounded-sm text-[black] ml-[274px] bg-[white]">Save</button>

                        </form>


                    </div>
                    <!-- end slider 3 -->
                </div>
                <!-- end slider -->

                <hr class="mt-10 h-[2px] mx-auto">

                <!-- start faq -->
                <select class="w-[70px] text-black h-[25px] outline-none mt-10 rounded-sm ml-[64px]" id="faq-select">
                    <option value="faq1">FAQ1</option>
                    <option value="faq2">FAQ2</option>
                    <option value="faq3">FAQ3</option>
                </select>

                <div class="text-white flex -ml-[5px] mt-5">
                    <div class="faq text-black" id="faq1">



                        <form action="../../Controller/uiElements/faq1/updatefaqController.php" method="post">

                            <div class="flex justify-between w-[970px]">
                                <span class="block text-white ">Ques:</span>
                                <textarea name="questionOne" cols="123" rows="2" class="scroll resize-none  text-black" type="text" placeholder="Question 1"><?= $question1 ?></textarea>
                            </div>
                            <div class="flex  mt-4 justify-between  w-[970px]">
                                <span class="block text-white">Ans:</span>
                                <textarea cols="123" rows="4" name="answerOne" class="resize-none scroll  text-black" type="text" placeholder="Answer 1"><?= $answer1 ?></textarea>
                            </div>
                            <button type="submit" class="px-[15px] mt-4 rounded-sm text-[black] ml-[908px] bg-[white]">Save</button>

                        </form>
                    </div>


                    <div class="faq" id="faq2">

                        <form action="../../Controller/uiElements/faq2/updatefaq2Controller.php" method="post">

                            <div class="flex justify-between  w-[970px]">
                                <span class="block text-white ">Ques:</span>
                                <textarea name="questionTwo" cols="123" rows="2" class="scroll resize-none  text-black" type="text" placeholder="Question 2"><?= $question2 ?></textarea>
                            </div>
                            <div class="flex  w-[970px]  mt-4 justify-between">
                                <span class="block text-white">Ans:</span>
                                <textarea cols="123" rows="4" name="answerTwo" class="resize-none scroll text-black" type="text" placeholder="Answer 2"><?= $answer2 ?> </textarea>
                            </div>
                            <button type="submit" class="px-[15px] mt-4 rounded-sm text-[black] ml-[908px] bg-[white]">Save</button>

                        </form>
                    </div>

                    <div class="faq" id="faq3">
                        <form action="../../Controller/uiElements/faq3/updatefaq3Controller.php" method="post">

                            <div class="flex justify-between  w-[970px]">
                                <span class="block text-white ">Ques:</span>
                                <textarea name="questionThree" cols="123" rows="2" class="scroll resize-none  text-black" type="text" placeholder="Question 3"><?= $question3 ?> </textarea>
                            </div>
                            <div class="flex  w-[970px]  mt-4 justify-between">
                                <span class="block text-white">Ans:</span>
                                <textarea cols="123" rows="4" name="answerThree" class="resize-none scroll text-black" type="text" placeholder="Answer 3"><?= $answer3 ?></textarea>
                            </div>
                            <button type="submit" class="px-[15px] mt-4 rounded-sm text-[black] ml-[908px] bg-[white]">Save</button>

                        </form>
                    </div>
                </div>
                <!-- end faq -->


                <hr class="mt-10 h-[2px] mx-auto">

                <!-- start terms -->
                <div class="text-white flex  justify-between mt-10 mb-[100px]">


                    <div>
                        <span class="text-black w-[90px] rounded-sm ml-[65px] px-2 bg-white" name="" id="">
                            Terms

                        </span>
                        <form action="../../Controller/uiElements/terms/updatetermsController.php" method="post">

                            <div class="flex  mt-4">
                                <span>Terms:</span>
                                <textarea class="resize-none scroll text-black outline-none rounded-sm ml-[20px]   " name="terms" id="" cols="123" rows="5"><?= $editTerms[0]["terms"] ?></textarea>

                            </div>


                            <button class="px-[15px] mt-4 rounded-sm text-[black] ml-[907px] bg-[white]">Save</button>
                        </form>

                    </div>

                </div>
                <!-- end terms -->


            </div>
            <!-- end data -->


        </div>
        <!-- Right-side End -->
    </section>



    <script src="../resources/js/modal_box.js"></script>
    <script src="../resources/js/faq.js"></script>
    <script src="../resources//js/imgSave.js"></script>
    <script src="../resources/js/customHour.js"></script>
</body>

</html>