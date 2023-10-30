$(document).ready(function() {
    //in all customer.php
    $("#dropdownAllCustomer").change(function () {
        $.ajax({
            url: "../../Controller/dropDown/customer/sortAllCustomerController.php",
            type: "POST",
            data: {
                sortBy: $(this).val(),
                searchText: $("#searchAllCustomers").val()
            },
            cache: false,
            success: function (res) {
                $(".searchResult").empty();
                let allCustomers = JSON.parse(res);
                let num = 1;
                for (const customer of allCustomers) {
                    customerListSorted(customer, num);
                    num++;
                }
            },
            error: function (error) {
                console.log(error);
            }
        })
    });

    //in new customer.php
    $("#dropDownNewCustomer").change(function () {
        $.ajax({
            url: "../../Controller/dropDown/customer/sortNewCustomerController.php",
            type: "POST",
            data: {
                sortBy: $(this).val(),
                searchText: $("#searchNewCustomers").val()
            },
            cache: false,
            success: function (res) {
                $(".searchResult").empty();
                let newCustomers = JSON.parse(res);
                let num = 1;
                for (const customer of newCustomers) {
                    customerListSorted(customer, num);
                    num++;
                }
            },
            error: function (error) {
                console.log(error);
            }
        })
    });

    // in total order .php
    $("#dropDownTotalOrders").change(function() {
        let selectedOption = $(this).val();
        let sortOrder = "asc";
        let sortColumn = 2;
        console.log(selectedOption);
        switch (selectedOption) {
            case "Name":
                sortColumn = 2;
                break;
            case "Des Name":
                sortColumn = 2;
                sortOrder = "desc";
                break;
            case "Total Amount":
                sortColumn = 4;
                break;
            case "Des Total Amount":
                sortColumn = 4;
                sortOrder = "desc";
                break;
            case "Order Times":
                sortColumn = 5;
                break;
            case "Des Order Times":
                sortColumn = 5;
                sortOrder = "desc";
                break;
        }

        sortTable(sortColumn, sortOrder);
        $num = 1;
        $(".searchResult tr td:first-child").each(function(index) {
            $(this).text($num++);
        });
    });

    //in banned customer.php
    $("#dropDownBannedCustomer").change(function () {
        $.ajax({
            url: "../../Controller/dropDown/customer/sortBannedCustomerController.php",
            type: "POST",
            data: {
                sortBy: $(this).val(),
                searchText: $("#searchBannedCustomers").val()
            },
            cache: false,
            success: function (res) {
                $(".searchResult").empty();
                let banCustomers = JSON.parse(res);
                let num = 1;
                for (const customer of banCustomers) {
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

function customerListSorted(obj, num) {
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
    )
}

function sortTable(column, order) {
    let rows = $(".searchResult tr").toArray();
    rows.sort(function(a, b) {
        let aValue = $(a).find(`td:nth-child(${column})`).text();
        let bValue = $(b).find(`td:nth-child(${column})`).text();

        if (column === 4 || column === 5) {
            aValue = parseInt(aValue) || 0;
            bValue = parseInt(bValue) || 0;
            if (order === "asc") {
                return aValue - bValue;
            } else {
                return bValue - aValue;
            }
        } else {
            if (order === "asc") {
                return aValue.localeCompare(bValue);
            } else {
                return bValue.localeCompare(aValue);
            }
        }
    });
    $(".searchResult").empty().append(rows);
}