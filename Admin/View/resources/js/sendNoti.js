$(document).ready(function(){

    $("#notiTo").change(function(){
        let notiTo = $(this).val();
        if (notiTo == "allCustomers" || notiTo == "allMerchants") {
            $("#emailBox").addClass("hidden");
            $("#emailInput").attr("disabled", true);
        }else{
            $("#emailBox").removeClass("hidden");
            $("#emailInput").removeAttr("disabled");
        }
    })
    
})