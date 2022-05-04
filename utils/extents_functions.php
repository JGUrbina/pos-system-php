<?php

function imgSave($img, $actual_img, $new_width, $new_height, $directory) {

    $type_img_save = Array('image/jpeg' => 
                            function($img, $img_directory, $width, $height, $new_width, $new_height, $destination) {

                                    $origin = imagecreatefromjpeg($img['tmp_name']);

                                    imagecopyresized($destination, $origin, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                                    imagejpeg($destination, $img_directory);

                                    return $img_directory;

                            }, 'image/png' => 

                            function($img, $img_directory, $width, $height, $new_width, $new_height, $destination) {

                                $origin = imagecreatefrompng($img['tmp_name']);

                                imagecopyresized($destination, $origin, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                                imagepng($destination, $img_directory);

                                return $img_directory;
                                
                            });
    
   
    list($width, $height) = getimagesize($img['tmp_name']);

    if(!empty($actual_img)) {
        var_dump(dirname(__DIR__, 1).'/'.$actual_img);
        
        unlink(dirname(__DIR__, 1).'/'.$actual_img);
    } else {
        mkdir($directory, 0755, true);
    }

    

    $ramdon_number = mt_rand(100, 999);

    $img_directory = $directory . "/" .$ramdon_number . '-' .$img['name'];

    $destination = imagecreatetruecolor($new_width, $new_height);

    return $type_img_save[$img['type']]($img, $img_directory, $width, $height, $new_width, $new_height, $destination);

}

function imgDelete($img, $delete_folder) {
    if($img != '') {
        unlink(dirname(__DIR__, 1).'/'.$actual_img);
        if($delete_folder) {
            rmdir(dirname($actual_img, 1));
        }
    }
}