$(document).ready(function () {
    //in admin order.php
    $("#deliRegion").change(function () {
        $.ajax({
            url: "../../Controller/checkout/townshipOptionController.php",
            type: "POST",
            data: {
                regionCheckOutId: $(this).val()
            },
            success: function (res) {
                let arrays = JSON.parse(res);
                let townshipLists = arrays[0];
                let deliFee  = arrays[1];
                $("#deliTownship").empty();
                let oldDeliFee = $("#hiddenDeliFee").val();
                let oldGrandTotal = $("#hiddenGrandTotal").val();
                let oldSubTotal = oldGrandTotal - oldDeliFee;
                let newGrandTotal = oldSubTotal + deliFee[0]["delivery_fee"];
                $("#deliFee").empty();
                $("#grandTotal").empty();

                for (const township of townshipLists) {
                    $("#deliTownship").append(
                        `
                        <option value="${township.id}" ${township === townshipLists[0] ? "selected" : ""}>
                        ${township.name}
                        </option>
                        `
                    );
                }
                $("#deliFee").append(
                    deliFee[0]["delivery_fee"].toLocaleString() +" Ks"
                ); 
                $("#grandTotal").append(
                    newGrandTotal.toLocaleString() +" Ks"
                );                
            },
            error: function (error) {
                console.log(error);
            }
        })
    });
});