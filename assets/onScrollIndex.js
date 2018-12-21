var indexprevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var indexcurrentScrollPos = window.pageYOffset;
    if (indexprevScrollpos > indexcurrentScrollPos) {
        document.getElementById("indexnavbar").style.top = "0";
        document.getElementById("indexbody").style.marginTop = "50px";
    } else {
        document.getElementById("indexbody").style.marginTop = "0px";
        document.getElementById("indexnavbar").style.top = "-50px";
    }
    indexprevScrollpos = indexcurrentScrollPos;
};