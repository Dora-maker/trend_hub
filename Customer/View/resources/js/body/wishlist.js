function toggleColor(button) {
    if (button.style.color === "tomato") {
        button.style.color = "grey";
    } else {
        button.style.color = "tomato";
    }
}


var buttons = document.getElementsByClassName("heartBtn");

for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function() {
        toggleColor(this);
    });
}
