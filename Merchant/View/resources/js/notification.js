$(document).ready(function () {

  $(document).on("click",".noti", function () {
    const index = $(this).index();
    $(".message").hide();
    $(".message").eq(index).show();
  });

  $("#notiSort").on("change", function () {
    $.ajax({
      url: "../../Controller/notificationController.php",
      type: "POST",
      data: {
        sortText: $(this).val(),
      },
      success: function (result) {
        let contacts = JSON.parse(result);
        $("#leftSide").empty();
        const currentDate = new Date();
        const year = currentDate.getFullYear();
        const month = String(currentDate.getMonth() + 1).padStart(2, "0");
        const day = String(currentDate.getDate()).padStart(2, "0");
        const formattedDate = `${year}-${month}-${day}`;
        for (const contact of contacts) {
          let contactDate = 
            contact.create_date == formattedDate
              ? "Today"
              : contact.create_date;
          let name =
            contact.c_name != undefined
              ? contact.c_name + "(Customer)"
              : contact.m_name + "(Merchant)";
          $("#leftSide").append(
            `
                    <div class="noti h-30 bg-white shadow-lg px-4 py-3 mb-3 border hover:bg-pink-100 hover:border-secondary rounded cursor-pointer">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <img src="../resources/img/profile/notifyProfile.png" alt="">
                                <p class="px-2">${name}</p>
                            </div>
                            <p class="ml-56">${contactDate}</p>
                        </div>
                        <div class="px-6 w-[500px] overflow-hidden">
                                <p class="text-sm truncate">${contact.msg_text}</p>
                        </div>
                    </div>`
          );
        }


        $("#rightSide").empty();
        let counter = 1;
        
        for (const contact of contacts) {
            let showOrNot = (counter != 1) ? "hidden" : false; 
            $("#rightSide").append(
                `   <div class="message bg-white shadow-lg px-4 py-3 border rounded ${showOrNot}">
                        <div class="flex flex-row">
                            <div class="flex flex-row justify-start">
                                <img src="../resources/img/profile/notifyProfile.png" alt="">
                                <p class="px-2">To Admin</p>
                            </div>
                        </div>
                        <div class="px-6 mt-3">
                            <p class="text-sm">
                                ${contact.msg_text}
                            </p>
                        </div>
                    </div>`
            )
            counter++;
        }
        
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
});
