document.getElementById("file_upload").onchange = function (evt) {
  var tgt = evt.target || window.evt.srcElement,
    files = tgt.files;

  // FileReader support
  if (FileReader && files && files.length) {
    var fr = new FileReader();
    fr.onload = function () {
      document.getElementById("photoimg").src = fr.result;
    };
    fr.readAsDataURL(files[0]);
  }

  // Not supported
  else {
    // fallback -- perhaps submit the input to an iframe and temporarily store
    // them on the server until the user's session ends.
  }
};

  //merchant Product Delete Model Box
  $(document).on("click", ".delete", function () {
    $("#deleteModal").removeClass("hidden");

    $.ajax({
      url: "../../Controller/productSubmission/merchantDeleteProductShowController.php",
      type: "POST",
      data: {
        id: $(this).attr("deleteId"),
      },
      success: function (res) {
        let mproduct = JSON.parse(res);
        console.log(mproduct);
        $("#deleteProductName").text(mproduct[0].p_name);
        $("#deleteProductImg").attr("src", "../../.." + mproduct[0].p_path);
        $("#deleteProductID").val(mproduct[0].id);
        console.log($("#deleteProductID").val());
      },
      error: function (error) {
        console.log(error);
      },
    });
  });

  //submit Product Delete
  $("#confirmDeleteProduct").click(function () {
    $("#deleteModal").addClass("hidden");

    $.ajax({
      url: "../../Controller/productSubmission/merchantDeleteProductController.php",
      type: "POST",
      data: {
        id: $("#deleteProductID").val(),
      },
      success: function (result) {
        window.location.href =
          "http://localhost/Trend_HUB/Merchant/View/productSubmission/productSubmission.php";
      },
      error: function (error) {
        console.log(error);
      },
    });
  });

  $("#closeModal1,#cancelDeleteProduct").click(function () {
    $("#deleteModal").addClass("hidden");
  });

  $("#save").click(function () {
    $("#modalEdit").addClass("hidden");
  });

  $("#openModalButton").on("click", function () {
    $("#myModal").removeClass("hidden");
  });

  $("#closeModalButton").on("click", function () {
    $("#myModal").addClass("hidden");
  });

  //Show Detail
  $(document).on("click", ".showDetail", function () {
    $("#modalDetail").removeClass("hidden");

    $.ajax({
      url: "../../Controller/manageProducts/viewDetailController.php",
      type: "POST",
      data: {
        id: $(this).attr("detailID"),
      },
      success: function (result) {
        let product = JSON.parse(result);
        $("#reviewID").val(product[0].id);
        $("#detailImg").attr("src", "../../.." + product[0].p_path);
        $("#detailTxt").text(product[0].p_detail);
        $("#detailBrand").text(product[0].brand_name);
        $("#detailMBrand").text(product[0].m_bname);
        $("#detailDesc").text(product[0].p_description);
      },
      error: function (error) {
        console.log(error);
      },
    });
  });

  //Hide Detail
  $("#hideDetail").click(function () {
    $("#modalDetail").addClass("hidden");
  });

  //Show Review
  $("#showReview").click(function () {
    $("#modalReview").removeClass("hidden");

    $.ajax({
      url: "../../Controller/manageProducts/viewReviewController.php",
      type: "POST",
      data: {
        id: $("#reviewID").val(),
      },
      success: function (result) {
        console.log(result);
        // let product = JSON.parse(result);
        // $("#reviewID").val(product[0].id);
        // $("#detailImg").attr("src", "../../.." + product[0].p_path);
        // $("#detailTxt").text(product[0].p_detail);
        // $("#detailBrand").text(product[0].brand_name);
        // $("#detailMBrand").text(product[0].m_bname);
        // $("#detailDesc").text(product[0].p_description);
      },
      error: function (error) {
        console.log(error);
      },
    });

    $("#modalDetail").addClass("hidden");
  });

  // Hide review
  $("#hideReview").click(function () {
    $("#modalReview").addClass("hidden");
  });

  //Sorting
  $("#dropdown").change(function () {
    $.ajax({
      url: "../../Controller/manageProducts/adminSortController.php",
      type: "POST",
      data: {
        sortText: $(this).val(),
      },
      success: function (result) {
        let products = JSON.parse(result);
        $("#sortResult").empty();
        let count = 1;
        for (const product of products) {
          $("#sortResult").append(
            `<tr class="bg-[#fffafa] group hover:scale-[0.99] transition-transform">
              <td class="p-3 text-center cursor-pointer showDetail" detailID="${
                product.id
              }">
                  ${count++}
              </td>
              <td class="p-3 text-center cursor-pointer showDetail" detailID="${
                product.id
              }">
                ${product.p_name}
  
              </td>
              <td class="p-3 text-center cursor-pointer showDetail" detailID="${
                product.id
              }">
              ${product.category_name}
              </td>
  
              <td class="p-3 text-center cursor-pointer showDetail" detailID="${
                product.id
              }">
              ${product.p_stock}
  
              </td>
              <td class="p-3 text-center cursor-pointer showDetail" detailID="${
                product.id
              }">
              ${product.buy_price}
              </td>
              <td class="p-3 text-center cursor-pointer showDetail" detailID="${
                product.id
              }">
              ${product.sell_price}
              </td>
              <td class="p-3 text-center  space-x-2 ">
                  <span id="${
                    product.id
                  }" class="editProduct px-4 py-2 cursor-pointer bg-[#396C21] text-white rounded-md">EDIT</span>
                  <span deleteID="${
                    product.id
                  }" class="deleteProduct px-4 py-2 cursor-pointer bg-[#AC2E2E] text-white rounded-md">DELETE</span>
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


