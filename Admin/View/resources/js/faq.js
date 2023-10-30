document.getElementById("faq-select").addEventListener("change", function() {
    var selectedValue = this.value;
    var faqs = document.querySelectorAll(".faq");
  
    for (var i = 0; i < faqs.length; i++) {
      if (faqs[i].id === selectedValue) {
        faqs[i].style.display = "block";
      } else {
        faqs[i].style.display = "none";
      }
    }
  });
  
  
  document.getElementById("faq-select").value = "faq1";
  document.getElementById("faq1").style.display = "block";