<?php include("include/headerinc.php"); ?>
<style>
    body{
        margin-top: 60px !important
    }
    .s_result{
        height: 250px
    }
    @media screen and (max-width: 700px){
        .s_result{
            height: 200px;
            font-size: 12px
        }
        .pic>img{
            height: 200px !important
        }
    }
</style>
<?php
$comment_body = "";
$perpage = 2;

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

$s_sql = "SELECT * FROM `shoppics` WHERE `name` LIKE '%$s_string%' OR `details` LIKE '%$s_string%' ORDER BY `id` DESC LIMIT $start, $perpage";
$s_sqli = mysqli_query($connect, $s_sql);

$countI = mysqli_num_rows($s_sqli);

?>
<body class="bg-light">
    <div class="container-fluid offset-md-2 col-md-8">
        <?php
        while ($getI = mysqli_fetch_array($s_sqli)) {
            $pic = $getI['pic'];
            $name = $getI['name'];
            $price = $getI['price'];
            $cSign = $getI['currency_sign'];
            $details = $getI['details'];

            $sd = "<b class='s_string'><u>$s_string</u></b>";
            $repsd = str_ireplace($s_string, $sd, $details);

            $s = "<b class='s_string'><u>$s_string</u></b>";
            $rep = str_ireplace($s_string, $s, $name);
            ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-light shadow text-black s_result">
                            <?php
                            if (!$s_string) {
                                ?>
                                    <div class="text-center">Please input search parameters in the search area!!!</div>
                                    <?php
                                    include("inc/footerinc.php");
                                    exit();
                                }
                                if ($s_string) {
                                    if ($countI == 0) {
                                        ?>
                                        <div class="text-center">The item you are looking for was not found!!!</div>
                                        <?php
                                        include("inc/footerinc.php");
                                        exit();
                                    } else {
                                        ?>
                                        <div class="row">
                                            <div class="pic col-5">
                                                <img src="<?php echo $pic; ?>" style="width:100%; height:250px" />
                                            </div>
                                            <div class="details mt-5 col-6">
                                                <small><?php echo $rep; ?></small><br />
                                                <?php echo $repsd; ?><br /><br />
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
                $result = "SELECT Count(*) As Total from shoppics WHERE `name` LIKE '%$s_string%' ORDER BY `id` DESC";
                $result_sqli = mysqli_query($connect, $result);
                $rows = mysqli_num_rows($result_sqli);

                if ($rows) {
                    $rs = mysqli_fetch_assoc($result_sqli);
                    $total = $rs["Total"];
                }
                $totalPages = ceil($total / $perpage);

                if ($page <= 1) {
                    ?>
                        <li class="page-item disabled"><span class="page-link" style="font-weight: bold;">Prev</span></li>
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

                    } else {
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
