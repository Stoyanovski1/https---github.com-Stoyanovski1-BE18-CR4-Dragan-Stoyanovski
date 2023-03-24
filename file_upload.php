<?php

function file_upload($image, $action = "create"){
$result = new stdClass();
$result->fileName = "product.jpg";
$result->error = true;

$fileName = $image['name'];
$fileError = $image['error'];
$fileSize = $image['size'];
$fileTempName = $image['tmp_name'];
$fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
$filesAllowed = ["png", "jpg", "jpeg"];

if($fileError == 4){ # you can't choose a picture
    $result->errorMessage = "No picture was choosen";
    return $result;
} else { # you can choose a picture
    if(in_array($fileExtension, $filesAllowed)){

        if($fileError == 0){

            if($fileSize < 500000){
                $fileNewName = uniqid('') . '.' . $fileExtension;

                if($action == 'create'){
                    $to = "pictures/$fileNewName";

                } else {
                    $to = "pictures/$fileNewName";
                }
                
                if(move_uploaded_file($fileTempName, $to)){
                    $result->error = false;
                    $result->fileName = $fileNewName;
                    return $result;
                }

            } else {
                $result->errorMessage = "The picture is bigger than (500kb) <br> Please choose another picture";

            }
        } else {
            $result->errorMessage = "Was Error while uploading $fileError code, check PHP documentation.";

        }
    } else {
        $result->errorMessage = "Can't be uploaded";
        return $result;

    }
}
}



?>