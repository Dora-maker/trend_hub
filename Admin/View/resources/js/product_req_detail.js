$(document).ready(function (){

    $(".check").click(function (){
        $("#myModalEdit").toggle();
    })

    $("#closeModalButton,#reject,#approve").click(function (){
        $("#myModalEdit").toggle();
    })

})