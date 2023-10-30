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


document.getElementById("editFile_upload").onchange = function (evt) {
    var tgt = evt.target || window.evt.srcElement,
      files = tgt.files;
  
    // FileReader support
    if (FileReader && files && files.length) {
      var fr = new FileReader();
      fr.onload = function () {
        document.getElementById("editImage").src = fr.result;
      };
      fr.readAsDataURL(files[0]);
    }
  
    // Not supported
    else {
      // fallback -- perhaps submit the input to an iframe and temporarily store
      // them on the server until the user's session ends.
    }
  };




$(document).ready(function () {

    //Admin Product Edit Model Box
    $(document).on("click", ".editProduct", function () {
    $("#modalEdit").removeClass("hidden");

    $.ajax({
      url: "../../Controller/manageProducts/adminEditProductShowController.php",
      type: "POST",
      data: {
        id: this.id,
      },
      success: function (result) {
        let products = JSON.parse(result);
        $("#editID").val(products[0].id);
        $("#editCategory").val(products[0].category_name);
        $("#editProductName").val(products[0].p_name);
        $("#editBrand").val(products[0].brand_name);
        $("#editSellPrice").val(products[0].sell_price);
        $("#editBuyPrice").val(products[0].buy_price);
        $("#editQuantity").val(products[0].p_stock);
        $("#editImage").attr("src", "../../.." + products[0].p_path);
        $("#previousPath").val(products[0].p_path);
        $("#editProductDetail").val(products[0].p_detail);
        $("#editProductDescription").val(products[0].p_description);
      },
      error: function (error) {
        console.log(error);
      },
    });
  });

  //Admin Product Delete Model Box
  $(document).on("click", ".deleteProduct", function (){
    $("#modal1").removeClass("hidden");

    $.ajax({
      url: "../../Controller/manageProducts/adminDeleteProductShowController.php",
      type: "POST",
      data: {
        id: $(this).attr("deleteID"),
      },
      success: function (result) {
        let product = JSON.parse(result);
        $("#deleteProductName").text(product[0].p_name);
        $("#deleteProductImg").attr("src", "../../.." + product[0].p_path);
        $("#deleteProductID").val(product[0].id);
      },
      error: function (error) {
        console.log(error);
      },
    });
  })

  //Admin Product Delete
  $("#confirmDeleteProduct").click(function (){
    $("#modal1").addClass("hidden");

    $.ajax({
      url: "../../Controller/manageProducts/adminDeleteProductController.php",
      type: "POST",
      data: {
        id: $("#deleteProductID").val(),
      },
      success: function (result) {
        window.location.href = "../../Controller/manageProducts/adminProductController.php";
      },
      error: function (error) {
        console.log(error);
      },
    });
  })

  $("#closeModal1,#cancelDeleteProduct").click(function (){
    $("#modal1").addClass("hidden");
  })


  $("#save").click(function () {
    $("#modalEdit").addClass("hidden");
  });

  $("#openModalButton").on("click", function () {
    $("#myModal").removeClass("hidden");
  });

  $("#closeModalButton").on("click", function () {
    $('#myModal').addClass('hidden');
  });

  //Show Detail
  $(document).on("click", ".showDetail", function() {
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
  })

  //Hide Detail
  $("#hideDetail").click(function (){
    $("#modalDetail").addClass("hidden");
  })

      

  // Hide review 
  $("#hideReview").click(function (){
    $("#modalReview").addClass("hidden");
  })

  //Sorting
  $("#dropdown").change(function (){
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
            <td class="p-3 text-center cursor-pointer showDetail" detailID="${product.id}">
                ${count++}
            </td>
            <td class="p-3 text-center cursor-pointer showDetail" detailID="${product.id}">
              ${product.p_name}

            </td>
            <td class="p-3 text-center cursor-pointer showDetail" detailID="${product.id}">
            ${product.category_name}
            </td>

            <td class="p-3 text-center cursor-pointer showDetail" detailID="${product.id}">
            ${product.p_stock}

            </td>
            <td class="p-3 text-center cursor-pointer showDetail" detailID="${product.id}">
            ${product.buy_price}
            </td>
            <td class="p-3 text-center cursor-pointer showDetail" detailID="${product.id}">
            ${product.sell_price}
            </td>
            <td class="p-3 text-center  space-x-2 ">
                <span id="${product.id}" class="editProduct px-4 py-2 cursor-pointer bg-[#396C21] text-white rounded-md">EDIT</span>
                <span deleteID="${product.id}" class="deleteProduct px-4 py-2 cursor-pointer bg-[#AC2E2E] text-white rounded-md">DELETE</span>
            </td>
        </tr>
            `
          )
        }     
      },
      error: function (error) {
        console.log(error);
      },
    });


  })



});
