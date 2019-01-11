function search_open() {
    document.getElementsByClassName("search")[0].style.display = "block";
    document.getElementsByClassName("search-opennav")[0].style.display = 'none';
    document.getElementById("navbar").style.marginTop = "48px";

    var indexprevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var indexcurrentScrollPos = window.pageYOffset;
        if (indexprevScrollpos > indexcurrentScrollPos) {
            document.getElementsByClassName("search")[0].style.display = "inline";
            document.getElementById("navbar").style.marginTop = "48px";

        } else {
            document.getElementById("navbar").style.marginTop = "-50px";
        }
        indexprevScrollpos = indexcurrentScrollPos;
    };
}

function search_close() {
    document.getElementsByClassName("search")[0].style.display = "none";
    document.getElementsByClassName("search-opennav")[0].style.display = "";
    document.getElementById("navbar").style.marginTop = "0px";

    var indexprevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var indexcurrentScrollPos = window.pageYOffset;
        if (indexprevScrollpos < indexcurrentScrollPos) {
            document.getElementsByClassName("search")[0].style.display = "none";
            document.getElementById("navbar").style.marginTop = "-50px";

        } else {
            document.getElementById("navbar").style.marginTop = "0px";
        }
        indexprevScrollpos = indexcurrentScrollPos;
    };
}