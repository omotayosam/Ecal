<?php include "include/headerinc.php"; ?>

<div class="mt-5 container-fluid">
    <div class="row">
        <div class="col-12">
            <br />
            <div class="bg-dark text-white p-2 h5 mb-4"><b>YOUR RECENT SEARCHES</b></div>
            
            <?php if ($user == 'Guest') { ?>
                <div class="pb-1 pt-3 px-3 bg-dark animated flash h5">
                    <div class="alert alert-danger text-center animated flash">
                        <i class="fa fa-exclamation-triangle"></i> You Have To <a href="login" class="text-primary alert-link">Login</a> To See Your Recent Searches!!!
                    </div>
                </div>
            <?php exit(); } ?>
            
            <?php
                $get_recent = $connect->query("SELECT * FROM `recent_search` WHERE `user_id` = '$uId' ORDER BY `id` DESC");
                $count = $get_recent->num_rows;

                if ($count > 0) {
                # code...
                    while ($get = $get_recent->fetch_array()) {
                        # code...
                        $id = $get['id'];
                        $recent = $get['recent_search'];

                        if (@$_POST['remRecent_'. $id .'']) {
                            # code...
                            $remove_recent = $connect->query("DELETE FROM `recent_search` WHERE `id` = '$id'");
                            ?>
                            <meta http-equiv="refresh" content="0; recent_search">
                            <?php
                        }
                        ?>
                        <div class='container-fluid'>
                            <div class="result row">
                                <div class='col-11 p-0'>
                                    <a href='<?php echo "search?q=$recent"; ?>'>
                                        <div class='bg-white border-bottom p-1'>
                                            <b class='h5 text-primary'><span class='text-dark fas fa-xs fa-undo'></span> <?php echo "$recent"; ?>  </b>
                                        </div>
                                    </a>
                                </div>
                                <div class='col-1 p-0 text-center'>
                                    <form action="" method="post">
                                        <button type='submit' class='btn-danger btn-sm' name='<?php echo "remRecent_$id"; ?>' title='Remove from search history' value='remove'>
                                            <i class='fa fa-1x fa-times'></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    
                } else {
                    # code...
                    $result = "
                        <div class='mt-5 h4 alert alert-warning text-center'>
                            <i class='fa fa-exclamation-triangle'></i> Sorry you haven't made any searches yet or your searches have been cleared!!!
                        </div>
                    ";
                    echo "$result";
                }
            ?>
        </div>
    </div>
</div>