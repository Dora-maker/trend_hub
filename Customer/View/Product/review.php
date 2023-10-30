<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page </title>
    <link rel="icon" href="../resources/img/header/headerLogo.svg" type="image/icon type">
    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">

    <script src="../resources/lib/jquery3.6.0.js"></script>

    <?php
    include "../../Controller/uiElement/editInfoController.php";

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
</head>
<style>
    .scrollHide::-webkit-scrollbar {
        display: none;
    }
</style>

<?php

include "../resources/common/navbar.php";
$primaryColor = isset($editInfo[0]["primary_color"]) && !empty($editInfo[0]["primary_color"]) ? $editInfo[0]["primary_color"] : '#FAFAFA';
$tertiaryColor = isset($editInfo[0]["tertiary_color"]) && !empty($editInfo[0]["tertiary_color"]) ? $editInfo[0]["tertiary_color"] : '#F36823';
$startTime = isset($editInfo[0]["h1_color"]) && !empty($editInfo[0]["h1_color"]) ? $editInfo[0]["h1_color"] : '00:00';
$endTime = isset($editInfo[0]["h2_color"]) && !empty($editInfo[0]["h2_color"]) ? $editInfo[0]["h2_color"] : '00:00';
$cardColor = isset($editInfo[0]["price_card_color"]) && !empty($editInfo[0]["price_card_color"]) ? $editInfo[0]["price_card_color"] : '#ffffff';
$buttonColor = isset($editInfo[0]["buy_button_color"]) && !empty($editInfo[0]["buy_button_color"]) ? $editInfo[0]["buy_button_color"] : '#F36823';
$priceColor = isset($editInfo[0]["price_text_color"]) && !empty($editInfo[0]["price_text_color"]) ? $editInfo[0]["price_text_color"] : '#F36823';



date_default_timezone_set('Asia/Yangon');
$currentHour = date('H:i');
?>
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


                    ?>] scrollHide">
    <div class="flex flex-row justify-around container mx-auto px-8 py-8 mt-[100px]">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-semibold mb-4 text-[<?php

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


                    ?>]">Create Review</h1>
            <p class="text-lg font-semibold text-[<?php

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


                    ?>]">Overall Rating</p>
            <div class="flex flex-row">
                <img src="../resources/img/products/star.svg" alt="star">
                <img src="../resources/img/products/star.svg" alt="star">
                <img src="../resources/img/products/star.svg" alt="star">
                <img src="../resources/img/products/star.svg" alt="star">
                <img src="../resources/img/products/star.svg" alt="star">
            </div>
            <div>
                <label class="block text-[<?php

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


                    ?>] font-semibold mb-2" for="message ">Review Title</label>
                <textarea class="w-1/2 px-3 py-3 h-16 resize-none border border-tertiary rounded focus:outline-none " id="message" placeholder="Add a headline review"></textarea>
            </div>
            <!-- <p>Add a photo</p>
            <div class="w-20 h-20 bg-secondary rounded-md flex items-center justify-center">
                <p class="text-black text-xl">+</p>
            </div> -->

            <div>
                <label class="block text-[<?php

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


                    ?>] font-semibold mb-2" for="message">Add a written review:</label>
                <textarea class="w-full px-3 py-3 h-24 resize-none border border-tertiary rounded focus:outline-none " id="message" placeholder="What do you like or dislike?"></textarea>

            </div>
            <button class="bg-[<?php

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


                    ?>]  text-[<?php

                    if ($startTime > $endTime) {
                        if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
                           echo "#000000";
                        }else {
                            echo $buttonText;
                        }
                    } else {
                        if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
                           echo "#000000";
                        } else {
                            echo $buttonText;
                        }
                    }
                    
                    
                                        ?>] font-semibold px-4 py-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
                Submit Review
            </button>
        </div>
        <!-- <div>
            <img src="../resources/img/products/review.svg" alt="review">
        </div> -->
    </div>
</body>
<?php include "../../View/resources/common/footer.php" ?>

</html>