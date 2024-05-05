<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Files</title>
    <meta name="description" content="Belajar PHP">
    <meta name="keywords" content="234311024">
    <meta name="author" content="Richo Novian Saputra">
</head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <p><label>Pilih gambar yang akan diupload: </label><br>
            <input type="file" name="gambar" id="gambar1"></p>
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <?php
    $target_dir = "gambar/"; 
    $uploadOk = 1;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $tipeGambar = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if($check !== false) {
            echo "File berupa citra/gambar - " . $check["mime"] . "." . "<br>";
            $uploadOk = 1;
        } else {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exist.";
            $uploadOk = 0;
        }

        if ($tipeGambar != "jpg" && $tipeGambar != "png" && $tipeGambar  != "jpeg" && $tipeGambar != "gif") {
            echo "Sorry, hanya file JPG, JPEG, PNG & GIF.";
            $uploadOk = 0;
        }

        if ($_FILES["gambar"]["size"] > 500000) {
            echo "Sorry, file Anda terlalu besar.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, file Anda gagal upload.";
        } else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo "File ". htmlspecialchars(basename($_FILES["gambar"]["name"])). " berhasil upload.";
            } else {
                echo "Maaf, ada error saat upload.";
            }
        }
    }
    ?>
    
</body>
</html>