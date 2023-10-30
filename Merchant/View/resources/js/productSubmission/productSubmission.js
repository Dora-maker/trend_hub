$(document).ready(function () {
    var uploadedImage = null;
    $("#addLogo").click(function () {
        $(".addLogoModal").toggle();
    });

    $("#file_input").on("change", function () {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            uploadedImage = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    $(".closeLogoAddModal").click(function () {
        $(".addLogoModal").toggle();
        if (uploadedImage) {
            $(".logoPhoto").attr("src", uploadedImage);
            $(".logoPhoto").removeClass("hidden");
            $("#addLogo").addClass("hidden");
        }
    });

    $("#addProductBtn").click(function () {
        $(".addProductModal").toggle();
    });

    $(".closeAddProductModal").click(function () {
        $(".addProductModal").toggle();
    });

    $("#logoutBtn").click(function () {
        $("#logoutModal").toggle();
    });

    $("#confirmLogout").click(function () {
        $("#logoutModal").toggle();
    });

    $("#cancelLogout").click(function () {
        $("#logoutModal").toggle();
    });


    $("#submitProductBtn").click(function () {
       
        $("#name").val($("#name").val());
        $("#storeName").val($("#storeName").val());
        $("#license").val($("#license").val());
        $("#email").val($("#email").val());
        $("#phone").val($("#phone").val());
        $("#address").val($("#address").val());
        $(".productSubmitData").remove();

       
    });

    $("#closeProductSubmitFinishModal").click(function () {
        $(".productSubmitFinishModal").addClass("hidden");
    });
});