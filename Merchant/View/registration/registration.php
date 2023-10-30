<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
  <link rel="icon" href="../../View/resources/img/headerLogo.svg" type="image/icon type">

    <link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
    <link rel="stylesheet" href="../resources/css/background/background.css">
    <script src="../resources/lib/jquery3.6.0.js"></script>



</head>
<?php
include "../../../Customer/Controller/uiElement/editInfoController.php";
?>
<style>
    /* Custom styles for the scrolling content */
    #term,
    #privacyText {
        max-height: calc(100vh - 100px);
        /* Set the max-height based on viewport height minus some padding (100px in this case) */
        overflow-y: scroll;
        /* Enable scrolling for the content */
        scrollbar-width: none;
        /* Hide the scrollbar for Firefox */
        -ms-overflow-style: none;
        /* Hide the scrollbar for Internet Explorer/Edge */
    }

    /* Hide the scrollbar for Chrome, Safari, and Opera */
    #term::-webkit-scrollbar,
    #privacyText::-webkit-scrollbar {
        display: none;
    }
</style>

<body class="merchantBg w-screen h-screen overflow-hidden">
    <div class="flex justify-center items-center p-6">

        <form class="bg-white w-2/3 p-6 shadow-lg rounded-md grid grid-cols-2 gap-4" action="../../Controller/registerController.php" method="post">
            <div class="col-span-2 ">
                <h1 class="text-2xl font-bold mb-6 text-start"><span>Welcome to </span><span class="text-orange-500">TrendHub</span></h1>
            </div>
            <div class="col-span-1">

                <input type="text" id="business-name" name="business-name" class="w-full shadow-md  border border-secondary rounded-md py-2 px-3 mt-1 focus:outline-none focus:ring focus:ring-secondary" placeholder="Business Name" required <?php
                                                                                                                                                                                                                                                if (isset($_SESSION["mbusinessName"])) { ?> value="<?= $_SESSION["mbusinessName"] ?>" <?php }
                                                                                                                                                                                                                                                                                                                                        ?>>
            </div>
            <div class="col-span-1">

                <input type="text" id="business-license" name="business-license" class="w-full shadow-md  border border-secondary rounded-md py-2 px-3 mt-1 focus:outline-none focus:ring focus:ring-secondary" placeholder="Business License" <?php
                                                                                                                                                                                                                                                if (isset($_SESSION["mLicense"])) { ?> value="<?= $_SESSION["mLicense"] ?>" <?php }
                                                                                                                                                                                                                                                                                                                                    ?>>
            </div>
            <div class="col-span-1">

                <input type="text" id="name" name="name" class="w-full shadow-md  border border-secondary rounded-md py-2 px-3 mt-1 focus:outline-none focus:ring focus:ring-secondary" placeholder="Name" required <?php
                                                                                                                                                                                                                    if (isset($_SESSION["mName"])) { ?> value="<?= $_SESSION["mName"] ?>" <?php }
                                                                                                                                                                                                                                                                                            ?>>
            </div>
            <div class="col-span-1">

                <input type="text" id="address" name="address" class="w-full shadow-md  border border-secondary rounded-md py-2 px-3 mt-1 focus:outline-none focus:ring focus:ring-secondary" placeholder="Address" required <?php
                                                                                                                                                                                                                                if (isset($_SESSION["mAddress"])) { ?> value="<?= $_SESSION["mAddress"] ?>" <?php }
                                                                                                                                                                                                                                                                                                            ?>>
            </div>
            <div class="col-span-1">
                <small class="text-red-600"><?php
                                            if (isset($_SESSION["emailError"])) echo $_SESSION["emailError"];
                                            ?></small>
                <input type="email" id="email" name="email" class="w-full shadow-md border border-secondary rounded-md py-2 px-3 mt-1 focus:outline-none focus:ring focus:ring-secondary" placeholder="Email address" required <?php
                                                                                                                                                                                                                                if (isset($_SESSION["mEmail"])) { ?> value="<?= $_SESSION["mEmail"] ?>" <?php }
                                                                                                                                                                                                                                                                                                        ?>>
            </div>
            <div class="col-span-1">

                <input type="tel" id="phone" name="phone" class="w-full shadow-md   border border-secondary rounded-md py-2 px-3 mt-1 focus:outline-none focus:ring focus:ring-secondary" placeholder="Phone number" required <?php
                                                                                                                                                                                                                                if (isset($_SESSION["mPhone"])) { ?> value="<?= $_SESSION["mPhone"] ?>" <?php }
                                                                                                                                                                                                                                                                                                        ?>>
            </div>
            <div class="col-span-1">

                <input type="password" id="password" name="password" class="w-full shadow-md  border border-secondary rounded-md py-2 px-3 mt-1 focus:outline-none focus:ring focus:ring-secondary" placeholder="Password" required>
            </div>
            <div class="col-span-1">

                <input type="password" id="confirm-password" name="confirm_password" class="w-full shadow-md  border border-secondary rounded-md py-2 px-3 mt-1 focus:outline-none focus:ring focus:ring-secondary" placeholder="Confirm Password" required>
            </div>
            <small class="text-red-600"><?php
                                        if (isset($_SESSION["pwdError"])) echo $_SESSION["pwdError"];
                                        ?></small>
            <div class="col-span-2">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox border border-secondary rounded focus:outline-none focus:ring " id="terms">
                    <span class="ml-2 text-sm text-gray-700 underline" id="openModalBtn">I agree to Terms & Conditions.</span>
                </label>
            </div>
            <div class="col-span-2">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox border border-secondary rounded focus:outline-none focus:ring " id="privacy">
                    <span class="ml-2 text-sm text-gray-700 underline" id="openPrivacyModal">I agree to Privacy & Policy.</span>
                </label>
            </div>
            <div class="col-span-1"></div>
            <div class="col-span-1">
                <button type="submit" name="register" class="w-full bg-secondary shadow-md text-white font-semibold py-2 px-4 rounded focus:outline-none  focus:ring focus:ring-secondary" id="register">Register</button>
            </div>
            <div class="col-span-1"></div>
            <div class="col-span-1">
                <a href="../Login/login.php" class="text-black text-center text-sm underline">
                    <p>Already registered?</p>
                </a>
            </div>
            <!-- <div id="registrationModal" class="hidden  fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                <div class="bg-white w-1/3 p-6 shadow-lg rounded-md text-center">
                    <h2 class="text-xl font-bold mb-4">Registration To <span class="text-orange-500">TrendHub</span> is complete.</h2>
                    <hr>
                    <p class="text-gray-600 mt-6">Your merchant account sign-up requires admin approval for access to our platform. The review process may take some time. Please check your email for your approval.</p>
                    <button id="closeModal" class="mt-4 w-1/2 bg-secondary text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">Close</button>
                </div>
            </div> -->



            <!--Team and Condition Modal -->
            <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-3/4">
                    <h2 class="text-2xl font-bold mb-4 text-center">Terms & Conditions</h2>
                    <div class=" bg-tertiary px-6 py-6 shadow-md rounded-md ">
                        <p class="text-orange-500 py-4">Last Updated: 2023/07/17</p>
                        <div class=" " id="welcome">
                            <p>Welcome to TrendHUB. These terms govern your relationship with us as a registered merchant and outline the rights and responsibilities associated with your merchant account. These terms also govern the service-based commission structure and one-time registration fees for merchants using our platform. Please read these terms carefully before proceeding with the registration process. If you do not agree with any part of these terms, please refrain from using our platform.</p>
                            <br>
                        </div>
                        <div class="text-black h-60 overflow-y-auto whitespace-pre-line" id="term">
<?= $editInfo[0]["terms"]  ?>

                        </div>
                    </div>

                    <div class="mt-4 flex justify-around space-x-4">
                        <button type="button" id="accept" class="bg-secondary  shadow-md w-1/3 text-white font-semibold py-2 px-4 rounded  focus:outline-none focus:ring focus:ring-red-300" >Accept T & C</button>
                        <button type="button" id="decline" class="bg-primary shadow-md w-1/3 border border-secondary text-secondary font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">Decline</button>
                    </div>

                </div>
            </div>


            <!--privacy and policy Modal -->
            <div id="privacyModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-3/4">
                    <h2 class="text-2xl font-bold mb-4 text-center">Privacy & Policy</h2>
                    <div class=" bg-tertiary px-6 py-6 shadow-md rounded-md ">
                        <p class="text-orange-500 py-4">Last Updated: 2023/07/17</p>
                        <div class=" text-center" id="welcome">
                            <p>At [Trend Hub], we value the privacy and security of our users. This Privacy Policy outlines how we collect, use, disclose, and protect the information you provide when using our website or engaging in transactions with us. By accessing or using our website, you agree to the terms and conditions of this Privacy Policy.</p>
                            <br>
                        </div>
                        <div class="text-black h-60 overflow-y-auto" id="privacyText">

                            <p class="font-bold">Information We Collect</p>a. Personal Information: We may collect personal information such as your name, email address, shipping address, billing address, phone number, and payment information when you create an account, place an order, or communicate with us.b. Usage Information: We collect non-personal information about your interactions with our website, including your IP address, browser type, device information, and browsing activities.
                            <br><br>
                            <p class="font-bold">Data Security</p>We take the security of your personal information seriously and employ industry-standard measures to safeguard it against unauthorized access, disclosure, alteration, and destruction. We use secure socket layer (SSL) technology to encrypt data during transmission. However, no method of data transmission or storage is 100% secure, and we cannot guarantee absolute security.
                            <br><br>
                            <p class="font-bold">Use of Information</p>a. Personal Information: We use your personal information to process your orders, provide customer support, send order confirmations and updates, personalize your shopping experience, and communicate with you about our products, promotions, and offers.b. Usage Information: We may use usage information to improve our website, analyze trends, and gather demographic information.
                            <br><br>
                            <p class="font-bold">Changes to this Privacy and Policy</p> We may update this Privacy and Policy page from time to time. Any changes will be posted on this page with a revised date. We encourage you to review this page periodically to stay informed about how we protect your personal information.


                        </div>
                    </div>

                    <div class="mt-4 flex justify-around space-x-4">
                        <button type="button" id="acceptPrivacy" class="bg-secondary shadow-md w-1/3 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-red-300">Accept Privacy</button>
                        <button type="button" id="declinePrivacy" class="bg-primary shadow-md w-1/3 border border-secondary text-secondary font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">Decline</button>
                    </div>

                </div>
            </div>





        </form>
    </div>




    <script>
        const registerBtn = document.getElementById("register");
        const registeredModelBox = document.getElementById("registrationModal");
        // registerBtn.addEventListener("click", () => registeredModelBox.classList.remove("hidden"));

        // JavaScript to handle the modal
        // document.getElementById("closeModal").addEventListener("click", () => {
        //     document.getElementById("registrationModal").classList.add("hidden");
        // });
        // JavaScript to handle modal open and close and checkbox behavior
        const openModalBtn = document.getElementById('openModalBtn');
        const termText = document.getElementById('term');
        const modal = document.getElementById('modal');
        const acceptBtn = document.getElementById('accept');
        const declineBtn = document.getElementById('decline');
        const checkbox = document.querySelector('.form-checkbox');
        const checkboxTerms = document.querySelector('.form-checkbox#terms');
        const checkboxPrivacy = document.querySelector('.form-checkbox#privacy');
        const openModalPrivacy = document.getElementById('openPrivacyModal');
        const privacyText = document.getElementById('privacyText');
        const privacyModal = document.getElementById('privacyModal');
        const acceptBtnPrivacy = document.getElementById('acceptPrivacy');
        const declineBtnPrivacy = document.getElementById('declinePrivacy');

        function updateRegisterBtn() {
            if (checkboxTerms.checked && checkboxPrivacy.checked) {
                registerBtn.removeAttribute("disabled");
                registerBtn.classList.remove("opacity-50");
                registerBtn.classList.add("opacity-100");
            } else {
                registerBtn.setAttribute("disabled", "disabled");
                registerBtn.classList.add("opacity-50");
            }
        }


        // function updateAcceptTermBtn() {
        //     if (termText.scrollHeight - termText.scrollTop >= termText.clientHeight) {
        //         acceptBtn.removeAttribute('disabled');
        //         acceptBtn.classList.remove('opacity-50');
        //         acceptBtn.classList.add('opacity-100');
        //     } else {
        //         acceptBtn.setAttribute('disabled', 'true');
        //         acceptBtn.classList.remove('opacity-100');
        //         acceptBtn.classList.add('opacity-50');
        //     }
        // }

        acceptBtn.setAttribute("disabled", "disabled");
        acceptBtn.classList.add("opacity-50");

        function updateAcceptTermBtn() {
            if (termText.scrollHeight - termText.scrollTop == termText.clientHeight) {
                acceptBtn.removeAttribute("disabled");
                acceptBtn.classList.remove("opacity-50");
                acceptBtn.classList.add("opacity-100");
            }
        }
        
        function updateAcceptPrivacyBtn() {
            if (privacyText.scrollHeight - privacyText.scrollTop == privacyText.clientHeight) {
                acceptBtnPrivacy.removeAttribute("disabled");
                acceptBtnPrivacy.classList.remove("opacity-50");
                acceptBtnPrivacy.classList.add("opacity-100");
            }
        }
        acceptBtnPrivacy.setAttribute("disabled", "disabled");
        acceptBtnPrivacy.classList.add("opacity-50");

       

        checkboxTerms.addEventListener('change', updateRegisterBtn);
        checkboxPrivacy.addEventListener('change', updateRegisterBtn);

        updateRegisterBtn();

        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        acceptBtn.addEventListener('click', () => {
            checkboxTerms.checked = true;
            checkbox.checked = true;
            modal.classList.add('hidden');
        });

        declineBtn.addEventListener('click', () => {
            checkboxTerms.checked = false;
            checkbox.checked = false;
            modal.classList.add('hidden');
        });

        openModalPrivacy.addEventListener('click', () => {
            privacyModal.classList.remove('hidden');
        });

        acceptBtnPrivacy.addEventListener('click', () => {
            checkboxPrivacy.checked = true;
            checkbox.checked = true;
            privacyModal.classList.add('hidden');
        });

        declineBtnPrivacy.addEventListener('click', () => {
            checkboxPrivacy.checked = false;
            checkbox.checked = false;
            privacyModal.classList.add('hidden');
        });
        termText.addEventListener('scroll', updateAcceptTermBtn);
        privacyText.addEventListener('scroll', updateAcceptPrivacyBtn);
    </script>
</body>

</html>

<?php
$_SESSION["emailError"] = "";
$_SESSION["pwdError"] = "";
$_SESSION["mbusinessName"] = "";
$_SESSION["mLicense"] = "";
$_SESSION["mName"] = "";
$_SESSION["mAddress"] = "";
$_SESSION["mEmail"] = "";
$_SESSION["mPhone"] = "";
?>