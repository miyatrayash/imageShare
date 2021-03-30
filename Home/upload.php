<?php

include_once 'snippets/header.php';
?>

<div class="w3-main w3-content" style="max-width:1600px;margin-top:83px; margin-right:83px; margin-left:83px;">
    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $target_dir = "uploads/" . $_SESSION['user']['id'] . "/";

        if(!is_dir($target_dir))
        {
            mkdir($target_dir);
        }

        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {

            $temp = explode(".", $_FILES["fileToUpload"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename)) {

                $sql = "INSERT INTO `images` (`name`, `user_id`, `path`, `caption`) VALUES (?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);

                if($stmt){
                    $stmt->bindValue(1,basename($_FILES["fileToUpload"]["name"]),PDO::PARAM_STR);
                    $stmt->bindValue(2,$_SESSION['user']['id'],PDO::PARAM_INT);
                    $stmt->bindValue(3,$target_dir.$newfilename,PDO::PARAM_STR);
                    $stmt->bindValue(4,$target_file,PDO::PARAM_STR);

                    if($stmt->execute())
                    {
                        header("Location:". $home);
                    }
                }
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    ?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
</div>

