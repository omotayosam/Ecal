/**
 * 1. Search
 * 2. Side-Nav
 */
$(document).ready(function() {

    /*<===================== 1. Search Functions =====================>*/
    $(".search_input").on({
        focus: function() {
            function recentSearch() {
                $.get("include/recent_search.php", function(data, status) {
                    $(".search_result").slideDown("2000");
                    $("#search_result").html(data);

                    if (data.includes('none')) {
                        $(".search_result").hide();
                    }
                });

            }

            if (($(this).val().length) < 1) {
                recentSearch();
            }

            if (($(this).val().length) > 2) {
                $(".search_result").css("display", "block");
            }

            $(this).keyup(function() {
                var input = $(".search_input").val();
                var search = "<b class='h6 text-primary'><span class='text-dark fa fa-xs fa-search'></span> " + input + "</b>";
                var link = "<span class='result'><a href='search?q=" + input + "'><div class='bg-white border-bottom p-1'>" + search + "</div></a></span>";

                function searchResultHtml() {
                    $(".search_result").slideDown("2000");
                    $("#search_result").html(link);
                }

                if (($(this).val().length) < 1) {
                    recentSearch();
                }

                if (($(this).val().length) > 0) {
                    searchResultHtml();
                }

                if (($(this).val().length) > 3) {
                    $.post("include/search.php?q=" + input, function(data) {
                        $("#search_result").html(link + data);

                        if (data.includes('Not Found')) {
                            searchResultHtml();
                        }
                    });
                }
            });
        },
        blur: function() {
            $(".search_result").slideUp(1500);
        }
    });

    $(".search_clear").click(function() {
        if ($(".search_input").val().length > 0) {
            $(".search_input").val("").fade(3000);
            $("#search_result").html("");
        }
    });
    /*<===================== End Search Functions =====================>*/

    /*<===================== 2. Side-nav Functions =====================>*/
    // Responsive Side-nav
    $(window).resize(function() {
        if (($(document).width()) <= 450) {
            $('#sidenav').css({
                "width": "80%"
            });

        } else if (($(document).width()) <= 800) {
            $('#sidenav').css({
                "width": "65%"
            });

        } else if (($(document).width()) <= 1200) {
            $('#sidenav').css({
                "width": "50%"
            });

        } else if (($(document).width()) <= 1600) {
            $('#sidenav').css({
                "width": "30%"
            });

        } else {
            $('#sidenav').css({
                "width": "25%"
            });
        }
    });

    // Open Responsive Side-nav
    $('#sidenav-open').on({
        click: function() {
            $('#sidenav').css({
                "transition": "left 2s",
                "left": "0%"
            });

            if (($(document).width()) <= 450) {
                $('#sidenav').css({
                    "width": "80%"
                });

            } else if (($(document).width()) <= 800) {
                $('#sidenav').css({
                    "width": "65%"
                });

            } else if (($(document).width()) <= 1200) {
                $('#sidenav').css({
                    "width": "50%"
                });

            } else if (($(document).width()) <= 1600) {
                $('#sidenav').css({
                    "width": "30%"
                });

            } else {
                $('#sidenav').css({
                    "transition": "left 2s",
                    "left": "0%",
                    "width": "25%"
                });
            }

            $('.overlay').css("display", "block");
        }
    });

    /*------------ Side-nav Drop Links ------------*/
    // Function to drop links in side-nav
    function navDrop(id) {
        $('#nav-drop-' + id).on({
            click: function(event) {
                event.preventDefault();
                $('.nav-drop-' + id).slideToggle('slow', function() {
                    $(".icon", '#nav-drop-' + id).removeClass("important fa-plus");
                    $(".icon", '#nav-drop-' + id).addClass("important fa-minus");

                    if (($('.nav-drop-' + id).css('display')) == 'none') {
                        $(".icon", '#nav-drop-' + id).removeClass("important fa-minus");
                        $(".icon", '#nav-drop-' + id).addClass("important fa-plus");
                    }
                });

            },
        });
    }

    // Add more accordingly (Drop links)
    navDrop(1);
    /*------------ /Side-nav Drop Links ------------*/

    /*------------ Close Side-nav ------------*/
    // Function to close the side-nav
    function closeSidenav(selector) {
        $(selector).on({
            click: function() {
                $('#sidenav').css({
                    "transition": "left 2.5s",
                    "left": "-86%"
                });
                $('#sidenav-open').css("display", "block");
                $('.overlay').css({
                    "display": "none"
                });
            }
        });
    }

    // Close side-nav when the overlay is clicked
    closeSidenav('.overlay');

    // Close side-nav when the close button is clicked
    closeSidenav('#sidenav_close');
    /*------------ /Close Side-nav ------------*/
    /*<===================== End of Side-nav Functions =====================>*/
});