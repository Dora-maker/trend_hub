$(document).ready(function () {
    //in all customer.php
    $("#searchAllCustomers").keyup(function () {
        ($(this).val() == "") ? $("#dropdownAllCustomer").val("c_name") : "";
        $.ajax({
            url: "../../Controller/search/customer/searchAllCustomerController.php",
            type: "POST",
            data: {
                searchText: $(this).val(),
                sortBy: $("#dropdownAllCustomer").val(),
            },
            success: function (res) {
                $(".searchResult").empty();
                let allCustomers = JSON.parse(res);
                let num = 1;
                for (const customer of allCustomers) {
                    customerList(customer, num);
                    num++;
                }
            },
            error: function (error) {
                console.log(error);
            }
        })
    });
    
    //in new customer.php
    $("#searchNewCustomers").keyup(function () {
        ($(this).val() == "") ? $("#dropDownNewCustomer").val("c_name") : "";
        $.ajax({
            url: "../../Controller/search/customer/searchNewCustomerController.php",
            type: "POST",
            data: {
                searchText: $(this).val(),
                sortBy: $("#dropDownNewCustomer").val(),
            },
            success: function (res) {
                $(".searchResult").empty();
                let newCustomers = JSON.parse(res);
                let num = 1;
                for (const customer of newCustomers) {
                    customerList(customer, num);
                    num++;
                }
            },
            error: function (error) {
                console.log(error);
            }
        })
    });

    //in new customer.php
    $("#searchBannedCustomers").keyup(function () {
        ($(this).val() == "") ? $("#dropDownBannedCustomer").val("c_name") : "";
        $.ajax({
            url: "../../Controller/search/customer/searchBannedCustomerController.php",
            type: "POST",
            data: {
                searchText: $(this).val(),
                sortBy: $("#dropDownBannedCustomer").val(),
            },
            success: function (res) {
                $(".searchResult").empty();
                let bannedCustomers = JSON.parse(res);
                let num = 1;
                for (const customer of bannedCustomers) {
                    $(".searchResult").append(
                        `
                        <tr class="bg-[#fffafa]">
                            <td class="p-3 text-center">${num}</td>
                            <td class="p-3 text-center">${customer.c_name}</td>
                            <td class="p-3 text-center">${customer.c_email}</td>
                            <td class="p-3 text-center">${customer.c_phone}</td>
                            <td class="p-3 text-center">${customer.c_address}</td>
                            <td class="p-3 text-center">${customer.create_date}</td>
                            <td class="p-3 text-center ">
                                <span class="banModal px-4 py-1 cursor-pointer bg-[#396C21] text-white rounded-md" onclick="permitCustomer('${customer.c_name}','${customer.c_email}')">PERMIT</span>
                            </td>
                        </tr>
                        `
                    )
                    num++;
                }
            },
            error: function (error) {
                console.log(error);
            }
        })
    });

});

function customerList(obj, num) {
    $(".searchResult").append(
        `
        <tr class="bg-[#fffafa]">
            <td class="p-3 text-center">${num}</td>
            <td class="p-3 text-center">${obj.c_name}</td>
            <td class="p-3 text-center">${obj.c_email}</td>
            <td class="p-3 text-center">${obj.c_phone}</td>
            <td class="p-3 text-center">${obj.c_address}</td>
            <td class="p-3 text-center">${obj.create_date}</td>
            <td class="p-3 text-center ">
                <span class="banModal px-4 py-1 cursor-pointer bg-[#AC2E2E] text-white rounded-md" onclick="banMerchant('${obj.c_name}', '${obj.c_email}')">BAN</span>
            </td>
        </tr>
        `
    );
}
