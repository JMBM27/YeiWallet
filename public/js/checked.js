function check1(box){
    ele = document.getElementById('bitcoin');
    ele2 = document.getElementById('ethereum');

    if (box.checked) {
        document.getElementById("checkbox2").checked=false;
        ele2.style.borderColor = "transparent";
        ele.style.borderColor = "#2EFE2E";
    }else{
        ele.style.borderColor = "transparent";
    }
}

function check2(box) {
    ele = document.getElementById('bitcoin');
    ele2 = document.getElementById('ethereum');

    if (box.checked) {
        document.getElementById("checkbox1").checked=false;
        ele.style.borderColor = "transparent";
        ele2.style.borderColor = "#2EFE2E";
    }else{
        ele2.style.borderColor = "transparent";
    }
}