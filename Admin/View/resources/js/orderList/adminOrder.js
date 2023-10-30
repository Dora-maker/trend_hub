$(document).ready(function() {
    //Start of Change Status Modal Box
    $(document).on("click", ".changeStatus", function() {
        $(".changeStatusModal").removeClass("hidden");
        $.ajax({
            url: "../../Controller/orderList/adminOrders/modalShowChangeOrderStatus.php",
            type: "POST",
            data: {
                id: this.id,
            },
            success: function(result) {
                let orders = JSON.parse(result);
                $("#orderId").val(orders[0].id);
                $("#orderDate").val(orders[0].create_date);
                $("#customerName").val(orders[0].c_name);

                if (orders[0].order_status == 0) {
                    $("#orderStatus").val("Pending");
                    $("#orderStatus").prop("disabled", false);
                } else {
                    $("#orderStatus").val("Completed");
                    $("#orderStatus").prop("disabled", true);
                }

                if (orders[0].payment_status == 0) {
                    $("#paymentStatus").val("Pending");
                    $("#paymentStatus").prop("disabled", false);
                } else {
                    $("#paymentStatus").val("Completed");
                    $("#paymentStatus").prop("disabled", true);
                }

                $("#orderInput").val($("#orderStatus").val());
                $("#paymentInput").val($("#paymentStatus").val());

                if (($("#orderStatus").val() == "Completed") && ($("#paymentStatus").val() == "Completed")) {
                    $("#confirm").addClass("hidden");
                } else {
                    $("#confirm").removeClass("hidden");
                }
            },
            error: function(error) {
                console.log(error);
            },
        });
    });

    $("#orderStatus").change(function() {
        $("#orderInput").val($("#orderStatus").val());
        if ($("#paymentStatus").prop('disabled') == false) {
            $("#paymentStatus").val($("#orderStatus").val());
            $("#paymentInput").val($("#paymentStatus").val());
        }
    });

    $("#paymentStatus").change(function() {
        $("#paymentInput").val($("#paymentStatus").val());
        $("#orderStatus").val($("#paymentStatus").val());
        $("#orderInput").val($("#orderStatus").val());
    });

    $("#close").click(function() {
        $(".changeStatusModal").addClass("hidden");
    });

    $("#confirm").click(function() {
        $(".changeStatusModal").addClass("hidden");
    });
    //end of change status modal box

    //Show Summary
    $(document).on("click", ".showDetail", function() {
        $(".viewOrderDetailModal").removeClass("hidden");
        $.ajax({
            url: "../../Controller/orderList/adminOrders/modalShowOrderDetailController.php",
            type: "POST",
            data: {
                id: $(this).attr("detailID"),
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
            url: "../../Controller/orderList/adminOrders/modalShowOrderSummaryController.php",
            type: "POST",
            data: {
                id: $(this).attr("detailID"),
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
        $(".viewOrderDetailModal").addClass("hidden");
    })
});