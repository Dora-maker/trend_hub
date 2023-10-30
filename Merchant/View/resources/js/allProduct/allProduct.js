$(document).ready(function () {
  $("#file_upload").on("change", function () {
    var fileInput = $(this)[0];

    if (fileInput.files && fileInput.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $(".p_Image").attr("src", e.target.result);
      };
      reader.readAsDataURL(fileInput.files[0]);
    }
  });

  $(".closeViewDetailModal").click(function () {
    $(".viewDetailModal").toggle();
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
  

  //Sorting
  $("#dropdown").change(function () {
    console.log($(this).val());
    $.ajax({
      url: "../../Controller/allProduct/sortMerchantProductController.php",
      type: "POST",
      data: {
        sortText: $(this).val(),
      
      },
    
      success: function (result) {
        let products = JSON.parse(result);
        
        $("#sortResult").empty();
        let counter = 0;
        let count = 1;
        for (const product of products) {
         counter ++;
          let rowClass = (counter % 2 === 0) ? 'bg-gray-200' : 'bg-white';
          $("#sortResult").append(
            `<tr class="productSubmitData ${rowClass}">
            <td class="p-2 text-center">${count++}</td>
            <td class="p-2 text-center">${product.p_name}</td>
            <td class="p-2 text-center">${product.category_name}</td>
            <td class="p-2 text-center">${product.p_stock}</td>
            <td class="p-2 text-center">${product.buy_price} Ks</td>
            <td class="p-2 text-center">${product.sell_price} Ks</td>
            <td class=" p-2 text-center font-semibold underline cursor-pointer">
            <a href="../../Controller/allProduct/productDetailShowController.php?id=${product.id}">View Detail</a> 
            </td>
            </tr>
            `
          );
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
});
