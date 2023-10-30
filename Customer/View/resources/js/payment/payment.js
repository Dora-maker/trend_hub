$(document).ready(function () {
    $("#pay1").click(function (){
      $("#pay1").addClass("border-[#F36823]");
      $("#pay1").removeClass("border-black");
      $("#pay2").addClass("border-black");
      $("#pay2").removeClass("border-[#F36823]");
      $("#pay3").addClass("border-black");
      $("#pay3").removeClass("border-[#F36823]");
      $(".pay1").show();
      $(".cod").hide();
      $(".pay3").hide();
      $(".submit").show();
    })
  
    $("#pay2").click(function (){
      $("#pay2").addClass("border-[#F36823]");
      $("#pay2").removeClass("border-black");
      $("#pay1").addClass("border-black");
      $("#pay1").removeClass("border-[#F36823]");
      $("#pay3").addClass("border-black");
      $("#pay3").removeClass("border-[#F36823]");
      $(".pay1").hide();
      $(".pay3").hide();
      $(".cod").show();
      $("#pay1").addClass("disabled:opacity-75");
      $("#pay3").addClass("disabled:opacity-75");
      $(".submit").hide();
    })
  
    $("#pay3").click(function (){
      $("#pay3").addClass("border-[#F36823]");
      $("#pay3").removeClass("border-black");
      $("#pay1").addClass("border-black");
      $("#pay1").removeClass("border-[#F36823]");
      $("#pay2").addClass("border-black");
      $("#pay2").removeClass("border-[#F36823]");
      $(".pay3").show();
      $(".pay1").hide();
      $(".cod").hide();
      $(".submit").show();
    })
  
    $("#closeModalButton").click(function (){
      $(".cod").hide();
    })
  });





