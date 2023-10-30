





// Banner 1
document.getElementById('banner1').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;
    
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById("saveBanner1").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }
    
    else {
   
    }
}


// Banner 2
document.getElementById('banner2').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;
    
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById("saveBanner2").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }
    
    else {
   
    }
}


// Banner 3
document.getElementById('banner3').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;
    
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById("saveBanner3").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }
    
    else {
   
    }
}

// Banner 4
document.getElementById('banner4').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;
    
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById("saveBanner4").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }
    
    else {
   
    }
}


// Banner 5
document.getElementById('banner5').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;
    
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById("saveBanner5").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }
    
    else {
   
    }
}



// Slide 1
document.getElementById('slide1').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;
    
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById("saveSlide1").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }
    
    else {
   
    }
}


// Slide 2
document.getElementById('slide2').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;
    
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById("saveSlide2").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }
    
    else {
   
    }
}

// Slide 3
document.getElementById('slide3').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;
    
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById("saveSlide3").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }
    
    else {
   
    }
}



// Desktop Logo
document.getElementById('logo').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;
    
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById("saveLogo").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }
    
    else {
   
    }
}


// Mobile Logo
document.getElementById('mlogo').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;
    
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById("smlogo").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }
    
    else {
   
    }
}
