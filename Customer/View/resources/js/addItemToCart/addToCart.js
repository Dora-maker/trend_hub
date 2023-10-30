$(document).ready(() => {

  let currentItems =
    localStorage.getItem("currentItems") != null
      ? localStorage.getItem("currentItems")
      : 0;
  $(".cart_item").text(currentItems);


  $(".cartBtn").on("click", function () {
    let currentItemID = this.id;
    let currentMerchantID = $(this).attr("mID");
    if (localStorage.getItem("currentMerchant") != null) {
      let storageMerchantID = localStorage.getItem("currentMerchant");
      if (currentMerchantID == storageMerchantID) {
        var currentItem = $(".cart_item").text();
        $(".cart_item").text(Number(currentItem) + 1);
        localStorage.setItem("currentItems", Number(currentItem) + 1);

        addToCart(currentItemID);
      }else{
        window.alert("Must buy from same merchant!");
      }
    }else{
      localStorage.setItem("currentMerchant", currentMerchantID);
      var currentItem = $(".cart_item").text();
        $(".cart_item").text(Number(currentItem) + 1);
        localStorage.setItem("currentItems", Number(currentItem) + 1);

        addToCart(currentItemID);
    }
  })

  function addToCart(productID) {
    let cartItems = localStorage.getItem("cartItems");

    cartItems ? (cartItems = JSON.parse(cartItems)) : (cartItems = []);

    let existingItems = cartItems.find((item) => item.productID == productID);

    existingItems
      ? existingItems.qty++
      : cartItems.push({ productID: productID, qty: 1 });

    localStorage.setItem('cartItems', JSON.stringify(cartItems));

  }
});
