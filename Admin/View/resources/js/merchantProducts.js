$(document).ready(function (){

    $("#dropdown").change(function (){

        $.ajax({
            url: "../../Controller/manageProducts/merchantSortController.php",
            type: "POST",
            data: {
                sortText: $(this).val(),
            },
            success: function(result) {
                let products = JSON.parse(result);
                $("#sortResult").empty();
                let count = 1;
                for (const product of products) {
                    $("#sortResult").append(
                        `<tr class="bg-[#fffafa]">
                        <td class="p-3 text-center">
                        ${count++}
                        </td>
                        <td class="p-3 text-center">
                        ${product.m_name}
                        </td>
                        <td class="p-3 text-center">
                        ${product.brand_name}
                        </td>
                        <td class="p-3 text-center">
                        ${product.p_name}
                        </td>
                        <td class="p-3 text-center">
                        ${product.category_name}
                        </td>
                        <td class="p-3 text-center ">
                        ${product.sell_price}
                        </td>
                      </tr>`
                    )
                }
            },
            error: function(error) {
                console.log(error);
            },
        })
    })


})