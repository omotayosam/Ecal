<?php 
    include("include/headerinc.php"); 

    $perpage = 4;

    if (isset($_GET["page"])) {
        $page = intval($_GET["page"]);
        
    } else {
        $page = 1;
    }

    $calc = $perpage * $page;
    $start = $calc - $perpage;

    //Get current page id
    if (isset($_GET['id'])) {
        $post_id = mysqli_real_escape_string($connect, $_GET['id']);
    }

    $s_string = "";
    
    if (isset($_GET['q'])) {
        $s_string = @$_GET['q'];
    }

    $s_sqli = $connect->query("SELECT * FROM `items` WHERE (`item_name` LIKE '%$s_string%') OR (`item_info` LIKE '%$s_string%') ORDER BY `id` DESC LIMIT $start, $perpage");
    $countI = $s_sqli->num_rows;

    if ($s_string) {
        if ($countI == 0) {
            if ($user !== "Guest") {
                $save_search = $connect->query("INSERT INTO `recent_search` VALUES('', '$uId', '$s_string', '$date')");
            }

        } else {
            if ($user !== "Guest") {
                $save_search = $connect->query("INSERT INTO `recent_search` VALUES('', '$uId', '$s_string', '$date')");
            }
        }
    }
?>

<body class="search_body bg-light">
    <div class="container-fluid offset-lg-2 col-lg-8">
        <?php
            while ($getI = $s_sqli->fetch_array()) {
                $pic = $getI['item_pic'];
                $name = $getI['item_name'];
                $price = $getI['price'];
                $cSign = $getI['currency'];
                $details = $getI['item_info'];

                $sd = "<b class='s_string'><u>$s_string</u></b>";
                $repsd = str_ireplace($s_string, $sd, $details);

                $s = "<b class='s_string'><u>$s_string</u></b>";
                $rep = str_ireplace($s_string, $s, $name);
                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card bg-white shadow-lg text-black s_result">
                                <?php
                                    if (!$s_string) {
                                        ?>
                                        <div class="mt-3 text-center alert alert-warning h5">
                                            <i class="fa fa-exclamation-triangle"></i> Please input search parameters in the search area!!!
                                        </div>
                                        <style>
                                            footer {
                                                left: 0;
                                                right: 0;
                                                bottom: 0;
                                                position: fixed
                                            }
                                        </style>
                                        <?php
                                        include("include/footerinc.php");
                                        exit();
                                    }
                                    if ($s_string) {
                                        if ($countI == 0) {
                                            ?>
                                            <div class="text-center">The item you are looking for was not found!!!</div>
                                            <?php
                                            include("include/footerinc.php");
                                            exit();

                                        } else {
                                            ?>
                                            <div class="row">
                                                <div class="pic col-5">
                                                    <a href="<?php echo $pic; ?>">
                                                        <img class="img-fluid" src="<?php echo $pic; ?>" style="width:100%;" />
                                                    </a>
                                                </div>
                                                <div class="details mt-5 col-6">
                                                    <small class="h6"><?php echo $rep; ?></small><br />
                                                    <b><?php echo $repsd; ?></b><br /><br />
                                                    <?php echo $cSign . $price; ?>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <br />
                <?php
            }
        ?>
    </div>
    <div class="container-fluid">
        <ul class="pagination pagination-sm m-2 justify-content-center">
            <?php
                if (isset($page)) {
                    $result = $connect->query("SELECT Count(*) As Total from `items` WHERE (`item_name` LIKE '%$s_string%') OR (`item_info` LIKE '%$s_string%') ORDER BY `id` DESC");
                    $rows = $result->num_rows;

                    if ($rows) {
                        $rs = $result->fetch_assoc();
                        $total = $rs["Total"];
                        $total_no = intval($total);
                    }

                    $totalPages = ceil($total / $perpage);

                    if (($page <= 1) && ($countI > 0)) {
                        ?>
                        <li class="page-item disabled"><span class="page-link" style="font-weight: bold;">Prev</span></li>
                        <?php

                    } elseif (($page <= 1) && ($countI < 1)) {
                        ?>
                        <div class="container-fluid bg-white p-5 mt-5">
                            <div class="text-center alert-warning p-2 h3"><i class="fa fa-exclamation-triangle"></i> Sorry No Items Match Your Search!!!,<br /> Please try Again With different search parameters</div>
                        </div>
                        <?php

                    } else {
                        $j = $page - 1;
                        ?>
                        <li class="page-item"><a class="page-link" href="search?q=<?php echo $s_string . '&page=' . $j; ?>"><i class="fa fa-chevron-circle-left"> Prev</i><a></li>
                        <?php

                    }
                    
                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i <> $page) {
                            ?>
                            <li class="page-item"><a class="page-link" href="search?q=<?php echo $s_string . '&page=' . $i; ?>"><?php echo $i; ?></a></span></li>
                            <?php

                        } else {
                            ?>
                            <li class="page-item active"><span class="page-link" style="font-weight: bold;"><?php echo $i; ?></span></li>
                            <?php

                        }
                    }
                    
                    if ($page == $totalPages) {
                        ?>
                        <li class="page-item disabled"><span class="page-link" style="font-weight: bold;">Next</span></li>
                        <?php

                    } elseif (($page != $totalPages) && ($countI > 1)) {
                        $j = $page + 1;
                        ?>
                        <li class="page-item"><a class="page-link" href="search?q=<?php echo $s_string . '&page=' . $j; ?>">Next <i class="fa fa-chevron-circle-right"></i></a></li>
                        <?php

                    }
                }
            ?>
        </ul>
    </div>
</body>