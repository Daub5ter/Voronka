<?php
    /*require_once("connect/connect.php");
    $information = mysqli_query($db, "SELECT * FROM `information`");
    $information = mysqli_fetch_all($information);
    $xml = simplexml_load_file('xml/data.xml');
    $immovables_id = 1;
    foreach ($xml as $row) {*/
        /*$fulname = $row -> fulname;
        $title = $row -> title;
        $builder = $row -> builder;
        $adress = $row -> adress;
        $price = $row -> price;
        $priceperm = $row -> priceperm;
        $area = $row -> area;
        $godpos = $row -> godpos;
        $repair = $row -> repair;
        $des = $row -> des;
        $ownerava = $row -> ownerava;
        $number = $row -> number;
        mysqli_query($db, "INSERT INTO `information` (`id`, `fulname`, `title`, `builder`, `adress`, `price`, `priceperm`, `area`, `godpos`, `repair`, `des`, `ownerava`, `number`)
            VALUES (NULL, '$fulname', '$title', '$builder', '$adress', '$price', '$priceperm', '$area', '$godpos', '$repair', '$des', '$ownerava', '$number')");*/
        /*$images = $row -> img;
        $image = '';
        $album = [];
        $chars  = preg_split('//u', $images, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        foreach($chars as $char) {
            if ($char != ',') {
                $image .= $char;
            } else {
                $album = $image;
                $image = '';
                //mysqli_query($db, "INSERT INTO `images` (`id`, `image`, `immovables_id`) VALUES (NULL, '$album', '$immovables_id')");
            }
        }
        $immovables_id++;
            /*$image = '';
            if (stristr($images[$i], ',', false)) {
                echo "п";
                $image .= $images[$i];
            } else {
                //mysqli_query($db, "INSERT INTO `images` (`id`, `image`, `immovables_id`) VALUES (NULL, '$image', '$immovables_id')");
                
            }
            "<pre>";
            //echo $images;
            "</pre>";
            //mysqli_query($db, "INSERT INTO `images` (`id`, `image`, `immovables_id`) VALUES (NULL, '$image', '$immovables_id')");
        }*/
                //mysqli_query($db, "INSERT INTO `images` (`id`, `image`, `immovables_id`) VALUES (NULL, '$image', '$immovables_id')");
            //mysqli_query($db, "INSERT INTO `images` (`id`, `image`, `immovables_id`) VALUES (NULL, '$images', '$immovables_id')");
    
?>