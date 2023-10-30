$(document).ready(function() {
    //Show Summary
    $(document).on("click", ".viewMerchantOrderDetail", function() {
        $(".viewMerchantOrderDetailModal").removeClass("hidden");
        $.ajax({
            url: "../../Controller/orderList/merchantOrders/modalShowDetailController.php",
            type: "POST",
            data: {
                id: $(this).attr("id"),
            },
            success: function(result) {
                let orderDetail = JSON.parse(result);
                
                $("#detailOrderId").text(orderDetail[0].id);
                $("#detailOrderDate").text(orderDetail[0].create_date);
                $("#detailCustomerName").text(orderDetail[0].c_name);
                if(orderDetail[0].order_status == 0){
                    $("#detailOrderStatus").text("Pending");
                }else{
                    $("#detailOrderStatus").text("Completed");
                }
                $("#detailPaymentType").text(orderDetail[0].payment_method);
                if(orderDetail[0].payment_status == 0){
                    $("#detailPaymentStatus").text("Pending");
                }else{
                    $("#detailPaymentStatus").text("Completed");
                }
                $("#detailCustomerAddress").text(orderDetail[0].address);
                $("#detailCustomerPhone").text(orderDetail[0].c_phone);
            },
            error: function(error) {
                console.log(error);
            },
        });

        $.ajax({
            url: "../../Controller/orderList/merchantOrders/modalShowSummaryController.php",
            type: "POST",
            data: {
                id: $(this).attr("id"),
            },
            success: function(result) {
                let orderSummary = JSON.parse(result);
                $("#productNameList").empty();
                $("#productItemList").empty();
                $("#productPriceList").empty();
                for (const order of orderSummary) {
                    $("#productNameList").append(`<p class="mb-3">${order.p_name}</p>`);
                    $("#productItemList").append(`<p class="mb-3">${order.qty}</p>`);
                    $("#productPriceList").append(`<p class="mb-3">${order.total_amt} Ks</p>`);
                    $("#subTotal").text((order.totalOrderAmount - order.delivery_fee) + " Ks");
                    $("#deliveryAmt").text(order.delivery_fee + " Ks");
                    $("#totalPrice").text(order.totalOrderAmount + " Ks");
                }
            },
            error: function(error) {
                console.log(error);
            },
        });
    })
    //end summary

    //Hide Detail
    $("#closeDetailModal").click(function() {
        $(".viewMerchantOrderDetailModal").addClass("hidden");
    })
});