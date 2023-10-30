<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/lib/tailwind/output.css">
    <title>404 Error</title>
</head>

<style>
    .vert-move1 {
        -webkit-animation: mover 1s infinite alternate;
        animation: mover 1s infinite alternate;
    }

    .vert-move2 {
        -webkit-animation: mover 1s infinite alternate;
        animation: mover 1.5s infinite alternate;
    }

    .vert-move3 {
        -webkit-animation: mover 1s infinite alternate;
        animation: mover 2s infinite alternate;
    }

    .vert-move4 {
        -webkit-animation: mover 1s infinite alternate;
        animation: mover 1.2s infinite alternate;
    }

    @keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-30px);
        }
    }
</style>

<body class="font-roboto">
    <div class="flex justify-center items-center h-screen">
        <div class=" w-[1100px] h-[600px] text-red-300 bg-primary relative rounded-md shadow-2xl text-center">
            <div class="flex flex-row justify-center mt-3">
                <span class=" text-[120px] text-black">4</span>
                <img class="" src="../resources/img/error/clock.svg" alt="">
                <span class=" text-[120px] text-black">4</span>
            </div>
            
            <a href="../Login/login.php">
                <button class="md:mt-7 block mx-auto text-xl px-[30px] rounded-md mt-[100px] py-[6px] bg-black text-white hover:bg-tertiary">Login</button>
            </a>
            <img class="md:block hidden absolute -right-[28px] -bottom-[16px] -rotate-[20deg] vert-move3" src="../resources/img/error/laura-chouette.svg" alt="">
            <img class="md:block hidden absolute right-[228px] -bottom-[7px] vert-move2" src="../resources/img/error/shoes.svg" alt="">
            <img class="md:block hidden absolute right-[678px] -bottom-[32px] vert-move4" src="../resources/img/error/bag.svg" alt="">
            <img class="md:block hidden absolute right-[848px] bottom-[262px] vert-move1" src="../resources/img/error/glassess.svg" alt="">
        </div>
    </div>



</body>

</html>