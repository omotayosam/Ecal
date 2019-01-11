<?php include "../include/session.php";

    /**
     * Add no of Item left
     * $item_left = @trim(strip_tags($_POST['item_left'])); ## No. of Items left
     * 
     * Add Colour & Size for fashion
     * $item_colour = @trim(strip_tags($_POST['item_colour'])); ## Item Colour
     * $item_size = @trim(strip_tags($_POST['item_size'])); ## Item Name
    **/

    # code...
    // Variables for Upload Item Form
    $item_name = @trim(strip_tags($_POST['item_name'])); ## Item Name
    $item_cat = @trim(strip_tags($_POST['item_category'])); ## Item Category
    $item_class = @trim(strip_tags($_POST['item_class'])); ## Item Class
    $item_gender = @trim(strip_tags($_POST['item_gender'])); ## Item Gender(when availabe)
    $item_price = @trim(strip_tags($_POST['item_price'])); ## Item Price
    $item_colour = @trim(strip_tags($_POST['item_colour'])); ## Item Colour(If Neccessary)
    $item_size = @trim(strip_tags($_POST['item_size'])); ## Item size(when availabe)
    $item_type = @trim(strip_tags($_POST['item_type'])); ## Item Type(when available)
    
    // If the PHP File Array isn't empty
    if (!empty($_FILES)) {
        # code...
        $item_pics = $_FILES['item_image']; ## Item Images

    // Else
    } else {
        # code...
        $item_pics = ''; ## Empty
    }
    
    $item_details = @trim(strip_tags($_POST['item_details'])); ## Item Details
    $item_description = @trim(strip_tags($_POST['item_description'])); ## Item Description

    // Function to upload image and insert all item values into database
    function image_upload_plus($connect, $err, $success, $item_name, $item_cat, $item_class, $item_gender, $item_pics, $item_colour, $item_size, $item_type, $item_price, $item_details, $item_description) {
        $null = ''; ## Variable To hold erroe message when Uploaded Item already exixts in the Database
        $image = []; ## Image array variable
        $upload =
            [
                'path' => './../../wwwroot/img/' . $item_cat . '/', ## Upload Path.
                'db_path' => 'wwwroot/img/' . $item_cat . '/', ## Upload Path to display in DB.
                'max_size' => '20971520', ## 20MB per Image.
                'allowed_types' => ['jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG', 'gif', 'GIF', 'bmp', 'BMP'] ## Allowed Image extensions.
            ];
            
        // If $item_pics is not empty
        if (!empty(array_filter($item_pics))) {
            // $count = count($item_pics['name']);
                
            // Get all select images seperately and respectively,
            foreach ($item_pics['name'] as $item => $key) {
                $name = basename($item_pics['name'][$item]); ## Name of each image.
                $size = $item_pics['size'][$item]; ## Size of each image.
                $file_ext = explode(".", $name); ## Seperate each image extensions.
                $ext = end($file_ext); ## Select each of the seperated extensions.

                // If each selected extensions match with 'Alowed Image extensions'(Above),
                if (in_array($ext, $upload['allowed_types'])) {
                    # code...
                    // If each image match the max_size(Above):20MB,
                    if ($size <= $upload['max_size']) {
                        # code...
                        $image_name = date('d-m-Y-').$name; ## Add Current(Today's) date as a Prefix to each image name.
                        $array = ['name' => [$upload['db_path'] . $image_name]]; ## Concatnate 'db_path'(Above) with each image name => Absolute path of each image => into an array: $array['name'].
                        $join = implode($array['name']); ## Put each concatnated Absolute paths together, seperated by a space.
                        array_push($image,$join); ## Push them into the 'Image array variable'(Above).

                        $check = $connect->query("SELECT * FROM `items` WHERE`item_category` = '$item_cat' AND `item_class` = '$item_class' AND `item_name` = '$item_name' AND `item_info` = '$item_details'");
                        $count_rows = $check->num_rows;

                        if (($count_rows) < 1) {
                            // If the Upload folder doesn't exist,
                            if (!file_exists($upload['path'])) {
                                # code...
                            $dir = mkdir($upload['path']); ## Create the upload folder.
                            }
                        
                            // If each image upload is successfull,
                            if (move_uploaded_file($item_pics['tmp_name'][$item], $upload['path'].$image_name)) {
                                ## Success message
                                $mess =
                                '
                                    <div class="alert alert-success">
                                        <i class="fa fa-check-circle"></i> Image was Uploaded successfully: '.$item_pics['name'][$item].' 
                                    </div>
                                ';
                                array_push($success, $mess); ## Push success message into array $success
                            } else {
                                # code...
                                ## Error message
                                $mess =
                                '
                                    <div class="alert alert-danger">
                                        <i class="fa fa-exclamation-circle"></i> Failure Uploading: '. $item_pics['error'][$item] .'!!!
                                    </div>
                                ';
                                array_push($err, $mess); ## Push the message into array $err
                            }

                        } else {
                            if (($count_rows) > 0) {
                                # code...
                                $null =
                                '
                                    <div class="alert alert-danger">
                                        <i class="fa fa-exclamation-circle"></i> Current Item already exists!!!
                                    </div>
                                ';
                            }
                        }

                    } else {
                        # code...

                        $mess =
                        '
                            <div class="alert alert-danger">
                                <i class="fa fa-exclamation-circle"></i> ' . $item_pics['name'][$item] . ' was not uploaded because it is larger than 20MB: (' . $item_pics['size'][$item] . ') !!!
                            </div>
                        ';
                        array_push($err, $mess); ## Push the message into array $err
                    }

                } else {
                    # code...
                    $mess = 
                    '
                        <div class="alert alert-danger">
                            <i class="fa fa-exclamation-circle"></i> '.$item_pics['name'][$item].' was not uploaded because it is not a valid image: ('.$item_pics['type'][$item].') !!!
                        </div>
                    ';
                    array_push($err, $mess); ## Push the message into array $err
                }
            }

            $currency = '&#x20A6;'; ## Naira sign
            $err = implode("", $err); ## Put each $err message together, seperated by a space.
            $success = implode("", $success); ## Put each $success message together, seperated by a space.

            $image_slide = implode(", ", $image); ## Put each concatnated Absolute path from 'Image Array Variable' together, seperated by a Comma.(Convert to string and seperate each with a comma)
            $image = array_slice($image, 0, 1); ## Separate one concatnated Absolute path from 'Image Array Variable'.
            $image = implode("", $image); ## Remmove the comma.(Convert to a string and remove the comma)

            if (!empty($success)) {
                # code...
                
                echo '
                    <div class="bg-dark pt-1 pb-1 px-3"><span class="text-white">Success:</span>' . $success . '
                        <div class="alert alert-success">
                            <i class="fa fa-check-double"></i> Item Uploaded Successfully!!!
                        </div>
                    </div>
                ';

                if (($count_rows) < 1) {
                    # code...
                    $insert = $connect->query("INSERT INTO `items` VALUES('', '$item_name', '$image', '$image_slide', '$item_cat', '$item_class', '$item_details', '$item_description', '$currency', '$item_price', '0')");

                    if (stristr($item_cat, "fashion")) {
                        # code...
                        $get_id = $connect->query("SELECT `id` FROM `items` WHERE `item_pic` = '$image' AND `item_slide_pics` = '$image_slide' AND `item_category` = '$item_cat' AND `item_class` = '$item_class' AND `item_name` = '$item_name' AND `item_info` = '$item_details'");
                        $get = $get_id->fetch_array();
                        $id = $get['id'];

                        $insert = $connect->query("INSERT INTO `{$item_class}` VALUES('', '$id', '$item_type', '$item_size', '$item_colour', '$item_gender')");

                    } else {
                        # code...
                        $get_id = $connect->query("SELECT `id` FROM `items` WHERE `item_pic` = '$image' AND `item_slide_pics` = '$image_slide' AND `item_category` = '$item_cat' AND `item_class` = '$item_class' AND `item_name` = '$item_name' AND `item_info` = '$item_details'");
                        $get = $get_id->fetch_array();
                        $id = $get['id'];

                        $insert = $connect->query("INSERT INTO `others` VALUES('', '$id', '$item_colour')");
                    }

                } else {
                    # code...
                    exit();
                }
                
            } else {
                echo '<div class="bg-dark pt-1 pb-1 px-3"><span class="text-danger"><h5><i class="fa fa-exclamation-circle"></i> Upload failed please try again!!!</h5></div>';
            }

            if (!empty($err)) {
                echo '<div class="bg-dark pt-1 pb-1 px-3"><span class="text-white">Errors:</span>'.$err.'</div>';
            }
            if (!empty($null)) {
                echo '<div class="bg-dark pt-1 pb-1 px-3"><span class="text-white">Errors:</span>'.$null.'</div>';
            }
            
        }
    }

    function upload($connect, $item_name, $item_cat, $item_class, $item_gender, $item_pics, $item_colour, $item_size, $item_type, $item_price, $item_details, $item_description) {
        $err = [];
        $success = [];

        if (!empty($_POST) || !empty($_FILES)) {
            if (!empty($item_name && $item_price && $item_details && $item_description)) {
                # code...
                if (((strlen($item_name)) < 3) || ((strlen($item_details)) < 3) || ((strlen($item_description)) < 5)) {
                    # code...
                    switch ($item_name) {
                        case (strlen($item_name)) < 3:
                            # code...
                            $mess =
                            '
                                <div class="alert alert-danger">
                                    <i class="fa fa-exclamation-triangle"></i> Field Length of Item name cannot be less than 3!!!
                                </div>
                            ';
                            array_push($err,$mess);
                            continue;

                        default:
                            # code...
                            break;
                    }
                    switch ($item_details) {
                        case (strlen($item_details)) < 3:
                            # code...
                            $mess =
                                '
                                <div class="alert alert-danger">
                                    <i class="fa fa-exclamation-triangle"></i> Field Length of Item Details cannot be less than 3!!!
                                </div>
                            ';
                            array_push($err,$mess);
                            continue;

                        default:
                            # code...
                            break;
                    }
                    switch ($item_description) {
                        case (strlen($item_description)) < 5:
                            # code...
                            $mess = 
                                '
                                <div class="alert alert-danger">
                                    <i class="fa fa-exclamation-triangle"></i> Field Length of Item Description cannot be less than 5!!!
                                </div>
                            ';
                            array_push($err,$mess);
                            continue;

                        default:
                            # code...
                            break;
                    }
                    $err = implode("", $err);
                    echo '<div class="bg-dark pt-1 pb-1 px-3"><span class="text-danger"><h5><i class="fa fa-exclamation-circle"></i> Upload failed please try again!!!</h5></div>';
                    echo '<div class="bg-dark pt-1 pb-1 px-3"><span class="text-white">Errors:</span>' . $err . '</div>';
                    exit();
                }
                if (stristr($item_cat, "Select") == false) {
                    # code...
                    if (stristr($item_class, "Select") == false) {
                        # code...
                        
                        if (stristr($item_cat, "fashion") == true) {
                            # code...
                            
                            if (stristr($item_gender, "select") == false && stristr($item_type, "select") == false) {
                                # code...
                                if (!empty($_FILES)) {
                                    # code...
                                    if ((($item_colour) !== '') && stristr($item_size, "select") == false) {
                                        # code...
                                        if ((strlen($item_colour)) > 2) {
                                            # code...
                                            $item_details = $item_details . " ($item_gender)";
                                            image_upload_plus($connect, $err, $success, $item_name, $item_cat, $item_class, $item_gender, $item_pics, $item_colour, $item_size, $item_type, $item_price, $item_details, $item_description);

                                        } else {
                                            # code...
                                            echo '<div class="bg-dark pt-1 pb-1 px-3"><span class="text-danger"><h5><i class="fa fa-exclamation-circle"></i> Upload failed please try again!!!</h5></div>';
                                            echo
                                            '
                                                <div class="alert alert-danger">
                                                    <i class="fa fa-exclamation-triangle"></i> Field Length of Colour must be greater than 2!!!
                                                </div>
                                            ';
                                        }

                                    } else {
                                        # code...
                                        echo '<div class="bg-dark pt-1 pb-1 px-3"><span class="text-danger"><h5><i class="fa fa-exclamation-circle"></i> Upload failed please try again!!!</h5></div>';
                                        echo
                                        '
                                            <div class="alert alert-danger">
                                                <i class="fa fa-exclamation-triangle"></i> Item Colour and Item size cannot be empty!!!
                                            </div>
                                        ';
                                    }

                                } else {
                                    # code...
                                    echo '<div class="bg-dark pt-1 pb-1 px-3"><span class="text-danger"><h5><i class="fa fa-exclamation-circle"></i> Upload failed please try again!!!</h5></div>';
                                    echo
                                    '
                                        <div class="alert alert-danger">
                                            <i class="fa fa-exclamation-triangle"></i> Please select atleast one image!!!
                                        </div>
                                    ';
                                }

                            } else {
                                echo '<div class="bg-dark pt-1 pb-1 px-3"><span class="text-danger"><h5><i class="fa fa-exclamation-circle"></i> Upload failed please try again!!!</h5></div>';
                                echo
                                '
                                    <div class="alert alert-danger">
                                        <i class="fa fa-exclamation-triangle"></i> Please select Gender and Type!!!
                                    </div>
                                ';
                            }

                        } else {
                            # code...
                            if (stristr($item_cat, "fashion") == false) {
                                
                                if (!empty($_FILES)) {
                                    # code...
                                    image_upload_plus($connect, $err, $success, $item_name, $item_cat, $item_class, $item_gender, $item_pics, $item_colour, $item_size, $item_type, $item_price, $item_details, $item_description);

                                } else {
                                    # code...
                                    echo '<div class="bg-dark pt-1 pb-1 px-3"><span class="text-danger"><h5><i class="fa fa-exclamation-circle"></i> Upload failed please try again!!!</h5></div>';
                                    echo
                                        '
                                        <div class="alert alert-danger">
                                            <i class="fa fa-exclamation-triangle"></i> Please select atleast one image!!!
                                        </div>
                                    ';
                                }
                            }
                        }

                    } else {
                        # code...
                        echo '<div class="bg-dark pt-1 pb-1 px-3"><span class="text-danger"><h5><i class="fa fa-exclamation-circle"></i> Upload failed please try again!!!</h5></div>';
                        echo
                        '
                            <div class="alert alert-danger">
                                <i class="fa fa-exclamation-triangle"></i> Please Select Item Class!!!
                            </div>
                        ';
                    }

                } else {
                    # code...
                    echo '<div class="bg-dark pt-1 pb-1 px-3"><span class="text-danger"><h5><i class="fa fa-exclamation-circle"></i> Upload failed please try again!!!</h5></div>';
                    echo
                    '
                        <div class="alert alert-danger">
                            <i class="fa fa-exclamation-triangle"></i> Please Select an Item Category!!!
                        </div>
                    ';
                }

            } else {
                # code...
                echo '<div class="bg-dark pt-1 pb-1 px-3"><span class="text-danger"><h5><i class="fa fa-exclamation-circle"></i> Upload failed please try again!!!</h5></div>';
                echo
                '
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation-triangle"></i> Please Input Item Name, Price, Details & Description!!!
                    </div>
                ';
            }
        }
    }
        
    upload($connect, $item_name, $item_cat, $item_class, $item_gender, $item_pics, $item_colour, $item_size, $item_type, $item_price, $item_details, $item_description);
?>