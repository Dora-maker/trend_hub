$(document).ready(function () {
    //in merchant order.php
    $("#searchMerchantOrder").keyup(function () {
        $.ajax({
            url: "../../Controller/search/orderList/merchantOrderSearchController.php",
            type: "POST",
            data: {
                searchText: $(this).val()
            },
            success: function (res) {
                $(".searchResult").empty();
                let arrays = JSON.parse(res);
                let adminOrders = arrays[0];
                let adminOrderDetail = arrays[1];
                for (const order of adminOrders) {
                    let totalItem = 0;
                    for (const detail of adminOrderDetail) {
                        if (detail.order_id == order.id) {
                            totalItem += detail.qty;
                        }
                    }
                    let orderStatus = (order.order_status == 0) ? "Pending" : "Completed";
                    let paymentStatus = (order.payment_status == 0) ? "Pending" : "Completed";

                    $(".searchResult").append(
                        `
                        <tr class="bg-[#fffafa]">
                            <td class="p-3 text-center">
                            ${order.id}
                            </td>
                            <td class="p-3 text-center">
                            ${order.m_name}
                            </td>
                            <td class="p-3 text-center">
                                ${totalItem}
                            </td>
                            <td class="p-3 text-center">
                            ${order.total_amt} Ks
                            </td>
                            <td class="p-3 text-center">
                            ${order.payment_method}
                            </td>
                            <td class="p-3 text-center">
                            ${paymentStatus}
                            </td>
                            <td class="p-3 text-center">
                            ${order.create_date}
                            </td>
                            <td class="p-3 text-center font-semibold">
                            ${orderStatus}
                            </td>
                            <td class="p-3 text-center space-x-2">
                                <span id="${order.id}" class="viewMerchantOrderDetail px-4 py-2 cursor-pointer bg-[#396C21] text-white rounded-md">View Detail</span>
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