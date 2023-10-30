$(document).ready(function() {
    var $saveDeliInfoBtn = $("#saveDeliInfoBtn");
    var $placeOrderBtn = $("#placeOrderBtn");

    $saveDeliInfoBtn.click(function() {
        $placeOrderBtn.removeClass("bg-opacity-50");
        $placeOrderBtn.prop("disabled", false);

        $.ajax({
            url: "../../Controller/checkout/saveBtnClickedController.php",
            type: "POST",
            data: {
                regionCheckOutId: $("#deliRegion").val(),
                townshipCheckOutId: $("#deliTownship").val(),
                addressCheckout: $("#deliAddress").val()
            },
            success: function (res) {
                console.log("finish");
            },
            error: function (error) {
                console.log(error);
            }
        })
    });
});
