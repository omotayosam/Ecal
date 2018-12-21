function search_open() {
    document.getElementsByClassName("search")[0].style.display = "block";
    document.getElementsByClassName("search-opennav")[0].style.display = 'none';
    document.getElementById("indexnavbar").style.top = "48px";
    document.getElementById("indexbody").style.marginTop = "98px";

    var indexprevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var indexcurrentScrollPos = window.pageYOffset;
        if (indexprevScrollpos > indexcurrentScrollPos) {
            document.getElementsByClassName("search")[0].style.display = "inline";
            document.getElementById("indexnavbar").style.top = "48px";
            document.getElementById("indexbody").style.marginTop = "98px";
        } else {
            document.getElementById("indexbody").style.marginTop = "48px";
            document.getElementById("indexnavbar").style.top = "-50px";
        }
        indexprevScrollpos = indexcurrentScrollPos;
    };
}

function search_close() {
    document.getElementsByClassName("search")[0].style.display = "none";
    document.getElementsByClassName("search-opennav")[0].style.display = "";
    document.getElementById("indexnavbar").style.top = "0px";
    document.getElementById("indexbody").style.marginTop = "50px";

    var indexprevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var indexcurrentScrollPos = window.pageYOffset;
        if (indexprevScrollpos < indexcurrentScrollPos) {
            document.getElementsByClassName("search")[0].style.display = "none";
            document.getElementById("indexnavbar").style.top = "-50px";
            document.getElementById("indexbody").style.marginTop = "0px";
        } else {
            document.getElementById("indexbody").style.marginTop = "48px";
            document.getElementById("indexnavbar").style.top = "0px";
        }
        indexprevScrollpos = indexcurrentScrollPos;
    };
}