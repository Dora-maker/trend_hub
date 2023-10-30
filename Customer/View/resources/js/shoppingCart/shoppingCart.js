var orderCard = document.getElementById("orderCard");
var totalItem = document.getElementById("totalItem");
var noItem = document.getElementById("noItem");

var minusBtn = document.getElementsByClassName("minusBtn");
var plusBtn = document.getElementsByClassName("plusBtn");
var quantity = document.getElementsByClassName("quantityInput");
var desktopHeart = document.getElementsByClassName("desktopHeart");
var mobileHeart = document.getElementsByClassName("mobileHeart");
var itemCard = document.getElementsByClassName("itemCard");
var desktopTrash = document.getElementsByClassName("dTrashImg");
var mobileTrash = document.getElementsByClassName("mTrashImg");
var itemAmount = document.getElementsByClassName("itemAmount");

var stock = 10;

for (let index = 0; index < minusBtn.length; index++) {
    minusBtn[index].addEventListener("click", () => {
        if (Number(quantity[index].value) - 1 == 1) {
            quantity[index].value = 1;
            disableQtyBtn(minusBtn[index]);
        } else {
            enableQtyBtn(plusBtn[index]);
            quantity[index].value = Number(quantity[index].value) - 1;
        }
    });

    plusBtn[index].addEventListener("click", () => {
        if (Number(quantity[index].value) + 1 == stock) {
            quantity[index].value = stock;
            disableQtyBtn(plusBtn[index]);
        } else {
            enableQtyBtn(minusBtn[index]);
            quantity[index].value = Number(quantity[index].value) + 1;
        }
    });

    desktopHeart[index].addEventListener("click", () => {
        wishListToggleColor(desktopHeart[index]);
        wishListToggleColor(mobileHeart[index]);
    });

    mobileHeart[index].addEventListener("click", () => {
        wishListToggleColor(desktopHeart[index]);
        wishListToggleColor(mobileHeart[index]);
    });

    desktopTrash[index].addEventListener("click", () => {
        itemCard[index].classList.add("hidden");
        noItemShow();
    });

    mobileTrash[index].addEventListener("click", () => {
        itemCard[index].classList.add("hidden");
        noItemShow();
    });
}

/*
*Create:Choo Pwint Chal(2023/07/24)
*Update:Choo Pwint Chal(2023/07/24)
*if there no items in cart, hide order card and total items.
*Parameter: no parameter
*No Return
*/
function noItemShow() {
    var hiddenItemCount = 0;
    var shownItemCount = 0;
    for (let index = 0; index < itemCard.length; index++) {
        (itemCard[index].classList.contains("hidden")) ? hiddenItemCount++ : shownItemCount++;
    }
    countItemInCart(shownItemCount);
    if(hiddenItemCount == itemCard.length){
        orderCard.classList.add("hidden");
        totalItem.classList.remove("md:block");
        noItem.classList.remove("hidden");
    }
}

/*
*Create:Choo Pwint Chal(2023/07/23)
*Update:Choo Pwint Chal(2023/07/23)
*counting total products in cart and changing text
*Parameter: count is the shown number of cards
*No Return
*/
function countItemInCart(count) {
    for (let index = 0; index < itemAmount.length; index++) {
        itemAmount[index].innerText = count;
    }
}

/*
*Create:Choo Pwint Chal(2023/07/23)
*Update:Choo Pwint Chal(2023/07/23)
*disable a button and change style of button
*Parameter: button to disable and change style
*No Return
*/
function disableQtyBtn(disabledBtn) {
    disabledBtn.disabled = true;
    disabledBtn.classList.add("bg-opacity-50");
    disabledBtn.classList.add("text-gray-200");
    disabledBtn.classList.remove("font-semibold");
}

/*
*Create:Choo Pwint Chal(2023/07/23)
*Update:Choo Pwint Chal(2023/07/23)
*enable a button and change button style
*Parameter: button to enable and change style
*No Return
*/
function enableQtyBtn(enabledBtn) {
    enabledBtn.disabled = false;
    enabledBtn.classList.remove("bg-opacity-50");
    enabledBtn.classList.remove("text-gray-200");
    enabledBtn.classList.add("font-semibold");
}

/*
*Create:Choo Pwint Chal(2023/07/23)
*Update:Choo Pwint Chal(2023/07/23)
*change heart button
*Parameter: heart[index] to change color
*No Return
*/
function wishListToggleColor(heart) {
    if (heart.classList.contains("text-gray-400")) {
        heart.classList.add("text-textOrange");
        heart.classList.remove("text-gray-400");
    } else{
        heart.classList.add("text-gray-400");
        heart.classList.remove("text-textOrange");
    }
}