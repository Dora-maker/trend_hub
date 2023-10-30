document.getElementById("photo").onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
      files = tgt.files;
  
    // FileReader support
    if (FileReader && files && files.length) {
      var fr = new FileReader();
      fr.onload = function () {
        document.getElementById("profile").src = fr.result;
      };
      fr.readAsDataURL(files[0]);
    }
  
    // Not supported
    else {
      // fallback -- perhaps submit the input to an iframe and temporarily store
      // them on the server until the user's session ends.
    }
  };
  
  
//  
// for mobile view
$(document).ready(function() {
    var wishToggle = false;
    var orderToggle = false;
    $(window).resize(function() {
        if (wishToggle) {
            if ($(window).width() <= 768 && (!$("#wishlistDestop").hasClass("hidden"))) {

                $("#mobile-wishlist").trigger("click");
            } else if ($(window).width() >= 768 && ($("#wishlistDestop").hasClass("hidden"))) {

                $("#menu-wishlist").trigger("click");
            }
        }

        if (orderToggle) {
            if ($(window).width() <= 768 && (!$("#orderHistoryDestop").hasClass("hidden"))) {

                $("#mobile-order").trigger("click");
            } else if ($(window).width() >= 768 && ($("#orderHistoryDestop").hasClass("hidden"))) {

                $("#menu-order-history").trigger("click");
            }
        }

    });



    $("#mobile-user").click(function() {
        wishToggle = false;
        orderToggle = false;
        $("#profileEdit").removeClass("hidden");
        $(".wishlistMobile").addClass("hidden");
        $("#wishlistDestop").addClass("hidden");
        $("#orderHistoryDestop").addClass("hidden");
        $(".orderHistoryMobile").addClass("hidden");
        $("#notification").addClass("hidden");
    });

    $("#mobile-wishlist").click(function() {
        wishToggle = true;
        orderToggle = false;
        $("#profileEdit").addClass("hidden");
        $(".wishlistMobile").removeClass("hidden");
        $("#wishlistDestop").addClass("hidden");
        $(".orderHistoryMobile").addClass("hidden");
        $("#orderHistoryDestop").addClass("hidden");
        $("#notification").addClass("hidden");
    });

    $("#mobile-order").click(function() {
        wishToggle = false;
        orderToggle = true;

        $("#profileEdit").addClass("hidden");
        $(".wishlistMobile").addClass("hidden");
        $("#wishlistDestop").addClass("hidden");
        $(".orderHistoryMobile").removeClass("hidden");
        $("#orderHistoryDestop").addClass("hidden");
        $("#notification").addClass("hidden");
    });
    $("#mobile-notify").click(function() {
        wishToggle = false;
        orderToggle = false;
        $("#profileEdit").addClass("hidden");
        $(".wishlistMobile").addClass("hidden");
        $("#wishlistDestop").addClass("hidden");
        $("#orderHistoryDestop").addClass("hidden");
        $(".orderHistoryMobile").addClass("hidden");
        $("#notification").removeClass("hidden");
    });

    $("#menu-user-info").click(function() {
        wishToggle = false;
        orderToggle = false;
        $("#profileEdit").removeClass("hidden");
        $("#wishlistDestop").addClass("hidden");
        $("#orderHistoryDestop").addClass("hidden");
        $("#notification").addClass("hidden");
        $(".wishlistMobile").addClass("hidden");
        $(".orderHistoryMobile").addClass("hidden");
    });

    $("#menu-wishlist").click(function() {
        wishToggle = true;
        orderToggle = false;
        $("#profileEdit").addClass("hidden");
        $("#wishlistDestop").removeClass("hidden");
        $(".wishlistMobile").addClass("hidden");
        $(".orderHistoryMobile").addClass("hidden");
        $("#orderHistoryDestop").addClass("hidden");
        $("#notification").addClass("hidden");
    });

    $("#menu-order-history").click(function() {
        wishToggle = false;
        orderToggle = true;
        $("#profileEdit").addClass("hidden");
        $("#wishlistDestop").addClass("hidden");
        $(".wishlistMobile").addClass("hidden");
        $("#orderHistoryDestop").removeClass("hidden");
        $(".orderHistoryMobile").addClass("hidden");
        $("#notification").addClass("hidden");
    });

    $("#menu-notification").click(function() {
        wishToggle = false;
        orderToggle = false;
        $("#profileEdit").addClass("hidden");
        $("#wishlistDestop").addClass("hidden");
        $("#orderHistoryDestop").addClass("hidden");
        $("#notification").removeClass("hidden");
        $(".wishlistMobile").addClass("hidden");
        $(".orderHistoryMobile").addClass("hidden");
    });

    $("#logoutBtn").click(function() {
        wishToggle = false;
        orderToggle = false;
        $("#logoutModal").toggle();
    });

    $("#mobile-logout").click(function() {
        wishToggle = false;
        orderToggle = false;
        $("#logoutModal").toggle();
    });

    $("#confirmLogout").click(function() {
        wishToggle = false;
        orderToggle = false;
        $("#logoutModal").toggle();
    });
    $("#cancelLogout").click(function() {
        wishToggle = false;
        orderToggle = false;
        $("#logoutModal").toggle();
    });

    $("#save-profile-btn").click(function() {
        wishToggle = false;
        orderToggle = false;
        $("#modal").toggle();
    });

    $("#close-modal-btn").click(function() {
        wishToggle = false;
        orderToggle = false;
        $("#modal").toggle();
    });
});
