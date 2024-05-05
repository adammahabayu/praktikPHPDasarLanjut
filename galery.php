<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
        }
        .gallery-item {
            margin: 5px;
        }
        .gallery-item img {
            width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="gallery">
        <?php
        $fileList = glob('gambar/*');
        foreach ($fileList as $filename) {
            if (is_file($filename)) {
                echo '<div class="gallery-item">';
                echo '<img src="' . $filename . '" alt="gambar">';
                echo '</div>';
            }
        }
        ?>
    </div>
</body>
</html>