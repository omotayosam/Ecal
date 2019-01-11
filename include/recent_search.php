<?php include "session.php"; 
   
    $get_recent = $connect->query("SELECT * FROM `recent_search` WHERE `user_id` = '$uId' ORDER BY `id` DESC");
    $count = $get_recent->num_rows;

    if ($count > 0) {
       # code...
        while ($get = $get_recent->fetch_array()) {
            # code...
			$recent = $get['recent_search'];
			$result = "
				<span class='result'>
                    <a href='search?q={$recent}'>
						<div class='bg-white border-bottom p-1'>
							<b class='h6 text-primary'><span class='text-dark fas fa-xs fa-undo'></span> $recent  </b>
						</div>
					</a>
				</span>
			";
			echo "$result";
		}
		
    } else {
		# code...
		$result = "none";
		echo "$result";
	}
?>