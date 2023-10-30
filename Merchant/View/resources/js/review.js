$(document).ready(function () {
    //Show Review
    $(".showReview").click(function () {
      
      
      $("#modalReview").removeClass("hidden");

  
  
      $.ajax({
        url: "../../Controller/allReview/productReviewController.php",
        type: "POST",
        data: {
          id:$(this).attr("reviewID")
   
        },
       
        success: function (result) {
          let reviews = JSON.parse(result);
          $("#reviewImg").attr("src", "../../.." + reviews[0].p_path);
          $("#reviewProductName").text(reviews[0].p_name);
          $("#customerReviews").empty();
          for (const review of reviews) {
            let customerRating = review.rating;
            let starRatingHTML = "";
            for (var i = 1; i <= 5; i++) {
              if (i <= customerRating) {
                starRatingHTML += '<span class="starColor">&#9733;</span>';
              } else {
                starRatingHTML += "<span>&#9733;</span>";
              }
            }
            $("#customerReviews").append(
              `
                  <div class="w-[900px] h-[100px] mx-auto bg-[#F7F7F7] p-2 mt-2">
                      <div class="w-[900px] h-[30px] relative">
                          <div class="profile flex ">
                         
                              <div class="w-[30px] h-[30px] rounded-full mt-1">
                                  <img class="leading-[30px] -mt-1" src="../resources/img/profile/default_pic" alt="">
                                  <div class="rating text flex">
                                      ${starRatingHTML}
                                  </div>
                              </div>
                              <p class="font-semibold text-lg px-3 ml-6">${review.c_name}</p>
                              <div>
                                  <span class="absolute right-4">${review.create_date}</span>
                              </div>
                          </div>
                          <span class="mt-3 block">${review.review_text}</span>
                      </div>
                  </div>
                  `
            );
  
            if (review.reply_text != null) {
              $("#customerReviews").append(
                `
                        <div class="w-[850px] h-[100px]  ml-[100px] bg-[#F7F7F7] mt-2 px-3">
                        <div>
                            <span class="text-md font-semibold">
                                <img class="inline" src="../resources/img/profile/arrow.svg" alt="">
                                Reply to ${review.c_name}</span>
                        </div>
                        <div class="mt-1">
                          <p class="pl-2 pr-2 px-2">${review.reply_text}</p>
                        </div>
                    </div>
                        `
              );
            }
  
            if (review.reply_text == null) {
              $("#customerReviews").append(
                `
                      <div class="w-[850px] h-[100px]  ml-[100px] bg-[#F7F7F7] mt-2">
                      <div>
                          <span class="text-md font-semibold px-4">
                              <img class="inline" src="../resources/img/profile/arrow.svg" alt="">
                              Reply to ${review.c_name}</span>
                      </div>
                      <form class="mt-1" action="../../Controller/allReview/reviewReplyController.php" method="post">
                          <input type="hidden" name="replyCustomerID" value="${review.customer_id}">
                          <input type="hidden" name="productDetailID" value="${review.product_id}">
                          <input type="text" name="replyText" placeholder="Message" class="w-[320px] h-[40px] border border-black rounded-sm ml-5 pl-4" required>
                          <button name="replyToCustomer" type="submit" class="px-5 rounded-sm py-1 bg-[#304547] text-white">Reply</button>
                      </form>
                  </div>
                      `
              );
            }
          }
        },
        error: function (error) {
          console.log(error);
        },
      });
  
   
      $("#hideReview").click(function () {
        $("#modalReview").addClass("hidden");
      });
   
    });


  
    
  });
  
