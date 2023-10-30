$(document).ready(function () {
    //in all merchant.php
    $("#searchAllMerchant").keyup(function () {
        ($(this).val() == "") ? $("#dropdownAllMerchant").val("m_name") : "";
        $.ajax({
            url: "../../Controller/search/merchant/searchAllMerchantController.php",
            type: "POST",
            data: {
                searchText: $(this).val(),
                sortBy: $("#dropdownAllMerchant").val(),
            },
            success: function (res) {
                $(".searchResult").empty();
                let allMerchants = JSON.parse(res);
                let num = 1;
                for (const merchant of allMerchants) {
                    merchantList(merchant, num);
                    num++;
                }
            },
            error: function (error) {
                console.log(error);
            }
        })
    });

    //in new merchant.php
    $("#searchNewMerchant").keyup(function () {
        ($(this).val() == "") ? $("#dropdownNewMerchant").val("m_name") : "";
        $.ajax({
            url: "../../Controller/search/merchant/searchNewMerchantController.php",
            type: "POST",
            data: {
                searchText: $(this).val()
            },
            success: function (res) {
                $(".searchResult").empty();
                let newMerchants = JSON.parse(res);
                let num = 1;
                for (const merchant of newMerchants) {
                    merchantList(merchant, num);
                    num++;
                }
            },
            error: function (error) {
                console.log(error);
            }
        })
    });

    //in pending merchant.php
    $("#searchPendingMerchant").keyup(function () {
        ($(this).val() == "") ? $("#dropdownPendingMerchant").val("m_name") : "";
        $.ajax({
            url: "../../Controller/search/merchant/searchPendingMerchantController.php",
            type: "POST",
            data: {
                searchText: $(this).val()
            },
            success: function (res) {
                $(".searchResult").empty();
                let pendingMerchants = JSON.parse(res);
                let num = 1;
                for (const merchant of pendingMerchants) {
                    let license = (merchant.m_licene != null) ? merchant.m_licene : "-";
                    $(".searchResult").append(
                        `
                        <tr class="bg-[#fffafa]">
                            <td class="p-3 text-center">${num}</td>
                            <td class="p-3 text-center">${merchant.m_bname}</td>
                            <td class="mName p-3 text-center">${merchant.m_name}</td>
                            <td class="mEmail p-3 text-center">${merchant.m_email}</td>
                            <td class="p-3 text-center">${merchant.m_phone}</td>
                            <td class="p-3 text-center">${merchant.m_address}</td>
                            <td class="p-3 text-center">${license}</td>
                            <td class="p-3 text-center">${merchant.create_date}</td>
                            <td class="p-3 text-center ">
                                <span class="px-4 py-2 cursor-pointer bg-[#396C21] text-white rounded-md" onclick="acceptMerchant('${merchant.m_name}','${merchant.m_bname}','${merchant.m_email}','${merchant.m_licene}')">ACCEPT</span>
                                <span class="px-4 py-2 cursor-pointer bg-[#AC2E2E] text-white rounded-md" onclick="rejectMerchant('${merchant.m_name}','${merchant.m_bname}','${merchant.m_email}','${merchant.m_licene}')">REJECT</span>
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

    //in banned merchant.php
    $("#searchBannedMerchant").keyup(function () {
        ($(this).val() == "") ? $("#dropdownBannedMerchant").val("m_name") : "";
        $.ajax({
            url: "../../Controller/search/merchant/searchBannedMerchantController.php",
            type: "POST",
            data: {
                searchText: $(this).val()
            },
            success: function (res) {
                $(".searchResult").empty();
                let bannedMerchants = JSON.parse(res);
                let num = 1;
                for (const merchant of bannedMerchants) {
                    let license = (merchant.m_licene != null) ? merchant.m_licene : "-";
                    $(".searchResult").append(
                        `
                        <tr class="bg-[#fffafa]">
                            <td class="p-3 text-center">${num}</td>
                            <td class="p-3 text-center">${merchant.m_bname}</td>
                            <td class="mName p-3 text-center">${merchant.m_name}</td>
                            <td class="mEmail p-3 text-center">${merchant.m_email}</td>
                            <td class="p-3 text-center">${merchant.m_phone}</td>
                            <td class="p-3 text-center">${merchant.m_address}</td>
                            <td class="p-3 text-center">${license}</td>
                            <td class="p-3 text-center">${merchant.create_date}</td>
                            <td class="p-3 text-center ">
                                <span class="banModal px-4 py-1 cursor-pointer bg-[#AC2E2E] text-white rounded-md" onclick="banMerchant('${merchant.m_name}', '${merchant.m_email}')">PERMIT</span>
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

function merchantList(obj, num) {
    let license = (obj.m_licene != null) ? obj.m_licene : "-";
    $(".searchResult").append(
        `
        <tr class="bg-[#fffafa]">
            <td class="p-3 text-center">${num}</td>
            <td class="p-3 text-center">${obj.m_bname}</td>
            <td class="mName p-3 text-center">${obj.m_name}</td>
            <td class="mEmail p-3 text-center">${obj.m_email}</td>
            <td class="p-3 text-center">${obj.m_phone}</td>
            <td class="p-3 text-center">${obj.m_address}</td>
            <td class="p-3 text-center">${license}</td>
            <td class="p-3 text-center">${obj.create_date}</td>
            <td class="p-3 text-center ">
                <span class="banModal px-4 py-1 cursor-pointer bg-[#AC2E2E] text-white rounded-md" onclick="banMerchant('${obj.m_name}', '${obj.m_email}')">BAN</span>
            </td>
        </tr>
        `
    )
}
