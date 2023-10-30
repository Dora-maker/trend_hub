document.getElementById("logo").onchange = function (evt) {
  var tgt = evt.target || window.event.srcElement,
    files = tgt.files;

  // FileReader support
  if (FileReader && files && files.length) {
    var fr = new FileReader();
    fr.onload = function () {
      document.getElementById("merLogo").src = fr.result;
    };
    fr.readAsDataURL(files[0]);
  }

  // Not supported
  else {
    // fallback -- perhaps submit the input to an iframe and temporarily store
    // them on the server until the user's session ends.
  }
};

// JavaScript to handle the modal dialog
const modal = document.getElementById("modal");
const closeModalBtn = document.getElementById("close-modal-btn");

// Function to show the modal
function showModal() {
modal.classList.remove("hidden");
}

// Function to hide the modal
function hideModal() {
modal.classList.add("hidden");
}
// Event listener for the Close button in the modal
closeModalBtn.addEventListener("click", function () {
hideModal();
});

// Add event listener to the "Save Changes" button
const saveProfileBtn = document.getElementById("save-profile-btn");
saveProfileBtn.addEventListener("click", function () {
showModal();
// Add your logic to save the changes or perform any other actions here
});

$(document).ready(function () {
$("#logoutBtn").click(function () {
  $("#logoutModal").toggle();
});

$("#confirmLogout").click(function () {
  $("#logoutModal").toggle();
});
$("#cancelLogout").click(function () {
  $("#logoutModal").toggle();
});
});
