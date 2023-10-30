$(document).ready(() => {
    var imageHoverUrls = {
        "allProductHover": "../resources/img/sideBarImg/all product hover.png",
        "productSubmitHover": "../resources/img/sideBarImg/product submission hover.png",
        "allOrderHover": "../resources/img/sideBarImg/all order hover.png",
        "reviewHover": "../resources/img/sideBarImg/review hover.png",
        "contactHover": "../resources/img/sideBarImg/contact hover.png",
        "financialHover": "../resources/img/sideBarImg/financial hover.png",
        "notiHover": "../resources/img/sideBarImg/notification hover.png",
        "editProfileHover": "../resources/img/sideBarImg/edit profile hover.png",
        "logOutHover": "../resources/img/sideBarImg/logout hover.png"
    };

    $(".hoverImg").each(function() {
        var img = $(this).find("img");
        var imgId = img.attr("id");

        var originalSrc = img.attr("src");
        // Set the new image url when hovering over the p element
        $(this).hover(
            () => {
                img.attr("src", imageHoverUrls[imgId]);
            }, () => {
                img.attr("src", originalSrc);
            }
        );
    });

    $("#toggleSideBar").click(() => {
        sideShowHide()
    });
});

function sideShowHide() {
    ($("#space").hasClass("hidden")) ? $("#space").removeClass("hidden"): $("#space").addClass("hidden");

    ($(".hoverImg").hasClass("justify-center")) ? $(".hoverImg").removeClass("justify-center"): $(".hoverImg").addClass("justify-center");
    ($(".mainPage").hasClass("ml-40")) ? $(".mainPage").removeClass("ml-40"): $(".mainPage").addClass("ml-40");

    if ($("#sideBarContainer").hasClass("expanded")) {
        $("#sideBarContainer").removeClass("expanded absolute top-0 left-0");
    } else {
        $("#sideBarContainer").addClass("expanded absolute top-0 left-0");
    }
    $(".sideFull").toggle();
}



    




