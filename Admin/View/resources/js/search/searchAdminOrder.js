$(document).ready(function () {
    //in admin order.php
    $("#searchAdminOrder").keyup(function () {
        ($(this).val() == "") ? $("#dropDownAdminOrder").val("order_status0") : "";
        $.ajax({
            url: "../../Controller/search/orderList/adminOrderSearchController.php",
            type: "POST",
            data: {
                searchText: $(this).val(),
                sortBy: $("#dropDownAdminOrder").val(),
            },
            success: function (res) {
                let totalPending = 0;
                $(".searchResult").empty();
                $("#noOfPending").text(totalPending + " Order Pending");
                let arrays = JSON.parse(res);
                let adminOrders = arrays[0];
                let adminOrderDetail = arrays[1];
                for (const order of adminOrders) {
                    let totalItem = 0;
                    if(order.order_status == 0){
                        console.log(totalPending);
                        totalPending += 1;
                    }
                    $("#noOfPending").text(totalPending + " Order Pending");
                    for (const detail of adminOrderDetail) {
                        if (detail.order_id == order.id) {
                            totalItem += detail.qty;
                        }
                    }
                    let orderStatus = (order.order_status == 0) ? "Pending" : "Completed";
                    let paymentStatus = (order.payment_status == 0) ? "Pending" : "Completed";

                    $(".searchResult").append(
                        `
                        <tr class="bg-[#fffafa] group hover:scale-[0.99] transition-transform">
                            <td class="p-3 text-center cursor-pointer showDetail" detailID="${order.id}">
                            ${order.id}
                            </td>
                            <td class="p-3 text-center cursor-pointer showDetail" detailID="${order.id}">
                            ${order.c_name}
                            </td>
                            <td class="p-3 text-center cursor-pointer showDetail" detailID="${order.id}">
                                ${totalItem}
                            </td>
                            <td class="p-3 text-center cursor-pointer showDetail" detailID="${order.id}">
                            ${order.total_amt} Ks
                            </td>
                            <td class="p-3 text-center cursor-pointer showDetail" detailID="${order.id}">
                            ${order.payment_method}
                            </td>
                            <td class="p-3 text-center cursor-pointer showDetail" detailID="${order.id}">
                            ${paymentStatus}
                            </td>
                            <td class="p-3 text-center cursor-pointer showDetail" detailID="${order.id}">
                            ${order.create_date}
                            </td>
                            <td class="p-3 text-center font-semibold cursor-pointer showDetail" detailID="${order.id}">
                            ${orderStatus}
                            </td>
                            <td class="p-3 text-center space-x-2">
                                <span id="${order.id}" class="changeStatus px-4 py-2 cursor-pointer bg-[#396C21] text-white rounded-md">CHANGE</span>
                            </td>
                        </tr>
                        `
                    );
                }
            },
            error: function (error) {
                console.log(error);
            }
        })
    });
});